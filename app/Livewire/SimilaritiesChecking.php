<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\checklist as Checklist;

class SimilaritiesChecking extends Component
{
    public $checklist_id;
    public $checklistInfo;

    public $inputs = [
        
    ];

    public function mount($checklist_id){
        $this->checklist_id = $checklist_id;
        $this->checklistInfo = Checklist::find($checklist_id);
        
        $this->inputs = [
            
        ];
    }

    public function render()
    {
        return view('livewire.similarities-checking');
    }

    public function dispatchMe(){
        //dd($this->inputs);
        $childComponent = "App\Models\Similarities_Checking";
        $this->dispatch('return-value', ['Child Component' => $childComponent, 'Data' => $this->inputs]);
    }
}
