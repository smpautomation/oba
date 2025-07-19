<?php

namespace App\Livewire;

use App\Models\Check_Overall;
use App\Models\Personnel_Check;
use App\Models\preparation_checklist;
use App\Models\shipment_information;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Sections;
use App\Models\checklist as Checklist;
use App\Models\model_settings as ModelSettings;
use App\Models\OBA_Kit_Checklist;
use App\Models\Check_Items;
use App\Models\model_settings;
use App\Models\Similarities_Checking;
use App\Models\Log as AppLog;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class SectionForm extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $sections = [];
    public $models = [];
    public $checklist;

    public $selectedSection;
    public $selectedModel;
    public $userIP; 
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

    public function save()
    {

        if($this->selectedSection == ""){
            session()->flash('SectionError', 'Please select a section.');
            return;
        }
        if($this->selectedModel == ""){
            session()->flash('ModelError', 'Please select a model.');
            return;
        }
        try{
            $this->checklist = Checklist::latest()->first();
            if (isset($this->checklist->id)) {
                $new_id = $this->checklist->id + 1;
            }else{
                $new_id = Carbon::now()->format('Ym') . 1;
            }

            $model_settings = model_settings::where('model_name', $this->selectedModel)->first();

            Checklist::create([
                'id' => $new_id,
                'model' => $this->selectedModel,
                'section' => $this->selectedSection,
                'scanned_qr_pc' => $model_settings->scanned_qr_pc ? true : false,
                'sir_qs' => $model_settings->sir_qs ? true : false,
                'vmi_mn' => $model_settings->vmi_mn ? true : false,
                'sir_mc' => $model_settings->sir_mc ? true : false,
                'vmi_mc' => $model_settings->vmi_mc ? true : false,
                'specific_label_mc' => $model_settings->specific_label_mc ? true : false,
                'picklist_pn' => $model_settings->picklist_pn ? true : false,
                'sir_pn' => $model_settings->sir_pn ? true : false,
                'vmi_pn' => $model_settings->vmi_pn ? true : false,
                'sir_po' => $model_settings->sir_po ? true : false,
                'vmi_po' => $model_settings->vmi_po ? true : false,
                'specific_label_po' => $model_settings->specific_label_po ? true : false,
            ]);
            preparation_checklist::create([
                'checklist_id' => $new_id
            ]);
            OBA_Kit_Checklist::create([
                'checklist_id' => $new_id
            ]);
            shipment_information::create([
                'checklist_id' => $new_id
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
                'checklist_id' => $new_id
            ]);

            AppLog::create([
                'LogName' => 'User Action',
                'LogType' => 'info',
                'action' => 'create_checklist',
                'description' => '{"specific_action":"Create new checklist '.$new_id.' Model '.$this->selectedModel.' Section '.$this->selectedSection.'", "ip address":"'. $this->userIP .'"}'
            ]);

            session()->flash('status', 'OBA Checklist serial is ' . $new_id);
        }catch(Exception $e){
            AppLog::create([
                'LogName' => 'User Action',
                'LogType' => 'error',
                'action' => 'create_checklist',
                'description' => '{"specific_action":"Create new checklist '.$new_id.' Model '.$this->selectedModel.' Section '.$this->selectedSection.'", "error":"'.$e.'", "ip address":"'. $this->userIP .'"}'
            ]);
        }
        

        

        return redirect()->to('/checklist/'.$new_id);
    }
    public function mount()
    {
        $this->sections = Sections::all();
        $this->models = ModelSettings::all();
        $this->userIP = $this->getClientIpAddress(request());
    }
    public function render()
    {
        return view('livewire.section-form');
    }
}
