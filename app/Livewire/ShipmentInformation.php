<?php

namespace App\Livewire;

use App\Models\checklist as Checklist;
use App\Models\shipment_information;
use DateTime;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;

class ShipmentInformation extends Component
{
    public $checklist_id;
    public $checklistInfo;

    public $inputs = [
        
    ];
    public $inputStatus = [
        'datetime' => null,
        'model_name' => null,
        'invoice_number' => null,
        'wood' => null,
        'paper' => null,
        'steel' => null,
        'plastic' => null,
        'others' => null
    ];
    public $dateNow;
    public function mount($checklist_id){
        $this->checklist_id = $checklist_id;
        $this->checklistInfo = Checklist::find($checklist_id);
        
        $this->dateNow = new DateTime();
        $this->inputs = [
            'datetime' => $this->checklistInfo->shipInfoCheck->datetime ?? $this->dateNow->format('Y-m-d\Th:i'),
            'model_name' => $this->checklistInfo->model,
            'invoice_number' =>  $this->checklistInfo->shipInfoCheck->invoice_number ?? "",
            'wood' => $this->checklistInfo->shipInfoCheck->wood ? true : false,
            'paper' => $this->checklistInfo->shipInfoCheck->paper ? true : false,
            'steel' => $this->checklistInfo->shipInfoCheck->steel ? true : false,
            'plastic' => $this->checklistInfo->shipInfoCheck->plastic ? true : false,
            'others' => $this->checklistInfo->shipInfoCheck->others ?? false
        ];
    }
    public function render()
    {
        return view('livewire.shipment-information');
    }

    public function dispatchMe($field = null){
        DB::beginTransaction();
        try{
            //dd($param);
            $checklist = shipment_information::where('checklist_id', $this->checklist_id)->first();
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
        $checklist = shipment_information::where('checklist_id', $this->checklist_id)->first();
        if ($checklist) {
            $checklist->update($this->inputs);
        }
    }
}
