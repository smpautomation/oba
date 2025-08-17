<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class LoginForm extends Component
{
    public $id_number = '';  // Changed from email
    public $password = '';
    public $remember = false;

    protected $rules = [
        'id_number' => 'required|string',  // Changed from email validation
        'password' => 'required|min:6',
    ];

    public function login()
    {
        $this->validate();

        if (Auth::attempt(['id_number' => $this->id_number, 'password' => $this->password], $this->remember)) {
            session()->regenerate();

            // Role-based redirection
            $user = Auth::user();
            return match($user->role->name) {
                default => $this->redirect(route('login'), navigate: true),
            };
        }

        $this->addError('id_number', 'The provided credentials do not match our records.');  // Changed error field
    }

    public function render()
    {
        return view('livewire.auth.login-form');
    }
}
