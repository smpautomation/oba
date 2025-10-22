<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\checklist as Checklist;
use App\Models\Log as AppLog;
use Illuminate\Support\Facades\Auth;
use App\Models\Check_Items;
use App\Models\Check_Overall;
use App\Models\OBA_Kit_Checklist;
use App\Models\Personnel_Check;
use App\Models\preparation_checklist;
use App\Models\shipment_information;
use App\Models\Similarities_Checking;

class Issues extends Component
{
    public $checklist_id = '';
    public $sidebarOpen = true;
    public $checklistInfo;
    public $checklistInfoPast;
    public $summaryData = [];
    public $origFailID = "";

    public function mount($checklist_id){
        try{
            $this->checklist_id = $checklist_id;
            $this->checklistInfo = Checklist::find($checklist_id);
            $this->origFailID = $this->checklistInfo['failed_id_for_re-oba'];
            if($this->checklistInfo->status == "Failed" && $this->origFailID == ""){
                $this->checklistInfoPast = $this->checklistInfo;
                $this->checklistInfo['failed_id_for_re-oba'] = $this->checklistInfo->id;
            }else{
                $this->checklistInfoPast = Checklist::find($this->checklistInfo['failed_id_for_re-oba']);
            }
            $this->loadSummaryData();
        }catch(\Exception $e){
            AppLog::create([
                'LogName' => 'System',
                'LogType' => 'error',
                'action' => 'checklist_IssuesLivewire',
                'description' => '{"specific_action":"Past Issues Loading Failed", "error_msg":"'.$e->getMessage().'",  user":"'. Auth::user()->name.'"}'
            ]);
        }
    }

    public function toggleSidebar()
    {
        $this->sidebarOpen = !$this->sidebarOpen;
    }

    private function loadSummaryData(){
        try {
            // Fetch all related checklist data
            $this->summaryData = [
                'preparation' => preparation_checklist::where('checklist_id', $this->checklistInfo['failed_id_for_re-oba'])->first(),
                'oba_kit' => OBA_Kit_Checklist::where('checklist_id', $this->checklistInfo['failed_id_for_re-oba'])->first(),
                'shipment' => shipment_information::where('checklist_id', $this->checklistInfo['failed_id_for_re-oba'])->first(),
                'check_items' => Check_Items::where('checklist_id', $this->checklistInfo['failed_id_for_re-oba'])->first(),
                'similarities' => Similarities_Checking::where('checklist_id', $this->checklistInfo['failed_id_for_re-oba'])->first(),
                'overall' => Check_Overall::with(['items', 'pallets'])->where('checklist_id', $this->checklistInfo['failed_id_for_re-oba'])->first(),
                'personnel' => Personnel_Check::where('checklist_id', $this->checklistInfo['failed_id_for_re-oba'])->first(),
            ];
        } catch(\Exception $e) {
            AppLog::create([
                'LogName' => 'System',
                'LogType' => 'error',
                'action' => 'checklist_IssuesLivewire',
                'description' => '{"specific_action":"Load Summary Data Error", "error_msg":"'.$e->getMessage().'",  user":"'. Auth::user()->name.'"}'
            ]);
        }
    }
    public function render()
    {
        return view('livewire.issues');
    }
}
