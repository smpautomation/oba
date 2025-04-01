<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On; 

class PreparationChecklist extends Component
{
    
    public $columns = [
        'oneprep2column' => false,
        'oneprep3column' => false,
        'oneprep4column' => false,
        'oneprep5column' => false,
        'oneprep6column' => false,
        'oneprep7column' => false,
        'oneprep8column' => false,
        'oneprep9column' => false,
        'oneprep10column' => false
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



    public function render()
    {
        return view('livewire.preparation-checklist');
    }

    public function dispatchMe(){
        $childComponent = "preparationChecklist";
        $this->dispatch('return-value', ['Child Component' => $childComponent, 'Data' => json_encode([$this->columns, $this->remarks])]);
    }
}
