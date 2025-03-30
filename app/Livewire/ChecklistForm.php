<?php

namespace App\Livewire;

use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\checklist as Checklist;
use App\Livewire\PreparationChecklist;
class ChecklistForm extends Component
{
    public $checklistInfo = [];
    public $model_id = "";
    public $columns = [
        'oneprep2column' => "",
        'oneprep3column' => "",
        'oneprep4column' => "",
        'oneprep5column' => "",
        'oneprep6column' => "",
        'oneprep7column' => "",
        'oneprep8column' => "",
        'oneprep9column' => "",
        'oneprep10column' => "",
    ];


    public $remarks = [
        'oneprep2remarks' => "",
        'oneprep3remarks' => "",
        'oneprep4remarks' => "",
        'oneprep5remarks' => "",
        'oneprep6remarks' => "",
        'oneprep7remarks' => "",
        'oneprep8remarks' => "",
        'oneprep9remarks' => "",
        'oneprep10remarks' => "",
    ];


    public $oneprep2column;
    

    public function mount($model_id){
        $this->model_id = $model_id;
        $this->checklistInfo = Checklist::find($model_id);
    }

    public function save(){

        dd($this->oneprep2column);
       
    }
3
    private function validateField($fieldValue)
    {
        return ($fieldValue == 1) ? 1 : 0;
    }



    public function render()
    {
        return view('livewire.checklist-form');
    }


}
