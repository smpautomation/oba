<div class="container mx-auto px-4 py-8">
    <!-- Header Section -->
    <div class="mb-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2 text-white">Checklist Overview</h1>
                <p class="text-white">Manage and track your checklists and their progress</p>
            </div>
            <div class="flex items-center gap-3">
                <div class="status-badge bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">
                    {{ $checklists->count() }} Total Checklists
                </div>
                {{-- <button class="animated-button">
                    <svg class="arr-1" viewBox="0 0 24 24" fill="none">
                        <path d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"/>
                    </svg>
                    <svg class="arr-2" viewBox="0 0 24 24" fill="none">
                        <path d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"/>
                    </svg>
                    <span class="text">New Checklist</span>
                    <span class="circle"></span>
                </button> --}}
            </div>
        </div>
    </div>

    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 relative">
            {{ session('message') }}
            <button onclick="this.parentElement.remove()" class="absolute top-0 right-0 mt-2 mr-2 text-green-700 hover:text-green-900">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 relative">
            {{ session('error') }}
            <button onclick="this.parentElement.remove()" class="absolute top-0 right-0 mt-2 mr-2 text-red-700 hover:text-red-900">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    @endif

    <!-- Search and Filter Section -->
    <div class="glass-effect rounded-xl p-6 mb-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <!-- Search Input -->
            <div class="md:col-span-2">
                <div class="relative">
                    <input 
                        type="text" 
                        wire:model.live.debounce.300ms="search"
                        placeholder="Search checklists id, date (yyyy-mm-dd), auditor name, model, or sections..."
                        class="w-full custom-input rounded-lg px-4 py-3 pl-10 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    >
                    <svg class="absolute left-3 top-3.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
            </div>
            
            <!-- Status Filter -->
            <div>
                <select wire:model.live="filterStatus" class="w-full custom-input rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="all">All Statuses</option>
                    <option value="Open">Open</option>
                    {{-- <option value="In Progress">In Progress</option> --}}
                    <option value="Closed">Closed</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Table Section -->
    <div class="table-wrapper">
        <div class="overflow-x-auto">
            <table class="enhanced-table w-full bg-white">
                <thead>
                    <tr>
                        <th class="sticky-header px-6 py-4 text-left">
                            <button wire:click="sortBy('id')" class="flex items-center gap-2 font-semibold text-gray-700 hover:text-blue-600 transition-colors">
                                Checklist ID
                                @if($sortBy === 'id')
                                    <svg class="w-4 h-4 transform {{ $sortDirection === 'asc' ? 'rotate-180' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                    </svg>
                                @endif
                            </button>
                        </th>
                        <th class="px-6 py-4 text-center">
                            <button wire:click="sortBy('status')" class="flex items-center gap-2 font-semibold text-gray-700 hover:text-blue-600 transition-colors mx-auto">
                                Status
                                @if($sortBy === 'status')
                                    <svg class="w-4 h-4 transform {{ $sortDirection === 'asc' ? 'rotate-180' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                    </svg>
                                @endif
                            </button>
                        </th>
                        <th class="px-6 py-4 text-center">
                            <span class="font-semibold text-gray-700">Shipment Information</span>
                        </th>
                        
                        <th class="px-6 py-4 text-center">
                            <button wire:click="sortBy('auditor')" class="flex items-center gap-2 font-semibold text-gray-700 hover:text-blue-600 transition-colors mx-auto">
                                Auditor
                                @if($sortBy === 'assigned_to')
                                    <svg class="w-4 h-4 transform {{ $sortDirection === 'asc' ? 'rotate-180' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                    </svg>
                                @endif
                            </button>
                        </th>
                        <th class="px-6 py-4 text-center">
                            <button wire:click="sortBy('created_at')" class="flex items-center gap-2 font-semibold text-gray-700 hover:text-blue-600 transition-colors mx-auto">
                                Audit Started
                                @if($sortBy === 'created_at')
                                    <svg class="w-4 h-4 transform {{ $sortDirection === 'asc' ? 'rotate-180' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                    </svg>
                                @endif
                            </button>
                        </th>
                        <th class="px-6 py-4 text-center">
                            <button wire:click="sortBy('created_at')" class="flex items-center gap-2 font-semibold text-gray-700 hover:text-blue-600 transition-colors mx-auto">
                                Audit Closed
                                @if($sortBy === 'updated_at')
                                    <svg class="w-4 h-4 transform {{ $sortDirection === 'asc' ? 'rotate-180' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                    </svg>
                                @endif
                            </button>
                        </th>
                        <th class="px-6 py-4 text-center">
                            <span class="font-semibold text-gray-700">Actions</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($checklists as $checklist)
                        <tr class="card-hover cursor-pointer transition-all duration-200" wire:key="checklist-{{ $checklist['id'] }}">
                            <!-- Checklist Details -->
                            <td class="sticky-column px-6 py-4">
                                <div class="space-y-2">
                                    <div class="flex items-center gap-2 text-xs text-gray-500">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                        </svg>
                                        <p class="text-gray-600 text-sm leading-relaxed">{{ $checklist['id'] }}</p>
                                    </div>
                                    <h3 class="font-semibold text-gray-900 text-lg"></h3>
                                </div>
                            </td>
                            
                            <!-- Status -->
                            <td class="px-6 py-4 text-center">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium border {{ $this->getStatusBadgeClass($checklist['status']) }}">
                                    {{ ucfirst(str_replace('_', ' ', $checklist['status'])) }}
                                </span>
                            </td>
                            
                            <!-- Shipment Information -->
                            <td class="px-6 py-4 text-center">
                                <div class="space-y-3">
                                    <!-- Model and Section -->
                                    <div class="flex items-center justify-center gap-2">
                                        <div class="flex items-center gap-2 bg-blue-50 px-3 py-1 rounded-full" title="Model: {{ $checklist['model'] }}">
                                            <svg class="w-4 h-4 text-blue-600 " aria-hidden="true" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M12.013 6.175 7.006 9.369l5.007 3.194-5.007 3.193L2 12.545l5.006-3.193L2 6.175l5.006-3.194 5.007 3.194ZM6.981 17.806l5.006-3.193 5.006 3.193L11.987 21l-5.006-3.194Z"/>
                                                <path d="m12.013 12.545 5.006-3.194-5.006-3.176 4.98-3.194L22 6.175l-5.007 3.194L22 12.562l-5.007 3.194-4.98-3.211Z"/>
                                            </svg>

                                            <span class="text-sm font-medium text-blue-700">{{ $checklist['model'] }}</span>
                                        </div>
                                        <span class="text-gray-400">@</span>
                                        <div class="flex items-center gap-2 bg-gray-50 px-3 py-1 rounded-full" title="Section: {{ $checklist['section'] }}">
                                            <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            </svg>
                                            <span class="text-sm font-medium text-gray-700">{{ $checklist['section'] }}</span>
                                        </div>
                                    </div>
                                    
                                    <!-- Invoice Number -->
                                    <div class="flex items-center justify-center gap-2" title="Invoice Number: {{ $checklist->shipInfoCheck['invoice_number'] }}">
                                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>
                                        <span class="text-sm font-semibold text-gray-900">{{ $checklist->shipInfoCheck['invoice_number'] }}</span>
                                    </div>
                                    
                                    <!-- DateTime -->
                                    <div class="flex items-center justify-center gap-2">
                                        <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        <span class="text-xs text-gray-600">
                                            {{ \Carbon\Carbon::parse($checklist->shipInfoCheck['datetime'])->format('M d, Y') }}
                                        </span>
                                    </div>
                                    
                                    <!-- Time -->
                                    <div class="text-xs text-gray-500">
                                        {{ \Carbon\Carbon::parse($checklist->shipInfoCheck['datetime'])->format('h:i A') }}
                                    </div>
                                </div>
                            </td>
                            
                           
                            
                            <!-- Assigned To -->
                            <td class="px-6 py-4 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <div class=" bg-blue-100 rounded-full flex items-center justify-center">
                                        <span class="text-xs font-medium text-blue-600">
                                            {{ strtoupper($checklist->personnelCheck['oba_checked_by']) }}
                                        </span>
                                    </div>
                                </div>
                            </td>
                            
                            <!-- Audit Started -->
                            <td class="px-6 py-4 text-center">
                                <div class="space-y-1">
                                    <div class="text-sm font-medium text-gray-700">
                                        {{ \Carbon\Carbon::parse($checklist['created_at'])->format('M d, Y') }}
                                    </div>
                                    <div class="text-xs {{ \Carbon\Carbon::parse($checklist['created_at'])->isPast() ? 'text-red-600' : 'text-gray-500' }}">
                                        {{ \Carbon\Carbon::parse($checklist['created_at'])->diffForHumans() }}
                                    </div>
                                </div>
                            </td>

                            <!-- Audit Closed -->
                            <td class="px-6 py-4 text-center">
                                <div class="space-y-1">
                                    @if($checklist['status'] == 'Closed')
                                    <div class="text-sm font-medium text-gray-700">
                                        {{ \Carbon\Carbon::parse($checklist['updated_at'])->format('M d, Y') }}
                                    </div>
                                    <div class="text-xs {{ \Carbon\Carbon::parse($checklist['updated_at'])->isPast() ? 'text-red-600' : 'text-gray-500' }}">
                                        {{ \Carbon\Carbon::parse($checklist['updated_at'])->diffForHumans() }}
                                    </div>
                                    @endif
                                </div>
                            </td>
                            
                            <!-- Actions -->
                            <td class="px-6 py-4 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <button class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" title="View Details" wire:click="viewChecklist({{ $checklist['id'] }})">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </button>
                                    {{-- <button class="p-2 text-green-600 hover:bg-green-50 rounded-lg transition-colors" title="Edit">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </button> --}}
                                    @if($checklist['status'] != 'Closed')
                                    <button class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors" 
                                            title="Delete" 
                                            wire:click="confirmDelete({{ $checklist['id'] }})">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center gap-4">
                                    <svg class="w-16 h-16 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                    </svg>
                                    <div class="text-xl font-medium text-gray-500">No checklists found</div>
                                    <div class="text-gray-400">Try adjusting your search or filter criteria</div>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <!-- Delete Confirmation Modal -->
            @if($showDeleteModal)
                <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" wire:keydown.escape="closeDeleteModal">
                    <div class="bg-white rounded-lg p-6 max-w-md w-full mx-4 shadow-xl">
                        <div class="flex items-center mb-4">
                            <svg class="w-8 h-8 text-red-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                            </svg>
                            <h3 class="text-lg font-semibold text-gray-900">Confirm Deletion</h3>
                        </div>
                        <p class="text-gray-600 mb-6">Are you sure you want to delete this checklist? This action cannot be undone.</p>
                        <div class="flex justify-end gap-3">
                            <button wire:click="closeDeleteModal" 
                                    class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg transition-colors">
                                Cancel
                            </button>
                            <button wire:click="deleteChecklist" 
                                    wire:loading.attr="disabled"
                                    wire:target="deleteChecklist"
                                    class="px-4 py-2 bg-red-600 text-white hover:bg-red-700 rounded-lg transition-colors disabled:opacity-50">
                                <span wire:loading.remove wire:target="deleteChecklist">Delete</span>
                                <span wire:loading wire:target="deleteChecklist">Deleting...</span>
                            </button>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- Pagination -->
    <div class="mt-6">
        {{ $checklists->links() }}
    </div>

    {{-- <!-- Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-8">
        @php
            $totalChecklists = $checklists->count();
            // $completedChecklists = $checklists->where('status', 'completed')->count();
            // $inProgressChecklists = $checklists->where('status', 'in_progress')->count();
            // $overdueChecklists = $checklists->where('status', 'overdue')->count();
        @endphp
        
        <div class="section-card rounded-xl p-6 text-center">
            <div class="text-3xl font-bold text-blue-600 mb-2">{{ $totalChecklists }}</div>
            <div class="text-gray-600">Total Checklists</div>
        </div>
        
        <div class="section-card rounded-xl p-6 text-center">
            <div class="text-3xl font-bold text-green-600 mb-2">{{ $completedChecklists }}</div>
            <div class="text-gray-600">Completed</div>
        </div>
        
        <div class="section-card rounded-xl p-6 text-center">
            <div class="text-3xl font-bold text-yellow-600 mb-2">{{ $inProgressChecklists }}</div>
            <div class="text-gray-600">In Progress</div>
        </div>
        
        <div class="section-card rounded-xl p-6 text-center">
            <div class="text-3xl font-bold text-red-600 mb-2">{{ $overdueChecklists }}</div>
            <div class="text-gray-600">Overdue</div>
        </div>
    </div> --}}

    
</div>