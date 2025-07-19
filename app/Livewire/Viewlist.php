<?php

namespace App\Livewire;

use App\Models\checklist;
use App\Models\Log as AppLog;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

class Viewlist extends Component
{
    use WithPagination;

    public $search = '';
    public $sortBy = 'created_at';
    public $sortDirection = 'desc';
    public $filterStatus = 'all';
    public $showDeleteModal = false;
    public $checklistToDelete = null;
    protected $queryString = [
        'search' => ['except' => ''],
        'sortBy' => ['except' => 'created_at'],
        'sortDirection' => ['except' => 'desc'],
        'filterStatus' => ['except' => 'all'],
    ];
    public $userIp;

    public function mount(){
        $this->userIp = $this->getClientIpAddress(request());
    }

    private function getClientIpAddress(Request $request): string
    {
        // Check for various headers that might contain the real IP
        $ipKeys = [
            'HTTP_CF_CONNECTING_IP',     // CloudFlare
            'HTTP_X_REAL_IP',            // Nginx proxy
            'HTTP_X_FORWARDED_FOR',      // Load balancer/proxy
            'HTTP_X_FORWARDED',          // Proxy
            'HTTP_X_CLUSTER_CLIENT_IP',  // Cluster
            'HTTP_CLIENT_IP',            // Proxy
            'REMOTE_ADDR'                // Standard
        ];

        foreach ($ipKeys as $key) {
            if (array_key_exists($key, $_SERVER) && !empty($_SERVER[$key])) {
                $ips = explode(',', $_SERVER[$key]);
                $ip = trim($ips[0]);
                
                // Validate IP address
                if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
                    return $ip;
                }
            }
        }

        // Fallback to request IP
        return $request->ip();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function setFilter($status)
    {
        $this->filterStatus = $status;
        $this->resetPage();
    }

    public function getChecklistsProperty()
    {
        $query = checklist::with('prepCheck', 'obaCheck', 'shipInfoCheck', 'checkItemsCheck', 'similaritiesCheck', 'checkOverall', 'personnelCheck')->orderBy('created_at', 'desc');

        // Apply search filter
        if ($this->search) {
            $query->where(function($q) {
                $q->where('id', 'like', '%' . $this->search . '%')
                ->orWhere('model', 'like', '%' . $this->search . '%')
                ->orWhere('section', 'like', '%' . $this->search . '%')
                ->orWhere('status', 'like', '%' . $this->search . '%')
                ->orWhere('auditor', 'like', '%' . $this->search . '%');
            });
        }
        
        // Apply status filter
        if ($this->filterStatus !== 'all') {
            $query->where('status', $this->filterStatus);
        }
        
        // Apply sorting
        $query->orderBy($this->sortBy, $this->sortDirection);

        return $query->paginate(10);
    }

    public function getStatusBadgeClass($status)
    {
        return match ($status) {
            'Closed' => 'bg-green-100 text-green-800 border-green-200',
            'In Progress' => 'bg-blue-100 text-blue-800 border-blue-200',
            'Open' => 'bg-yellow-100 text-yellow-800 border-yellow-200',
            default => 'bg-gray-100 text-gray-800 border-gray-200',
        };
    }

    public function viewChecklist($checklistId)
    {
        AppLog::create([
            'LogName' => 'User Action',
            'LogType' => 'info',
            'action' => 'viewlist_delete',
            'description' => '{"specific_action":"View Selected Checklist '.$checklistId.'", "ip address":"'. $this->userIp .'"}'
        ]);
        return redirect()->to('/checklist/' . $checklistId);
    }

    public function deleteChecklist()
    {
        if ($this->checklistToDelete) {
            $checklist = checklist::find($this->checklistToDelete);
            if ($checklist) {
                $checklist->delete();
                session()->flash('message', 'Checklist deleted successfully.');
                AppLog::create([
                    'LogName' => 'User Action',
                    'LogType' => 'info',
                    'action' => 'viewlist_delete',
                    'description' => '{"specific_action":"Delete Checklist '.$this->checklistToDelete.'", "ip address":"'. $this->userIp .'"}'
                ]);
                $this->resetPage(); // Reset to first page after deletion
            } else {
                session()->flash('error', 'Checklist not found.');
                AppLog::create([
                    'LogName' => 'User Action',
                    'LogType' => 'error',
                    'action' => 'viewlist_delete',
                    'description' => '{"specific_action":"Selected Checklist '.$this->checklistToDelete.' Not Found", "ip address":"'. $this->userIp .'"}'
                ]);
            }
        }
        
        $this->closeDeleteModal();
    }

        public function confirmDelete($checklistId)
    {
        $this->checklistToDelete = $checklistId;
        $this->showDeleteModal = true;
    }

    public function closeDeleteModal()
    {
        $this->showDeleteModal = false;
        $this->checklistToDelete = null;
    }
    

    public function render()
    {
        return view('livewire.viewlist', [
            'checklists' => $this->checklists,
        ]);
    }
}
