<?php

namespace App\Livewire;
use App\Models\checklist as Checklist;
use App\Models\OBA_Kit_Checklist;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use App\Models\Log as AppLog;
use Illuminate\Http\Request;

class OBAKitChecklist extends Component
{
    public $checklist_id;
    public $checklistInfo;
    public $inputs = [
        
    ];
    public $inputStatus = [
        'beforecheckbox1' => null,
        'beforecheckbox2' => null,
        'beforecheckbox3' => null,
        'beforecheckbox4' => null,
        'beforecheckbox5' => null,
        'beforecheckbox6' => null,
        'beforecheckbox7' => null,
        'aftercheckbox1' => null,
        'aftercheckbox2' => null,
        'aftercheckbox3' => null,
        'aftercheckbox4' => null,
        'aftercheckbox5' => null,
        'aftercheckbox6' => null,
        'aftercheckbox7' => null
    ];
    public $userIP;

    public function mount($checklist_id, $userIP){
        
        try{
            $this->userIP = $userIP;
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
        }catch(\Exception $e){
            AppLog::create([
                'LogName' => 'System',
                'LogType' => 'error',
                'action' => 'checklist_obakit',
                'description' => '{"specific_action":"OBAKit Mount Function Error", "error_msg":"'.$e->getMessage().'", "ip address":"'. $this->userIP .'"}'
            ]);
        }
    }
    public function render()
    {
        return view('livewire.o-b-a-kit-checklist');
    }

    public function dispatchMe($field = null){
        DB::beginTransaction();
        try{
            //dd($param);
            $checklist = OBA_Kit_Checklist::where('checklist_id', $this->checklist_id)->first();
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
            AppLog::create([
                'LogName' => 'System',
                'LogType' => 'error',
                'action' => 'checklist_obakit',
                'description' => '{"specific_action":"OBAKit Dispatch Function Error", "error_msg":"'.$e->getMessage().'", "ip address":"'. $this->userIP .'"}'
            ]);
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
        $checklist = OBA_Kit_Checklist::where('checklist_id', $this->checklist_id)->first();
        if ($checklist) {
            $checklist->update($this->inputs);
        }
    }
}
