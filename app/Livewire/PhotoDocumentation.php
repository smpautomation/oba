<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\checklist as Checklist;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Log as AppLog;
use Illuminate\Http\Request;

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
    public $sidebarOpen = false;

    public $userIP;
    public function mount($checklist_id, $userIP){
        try{
            $this->userIP = $userIP;
            $this->checklist_id = $checklist_id;
            $this->checklistInfo = Checklist::find($checklist_id);
            $this->loadUploadedPhotos();
        }catch(\Exception $e){
            AppLog::create([
                'LogName' => 'System',
                'LogType' => 'error',
                'action' => 'checklist_photo',
                'description' => '{"specific_action":"Photo Mount Function Error", "error_msg":"'.$e->getMessage().'", "ip address":"'. $this->userIP .'"}'
            ]);
        }
    }

    public function toggleSidebar()
    {
        $this->sidebarOpen = !$this->sidebarOpen;
    }
    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'nullable|image|max:2048', // max 10MB
        ],
        [
            'photo.nullable' => 'The Photo is Nullable',
            'photo.image' => 'The file must be an image (JPEG, JPG, PNG)',
            'photo.max' => 'The file exceed the maximum size of allowed upload per photo'
        ]);
        
        if ($this->photo) {
            $this->showRenamePrompt();
        }
    }

    public function showRenamePrompt()
    {
        $this->tempPhoto = $this->photo;
        $this->originalPhotoName = $this->photo->getClientOriginalName();
        
        $nameWithoutExtension = pathinfo($this->originalPhotoName, PATHINFO_FILENAME);
        $this->photoName = $nameWithoutExtension;
        
        $this->showRenameModal = true;
    }

    public function confirmRename()
    {
        $this->validate([
            'photoName' => 'required|string|max:50|regex:/^[a-zA-Z0-9\s\-_\.]+$/',
        ], [
            'photoName.required' => 'Photo name is required.',
            'photoName.regex' => 'Photo name can only contain letters, numbers, spaces, hyphens, underscores, and dots.',
            'photoName.string' => 'Only String is Accepted.',
            'photoName.max' => 'exceeded the amount of characters allowed in photo name.'
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
            
            $filename = $timestamp . '_' . Str::slug($customName) . '.' . $extension;
            
            $path = $this->tempPhoto->storeAs(
                $this->checklist_id ?: 'uploads', 
                $filename, 
                'public'
            );
            
            $this->uploadedPhotos[] = [
                'name' => $customName . '.' . $extension,
                'path' => $path,
                'filename' => $filename,
                'uploaded_at' => now()->format('M j, Y g:i A')
            ];
            
            $this->reset(['photo', 'tempPhoto', 'photoName', 'originalPhotoName']);
            $this->showRenameModal = false;
            
            AppLog::create([
                'LogName' => 'User Action',
                'LogType' => 'info',
                'action' => 'checklist_photo',
                'description' => '{"specific_action":"Photo Upload Successful '.$filename.'", "ip address":"'. $this->userIP .'"}'
            ]);
            session()->flash('message', 'Photo uploaded successfully!');
            
        } catch (\Exception $e) {
            AppLog::create([
                'LogName' => 'System',
                'LogType' => 'error',
                'action' => 'checklist_photo',
                'description' => '{"specific_action":"Photo Upload unsuccessful", "error_msg":"'.$e->getMessage().'", "ip address":"'. $this->userIP .'"}'
            ]);
            
            session()->flash('message', 'Upload failed. Please try again.');
            
            $this->reset(['photo', 'tempPhoto', 'photoName', 'originalPhotoName']);
            $this->showRenameModal = false;
        }
    }

    private function loadUploadedPhotos()
    {
        try{
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
        }catch(\Exception $e){
            AppLog::create([
                'LogName' => 'System',
                'LogType' => 'error',
                'action' => 'checklist_photo',
                'description' => '{"specific_action":"Photo Load Unsuccessful", "error_msg":"'.$e->getMessage().'", "ip address":"'. $this->userIP .'"}'
            ]);
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
        try{
            if (isset($this->uploadedPhotos[$index])) {
                $photoData = $this->uploadedPhotos[$index];
                $photoPath = $photoData['path'];
                
                // Delete from storage
                Storage::disk('public')->delete($photoPath);
                
                AppLog::create([
                    'LogName' => 'User Action',
                    'LogType' => 'warning',
                    'action' => 'checklist_photo',
                    'description' => '{"specific_action":"Photo Removal Successful '.$photoPath.'", "ip address":"'. $this->userIP .'"}'
                ]);

                unset($this->uploadedPhotos[$index]);
                $this->uploadedPhotos = array_values($this->uploadedPhotos); // Re-index array
                
                session()->flash('message', 'Photo removed successfully.');
            }
        }catch(\Exception $e){
            AppLog::create([
                'LogName' => 'System',
                'LogType' => 'error',
                'action' => 'checklist_photo',
                'description' => '{"specific_action":"Photo Removal unsuccessful", "error_msg":"'.$e->getMessage().'", "ip address":"'. $this->userIP .'"}'
            ]);
        }
    }

    public function render()
    {
        return view('livewire.photo-documentation');
    }
}