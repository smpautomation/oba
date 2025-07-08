<?php
namespace App\Livewire;

use App\Models\model_settings;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Settings extends Component
{
    public $models = [];
    public $selectedModel = '';
   
    // Properties for each toggle switch
    public $scanned_qr_pc = true;
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

    public function mount()
    {
        $this->models = model_settings::all();
    }

    public function updatedSelectedModel($value)
    {
        Log::info('Selected model updated: ' . $value);
        
        if (!empty($value)) {
            $modelData = model_settings::where('model_name', $value)->first();
           
            Log::info('Model data found: ' . ($modelData ? 'Yes' : 'No'));
           
            if ($modelData) {
                $this->scanned_qr_pc = (bool) $modelData->scanned_qr_pc;
                $this->sir_qs = (bool) $modelData->sir_qs;
                $this->vmi_mn = (bool) $modelData->vmi_mn;
                $this->sir_mc = (bool) $modelData->sir_mc;
                $this->vmi_mc = (bool) $modelData->vmi_mc;
                $this->specific_label_mc = (bool) $modelData->specific_label_mc;
                $this->picklist_pn = (bool) $modelData->picklist_pn;
                $this->sir_pn = (bool) $modelData->sir_pn;
                $this->vmi_pn = (bool) $modelData->vmi_pn;
                $this->sir_po = (bool) $modelData->sir_po;
                $this->vmi_po = (bool) $modelData->vmi_po;
                $this->specific_label_po = (bool) $modelData->specific_label_po;
                
                Log::info('Settings loaded for model: ' . $value);
            }
        } else {
            // Reset all values when no model is selected
            $this->resetSettings();
            Log::info('Settings reset - no model selected');
        }
    
        $this->render();
    }
   
    private function resetSettings()
    {
        $this->scanned_qr_pc = true;
        $this->sir_qs = true;
        $this->vmi_mn = true;
        $this->sir_mc = true;
        $this->vmi_mc = true;
        $this->specific_label_mc = true;
        $this->picklist_pn = true;
        $this->sir_pn = true;
        $this->vmi_pn = true;
        $this->sir_po = true;
        $this->vmi_po = true;
        $this->specific_label_po = true;
    }

    public function saveConfiguration()
    {
        Log::info('Attempting to save configuration for model: ' . $this->selectedModel);
        
        if (!empty($this->selectedModel)) {
            $modelData = model_settings::where('model_name', $this->selectedModel)->first();
           
            if ($modelData) {
                $modelData->update([
                    'scanned_qr_pc' => $this->scanned_qr_pc,
                    'sir_qs' => $this->sir_qs,
                    'vmi_mn' => $this->vmi_mn,
                    'sir_mc' => $this->sir_mc,
                    'vmi_mc' => $this->vmi_mc,
                    'specific_label_mc' => $this->specific_label_mc,
                    'picklist_pn' => $this->picklist_pn,
                    'sir_pn' => $this->sir_pn,
                    'vmi_pn' => $this->vmi_pn,
                    'sir_po' => $this->sir_po,
                    'vmi_po' => $this->vmi_po,
                    'specific_label_po' => $this->specific_label_po,
                ]);
                
                session()->flash('message', 'Configuration saved successfully!');
                Log::info('Configuration saved successfully for model: ' . $this->selectedModel);
            } else {
                session()->flash('error', 'Model not found in database!');
                Log::error('Model not found: ' . $this->selectedModel);
            }
        } else {
            session()->flash('error', 'Please select a model first!');
            Log::warning('Attempted to save without selecting a model');
        }
    }

    public function render()
    {
        return view('livewire.settings');
    }
}