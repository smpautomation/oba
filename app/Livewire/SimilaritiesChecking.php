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
        'package_mc' => null,
        'same_mc' => null,
        'judgement_mc' => null,
        'picklist_pn' => null,
        'shipping_invoice_pn' => null,
        'serem_pn' => null,
        'sir_pn' => null,
        'shipping_label_pn' => null,
        'vmi_pn' => null,
        'package_pn' => null,
        'qr_qa_pn' => null,
        'qr_mgtz_pn' => null,
        'qr_mc_pn' => null,
        'pallet_label_pn' => null,
        'sci_label_pn' => null,
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
    public $inputComparison = [
        // For Quantity For Shipment category (qs)
        'pick_list_qs' => null,
        'shipping_invoice_qs' => null,
        'serem_qs' => null,
        'sir_qs' => null,
        
        // For Number of Boxes category (bs)
        'picklist_bs' => null,
        'packing_slip_bs' => null,
        'serem_bs' => null,
        'pallet_label_bs' => null,

        // For Model Name category (mn)
        'picklist_mn' => null,
        'shipping_invoice_mn' => null,
        'serem_mn' => null,
        'fg_label_mn' => null,
        'vmi_qr_mn' => null,
        'mc_label_mn' => null,
        'pallet_label_mn' => null,

        // For Model Code category (mc)
        'picklist_mc' => null,
        'shipping_invoice_mc' => null,
        'serem_mc' => null,
        'sir_mc' => null,
        'shipping_label_mc' => null,
        'vmi_label_mc' => null,
        'mc_barcode_mc' => null,
        'pallet_label_mc' => null,
        'specific_qr_label_mc' => null,
        'package_mc' => null,

        // For Part Number Category (pn)
        'picklist_pn' => null,
        'shipping_invoice_pn' => null,
        'serem_pn' => null,
        'sir_pn' => null,
        'shipping_label_pn' => null,
        'vmi_pn' => null,
        'package_pn' => null,
        'qr_qa_pn' => null,
        'qr_mgtz_pn' => null,
        'qr_mc_pn' => null,
        'pallet_label_pn' => null,
        'sci_label_pn' => null,

        // For Purchase Order Category (po)
        'serem_customer_po' => null,
        'serem_smp_po' => null,
        'shipping_label_customer_po' => null,
        'shipping_label_smp_po' => null,
        'vmi_customer_po' => null,
        'vmi_smp_po' => null,
        'sir_customer_po' => null,
        'sir_smp_po' => null,
        'pallet_label_customer_po' => null,
        'pallet_label_smp_po' => null,
        'specific_label_customer_po' => null,
        'specific_label_smp_po' => null,

    ];
    public $userIP;

    public function mount($checklist_id, $userIP){
        try{
            $this->userIP = $userIP;
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
                'package_mc' => $this->checklistInfo->similaritiesCheck->package_mc ?? "",
                'same_mc' => $this->checklistInfo->similaritiesCheck->same_mc ? true : false,
                'judgement_mc' => $this->checklistInfo->similaritiesCheck->judgement_mc ? true : false,
                'picklist_pn' => $this->checklistInfo->similaritiesCheck->picklist_pn ?? "",
                'shipping_invoice_pn' => $this->checklistInfo->similaritiesCheck->shipping_invoice_pn ?? "",
                'serem_pn' => $this->checklistInfo->similaritiesCheck->serem_pn ?? "",
                'sir_pn' => $this->checklistInfo->similaritiesCheck->sir_pn ?? "",
                'shipping_label_pn' => $this->checklistInfo->similaritiesCheck->shipping_label_pn ?? "",
                'vmi_pn' => $this->checklistInfo->similaritiesCheck->vmi_pn ?? "",
                'package_pn' => $this->checklistInfo->similaritiesCheck->package_pn ?? "",
                'qr_qa_pn' => $this->checklistInfo->similaritiesCheck->qr_qa_pn ?? "",
                'qr_mgtz_pn' => $this->checklistInfo->similaritiesCheck->qr_mgtz_pn ?? "",
                'qr_mc_pn' => $this->checklistInfo->similaritiesCheck->qr_mc_pn ?? "",
                'pallet_label_pn' => $this->checklistInfo->similaritiesCheck->pallet_label_pn ?? "",
                'sci_label_pn' => $this->checklistInfo->similaritiesCheck->sci_label_pn ?? "",
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

            $this->checkCategoryComparison($field);
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

    private function checkCategoryComparison($field)
    {
        // Define categories with correct field names
        $categories = [
            'qs' => ['pick_list_qs', 'shipping_invoice_qs', 'serem_qs', 'sir_qs'],
            'bs' => ['picklist_bs', 'packing_slip_bs', 'serem_bs', 'pallet_label_bs'],
            'mn' => ['picklist_mn','shipping_invoice_mn','serem_mn','fg_label_mn','vmi_qr_mn','mc_label_mn','pallet_label_mn'],
            'mc' => ['picklist_mc','shipping_invoice_mc','serem_mc','sir_mc','shipping_label_mc','vmi_label_mc','mc_barcode_mc','pallet_label_mc','specific_qr_label_mc','package_mc'],
            'pn' => ['picklist_pn','shipping_invoice_pn','serem_pn','sir_pn','shipping_label_pn','vmi_pn','package_pn','qr_qa_pn','qr_mgtz_pn','qr_mc_pn','pallet_label_pn','sci_label_pn'],
            'po' => ['serem_customer_po','serem_smp_po','shipping_label_customer_po','shipping_label_smp_po','vmi_customer_po','vmi_smp_po','sir_customer_po','sir_smp_po','pallet_label_customer_po','pallet_label_smp_po','specific_label_customer_po','specific_label_smp_po']
        ];

        foreach ($categories as $categoryKey => $fields) {
            if (in_array($field, $fields)) {
                $this->compareCategoryInputs($categoryKey, $fields);
                break;
            }
        }
    }

    private function compareCategoryInputs($categoryKey, $fields)
    {
        $values = [];
        $filledFields = [];
        
        // Filter fields based on conditions (e.g., sir_qs only if $this->sir_qs is true)
        $activeFields = $this->getActiveFieldsForCategory($categoryKey, $fields);
        
        // Collect non-empty values from active fields
        foreach ($activeFields as $field) {
            if (isset($this->inputs[$field]) && $this->inputs[$field] !== '' && $this->inputs[$field] !== null) {
                $values[] = $this->inputs[$field];
                $filledFields[] = $field;
            }
        }
        
        // Reset comparison status for all active fields first
        foreach ($activeFields as $field) {
            $this->inputComparison[$field] = null;
        }
        
        // Skip if less than 2 fields are filled
        if (count($filledFields) < 2) {
            // Reset verification radio when not enough data to compare
            if ($categoryKey === 'qs') {
                $this->inputs['same_quantity_qs'] = null;
            } elseif ($categoryKey === 'bs') {
                $this->inputs['same_box_bs'] = null;
            }elseif ($categoryKey === 'mn') {
                $this->inputs['same_model_mn'] = null;
            }elseif ($categoryKey === 'mc') {
                $this->inputs['same_mc'] = null;
            }elseif ($categoryKey === 'pn') {
                $this->inputs['same_pn'] = null;
            }elseif ($categoryKey === 'po') {
                $this->inputs['same_po'] = null;
            }
            return;
        }
        
        // Check if all values are the same
        $allSame = count(array_unique($values)) === 1;
        
        // Update comparison status for filled fields
        foreach ($filledFields as $field) {
            $this->inputComparison[$field] = $allSame ? 'match' : 'no-match';
        }
        
        // Auto-select verification based on comparison results
        if (count($filledFields) === count($activeFields)) {
            // All active fields are filled
            if ($categoryKey === 'qs') {
                $this->inputs['same_quantity_qs'] = $allSame ? true : false;
            } elseif ($categoryKey === 'bs') {
                $this->inputs['same_box_bs'] = $allSame ? true : false;
            }elseif ($categoryKey === 'mn') {
                $this->inputs['same_model_mn'] = $allSame ? true : false;
            }elseif ($categoryKey === 'mc') {
                $this->inputs['same_mc'] = $allSame ? true : false;
            }elseif ($categoryKey === 'pn') {
                $this->inputs['same_pn'] = $allSame ? true : false;
            }elseif ($categoryKey === 'po') {
                $this->inputs['same_po'] = $allSame ? true : false;
            }
            
            
        } else {
            // Not all fields are filled, reset verification
            if ($categoryKey === 'qs') {
                $this->inputs['same_quantity_qs'] = null;
            } elseif ($categoryKey === 'bs') {
                $this->inputs['same_box_bs'] = null;
            } elseif ($categoryKey === 'mn') {
                $this->inputs['same_model_mn'] = null;
            } elseif ($categoryKey === 'mc') {
                $this->inputs['same_mc'] = null;
            } elseif ($categoryKey === 'pn') {
                $this->inputs['same_pn'] = null;
            } elseif ($categoryKey === 'po') {
                $this->inputs['same_po'] = null;
            } 
        }
    }

    public function updated($propertyName)
    {
        if (strpos($propertyName, 'inputs.') === 0) {
            $field = str_replace('inputs.', '', $propertyName);
            
            // Handle verification radio changes
            if (in_array($field, ['same_quantity_qs', 'same_box_bs', 'same_model_mn', 'same_mc', 'same_pn', 'same_po'])) {
                // If user manually changes verification, don't auto-update it temporarily
                // You could add logic here if needed
                return;
            }
            
            $this->checkCategoryComparison($field);
        }
    }

    private function getActiveFieldsForCategory($categoryKey, $fields)
    {
        if ($categoryKey === 'qs') {
            // Filter out sir_qs if $this->sir_qs is false
            return array_filter($fields, function($field) {
                if ($field === 'sir_qs') {
                    return $this->sir_qs;
                }
                return true;
            });
        }
        
        // For other categories, return all fields
        return $fields;
    }
}
