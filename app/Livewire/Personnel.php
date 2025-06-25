<?php
namespace App\Livewire;

use App\Models\checklist;
use App\Models\Personnel_Check;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;

class Personnel extends Component
{
    public $checklist_id;
    public $checklistInfo;
    public $scanMessage = '';
    public $showScanner = false;
    
    public $inputs = [];
    public $inputStatus = [];

    public function mount($checklist_id)
    {
        $this->checklist_id = $checklist_id;
        $this->checklistInfo = checklist::find($checklist_id);
       
        $this->inputs = [
            'shipping_pic' => $this->checklistInfo->personnelCheck->shipping_pic ?? null,
            'date' => $this->checklistInfo->personnelCheck->date ?? null,
            'oba_checked_by' => $this->checklistInfo->personnelCheck->oba_checked_by ?? null,
            'check_judgement' => $this->checklistInfo->personnelCheck->check_judgement ?? null,
            'oba_picture_by' => $this->checklistInfo->personnelCheck->oba_picture_by ?? null,
            'picture_judgement' => $this->checklistInfo->personnelCheck->picture_judgement ?? null
        ];
    }

    public function openScanner()
    {
        $this->showScanner = true;
        $this->scanMessage = '';
    }

    public function closeScanner()
    {
        $this->showScanner = false;
        $this->dispatch('stop-scanner');
    }

    #[On('code-scanned')]
    public function handleScannedCode($code)
    {
        $this->inputs['shipping_pic'] = $code;
        $this->scanMessage = 'Code scanned successfully!';
        $this->inputStatus['shipping_pic'] = 'success';
        $this->showScanner = false;
        
        // Auto-save the data
        $this->dispatchMe('shipping_pic');
        
        $this->dispatch('stop-scanner');
    }

    #[On('scan-error')]
    public function handleScanError($error)
    {
        $this->scanMessage = 'Scan error: ' . $error;
        $this->inputStatus['shipping_pic'] = 'error';
    }

    public function clearScanMessage()
    {
        $this->scanMessage = '';
    }

    public function render()
    {
        return view('livewire.personnel');
    }

    public function dispatchMe($field = null)
    {
        DB::beginTransaction();
        try {
            $checklist = Personnel_Check::where('checklist_id', $this->checklist_id)->first();
            $inputData = $this->inputs;
            
            if ($checklist) {
                $checklist->update($inputData);
            } else {
                // Create new record if doesn't exist
                Personnel_Check::create(array_merge($inputData, ['checklist_id' => $this->checklist_id]));
            }
            
            DB::commit();
           
            if (isset($this->inputs[$field]) && $this->inputs[$field] != null) {
                $this->inputStatus[$field] = 'success';
            }
            
        } catch (\Exception $e) {
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
        $checklist = Personnel_Check::where('checklist_id', $this->checklist_id)->first();
        if ($checklist) {
            $checklist->update($this->inputs);
        } else {
            Personnel_Check::create(array_merge($this->inputs, ['checklist_id' => $this->checklist_id]));
        }
    }
}