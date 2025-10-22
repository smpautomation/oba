<?php

namespace App\Livewire\Admin;

use App\Models\Log as Applog;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class UserManagement extends Component
{
    use WithPagination;

    public $search = '';
    public $selectedRole = '';
    public $editingUser = null;
    public $newRole = '';

    protected $queryString = [
        'search' => ['except' => ''],
        'selectedRole' => ['except' => ''],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function editUser($userId)
    {
        $this->editingUser = User::with('role')->find($userId);
        $this->newRole = $this->editingUser->role_id;
    }

    public function updateUserRole()
    {
        if ($this->editingUser && $this->newRole) {
            Applog::create([
                'LogName' => 'User Actions',
                'LogType' => 'info',
                'action' => 'user_management',
                'description' => '{"specific_action":"Update user role of ' . $this->editingUser->name . ' from '. $this->editingUser->role_id .' to "'. $this->newRole .'", user":"'. Auth::user()->name.'"}'
            ]);
            $this->editingUser->update(['role_id' => $this->newRole]);
            session()->flash('success', 'User role updated successfully!');
            $this->editingUser = null;
            $this->newRole = '';
        }
    }

    public function cancelEdit()
    {
        $this->editingUser = null;
        $this->newRole = '';
    }

    public function render()
    {
        $query = User::with('role')
            ->when($this->search, function($query) {
                $query->where(function($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%')
                      ->orWhere('id_number', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->selectedRole, function($query) {
                $query->where('role_id', $this->selectedRole);
            })
            ->latest();

        return view('livewire.admin.user-management', [
            'users' => $query->paginate(10),
            'roles' => Role::all(),
            'totalUsers' => User::count(),
            'totalAdmins' => User::whereHas('role', fn($q) => $q->where('name', 'admin'))->count(),
            'totalAuditors' => User::whereHas('role', fn($q) => $q->where('name', 'pic'))->count(),
            'totalRegularUsers' => User::whereHas('role', fn($q) => $q->where('name', 'user'))->count(),
        ]);
    }
}
