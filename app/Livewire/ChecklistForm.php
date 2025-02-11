<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\checklist as Checklist;


class ChecklistForm extends Component
{
    public $checklistInfo = [];
    public $model_id = "";

    public function mount($model_id){
        $this->model_id = $model_id;
        $this->checklistInfo = Checklist::find($model_id);
    }

    public function render()
    {
        return view('livewire.checklist-form');
    }
}
