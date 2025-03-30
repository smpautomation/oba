<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\checklist as Checklist;

class PreparationChecklist extends Component
{
    public $oneprep2column;

    public function render()
    {
        return view('livewire.preparation-checklist');
    }
}
