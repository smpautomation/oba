<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\checklist as Checklist;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class PhotoDocumentation extends Component
{
    use WithFileUploads;
    
    public $checklist_id;
    public $checklistInfo;
    public $photo;
    public $uploadedPhotos = [];
    public $showModal = false;
    public $selectedPhotoUrl = '';
    public $selectedPhotoName = '';
    
    // New properties for rename functionality
    public $showRenameModal = false;
    public $tempPhoto = null;
    public $photoName = '';
    public $originalPhotoName = '';

    public function mount($checklist_id){
        $this->checklist_id = $checklist_id;
        $this->checklistInfo = Checklist::find($checklist_id);
        $this->loadUploadedPhotos();
    }

    public function updatedPhoto()
    {
        // Validate the uploaded file
        $this->validate([
            'photo' => 'nullable|image|max:10240', // max 10MB
        ]);
        
        // If photo is valid, show rename modal
        if ($this->photo) {
            $this->showRenamePrompt();
        }
    }

    public function showRenamePrompt()
    {
        $this->tempPhoto = $this->photo;
        $this->originalPhotoName = $this->photo->getClientOriginalName();
        
        // Set default name (without extension)
        $nameWithoutExtension = pathinfo($this->originalPhotoName, PATHINFO_FILENAME);
        $this->photoName = $nameWithoutExtension;
        
        $this->showRenameModal = true;
    }

    public function confirmRename()
    {
        // Validate the photo name
        $this->validate([
            'photoName' => 'required|string|max:255|regex:/^[a-zA-Z0-9\s\-_\.]+$/',
        ], [
            'photoName.required' => 'Photo name is required.',
            'photoName.regex' => 'Photo name can only contain letters, numbers, spaces, hyphens, underscores, and dots.',
        ]);

        if ($this->tempPhoto) {
            $this->processUpload();
        }
    }

    public function cancelRename()
    {
        $this->showRenameModal = false;
        $this->reset(['photo', 'tempPhoto', 'photoName', 'originalPhotoName']);
    }

    public function processUpload()
    {
        if (!$this->tempPhoto) {
            return;
        }
        
        try {
            $extension = $this->tempPhoto->getClientOriginalExtension();
            $timestamp = now()->format('Y-m-d_H-i-s');
            $customName = trim($this->photoName);
            
            // Create filename with custom name
            $filename = $timestamp . '_' . Str::slug($customName) . '.' . $extension;
            
            // Store the file
            $path = $this->tempPhoto->storeAs(
                $this->checklist_id ?: 'uploads', 
                $filename, 
                'public'
            );
            
            // Add to uploaded photos array with custom name
            $this->uploadedPhotos[] = [
                'name' => $customName . '.' . $extension,
                'path' => $path,
                'filename' => $filename,
                'uploaded_at' => now()->format('M j, Y g:i A')
            ];
            
            // Clear all photo-related properties
            $this->reset(['photo', 'tempPhoto', 'photoName', 'originalPhotoName']);
            $this->showRenameModal = false;
            
            // Show success message
            session()->flash('message', 'Photo uploaded successfully!');
            
        } catch (\Exception $e) {
            // Log the error
            Log::error('Photo upload failed: ' . $e->getMessage());
            
            // Show error message
            session()->flash('message', 'Upload failed. Please try again.');
            
            // Clear all photo-related properties
            $this->reset(['photo', 'tempPhoto', 'photoName', 'originalPhotoName']);
            $this->showRenameModal = false;
        }
    }

    private function loadUploadedPhotos()
    {
        if ($this->checklist_id && Storage::disk('public')->exists($this->checklist_id)) {
            $files = Storage::disk('public')->files($this->checklist_id);
            
            $this->uploadedPhotos = collect($files)->map(function ($file) {
                $filename = basename($file);
                $filePath = Storage::disk('public')->path($file);
                
                return [
                    'name' => $filename,
                    'path' => $file,
                    'filename' => $filename,
                    'uploaded_at' => file_exists($filePath) ? 
                        date('M j, Y g:i A', filemtime($filePath)) : 
                        'Unknown'
                ];
            })->toArray();
        }
    }

    public function showPhoto($photoPath)
    {
        $this->selectedPhotoUrl = Storage::url($photoPath);
        $this->selectedPhotoName = basename($photoPath);
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->selectedPhotoUrl = '';
        $this->selectedPhotoName = '';
    }

    public function removePhoto($index)
    {
        if (isset($this->uploadedPhotos[$index])) {
            $photoData = $this->uploadedPhotos[$index];
            $photoPath = $photoData['path'];
            
            // Delete from storage
            Storage::disk('public')->delete($photoPath);
            
            // Remove from array
            unset($this->uploadedPhotos[$index]);
            $this->uploadedPhotos = array_values($this->uploadedPhotos); // Re-index array
            
            session()->flash('message', 'Photo removed successfully.');
        }
    }

    public function render()
    {
        return view('livewire.photo-documentation');
    }
}