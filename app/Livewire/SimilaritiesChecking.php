<?php

namespace App\Livewire;

use App\Models\Similarities_Checking;
use Livewire\Component;
use App\Models\checklist as Checklist;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use App\Models\Log as AppLog;
use Illuminate\Http\Request;

class SimilaritiesChecking extends Component
{
    public $checklist_id;
    public $checklistInfo;
    public $model_settings;
    public $sir_qs = true;
    public $vmi_mn = true;
    public $sir_mc = true;
    public $vmi_mc = true;
    public $specific_label_mc = true;
    public $picklist_pn = true;
    public $sir_pn = true;
    public $vmi_pn = true;
    public $sir_po = true;
    public $vmi_po = true;
    public $specific_label_po = true;

    public $inputs = [
        
    ];

    public $inputStatus = [ 
        'pick_list_qs' => null,
        'shipping_invoice_qs' => null,
        'serem_qs' => null,
        'sir_qs' => null,
        'same_quantity_qs' => null,
        'judgement_qs' => null,
        'picklist_bs' => null,
        'packing_slip_bs' => null,
        'serem_bs' => null,
        'pallet_label_bs' => null,
        'same_box_bs' => null,
        'judgement_bs' => null,
        'picklist_mn' => null,
        'shipping_invoice_mn' => null,
        'serem_mn' => null,
        'fg_label_mn' => null,
        'vmi_qr_mn' => null,
        'mc_label_mn' => null,
        'pallet_label_mn' => null,
        'same_model_mn' => null,
        'judgement_mn' => null,
        'picklist_mc' => null,
        'shipping_invoice_mc' => null,
        'serem_mc' => null,
        'sir_mc' => null,
        'shipping_label_mc' => null,
        'vmi_label_mc' => null,
        'mc_barcode_mc' => null,
        'pallet_label_mc' => null,
        'specific_qr_label_mc' => null,
        'same_mc' => null,
        'judgement_mc' => null,
        'picklist_pn' => null,
        'shipping_invoice_pn' => null,
        'serem_pn' => null,
        'sir_pn' => null,
        'shipping_label_pn' => null,
        'vmi_pn' => null,
        'same_pn' => null,
        'judgement_pn' => null,
        'serem_customer_po' => null,
        'serem_smp_po' => null,
        'shipping_label_customer_po' => null,
        'shipping_label_smp_po' => null,
        'vmi_customer_po' => null,
        'vmi_smp_po' => null,
        'sir_customer_po' => null,
        'sir_smp_po' => null,
        'specific_label_customer_po' => null,
        'specific_label_smp_po' => null,
        'pallet_label_customer_po' => null,
        'pallet_label_smp_po' => null,
        'same_po' => null,
        'judgement_po' => null,
    ];
    public $userIP;

