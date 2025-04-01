<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On; 

class PreparationChecklist extends Component
{
    
    public $inputs = [
        'oneprep2column' => false,
        'oneprep3column' => false,
        'oneprep4column' => false,
        'oneprep5column' => false,
        'oneprep6column' => false,
        'oneprep7column' => false,
        'oneprep8column' => false,
        'oneprep9column' => false,
        'oneprep10column' => false,
        'oneprep2remarks' => null,
        'oneprep3remarks' => null,
        'oneprep4remarks' => null,
        'oneprep5remarks' => null,
        'oneprep6remarks' => null,
        'oneprep7remarks' => null,
        'oneprep8remarks' => null,
        'oneprep9remarks' => null,
        'oneprep10remarks' => null
    ];

    public function render()
    {
        return view('livewire.preparation-checklist');
    }

    public function dispatchMe(){
        $childComponent = "Preparation Checklist";
        $this->dispatch('return-value', ['Child Component' => $childComponent, 'Data' => $this->inputs]);
    }
}
