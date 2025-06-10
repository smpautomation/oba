<?php

namespace App\Livewire;

use App\Models\checklist as Checklist;
use Livewire\Component;
use Livewire\Attributes\On; 

class PreparationChecklist extends Component
{
    public $checklist_id;
    public $checklistInfo;
    public $inputs = [
        'oneprep2column' => false,
        'oneprep3column' => false,
        'oneprep4column' => false,
        'oneprep5column' => false,
        'oneprep6column' => false,
        'oneprep7column' => false,
        'oneprep8column' => false,
        'oneprep9column' => false,
        'oneprep10column' => false,
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

    public function dispatchMe(){
        $childComponent = "App\Models\preparation_checklist";
        $this->dispatch('return-value', ['Child Component' => $childComponent, 'Data' => $this->inputs]);
    }
}
