<?php

namespace App\Livewire;

use App\Models\model_settings;
use Livewire\Component;


class Settings extends Component
{
    public $models = [];
    public function mount(){
        $this->models = model_settings::all();
        
    }
    public function render()
    {
        return view('livewire.settings');
    }
}
