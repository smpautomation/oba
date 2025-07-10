<?php

namespace App\Livewire;

use App\Models\checklist;
use Livewire\Component;
use Livewire\WithPagination;

class Viewlist extends Component
{
    use WithPagination;

    public $search = '';
    public $sortBy = 'created_at';
    public $sortDirection = 'desc';
    public $filterStatus = 'all';

    protected $queryString = [
        'search' => ['except' => ''],
        'sortBy' => ['except' => 'created_at'],
        'sortDirection' => ['except' => 'desc'],
        'filterStatus' => ['except' => 'all'],
    ];

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
        $checklist = checklist::orderBy('created_at', 'desc')->get();

        // Apply filters
        if ($this->search) {
            $checklist = $checklist->filter(function ($item) {
                return stripos($item['id'], $this->search) !== false ||
                       stripos($item['model'], $this->search) !== false ||
                       stripos($item['section'], $this->search) !== false;
            });
        }

        if ($this->filterStatus !== 'all') {
            $checklist = $checklist->filter(function ($item) {
                return $item['model'] === $this->filterStatus;
            });
        }

        // Apply sorting
        $checklist = $checklist->sortBy($this->sortBy, SORT_REGULAR, $this->sortDirection === 'desc');

        return $checklist->values();
    }

    public function getStatusBadgeClass($status)
    {
        return match ($status) {
            'completed' => 'bg-green-100 text-green-800 border-green-200',
            'in_progress' => 'bg-blue-100 text-blue-800 border-blue-200',
            'pending' => 'bg-yellow-100 text-yellow-800 border-yellow-200',
            'overdue' => 'bg-red-100 text-red-800 border-red-200',
            default => 'bg-gray-100 text-gray-800 border-gray-200',
        };
    }

    public function getPriorityBadgeClass($priority)
    {
        return match ($priority) {
            'critical' => 'bg-red-500 text-white',
            'high' => 'bg-orange-500 text-white',
            'medium' => 'bg-yellow-500 text-white',
            'low' => 'bg-green-500 text-white',
            default => 'bg-gray-500 text-white',
        };
    }

    public function getProgressPercentage($completed, $total)
    {
        return $total > 0 ? round(($completed / $total) * 100) : 0;
    }

    public function render()
    {
        return view('livewire.viewlist', [
            'checklists' => $this->checklists,
        ]);
    }
}
