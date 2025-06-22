<?php

namespace App\Livewire;

use App\Models\checklist as Checklist;
use App\Models\preparation_checklist;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class PreparationChecklist extends Component
{
    use WithFileUploads;
    public $checklist_id;
    public $checklistInfo;
    public $photo;
    public $uploadedPhotos = [];
    public $showModal = false;
    public $selectedPhotoUrl = '';
    public $selectedPhotoName = '';
    public $inputs = [
        
    ];
    public $inputStatus = [
        'oneprep2column' => null,
        'oneprep3column' => null,
        'oneprep4column' => null,
        'oneprep5column' => null,
        'oneprep6column' => null,
        'oneprep7column' => null,
        'oneprep8column' => null,
        'oneprep9column' => null,
        'oneprep10column' => null,
        'oneprep2remarks' => null,
        'oneprep3remarks' => null,
        'oneprep4remarks' => null,
        'oneprep5remarks' => null,
        'oneprep6remarks' => null,
        'oneprep7remarks' => null,
        'oneprep8remarks' => null,
        'oneprep9remarks' => null,
        'oneprep10remarks' => null
    ];
    public function mount($checklist_id){
        $this->checklist_id = $checklist_id;
        $this->checklistInfo = Checklist::find($checklist_id);
        $this->inputs = [
            'oneprep2column' => $this->checklistInfo->prepCheck->oneprep2column ? true : false,
            'oneprep3column' => $this->checklistInfo->prepCheck->oneprep3column ? true : false,
            'oneprep4column' => $this->checklistInfo->prepCheck->oneprep4column ? true : false,
            'oneprep5column' => $this->checklistInfo->prepCheck->oneprep5column ? true : false,
            'oneprep6column' => $this->checklistInfo->prepCheck->oneprep6column ? true : false,
            'oneprep7column' => $this->checklistInfo->prepCheck->oneprep7column ? true : false,
            'oneprep8column' => $this->checklistInfo->prepCheck->oneprep8column ? true : false,
            'oneprep9column' => $this->checklistInfo->prepCheck->oneprep9column ? true : false,
            'oneprep10column' => $this->checklistInfo->prepCheck->oneprep10column ? true : false,
            'oneprep2remarks' => $this->checklistInfo->prepCheck->oneprep2remarks ?? null,
            'oneprep3remarks' => $this->checklistInfo->prepCheck->oneprep3remarks ?? null,
            'oneprep4remarks' => $this->checklistInfo->prepCheck->oneprep4remarks ?? null,
            'oneprep5remarks' => $this->checklistInfo->prepCheck->oneprep5remarks ?? null,
            'oneprep6remarks' => $this->checklistInfo->prepCheck->oneprep6remarks ?? null,
            'oneprep7remarks' => $this->checklistInfo->prepCheck->oneprep7remarks ?? null,
            'oneprep8remarks' => $this->checklistInfo->prepCheck->oneprep8remarks ?? null,
            'oneprep9remarks' => $this->checklistInfo->prepCheck->oneprep9remarks ?? null,
            'oneprep10remarks' => $this->checklistInfo->prepCheck->oneprep10remarks ?? null
        ];
    }
    public function render()
    {
        return view('livewire.preparation-checklist');
    }

    public function dispatchMe($field = null){
        
        DB::beginTransaction();
        try{
            //dd($param);
            $checklist = preparation_checklist::where('checklist_id', $this->checklist_id)->first();
            $inputData = $this->inputs;
            if ($checklist) {
                $checklist->update($inputData);
            }
            DB::commit();

            
            if(isset($this->inputs[$field]) && $this->inputs[$field] != null){
                $this->inputStatus[$field] = 'success';
            }
        }catch(\Exception $e){
            if ($field) {
                $this->inputStatus[$field] = 'error';
            }
            DB::rollBack();
        }
    }

    #[On('save-clicked')]
    public function handleSaveFromParent()
    {
        $this->saveChildData();
    }

    public function saveChildData()
    {
        $checklist = preparation_checklist::where('checklist_id', $this->checklist_id)->first();
        if ($checklist) {
            $checklist->update($this->inputs);
        }
    }
}
