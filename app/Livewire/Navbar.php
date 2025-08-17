<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Navbar extends Component
{
    public $mobileMenuOpen = false;

    public function redirectTo($route)
    {
        // Close mobile menu when navigating
        $this->mobileMenuOpen = false;

        return $this->redirect(route($route), navigate: true);
    }

    public function logout()
    {
        // Close mobile menu
        $this->mobileMenuOpen = false;

        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();

        return $this->redirect(route('login'), navigate: true);
    }

    public function toggleMobileMenu()
    {
        $this->mobileMenuOpen = !$this->mobileMenuOpen;
    }

    public function closeMobileMenu()
    {
        $this->mobileMenuOpen = false;
    }

    // Close mobile menu when clicking outside (using Alpine.js-like functionality in Livewire)
    public function mount()
    {
        $this->mobileMenuOpen = false;
    }

    public function render()
    {
        return view('livewire.navbar');
    }
}
