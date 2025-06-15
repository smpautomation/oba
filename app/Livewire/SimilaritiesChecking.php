<?php

namespace App\Livewire;

use App\Models\Similarities_Checking;
use Livewire\Component;
use App\Models\checklist as Checklist;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;

class SimilaritiesChecking extends Component
{
    public $checklist_id;
    public $checklistInfo;

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

    public function mount($checklist_id){
        $this->checklist_id = $checklist_id;
        $this->checklistInfo = Checklist::find($checklist_id);
        
        $this->inputs = [
            'pick_list_qs' => $this->checklistInfo->similaritiesCheck->pick_list_qs ?? "",
            'shipping_invoice_qs' => $this->checklistInfo->similaritiesCheck->shipping_invoice_qs ?? "",
            'serem_qs' => $this->checklistInfo->similaritiesCheck->serem_qs ?? "",
            'sir_qs' => $this->checklistInfo->similaritiesCheck->SIR_qs ?? "",
            'same_quantity_qs' => $this->checklistInfo->similaritiesCheck->same_quantity_qs ? true : false,
            'judgement_qs' => $this->checklistInfo->similaritiesCheck->judgment_qs ? true : false,
            'picklist_bs' => $this->checklistInfo->similaritiesCheck->picklist_bs ?? "",
            'packing_slip_bs' => $this->checklistInfo->similaritiesCheck->packing_slip_bs ?? "",
            'serem_bs' => $this->checklistInfo->similaritiesCheck->serem_bs ?? "",
            'pallet_label_bs' => $this->checklistInfo->similaritiesCheck->pallet_label_bs ?? "",
            'same_box_bs' => $this->checklistInfo->similaritiesCheck->same_box_bs ? true : false,
            'judgement_bs' => $this->checklistInfo->similaritiesCheck->judgment_bs ? true : false,
            'picklist_mn' => $this->checklistInfo->similaritiesCheck->picklist_mn ?? "",
            'shipping_invoice_mn' => $this->checklistInfo->similaritiesCheck->shipping_invoice_mn ?? "",
            'serem_mn' => $this->checklistInfo->similaritiesCheck->serem_mn ?? "",
            'fg_label_mn' => $this->checklistInfo->similaritiesCheck->fg_label_mn ?? "",
            'vmi_qr_mn' => $this->checklistInfo->similaritiesCheck->vmi_qr_mn ?? "",
            'mc_label_mn' => $this->checklistInfo->similaritiesCheck->mc_label_mn ?? "",
            'pallet_label_mn' => $this->checklistInfo->similaritiesCheck->pallet_label_mn ?? "",
            'same_model_mn' => $this->checklistInfo->similaritiesCheck->same_model_mn ? true : false,
            'judgement_mn' => $this->checklistInfo->similaritiesCheck->judgment_mn ? true : false,
            'picklist_mc' => $this->checklistInfo->similaritiesCheck->picklist_mc ?? "",
            'shipping_invoice_mc' => $this->checklistInfo->similaritiesCheck->shipping_invoice_mc ?? "",
            'serem_mc' => $this->checklistInfo->similaritiesCheck->serem_mc ?? "",
            'sir_mc' => $this->checklistInfo->similaritiesCheck->SIR_mc ?? "",
            'shipping_label_mc' => $this->checklistInfo->similaritiesCheck->shipping_label_mc ?? "",
            'vmi_label_mc' => $this->checklistInfo->similaritiesCheck->vmi_label_mc ?? "",
            'mc_barcode_mc' => $this->checklistInfo->similaritiesCheck->mc_barcode_mc ?? "",
            'pallet_label_mc' => $this->checklistInfo->similaritiesCheck->pallet_label_mc ?? "",
            'specific_qr_label_mc' => $this->checklistInfo->similaritiesCheck->specific_qr_label_mc ?? "",
            'same_mc' => $this->checklistInfo->similaritiesCheck->same_mc ? true : false,
            'judgement_mc' => $this->checklistInfo->similaritiesCheck->judgment_mc ? true : false,
            'picklist_pn' => $this->checklistInfo->similaritiesCheck->picklist_pn ?? "",
            'shipping_invoice_pn' => $this->checklistInfo->similaritiesCheck->shipping_invoice_pn ?? "",
            'serem_pn' => $this->checklistInfo->similaritiesCheck->serem_pn ?? "",
            'sir_pn' => $this->checklistInfo->similaritiesCheck->SIR_pn ?? "",
            'shipping_label_pn' => $this->checklistInfo->similaritiesCheck->shipping_label_pn ?? "",
            'vmi_pn' => $this->checklistInfo->similaritiesCheck->vmi_pn ?? "",
            'same_pn' => $this->checklistInfo->similaritiesCheck->same_pn ? true : false,
            'judgement_pn' => $this->checklistInfo->similaritiesCheck->judgment_pn ? true : false,
            'serem_customer_po' => $this->checklistInfo->similaritiesCheck->serem_customer_po ?? "",
            'serem_smp_po' => $this->checklistInfo->similaritiesCheck->serem_smp_po ?? "",
            'shipping_label_customer_po' => $this->checklistInfo->similaritiesCheck->shipping_label_customer_po ?? "",
            'shipping_label_smp_po' => $this->checklistInfo->similaritiesCheck->shipping_label_smp_po ?? "",
            'vmi_customer_po' => $this->checklistInfo->similaritiesCheck->vmi_customer_po ?? "",
            'vmi_smp_po' => $this->checklistInfo->similaritiesCheck->vmi_smp_po ?? "",
            'sir_customer_po' => $this->checklistInfo->similaritiesCheck->SIR_customer_po ?? "",
            'sir_smp_po' => $this->checklistInfo->similaritiesCheck->SIR_smp_po ?? "",
            'specific_label_customer_po' => $this->checklistInfo->similaritiesCheck->specific_label_customer_po ?? "",
            'specific_label_smp_po' => $this->checklistInfo->similaritiesCheck->specific_label_smp_po ?? "",
            'pallet_label_customer_po' => $this->checklistInfo->similaritiesCheck->pallet_label_customer_po ?? "",
            'pallet_label_smp_po' => $this->checklistInfo->similaritiesCheck->pallet_label_smp_po ?? "",
            'same_po' => $this->checklistInfo->similaritiesCheck->same_po ? true : false,
            'judgement_po' => $this->checklistInfo->similaritiesCheck->judgment_po ? true : false,
        ];
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
            dd($e->getMessage());
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
