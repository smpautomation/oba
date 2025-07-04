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
    public $inputs = [];
    public $inputStatus = [];
    public $showQrModal = false;
    public $currentQrField = null; // Track which field is being scanned
    
    protected $listeners = ['qrScanned' => 'handleQrScanned'];

    public function mount($checklist_id){
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

    public function openQrScanner($fieldName)
    {
        $this->currentQrField = $fieldName;
        $this->showQrModal = true;
        $this->dispatch('initQrScanner');
    }

    public function closeQrScanner()
    {
        $this->showQrModal = false;
        $this->currentQrField = null;
        $this->dispatch('stopQrScanner');
    }

    public function handleQrScanned($content)
    {
        if (!$this->currentQrField) {
            return;
        }

        // Process QR content based on field type
        $processedValue = $this->processQrContent($content, $this->currentQrField);
        
        // Set the value to the current field being scanned
        $this->inputs[$this->currentQrField] = $processedValue;
        
        $this->closeQrScanner();
        $this->dispatchMe($this->currentQrField);
    }

    /**
     * Process QR content based on field requirements
     * You can customize this method to handle different QR formats for different fields
     */
    private function processQrContent($content, $fieldName)
    {
        switch ($fieldName) {
            case 'shipping_pic':
                // For shipping_pic, extract the 3rd element after splitting by semicolon
                $parts = explode(";", $content);
                return isset($parts[2]) ? $parts[2] : $content;
                
            case 'oba_checked_by':
                // For OBA checked by, you might want different processing
                // Example: extract name from QR content
                $parts = explode(";", $content);
                return isset($parts[1]) ? $parts[1] : $content; // Assuming name is 2nd element
                
            case 'oba_picture_by':
                // Another example field - customize as needed
                $parts = explode(";", $content);
                return isset($parts[1]) ? $parts[1] : $content;
                
            default:
                // Default: return content as-is
                return $content;
        }
    }

    public function dispatchMe($field = null){
        DB::beginTransaction();
        try{
            $checklist = Personnel_Check::where('checklist_id', $this->checklist_id)->first();
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
        }
    }

    public function render()
    {
        return view('livewire.personnel');
    }
}