<?php

namespace App\Livewire;

use DateTime;
use App\Models\Check_Items;
use App\Models\Check_Overall;
use App\Models\OBA_Kit_Checklist;
use App\Models\Personnel_Check;
use App\Models\preparation_checklist;
use App\Models\shipment_information;
use App\Models\Similarities_Checking;
use App\Models\model_settings as ModelSettings;
use Livewire\Component;
use App\Models\checklist as Checklist;
use Illuminate\Http\Request;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;
use App\Models\Log as AppLog;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Exception;

class ChecklistForm extends Component
{
    public $checklist;
    public $dateToFormat;
    public $checklistInfo;
    public $model_id = "";
    public $scanned_qr_pc = true;
    public $mc_checklist_pc = true;
    public $userIP;
    public $showSummary = false;
    public $showMatrix = true;
    public $summaryData = [];
    public $canConfirm = false;
    public $showFailConfirmation = false;
    public $origStat = "";

    public function mount($model_id){
        $this->userIP = $this->getClientIpAddress(request());
        try{
            $this->model_id = $model_id;
            $this->checklistInfo = Checklist::find($model_id);
            $this->origStat = $this->checklistInfo->status;
            if((Auth::user()->name != $this->checklistInfo->auditor && Auth::user()->name != $this->checklistInfo->assigned_additional_auditor) && Auth::user()->role_id != 2){
                $this->checklistInfo->status = "Closed";
            }
            $this->scanned_qr_pc = $this->checklistInfo->scanned_qr_pc ? true : false;
            $this->mc_checklist_pc = $this->checklistInfo->mc_checklist_pc ? true : false;
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

    public function closeMatrix(){
        $this->showMatrix = false;
    }

    public function confirmFinishAudit(){
        $this->closeMe();
    }

    public function confirmFailAudit(){
        $this->showFailConfirmation = true;
    }

    public function cancelFailAudit()
    {
        $this->showFailConfirmation = false;
    }

    public function failAudit()
    {
        try {
            // Update the checklist status to failed
            $checklist = Checklist::find($this->model_id);

            if (!$checklist) {
                $this->dispatch('error', message: 'Checklist not found');
                return;
            }

            $checklist->status = 'Failed';
            $checklist->failed_by = Auth::user()->name;
            $checklist->fail_reason = 'Audit failed due to ' . count($this->getIssues()) . ' unresolved issues';
            $checklist->save();

            $this->showFailConfirmation = false;
            $this->showSummary = false;

            // Show success message
            $this->dispatch('success', message: 'Audit has been marked as failed. Please resolve the issues before conducting re-OBA.');

            AppLog::create([
                'LogName' => 'User',
                'LogType' => 'Info',
                'action' => 'checklist_checklistForm',
                'description' => '{"specific_action":"Fail Audit Checklist: '.$this->model_id.', user":"'. Auth::user()->name.'"}'
            ]);

            // Optionally redirect or refresh
            return redirect()->route('viewlist');

        } catch (\Exception $e) {
            AppLog::create([
                'LogName' => 'System',
                'LogType' => 'error',
                'action' => 'checklist_checklistForm',
                'description' => '{"specific_action":"Error on Failing Audit Checklist: '.$this->model_id.', "error_msg":"'.$e->getMessage().'", user":"'. Auth::user()->name.'"}'
            ]);
        }
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

    public function printChecklistForm(){
        return redirect()->to('/print/' . $this->model_id);
    }

    private function getIssues()
    {
        $issues = [];

        // Check Preparation Checklist
        if($this->summaryData['preparation']) {
            if(!$this->summaryData['preparation']->oneprep2column) $issues[] = ['section' => 'Preparation', 'item' => 'MC Receiving'];
            if(!$this->summaryData['preparation']->oneprep3column) $issues[] = ['section' => 'Preparation', 'item' => 'OBA Kit'];
            if(!$this->summaryData['preparation']->oneprep4column) $issues[] = ['section' => 'Preparation', 'item' => 'Packing Specs'];
            if(!$this->summaryData['preparation']->oneprep5column) $issues[] = ['section' => 'Preparation', 'item' => 'SEREM'];
            if(!$this->summaryData['preparation']->oneprep6column) $issues[] = ['section' => 'Preparation', 'item' => 'Pick List'];
            if(!$this->summaryData['preparation']->oneprep7column) $issues[] = ['section' => 'Preparation', 'item' => 'FG Lot Trace'];
            if(!$this->summaryData['preparation']->oneprep9column) $issues[] = ['section' => 'Preparation', 'item' => 'Packing Slip'];
            if(!$this->summaryData['preparation']->oneprep10column) $issues[] = ['section' => 'Preparation', 'item' => 'Related Docs'];
        }

        // Check Items Checking
        if($this->summaryData['check_items']) {
            if($this->summaryData['check_items']->same_model === false) $issues[] = ['section' => 'Items Checking', 'item' => 'Model Name Verification'];
            if($this->summaryData['check_items']->judgement === false) $issues[] = ['section' => 'Items Checking', 'item' => 'Barcode Label Judgement'];
            if($this->summaryData['check_items']->need_sir && !$this->summaryData['check_items']->sir_available) $issues[] = ['section' => 'Items Checking', 'item' => 'SIR Document'];
        }

        // Check Similarities
        if($this->summaryData['similarities']) {
            if($this->summaryData['similarities']->same_quantity_qs === false) $issues[] = ['section' => 'Similarities', 'item' => 'Quantity for Shipment'];
            if($this->summaryData['similarities']->judgement_qs === false) $issues[] = ['section' => 'Similarities', 'item' => 'Quantity Judgement'];
            if($this->summaryData['similarities']->same_box_bs === false) $issues[] = ['section' => 'Similarities', 'item' => 'Number of Boxes'];
            if($this->summaryData['similarities']->judgement_bs === false) $issues[] = ['section' => 'Similarities', 'item' => 'Box Count Judgement'];
            if($this->summaryData['similarities']->same_model_mn === false) $issues[] = ['section' => 'Similarities', 'item' => 'Model Name'];
            if($this->summaryData['similarities']->judgement_mn === false) $issues[] = ['section' => 'Similarities', 'item' => 'Model Name Judgement'];
            if($this->summaryData['similarities']->same_mc === false) $issues[] = ['section' => 'Similarities', 'item' => 'Model Code'];
            if($this->summaryData['similarities']->judgement_mc === false) $issues[] = ['section' => 'Similarities', 'item' => 'Model Code Judgement'];
            if($this->summaryData['similarities']->same_pn === false) $issues[] = ['section' => 'Similarities', 'item' => 'Part Number'];
            if($this->summaryData['similarities']->judgement_pn === false) $issues[] = ['section' => 'Similarities', 'item' => 'Part Number Judgement'];
            if($this->summaryData['similarities']->same_po === false) $issues[] = ['section' => 'Similarities', 'item' => 'PO Number'];
            if($this->summaryData['similarities']->judgement_po === false) $issues[] = ['section' => 'Similarities', 'item' => 'PO Number Judgement'];
        }

        // Check Shipment Information
        if($this->summaryData['shipment']) {
            if(!$this->summaryData['shipment']->datetime) $issues[] = ['section' => 'Shipment', 'item' => 'Date & Time'];
            if(!$this->summaryData['shipment']->model_name) $issues[] = ['section' => 'Shipment', 'item' => 'Model Name'];
            if(!$this->summaryData['shipment']->invoice_number) $issues[] = ['section' => 'Shipment', 'item' => 'Invoice Number'];
            if(!$this->summaryData['shipment']->wood && !$this->summaryData['shipment']->paper && !$this->summaryData['shipment']->steel && !$this->summaryData['shipment']->plastic && !$this->summaryData['shipment']->others) {
                $issues[] = ['section' => 'Shipment', 'item' => 'Pallet Materials'];
            }
        }

        // Check Personnel
        if($this->summaryData['personnel']) {
            if(!$this->summaryData['personnel']->shipping_pic) $issues[] = ['section' => 'Personnel', 'item' => 'Shipping PIC'];
            if(!$this->summaryData['personnel']->date) $issues[] = ['section' => 'Personnel', 'item' => 'Date'];
            if(!$this->summaryData['personnel']->oba_checked_by) $issues[] = ['section' => 'Personnel', 'item' => 'OBA Checked By'];
            if(!$this->summaryData['personnel']->check_judgement) $issues[] = ['section' => 'Personnel', 'item' => 'OBA Judgement'];
            if(!$this->summaryData['personnel']->oba_picture_by) $issues[] = ['section' => 'Personnel', 'item' => 'OBA Picture By'];
            if(!$this->summaryData['personnel']->picture_judgement) $issues[] = ['section' => 'Personnel', 'item' => 'Picture Judgement'];
        }

        return $issues;
    }

    public function reAudit(){
        $failedID = $this->model_id;

        try{
            $this->checklist = Checklist::latest()->first();
            if (isset($this->checklist->id)) {
                $new_id = $this->checklist->id + 1;
            }else{
                $new_id = Carbon::now()->format('Ym') . '001';
            }

            $this->dateToFormat = new DateTime();
            $formattedDate = $this->dateToFormat->format('Y-m-d\TH:i');

            $model_settings = ModelSettings::where('model_name', $this->checklistInfo->model)->first();

            Checklist::create([
                'id' => $new_id,
                'auditor' => Auth::user()->name,
                'model' => $this->checklistInfo->model,
                'section' => $this->checklistInfo->section,
                'mc_checklist_pc' => $model_settings->mc_checklist_pc ? true : false,
                'scanned_qr_pc' => $model_settings->scanned_qr_pc ? true : false,
                'sir_qs' => $model_settings->sir_qs ? true : false,
                'vmi_mn' => $model_settings->vmi_mn ? true : false,
                'sir_mn' => $model_settings->sir_mn ? true : false,
                'sir_mc' => $model_settings->sir_mc ? true : false,
                'vmi_mc' => $model_settings->vmi_mc ? true : false,
                'specific_label_mc' => $model_settings->specific_label_mc ? true : false,
                'sir_pn' => $model_settings->sir_pn ? true : false,
                'vmi_pn' => $model_settings->vmi_pn ? true : false,
                'sci_label_pn' => $model_settings->sci_label_pn ? true : false,
                'qr_qa_pn' => $model_settings->qr_qa_pn ? true : false,
                'qr_mc_pn' => $model_settings->qr_mc_pn ? true : false,
                'qr_mgtz_pn' => $model_settings->qr_mgtz_pn ? true : false,
                'sir_po' => $model_settings->sir_po ? true : false,
                'vmi_po' => $model_settings->vmi_po ? true : false,
                'specific_label_po' => $model_settings->specific_label_po ? true : false,
                'sci_label_po' => $model_settings->sci_label_po ? true : false,
                'failed_id_for_re-oba' => $failedID
            ]);
            preparation_checklist::create([
                'checklist_id' => $new_id
            ]);
            OBA_Kit_Checklist::create([
                'checklist_id' => $new_id
            ]);
            shipment_information::create([
                'checklist_id' => $new_id,
                'datetime' => $formattedDate,
                'model_name' => $this->checklistInfo->model,
            ]);
            Check_Items::create([
                'checklist_id' => $new_id
            ]);
            Similarities_Checking::create([
                'checklist_id' => $new_id
            ]);
            Check_Overall::create([
                'checklist_id' => $new_id
            ]);
            Personnel_Check::create([
                'checklist_id' => $new_id,
                'oba_checked_by' => Auth::user()->name
            ]);

            AppLog::create([
                'LogName' => 'User Action',
                'LogType' => 'info',
                'action' => 'create_checklist',
                'description' => '{"specific_action":"Create new checklist from failed checklist'.$new_id.' Model '.$this->checklistInfo->model.' Section '.$this->checklistInfo->section.'", "ip address":"'. $this->userIP .',  user":"'. Auth::user()->name.'"}'
            ]);

            session()->flash('status', 'OBA Checklist serial is ' . $new_id);
        }catch(Exception $e){
            AppLog::create([
                'LogName' => 'User Action',
                'LogType' => 'error',
                'action' => 'create_checklist',
                'description' => '{"specific_action":"Create new checklist '.$new_id.' Model '.$this->checklistInfo->model.' Section '.$this->checklistInfo->section.'", "error":"'.$e.'", "ip address":"'. $this->userIP .',  user":"'. Auth::user()->name.'"}'
            ]);
        }
        return redirect()->to('/checklist/'.$new_id);
    }

    public function render()
    {
        return view('livewire.checklist-form');
    }
}
