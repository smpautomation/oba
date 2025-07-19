<?php

namespace App\Livewire;

use App\Models\Check_Items;
use App\Models\checklist as Checklist;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;
use App\Models\Log as AppLog;
use Illuminate\Http\Request;

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
    public function mount($checklist_id){
        $this->userIP = $this->getClientIpAddress(request());
        try{
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
            
        }catch(\Exception $e){
            AppLog::create([
                'LogName' => 'System',
                'LogType' => 'error',
                'action' => 'checklist_mount',
                'description' => '{"specific_action":"Check Items Mount Function Error", "error_msg":"'.$e->getMessage().'", "ip address":"'. $this->userIP .'"}'
            ]);
        }
        
    }

    private function getClientIpAddress(Request $request): string
    {
        // Check for various headers that might contain the real IP
        $ipKeys = [
            'HTTP_CF_CONNECTING_IP',     // CloudFlare
            'HTTP_X_REAL_IP',            // Nginx proxy
            'HTTP_X_FORWARDED_FOR',      // Load balancer/proxy
            'HTTP_X_FORWARDED',          // Proxy
            'HTTP_X_CLUSTER_CLIENT_IP',  // Cluster
            'HTTP_CLIENT_IP',            // Proxy
            'REMOTE_ADDR'                // Standard
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

    public function render()
    {
        return view('livewire.check-items');
    }

    public function dispatchMe($field = null){
        //dd($this->inputs);
        
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
                'description' => '{"specific_action":"Check Items Dispatch Error", "error_msg":"'.$e->getMessage().'", "ip address":"'. $this->userIP .'"}'
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
}
