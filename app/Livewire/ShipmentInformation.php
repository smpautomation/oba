<?php

namespace App\Livewire;

use App\Models\checklist as Checklist;
use App\Models\shipment_information;
use DateTime;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use App\Models\Log as AppLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        'others' => null,
        'pallet_size' => null
    ];
    public $dateNow;
    public $dateToFormat;
    public $userIP;
    public function mount($checklist_id, $userIP){
        try{
            $this->userIP = $userIP;
            $this->checklist_id = $checklist_id;
            $this->checklistInfo = Checklist::find($checklist_id);
            if((Auth::user()->name != $this->checklistInfo->auditor && Auth::user()->name != $this->checklistInfo->assigned_additional_auditor) && Auth::user()->role_id != 2){
                $this->checklistInfo->status = "Closed";
            }
            $this->dateToFormat = new DateTime();
            $formattedDate = $this->dateToFormat->format('Y-m-d\TH:i');
            $this->dateNow = $formattedDate;
            $this->inputs = [
                'datetime' => $this->checklistInfo->shipInfoCheck->datetime ?? $this->dateNow,
                'model_name' => $this->checklistInfo->model,
                'invoice_number' =>  $this->checklistInfo->shipInfoCheck->invoice_number ?? "",
                'wood' => $this->checklistInfo->shipInfoCheck->wood ? true : false,
                'paper' => $this->checklistInfo->shipInfoCheck->paper ? true : false,
                'steel' => $this->checklistInfo->shipInfoCheck->steel ? true : false,
                'plastic' => $this->checklistInfo->shipInfoCheck->plastic ? true : false,
                'others' => $this->checklistInfo->shipInfoCheck->others ?? false,
                'pallet_size' => $this->checklistInfo->shipInfoCheck->pallet_size ?? false
            ];
        }catch(\Exception $e){
            AppLog::create([
                'LogName' => 'System',
                'LogType' => 'error',
                'action' => 'checklist_shipinfo',
                'description' => '{"specific_action":"ShipInfo Mount Function Error", "error_msg":"'.$e->getMessage().'", "ip address":"'. $this->userIP .',  user":"'. Auth::user()->name.'"}'
            ]);
        }
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
            AppLog::create([
                'LogName' => 'System',
                'LogType' => 'error',
                'action' => 'checklist_shipinfo',
                'description' => '{"specific_action":"ShipInfo Dispatch Function Error", "error_msg":"'.$e->getMessage().'", "ip address":"'. $this->userIP .',  user":"'. Auth::user()->name.'"}'
            ]);
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
