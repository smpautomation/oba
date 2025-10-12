<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\checklist as Checklist;

class PrintForm extends Component
{
    public $checklist_ID;
    public $checklistInfo;

    public function mount($checklist_ID){
        $this->checklist_ID = $checklist_ID;
        $this->checklistInfo = Checklist::with([
            'prepCheck',
            'obaCheck',
            'shipInfoCheck',
            'checkItemsCheck',
            'similaritiesCheck',
            'checkOverall',
            'personnelCheck'
        ])->findOrFail($checklist_ID);
    }

    public function render()
    {
        return view('livewire.print-form');
    }
}
