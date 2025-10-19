<?php

namespace App\Livewire;

use App\Models\checklist;
use App\Models\Log as AppLog;
use App\Models\User;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Viewlist extends Component
{
    use WithPagination;

    public $search = '';
    public $sortBy = 'created_at';
    public $sortDirection = 'desc';
    public $filterStatus = 'all';
    public $showDeleteModal = false;

    //add auditor
    public $showAddAuditorModal = false;
    public $selectedAuditor = null;
    public $availableUsers = [];
    public $checklistInfo;
    public $searchAuditor = '';


    public $checklistToDelete = null;
    public $filterDateFrom = '';
    public $filterDateTo = '';
    public $filterModel = 'all';
    public $filterSection = 'all';
    protected $queryString = [
        'search' => ['except' => ''],
        'sortBy' => ['except' => 'created_at'],
        'sortDirection' => ['except' => 'desc'],
        'filterStatus' => ['except' => 'all'],
        'filterDateFrom' => ['except' => ''],
        'filterDateTo' => ['except' => ''],
        'filterModel' => ['except' => 'all'],
        'filterSection' => ['except' => 'all'],
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

    public function resetDateFilter()
    {
        $this->filterDateFrom = '';
        $this->filterDateTo = '';
        $this->resetPage();
    }

    public function updatedFilterDateFrom()
    {
        $this->resetPage();
    }

    public function updatedFilterDateTo()
    {
        $this->resetPage();
    }

    public function updatedFilterModel()
    {
        $this->resetPage();
    }

    public function updatedFilterSection()
    {
        $this->resetPage();
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
                ->orWhere('auditor', 'like', '%' . $this->search . '%')
                ->orWhere('created_at', 'like', '%' . $this->search . '%');
            });
        }

        // Apply status filter
        if ($this->filterStatus !== 'all') {
            $query->where('status', $this->filterStatus);
        }

        // Apply date range filter
        if ($this->filterDateFrom) {
            $query->whereDate('created_at', '>=', $this->filterDateFrom);
        }

        if ($this->filterDateTo) {
            $query->whereDate('created_at', '<=', $this->filterDateTo);
        }

        // Apply model filter
        if ($this->filterModel !== 'all') {
            $query->where('model', $this->filterModel);
        }

        // Apply section filter
        if ($this->filterSection !== 'all') {
            $query->where('section', $this->filterSection);
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

    public function getUniqueModelsProperty()
    {
        return checklist::distinct()->pluck('model')->filter()->sort();
    }

    public function getUniqueSectionsProperty()
    {
        return checklist::distinct()->pluck('section')->filter()->sort();
    }

    public function viewChecklist($checklistId)
    {
        AppLog::create([
            'LogName' => 'User Action',
            'LogType' => 'info',
            'action' => 'viewlist_delete',
            'description' => '{"specific_action":"View Selected Checklist '.$checklistId.'",  user":"'. Auth::user()->name.'"}'
        ]);
        return redirect()->to('/checklist/' . $checklistId);
    }

    public function deleteChecklist()
    {
        try
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
                        'description' => '{"specific_action":"Delete Checklist '.$this->checklistToDelete.'",  user":"'. Auth::user()->name.'"}'
                    ]);
                    $this->resetPage(); // Reset to first page after deletion
                } else {
                    session()->flash('error', 'Checklist not found.');
                    AppLog::create([
                        'LogName' => 'User Action',
                        'LogType' => 'error',
                        'action' => 'viewlist_delete',
                        'description' => '{"specific_action":"Selected Checklist '.$this->checklistToDelete.' Not Found",  user":"'. Auth::user()->name.'"}'
                    ]);
                }
            }
        }catch(\Exception $e)
        {
            AppLog::create([
                'LogName' => 'User Action',
                'LogType' => 'error',
                'action' => 'viewlist_delete',
                'description' => '{"specific_action":"Selected Checklist '.$this->checklistToDelete.' Has Error", "Error":"'. $e .',  user":"'. Auth::user()->name.'"}'
            ]);
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

    public function loadAvailableUsers()
    {
        $this->availableUsers = User::where('name', '!=', $this->checklistInfo->auditor)
            ->when($this->searchAuditor, function($query) {
                $query->where(function($q) {
                    $q->where('name', 'like', '%' . $this->searchAuditor . '%')
                      ->orWhere('email', 'like', '%' . $this->searchAuditor . '%');
                });
            })
            ->orderBy('name')
            ->get();
    }

    public function openAddAuditorModal($checklistId)
    {
        $this->checklistInfo = checklist::find($checklistId);
        $this->showAddAuditorModal = true;
        $this->selectedAuditor = null;
        $this->searchAuditor = '';
        $this->loadAvailableUsers();
    }
    public function closeAddAuditorModal()
    {
        $this->showAddAuditorModal = false;
        $this->selectedAuditor = null;
        $this->searchAuditor = '';
        $this->availableUsers = [];
    }
    public function selectAuditor($userName)
    {
        $this->selectedAuditor = $userName;
        dd($this->selectedAuditor);
    }
    public function updatedSearchAuditor()
    {
        $this->loadAvailableUsers();
    }
    public function addAuditor($checklistId)
    {
        if (!$this->selectedAuditor) {
            session()->flash('error', 'Please select an auditor first.');
            return;
        }

        try {
            $checklist = checklist::find($checklistId);
            $checklist->update([
                'assigned_additional_auditor' => $this->selectedAuditor
            ]);
            AppLog::create([
                'LogName' => 'User Action',
                'LogType' => 'info',
                'action' => 'viewlist_addAuditor',
                'description' => '{"specific_action":"Add Auditor '.$this->selectedAuditor.' to checklist id='.$checklistId.'",  user":"'. Auth::user()->name.'"}'
            ]);
            session()->flash('success', 'Additional auditor has been assigned successfully.');
            $this->closeAddAuditorModal();

            // Refresh the component data if needed
            $this->dispatch('auditor-assigned');

        } catch (\Exception $e) {
            AppLog::create([
                'LogName' => 'System',
                'LogType' => 'error',
                'action' => 'viewlist_addAuditor',
                'description' => '{"specific_action":"Add Auditor '.$this->selectedAuditor.' to checklist id='.$checklistId.'",error: '.$e->getMessage().',  user":"'. Auth::user()->name.'"}'
            ]);
            session()->flash('error', 'Failed to assign auditor. Please try again.');
        }
    }


    public function render()
    {
        return view('livewire.viewlist', [
            'checklists' => $this->checklists,
        ]);
    }
}
