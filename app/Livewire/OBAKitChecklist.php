<?php

namespace App\Livewire;

use Livewire\Component;

class OBAKitChecklist extends Component
{
    public $inputs = [
        'beforecheckbox1' => false,
        'beforecheckbox2' => false,
        'beforecheckbox3' => false,
        'beforecheckbox4' => false,
        'beforecheckbox5' => false,
        'beforecheckbox6' => false,
        'beforecheckbox7' => false,
        'aftercheckbox1' => false,
        'aftercheckbox2' => false,
        'aftercheckbox3' => false,
        'aftercheckbox4' => false,
        'aftercheckbox5' => false,
        'aftercheckbox6' => false,
        'aftercheckbox7' => false
    ];
    public function render()
    {
        return view('livewire.o-b-a-kit-checklist');
    }

    public function dispatchMe(){
        $childComponent = "OBA Kit Checklist";
        $this->dispatch('return-value', ['Child Component' => $childComponent, 'Data' => $this->inputs]);
    }
}
