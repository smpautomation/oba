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

    public function openQrScanner()
    {
        $this->showQrModal = true;
        $this->dispatch('initQrScanner');
    }

    public function closeQrScanner()
    {
        $this->showQrModal = false;
        $this->dispatch('stopQrScanner');
    }

    public function handleQrScanned($content)
    {
        $this->inputs['shipping_pic'] = $content;
        $this->closeQrScanner();
        $this->dispatchMe('shipping_pic');
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