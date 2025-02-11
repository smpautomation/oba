<?php

namespace App\Livewire;

use Livewire\Component;

class Navbar extends Component
{
    public function redirectTo($url)
    {
        $this->redirectRoute($url);
    }

    public function doNothings()
    {
        // Do nothing
    }

    public function render()
    {
        return view('livewire.navbar');
    }
}
