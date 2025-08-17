<?php

namespace App\Livewire\Auth;

use App\Models\Log as AppLog;
use Livewire\Component;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisterForm extends Component
{
    public $name = '';
    public $id_number = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';
    public $role_id; // Will be set to user role ID
    public $terms_accepted = false;

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255|min:2',
            'id_number' => 'required|string|unique:users,id_number|max:50',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => ['required', 'string', 'confirmed', Password::min(6)],
        ];
    }

    protected $messages = [
        'name.required' => 'Please enter your full name.',
        'name.min' => 'Name must be at least 2 characters.',
        'id_number.required' => 'ID Number is required.',
        'id_number.unique' => 'This ID number is already registered.',
        'email.required' => 'Email address is required.',
        'email.email' => 'Please enter a valid email address.',
        'email.unique' => 'This email address is already registered.',
        'password.required' => 'Password is required.',
        'password.confirmed' => 'Password confirmation does not match.',
        'password.min' => 'Password must be at least 6 characters.',
    ];

    public function mount()
    {
        // Set default role to 'user'
        $userRole = Role::where('name', 'user')->first();
        $this->role_id = $userRole ? $userRole->id : 1;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function register()
    {
        $this->validate();

        try {
            $userRole = Role::where('name', 'user')->first();

            $user = User::create([
                'name' => trim($this->name),
                'id_number' => trim($this->id_number),
                'email' => trim($this->email),
                'password' => Hash::make($this->password),
                'role_id' => $userRole->id,
            ]);

            Auth::login($user);

            AppLog::create([
                'LogName' => 'User Action',
                'LogType' => 'info',
                'action' => 'register',
                'description' => '{"specific_action":"Logged In", "user":"'. Auth::user()->name .'"}'
            ]);

            session()->flash('success', 'Welcome! Your account has been created successfully.');

            // All new users go to checklist page
            return $this->redirect(route('login'), navigate: true);

        } catch (\Exception $e) {
            session()->flash('error', 'Something went wrong. Please try again.');
            return;
        }
    }

    public function render()
    {
        return view('livewire.auth.register-form');
    }
}
