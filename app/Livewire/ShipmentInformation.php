<?php

namespace App\Livewire;

use App\Models\checklist as Checklist;
use DateTime;
use Livewire\Component;

class ShipmentInformation extends Component
{
    public $checklist_id;
    public $checklistInfo = [];

    public $inputs = [
        'datetime' => null,
        'model_name' => "",
        'invoice_number' => "",
        'wood' => false,
        'paper' => false,
        'steel' => false,
        'plastic' => false,
        'others' => ""
    ];
    public $dateNow;
    public function mount($checklist_id){
        $this->checklist_id = $checklist_id;
        $this->checklistInfo = Checklist::find($checklist_id);
        $this->dateNow = new DateTime();
        $this->inputs = [
            'datetime' => $this->dateNow->format('Y-m-d\Th:i'),
            'model_name' => $this->checklistInfo->model,
            'invoice_number' => "",
            'wood' => false,
            'paper' => false,
            'steel' => false,
            'plastic' => false,
            'others' => ""
        ];
    }
    public function render()
    {
        return view('livewire.shipment-information');
    }

    public function dispatchMe(){
        dd($this->inputs);
        $childComponent = "Shipment Information";
        $this->dispatch('return-value', ['Child Component' => $childComponent, 'Data' => $this->inputs]);
    }
}
