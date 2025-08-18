<?php

namespace App\Livewire;

use App\Models\Check_Items;
use App\Models\Check_Overall;
use App\Models\OBA_Kit_Checklist;
use App\Models\Personnel_Check;
use App\Models\preparation_checklist;
use App\Models\shipment_information;
use App\Models\Similarities_Checking;
use Livewire\Component;
use App\Models\checklist as Checklist;
use Illuminate\Http\Request;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;
use App\Models\Log as AppLog;
use Illuminate\Support\Facades\Auth;

class ChecklistForm extends Component
{
    public $checklistInfo;
    public $model_id = "";
    public $scanned_qr_pc = true;
    public $userIP;
    public $showSummary = false;
    public $summaryData = [];
    public $canConfirm = false;

    public function mount($model_id){
        $this->userIP = $this->getClientIpAddress(request());
        try{
            $this->model_id = $model_id;
            $this->checklistInfo = Checklist::find($model_id);
            if((Auth::user()->name != $this->checklistInfo->auditor && Auth::user()->name != $this->checklistInfo->assigned_additional_auditor) && Auth::user()->role_id != 2){
                $this->checklistInfo->status = "Closed";
            }
            $this->scanned_qr_pc = $this->checklistInfo->scanned_qr_pc ? true : false;
        }catch(\Exception $e){
            AppLog::create([
                'LogName' => 'System',
                'LogType' => 'error',
                'action' => 'checklist_checklistForm',
                'description' => '{"specific_action":"CheckList Mount Function Error", "error_msg":"'.$e->getMessage().'", "ip address":"'. $this->userIP .',  user":"'. Auth::user()->name.'"}'
            ]);
        }
    }

    private function getClientIpAddress(Request $request): string
    {
        $ipKeys = [
            'HTTP_CF_CONNECTING_IP',
            'HTTP_X_REAL_IP',
            'HTTP_X_FORWARDED_FOR',
            'HTTP_X_FORWARDED',
            'HTTP_X_CLUSTER_CLIENT_IP',
            'HTTP_CLIENT_IP',
            'REMOTE_ADDR'
        ];

        foreach ($ipKeys as $key) {
            if (array_key_exists($key, $_SERVER) && !empty($_SERVER[$key])) {
                $ips = explode(',', $_SERVER[$key]);
                $ip = trim($ips[0]);

                // Validate IP address
                if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
                    return $ip;
                }
            }
        }

        // Fallback to request IP
        return $request->ip();
    }

    public function doNothing(){
        return;
    }


    public function closeMe(){
        DB::beginTransaction();
        try{
            //dd($param);
            $checklist = Checklist::where('id', $this->model_id)->first();
            $inputData = [
                'status' => 'Closed'
            ];
            if ($checklist) {
                $checklist->updateQuietly($inputData);
            }

            DB::commit();
            redirect('/viewlist');
        }catch(\Exception $e){
            AppLog::create([
                'LogName' => 'System',
                'LogType' => 'error',
                'action' => 'checklist_checklistForm',
                'description' => '{"specific_action":"CheckList Closing Error", "error_msg":"'.$e->getMessage().'", "ip address":"'. $this->userIP .',  user":"'. Auth::user()->name.'"}'
            ]);
            DB::rollBack();
        }
    }

    public function showSummaryModal(){
        try {
            $this->loadSummaryData();
            $this->showSummary = true;
            $this->canConfirm = false;

            AppLog::create([
                'LogName' => 'System',
                'LogType' => 'info',
                'action' => 'checklist_checklistForm',
                'description' => '{"specific_action":"clicked summary", "ip address":"'. $this->userIP .',  user":"'. Auth::user()->name.'"}'
            ]);



        } catch(\Exception $e) {
            AppLog::create([
                'LogName' => 'System',
                'LogType' => 'error',
                'action' => 'checklist_checklistForm',
                'description' => '{"specific_action":"Show Summary Error", "error_msg":"'.$e->getMessage().'", "ip address":"'. $this->userIP .',  user":"'. Auth::user()->name.'"}'
            ]);
        }
    }

    private function loadSummaryData(){
        try {
            // Fetch all related checklist data
            $this->summaryData = [
                'preparation' => preparation_checklist::where('checklist_id', $this->model_id)->first(),
                'oba_kit' => OBA_Kit_Checklist::where('checklist_id', $this->model_id)->first(),
                'shipment' => shipment_information::where('checklist_id', $this->model_id)->first(),
                'check_items' => Check_Items::where('checklist_id', $this->model_id)->first(),
                'similarities' => Similarities_Checking::where('checklist_id', $this->model_id)->first(),
                'overall' => Check_Overall::with(['items', 'pallets'])->where('checklist_id', $this->model_id)->first(),
                'personnel' => Personnel_Check::where('checklist_id', $this->model_id)->first(),
            ];
        } catch(\Exception $e) {
            AppLog::create([
                'LogName' => 'System',
                'LogType' => 'error',
                'action' => 'checklist_checklistForm',
                'description' => '{"specific_action":"Load Summary Data Error", "error_msg":"'.$e->getMessage().'", "ip address":"'. $this->userIP .',  user":"'. Auth::user()->name.'"}'
            ]);
        }
    }
    public function closeSummary(){
        $this->showSummary = false;
        $this->canConfirm = false;
    }

    public function confirmFinishAudit(){
        $this->closeMe();
    }

    public function enableConfirm(){
        $this->canConfirm = true;
    }

    #[On('return-value')]
    public function displayData($param)
    {
        //dd($param);
        DB::beginTransaction();
        try{
            //dd($param);
            $checklist = $param['Child Component']::where('checklist_id', $this->model_id)->first();
            $inputData = $param['Data'];
            if ($checklist) {
                $checklist->updateQuietly($inputData);
            }

            DB::commit();
        }catch(\Exception $e){
            AppLog::create([
                'LogName' => 'System',
                'LogType' => 'error',
                'action' => 'checklist_checklistForm',
                'description' => '{"specific_action":"CheckList Mount Function Error", "error_msg":"'.$e->getMessage().'", "ip address":"'. $this->userIP .',  user":"'. Auth::user()->name.'"}'
            ]);
            DB::rollBack();
        }

    }

    public function render()
    {
        return view('livewire.checklist-form');
    }
}
