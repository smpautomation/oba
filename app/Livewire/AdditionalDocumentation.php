<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\checklist as Checklist;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class AdditionalDocumentation extends Component
{
    use WithFileUploads;
    
    public $checklist_id;
    public $checklistInfo;
    public $document;
    public $uploadedDocuments = [];
    public $showModal = false;
    public $selectedDocumentUrl = '';
    public $selectedDocumentName = '';
    public $selectedDocumentType = '';
    
    // New properties for rename functionality
    public $showRenameModal = false;
    public $tempDocument = null;
    public $documentName = '';
    public $originalDocumentName = '';

    public function mount($checklist_id){
        $this->checklist_id = $checklist_id;
        $this->checklistInfo = Checklist::find($checklist_id);
        $this->loadUploadedDocuments();
    }

    public function updatedDocument()
    {
        // Validate the uploaded file
        $this->validate([
            'document' => 'nullable|file|mimes:pdf,docx,doc,xlsx,xls|max:20480', // max 20MB
        ]);
        
        // If document is valid, show rename modal
        if ($this->document) {
            $this->showRenamePrompt();
        }
    }

    public function showRenamePrompt()
    {
        $this->tempDocument = $this->document;
        $this->originalDocumentName = $this->document->getClientOriginalName();
        
        // Set default name (without extension)
        $nameWithoutExtension = pathinfo($this->originalDocumentName, PATHINFO_FILENAME);
        $this->documentName = $nameWithoutExtension;
        
        $this->showRenameModal = true;
    }

    public function confirmRename()
    {
        // Validate the document name
        $this->validate([
            'documentName' => 'required|string|max:255|regex:/^[a-zA-Z0-9\s\-_\.]+$/',
        ], [
            'documentName.required' => 'Document name is required.',
            'documentName.regex' => 'Document name can only contain letters, numbers, spaces, hyphens, underscores, and dots.',
        ]);

        if ($this->tempDocument) {
            $this->processUpload();
        }
    }

    public function cancelRename()
    {
        $this->showRenameModal = false;
        $this->reset(['document', 'tempDocument', 'documentName', 'originalDocumentName']);
    }

    public function processUpload()
    {
        if (!$this->tempDocument) {
            return;
        }
        
        try {
            $extension = $this->tempDocument->getClientOriginalExtension();
            $timestamp = now()->format('Y-m-d_H-i-s');
            $customName = trim($this->documentName);
            
            // Create filename with custom name
            $filename = $timestamp . '_' . Str::slug($customName) . '.' . $extension;
            
            // Store the file in documents subfolder
            $path = $this->tempDocument->storeAs(
                ($this->checklist_id ?: 'uploads') . '/documents', 
                $filename, 
                'public'
            );
            
            // Get file size for display
            $fileSize = $this->formatFileSize($this->tempDocument->getSize());
            
            // Add to uploaded documents array with custom name
            $this->uploadedDocuments[] = [
                'name' => $customName . '.' . $extension,
                'path' => $path,
                'filename' => $filename,
                'type' => $extension,
                'size' => $fileSize,
                'uploaded_at' => now()->format('M j, Y g:i A')
            ];
            
            // Clear all document-related properties
            $this->reset(['document', 'tempDocument', 'documentName', 'originalDocumentName']);
            $this->showRenameModal = false;
            
            // Show success message
            session()->flash('message', 'Document uploaded successfully!');
            
        } catch (\Exception $e) {
            // Log the error
            Log::error('Document upload failed: ' . $e->getMessage());
            
            // Show error message
            session()->flash('message', 'Upload failed. Please try again.');
            
            // Clear all document-related properties
            $this->reset(['document', 'tempDocument', 'documentName', 'originalDocumentName']);
            $this->showRenameModal = false;
        }
    }

    private function loadUploadedDocuments()
    {
        $documentsPath = ($this->checklist_id ?: 'uploads') . '/documents';
        
        if (Storage::disk('public')->exists($documentsPath)) {
            $files = Storage::disk('public')->files($documentsPath);
            
            $this->uploadedDocuments = collect($files)->map(function ($file) {
                $filename = basename($file);
                $filePath = Storage::disk('public')->path($file);
                $extension = pathinfo($filename, PATHINFO_EXTENSION);
                
                return [
                    'name' => $filename,
                    'path' => $file,
                    'filename' => $filename,
                    'type' => strtolower($extension),
                    'size' => file_exists($filePath) ? $this->formatFileSize(filesize($filePath)) : 'Unknown',
                    'uploaded_at' => file_exists($filePath) ? 
                        date('M j, Y g:i A', filemtime($filePath)) : 
                        'Unknown'
                ];
            })->toArray();
        }
    }

    private function formatFileSize($bytes)
    {
        if ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            return number_format($bytes / 1024, 2) . ' KB';
        } else {
            return $bytes . ' bytes';
        }
    }

    public function showDocument($documentPath)
    {
        $document = collect($this->uploadedDocuments)->firstWhere('path', $documentPath);
        
        if ($document) {
            $this->selectedDocumentUrl = Storage::url($documentPath);
            $this->selectedDocumentName = $document['name'];
            $this->selectedDocumentType = $document['type'];
            $this->showModal = true;
        }
    }

    public function downloadDocument($documentPath)
    {
        if (Storage::disk('public')->exists($documentPath)) {
            $filename = basename($documentPath);
            //return Storage::disk('public')->download($documentPath, $filename);
        }
        
        session()->flash('error', 'Document not found.');
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->selectedDocumentUrl = '';
        $this->selectedDocumentName = '';
        $this->selectedDocumentType = '';
    }

    public function removeDocument($index)
    {
        if (isset($this->uploadedDocuments[$index])) {
            $documentData = $this->uploadedDocuments[$index];
            $documentPath = $documentData['path'];
            
            // Delete from storage
            Storage::disk('public')->delete($documentPath);
            
            // Remove from array
            unset($this->uploadedDocuments[$index]);
            $this->uploadedDocuments = array_values($this->uploadedDocuments); // Re-index array
            
            session()->flash('message', 'Document removed successfully.');
        }
    }

    private function getFileIcon($type)
    {
        switch (strtolower($type)) {
            case 'pdf':
                return 'M7 18A1.5 1.5 0 005.5 19.5A1.5 1.5 0 007 21a1.5 1.5 0 001.5-1.5A1.5 1.5 0 007 18m7.5-9L18 15l-3.5-6L18 3l-3.5 6z';
            case 'docx':
            case 'doc':
                return 'M14,17H7V15H14M17,13H7V11H17M17,9H7V7H17M19,3H5C3.89,3 3,3.89 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3Z';
            case 'xlsx':
            case 'xls':
                return 'M19,3H5A2,2 0 0,0 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5A2,2 0 0,0 19,3M19,19H5V5H19V19Z';
            default:
                return 'M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z';
        }
    }

    public function render()
    {
        return view('livewire.additional-documentation');
    }
}