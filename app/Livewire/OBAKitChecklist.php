<?php

namespace App\Livewire;
use App\Models\checklist as Checklist;
use Livewire\Component;

class OBAKitChecklist extends Component
{
    public $checklist_id;
    public $checklistInfo;
    public $inputs = [
        'beforecheckbox1' => false,
        'beforecheckbox2' => false,
        'beforecheckbox3' => false,
        'beforecheckbox4' => false,
        'beforecheckbox5' => false,
        'beforecheckbox6' => false,
        'beforecheckbox7' => false,
        'aftercheckbox1' => false,
        'aftercheckbox2' => false,
        'aftercheckbox3' => false,
        'aftercheckbox4' => false,
        'aftercheckbox5' => false,
        'aftercheckbox6' => false,
        'aftercheckbox7' => false
    ];

    public function mount($checklist_id){
        $this->checklist_id = $checklist_id;
        $this->checklistInfo = Checklist::find($checklist_id);
        $this->inputs = [
            'beforecheckbox1' => $this->checklistInfo->obaCheck->beforecheckbox1 ? true : false,
            'beforecheckbox2' => $this->checklistInfo->obaCheck->beforecheckbox2 ? true : false,
            'beforecheckbox3' => $this->checklistInfo->obaCheck->beforecheckbox3 ? true : false,
            'beforecheckbox4' => $this->checklistInfo->obaCheck->beforecheckbox4 ? true : false,
            'beforecheckbox5' => $this->checklistInfo->obaCheck->beforecheckbox5 ? true : false,
            'beforecheckbox6' => $this->checklistInfo->obaCheck->beforecheckbox6 ? true : false,
            'beforecheckbox7' => $this->checklistInfo->obaCheck->beforecheckbox7 ? true : false,
            'aftercheckbox1' => $this->checklistInfo->obaCheck->aftercheckbox1 ? true : false,
            'aftercheckbox2' => $this->checklistInfo->obaCheck->aftercheckbox2 ? true : false,
            'aftercheckbox3' => $this->checklistInfo->obaCheck->aftercheckbox3 ? true : false,
            'aftercheckbox4' => $this->checklistInfo->obaCheck->aftercheckbox4 ? true : false,
            'aftercheckbox5' => $this->checklistInfo->obaCheck->aftercheckbox5 ? true : false,
            'aftercheckbox6' => $this->checklistInfo->obaCheck->aftercheckbox6 ? true : false,
            'aftercheckbox7' => $this->checklistInfo->obaCheck->aftercheckbox7 ? true : false
        ];
    }
    public function render()
    {
        return view('livewire.o-b-a-kit-checklist');
    }

    public function dispatchMe(){
        $childComponent = "App\Models\OBA_Kit_Checklist";
        $this->dispatch('return-value', ['Child Component' => $childComponent, 'Data' => $this->inputs]);
    }
}
