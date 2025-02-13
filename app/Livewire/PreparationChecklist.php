<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\checklist as Checklist;

class PreparationChecklist extends Component
{
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

    public function updateChecklist($model_id){
        // Validate columns (only those containing 'column' in their name)
        foreach ($this->columns as $field => $value) {
            $this->columns[$field] = $this->validateField($value);
        }

        // Encode the validated columns and remarks as JSON
        $preparationChecklist = json_encode([
            'columns' => $this->columns,
            'remarks' => $this->remarks
        ]);

        dd($this->columns);

        $checklist = Checklist::find($model_id);

        if($checklist){
            $checklist->preparationChecklist = $preparationChecklist;
            $checklist->save();
            return true;
        }

        return false;
    }

    private function validateField($fieldValue)
    {
        return ($fieldValue == 1) ? 1 : 0;
    }

    public function render()
    {
        return view('livewire.preparation-checklist');
    }
}
