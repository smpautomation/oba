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
            'sir_qs' => $this->checklistInfo->similaritiesCheck->sir_qs ?? "",
            'same_quantity_qs' => $this->checklistInfo->similaritiesCheck->same_quantity_qs ? true : false,
            'judgement_qs' => $this->checklistInfo->similaritiesCheck->judgment_qs ? true : false
        ];
    }

    public function render()
    {
        return view('livewire.similarities-checking');
    }

    public function dispatchMe($field = null){
        //dd($this->inputs);
        if(!isset($this->inputs[$field]) || $this->inputs[$field] == null){
            $this->inputStatus[$field] = 'error';
            return;
        }
        DB::beginTransaction();
        try{
            //dd($param);
            $checklist = Similarities_Checking::where('checklist_id', $this->checklist_id)->first();
            $inputData = $this->inputs;
            if ($checklist) {
                $checklist->update($inputData);
            }
            DB::commit();

            
            $this->inputStatus[$field] = 'success';
        }catch(\Exception $e){
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
