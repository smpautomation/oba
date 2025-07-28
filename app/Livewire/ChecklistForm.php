<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\checklist as Checklist;
use Illuminate\Http\Request;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;
use App\Models\Log as AppLog;

class ChecklistForm extends Component
{
    public $checklistInfo;
    public $model_id = "";
    public $scanned_qr_pc = true;
    public $userIP;

    public function mount($model_id){
        $this->userIP = $this->getClientIpAddress(request());
        try{
            $this->model_id = $model_id;
            $this->checklistInfo = Checklist::find($model_id);
            $this->scanned_qr_pc = $this->checklistInfo->scanned_qr_pc ? true : false;
        }catch(\Exception $e){
            AppLog::create([
                'LogName' => 'System',
                'LogType' => 'error',
                'action' => 'checklist_checklistForm',
                'description' => '{"specific_action":"CheckList Mount Function Error", "error_msg":"'.$e->getMessage().'", "ip address":"'. $this->userIP .'"}'
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
        //$this->dispatch('save-clicked');
        
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
                'description' => '{"specific_action":"CheckList Closing Error", "error_msg":"'.$e->getMessage().'", "ip address":"'. $this->userIP .'"}'
            ]);
            DB::rollBack();
        }
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
                'description' => '{"specific_action":"CheckList Mount Function Error", "error_msg":"'.$e->getMessage().'", "ip address":"'. $this->userIP .'"}'
            ]);
            DB::rollBack();
        }

    }

    public function render()
    {
        return view('livewire.checklist-form');
    }


}
