<?php

namespace App\Livewire;

use App\Models\Check_Items;
use App\Models\checklist as Checklist;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;
use App\Models\Log as AppLog;
use Illuminate\Support\Facades\Auth;

class CheckItems extends Component
{
    public $checklist_id;
    public $checklistInfo;

    public $inputs = [

    ];
    public $inputStatus = [
        'open_boxes_quantity' => null,
        'same_model' => null,
        'specify_model' => null,
        'judgement' => null,
        'carton_quantity' => null,
        'need_sir' => null,
        'sir_available' => null
    ];
    public $dateNow;
    public $userIP;
    public function mount($checklist_id, $userIP){
        try{
            $this->userIP = $userIP;
            $this->checklist_id = $checklist_id;
            $this->checklistInfo = Checklist::find($checklist_id);
            if((Auth::user()->name != $this->checklistInfo->auditor && Auth::user()->name != $this->checklistInfo->assigned_additional_auditor) && Auth::user()->role_id != 2){
                $this->checklistInfo->status = "Closed";
            }
            $this->inputs = [
                'open_boxes_quantity' => $this->checklistInfo->checkItemsCheck->open_boxes_quantity ?? 1,
                'same_model' => $this->checklistInfo->checkItemsCheck->same_model ?? null,
                'specify_model' => $this->checklistInfo->checkItemsCheck->specify_model ?? "",
                'judgement' => $this->checklistInfo->checkItemsCheck->judgement ? true : false,
                'carton_quantity' => $this->checklistInfo->checkItemsCheck->carton_quantity ?? 1,
                'need_sir' => $this->checklistInfo->checkItemsCheck->need_sir ? true : false,
                'sir_available' => $this->checklistInfo->checkItemsCheck->sir_available ? true : false,
            ];

        }catch(\Exception $e){
            AppLog::create([
                'LogName' => 'System',
                'LogType' => 'error',
                'action' => 'checklist_mount',
                'description' => '{"specific_action":"Check Items Mount Function Error", "error_msg":"'.$e->getMessage().'", "ip address":"'. $this->userIP .',  user":"'. Auth::user()->name.'"}'
            ]);
        }

    }

    public function render()
    {
        return view('livewire.check-items');
    }

    public function dispatchMe($field = null){
        //dd($this->inputs);

        if ($field === 'same_model' && $this->inputs['same_model']) {
            $this->inputs['specify_model'] = '';
            $this->inputs['carton_quantity'] = 0;
        }

        DB::beginTransaction();
        try{
            //dd($param);
            $checklist = Check_Items::where('checklist_id', $this->checklist_id)->first();
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
            AppLog::create([
                'LogName' => 'System',
                'LogType' => 'error',
                'action' => 'checklist_checkItems',
                'description' => '{"specific_action":"Check Items Dispatch Error", "error_msg":"'.$e->getMessage().'", "ip address":"'. $this->userIP .',  user":"'. Auth::user()->name.'"}'
            ]);
        }
    }

    #[On('save-clicked')]
    public function handleSaveFromParent()
    {
        $this->saveChildData();
    }

    public function saveChildData()
    {
        $checklist = Check_Items::where('checklist_id', $this->checklist_id)->first();
        if ($checklist) {
            $checklist->update($this->inputs);
        }
    }

    public function getShowModelDetailsProperty()
    {
        return $this->inputs['same_model'] === "0" || $this->inputs['same_model'] === 0 || $this->inputs['same_model'] === false;
    }
}
