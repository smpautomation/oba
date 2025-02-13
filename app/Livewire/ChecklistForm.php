<?php

namespace App\Livewire;

use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\checklist as Checklist;
use App\Livewire\PreparationChecklist as PreparationChecklist;;

class ChecklistForm extends Component
{
    public $checklistInfo = [];
    public $model_id = "";


    public function mount($model_id){
        $this->model_id = $model_id;
        $this->checklistInfo = Checklist::find($model_id);
    }

    public function save(){
        $preparationChecklist = new PreparationChecklist();
        $preparationChecklistUpdate = $preparationChecklist->updateChecklist($this->model_id);
        if($preparationChecklistUpdate){
            session()->flash('status', 'Form is saved succesfully.');
        }

        return $this->redirect('/checklist/'.$this->model_id);
    }


    public function render()
    {
        return view('livewire.checklist-form');
    }


}
