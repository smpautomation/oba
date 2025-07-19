<?php

namespace App\Livewire;

use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\checklist as Checklist;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;
use Livewire\WithChildren;

class ChecklistForm extends Component
{
    public $checklistInfo;
    public $model_id = "";
    public $scanned_qr_pc = true;
    

    public function mount($model_id){
        $this->model_id = $model_id;
        $this->checklistInfo = Checklist::find($model_id);
        $this->scanned_qr_pc = $this->checklistInfo->scanned_qr_pc ? true : false;
    }

    public function save(){
        $this->dispatch('save-clicked');
    }

    private function validateField($fieldValue)
    {
        return ($fieldValue == 1) ? 1 : 0;
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
            dd($e);
            DB::rollBack();
        }

    }

    public function render()
    {
        return view('livewire.checklist-form');
    }


}
