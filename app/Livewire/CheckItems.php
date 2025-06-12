<?php

namespace App\Livewire;

use App\Models\checklist as Checklist;
use Livewire\Component;
use Livewire\Attributes\On;

class CheckItems extends Component
{
    public $checklist_id;
    public $checklistInfo;

    public $inputs = [
        'open_boxes_quantity' => 1,
        'same_model' => false,
        'specify_model' => "",
        'judgement' => false,
        'carton_quantity' => 1,
        'need_sir' => false,
        'sir_available' => false
    ];
    public $dateNow;
    public function mount($checklist_id){
        $this->checklist_id = $checklist_id;
        $this->checklistInfo = Checklist::find($checklist_id);
        
        $this->inputs = [
            'open_boxes_quantity' => $this->checklistInfo->checkItemsCheck->open_boxes_quantity ?? 1,
            'same_model' => $this->checklistInfo->checkItemsCheck->same_model ? true : false,
            'specify_model' => $this->checklistInfo->checkItemsCheck->specify_model ?? "",
            'judgement' => $this->checklistInfo->checkItemsCheck->judgement ? true : false,
            'carton_quantity' => $this->checklistInfo->checkItemsCheck->carton_quantity ?? 1,
            'need_sir' => $this->checklistInfo->checkItemsCheck->need_sir ? true : false,
            'sir_available' => $this->checklistInfo->checkItemsCheck->sir_available ? true : false,
        ];
    }
    public function render()
    {
        return view('livewire.check-items');
    }

    public function dispatchMe(){
        $childComponent = "App\Models\Check_Items";
        $this->dispatch('return-value', ['Child Component' => $childComponent, 'Data' => $this->inputs]);
    }
}