    public function mount($checklist_id){
        $this->userIP = $this->getClientIpAddress(request());
        try{
            $this->checklist_id = $checklist_id;
            $this->checklistInfo = Checklist::find($checklist_id);
            $this->sir_qs = $this->checklistInfo->sir_qs ? true : false;
            $this->vmi_mn = $this->checklistInfo->vmi_mn ? true : false;
            $this->sir_mc = $this->checklistInfo->sir_mc ? true : false;
            $this->vmi_mc = $this->checklistInfo->vmi_mc ? true : false;
            $this->specific_label_mc = $this->checklistInfo->specific_label_mc ? true : false;
            $this->picklist_pn = $this->checklistInfo->picklist_pn ? true : false;
            $this->sir_pn = $this->checklistInfo->sir_pn ? true : false;
            $this->vmi_pn = $this->checklistInfo->vmi_pn ? true : false;
            $this->sir_po = $this->checklistInfo->sir_po ? true : false;
            $this->vmi_po = $this->checklistInfo->vmi_po ? true : false;
            $this->specific_label_po = $this->checklistInfo->specific_label_po ? true : false;
            $this->inputs = [
                'pick_list_qs' => $this->checklistInfo->similaritiesCheck->pick_list_qs ?? "",
                'shipping_invoice_qs' => $this->checklistInfo->similaritiesCheck->shipping_invoice_qs ?? "",
                'serem_qs' => $this->checklistInfo->similaritiesCheck->serem_qs ?? "",
                'sir_qs' => $this->checklistInfo->similaritiesCheck->sir_qs ?? "",
                'same_quantity_qs' => $this->checklistInfo->similaritiesCheck->same_quantity_qs ? true : false,
                'judgement_qs' => $this->checklistInfo->similaritiesCheck->judgement_qs ? true : false,
                'picklist_bs' => $this->checklistInfo->similaritiesCheck->picklist_bs ?? "",
                'packing_slip_bs' => $this->checklistInfo->similaritiesCheck->packing_slip_bs ?? "",
                'serem_bs' => $this->checklistInfo->similaritiesCheck->serem_bs ?? "",
                'pallet_label_bs' => $this->checklistInfo->similaritiesCheck->pallet_label_bs ?? "",
                'same_box_bs' => $this->checklistInfo->similaritiesCheck->same_box_bs ? true : false,
                'judgement_bs' => $this->checklistInfo->similaritiesCheck->judgement_bs ? true : false,
                'picklist_mn' => $this->checklistInfo->similaritiesCheck->picklist_mn ?? "",
                'shipping_invoice_mn' => $this->checklistInfo->similaritiesCheck->shipping_invoice_mn ?? "",
                'serem_mn' => $this->checklistInfo->similaritiesCheck->serem_mn ?? "",
                'fg_label_mn' => $this->checklistInfo->similaritiesCheck->fg_label_mn ?? "",
                'vmi_qr_mn' => $this->checklistInfo->similaritiesCheck->vmi_qr_mn ?? "",
                'mc_label_mn' => $this->checklistInfo->similaritiesCheck->mc_label_mn ?? "",
                'pallet_label_mn' => $this->checklistInfo->similaritiesCheck->pallet_label_mn ?? "",
                'same_model_mn' => $this->checklistInfo->similaritiesCheck->same_model_mn ? true : false,
                'judgement_mn' => $this->checklistInfo->similaritiesCheck->judgement_mn ? true : false,
                'picklist_mc' => $this->checklistInfo->similaritiesCheck->picklist_mc ?? "",
                'shipping_invoice_mc' => $this->checklistInfo->similaritiesCheck->shipping_invoice_mc ?? "",
                'serem_mc' => $this->checklistInfo->similaritiesCheck->serem_mc ?? "",
                'sir_mc' => $this->checklistInfo->similaritiesCheck->sir_mc ?? "",
                'shipping_label_mc' => $this->checklistInfo->similaritiesCheck->shipping_label_mc ?? "",
                'vmi_label_mc' => $this->checklistInfo->similaritiesCheck->vmi_label_mc ?? "",
                'mc_barcode_mc' => $this->checklistInfo->similaritiesCheck->mc_barcode_mc ?? "",
                'pallet_label_mc' => $this->checklistInfo->similaritiesCheck->pallet_label_mc ?? "",
                'specific_qr_label_mc' => $this->checklistInfo->similaritiesCheck->specific_qr_label_mc ?? "",
                'same_mc' => $this->checklistInfo->similaritiesCheck->same_mc ? true : false,
                'judgement_mc' => $this->checklistInfo->similaritiesCheck->judgement_mc ? true : false,
                'picklist_pn' => $this->checklistInfo->similaritiesCheck->picklist_pn ?? "",
                'shipping_invoice_pn' => $this->checklistInfo->similaritiesCheck->shipping_invoice_pn ?? "",
                'serem_pn' => $this->checklistInfo->similaritiesCheck->serem_pn ?? "",
                'sir_pn' => $this->checklistInfo->similaritiesCheck->sir_pn ?? "",
                'shipping_label_pn' => $this->checklistInfo->similaritiesCheck->shipping_label_pn ?? "",
                'vmi_pn' => $this->checklistInfo->similaritiesCheck->vmi_pn ?? "",
                'same_pn' => $this->checklistInfo->similaritiesCheck->same_pn ? true : false,
                'judgement_pn' => $this->checklistInfo->similaritiesCheck->judgement_pn ? true : false,
                'serem_customer_po' => $this->checklistInfo->similaritiesCheck->serem_customer_po ?? "",
                'serem_smp_po' => $this->checklistInfo->similaritiesCheck->serem_smp_po ?? "",
                'shipping_label_customer_po' => $this->checklistInfo->similaritiesCheck->shipping_label_customer_po ?? "",
                'shipping_label_smp_po' => $this->checklistInfo->similaritiesCheck->shipping_label_smp_po ?? "",
                'vmi_customer_po' => $this->checklistInfo->similaritiesCheck->vmi_customer_po ?? "",
                'vmi_smp_po' => $this->checklistInfo->similaritiesCheck->vmi_smp_po ?? "",
                'sir_customer_po' => $this->checklistInfo->similaritiesCheck->sir_customer_po ?? "",
                'sir_smp_po' => $this->checklistInfo->similaritiesCheck->sir_smp_po ?? "",
                'specific_label_customer_po' => $this->checklistInfo->similaritiesCheck->specific_label_customer_po ?? "",
                'specific_label_smp_po' => $this->checklistInfo->similaritiesCheck->specific_label_smp_po ?? "",
                'pallet_label_customer_po' => $this->checklistInfo->similaritiesCheck->pallet_label_customer_po ?? "",
                'pallet_label_smp_po' => $this->checklistInfo->similaritiesCheck->pallet_label_smp_po ?? "",
                'same_po' => $this->checklistInfo->similaritiesCheck->same_po ? true : false,
                'judgement_po' => $this->checklistInfo->similaritiesCheck->judgement_po ? true : false,
            ];
        }catch(\Exception $e){
            AppLog::create([
                'LogName' => 'System',
                'LogType' => 'error',
                'action' => 'checklist_simcheck',
                'description' => '{"specific_action":"SimCheck Mount Function Error", "error_msg":"'.$e->getMessage().'", "ip address":"'. $this->userIP .'"}'
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
        return view('livewire.similarities-checking');
    }

    public function dispatchMe($field = null){
        //dd($this->inputs);
        
        DB::beginTransaction();
        try{
            //dd($param);
            $checklist = Similarities_Checking::where('checklist_id', $this->checklist_id)->first();
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
                'action' => 'checklist_simcheck',
                'description' => '{"specific_action":"SimCheck Mount Function Error", "error_msg":"'.$e->getMessage().'", "ip address":"'. $this->userIP .'"}'
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
        $checklist = Similarities_Checking::where('checklist_id', $this->checklist_id)->first();
        if ($checklist) {
            $checklist->update($this->inputs);
        }
    }
}
