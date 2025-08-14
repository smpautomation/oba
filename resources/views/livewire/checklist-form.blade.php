<div class="bg-slate-200">

    <form wire:submit='doNothing'>

        <div class="flex gap-4 align-content-center justify-center max-w-6xl mx-auto px-4 mt-6 bg-white rounded-xl pt-4">
            <div class="section-container glass-effect flex-1">
                <div class="status-indicator"></div>
                <div class="section-label">Checklist ID</div>
                <div class="section-value">{{ $model_id }}</div>
                <svg class="section-icon" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2L2 7V10C2 16 6 20.9 12 22C18 20.9 22 16 22 10V7L12 2Z"/>
                </svg>
            </div>
            <div class="section-container glass-effect flex-1">
                <div class="status-indicator"></div>
                <div class="section-label">Current Section</div>
                <div class="section-value">{{ $checklistInfo->section }}</div>
                <svg class="section-icon" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2L2 7V10C2 16 6 20.9 12 22C18 20.9 22 16 22 10V7L12 2Z"/>
                </svg>
            </div>
        </div>
        <livewire:preparation-checklist :checklist_id="$model_id" :scanned_qr_code="$scanned_qr_pc" :userIP="$userIP"></livewire:preparation-checklist>
        <livewire:o-b-a-kit-checklist :checklist_id="$model_id" :userIP="$userIP"></livewire:o-b-a-kit-checklist>
        <livewire:shipment-information :checklist_id="$model_id" :userIP="$userIP"></livewire:shipment-information>
        <livewire:check-items :checklist_id="$model_id" :userIP="$userIP"></livewire:check-items>
        <livewire:similarities-checking :checklist_id="$model_id" :userIP="$userIP"></livewire:similarities-checking>
        <livewire:check-overall :checklist_id="$model_id" :userIP="$userIP"></livewire:check-overall>
        <livewire:personnel :checklist_id="$model_id" :userIP="$userIP"></livewire:personnel>
        <livewire:photo-documentation :checklist_id="$model_id" :userIP="$userIP"></livewire:photo-documentation>
        <livewire:additional-documentation :checklist_id="$model_id" :userIP="$userIP"></livewire:additional-documentation>
        <div class="container-bg p-6 rounded-2xl shadow-lg flex items-center justify-center">
            @if ($checklistInfo->status != 'Closed')
            <button
                class="save-button px-8 py-4 rounded-xl text-white flex items-center space-x-3 font-medium text-lg focus:outline-none focus:ring-4 focus:ring-purple-300 focus:ring-opacity-50"
                wire:click="showSummaryModal">
                <svg class="button-icon w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <span class="button-text">Finish Audit</span>
            </button>
            @endif
        </div>

        @if($showSummary)
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50" wire:click='closeSummary'>
            <div class="bg-white rounded-2xl shadow-2xl max-w-4xl w-full mx-4 max-h-[90vh] overflow-y-auto glass-effect" wire:click.stop>
                <div class="gradient-bg text-white p-6 rounded-t-2xl">
                    <div class="flex items-center justify-between">
                        <h2 class="text-2xl font-bold flex items-center space-x-3">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2L2 7V10C2 16 6 20.9 12 22C18 20.9 22 16 22 10V7L12 2Z"/>
                            </svg>
                            <span>Audit Summary</span>
                        </h2>
                        <button wire:click='closeSummary()' class="text-white hover:bg-white hover:bg-opacity-20 rounded-full p-2 transition-all">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="flex-1 overflow-y-auto p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                        <div class="section-container">
                            <div class="section-label">Checklist ID</div>
                            <div class="section-value">{{ $model_id }}</div>
                        </div>
                        <div class="section-container">
                            <div class="section-label">Section</div>
                            <div class="section-value">{{ $checklistInfo->section }}</div>
                        </div>
                    </div>

                    <div class="space-y-6">
                        @if($summaryData['preparation'])
                        <div class="form-section">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center space-x-2">
                                <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span>Preparation Checklist</span>
                            </h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
                                <div class="bg-white rounded-lg border border-gray-200 p-3">
                                    <div class="flex items-center justify-between">
                                        <div class="text-xs font-medium text-gray-600 uppercase">MC Receiving</div>
                                        @if($summaryData['preparation']->oneprep2column)
                                            <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M9 12l2 2 4-4"/>
                                                </svg>
                                            </div>
                                        @else
                                            <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                        @endif
                                    </div>
                                    @if($summaryData['preparation']->oneprep2remarks)
                                        <div class="mt-2 text-xs text-gray-500 bg-gray-50 rounded p-2">
                                            {{ $summaryData['preparation']->oneprep2remarks }}
                                        </div>
                                    @endif
                                </div>

                                <div class="bg-white rounded-lg border border-gray-200 p-3">
                                    <div class="flex items-center justify-between">
                                        <div class="text-xs font-medium text-gray-600 uppercase">OBA Kit</div>
                                        @if($summaryData['preparation']->oneprep3column)
                                            <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M9 12l2 2 4-4"/>
                                                </svg>
                                            </div>
                                        @else
                                            <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                        @endif
                                    </div>
                                    @if($summaryData['preparation']->oneprep3remarks)
                                        <div class="mt-2 text-xs text-gray-500 bg-gray-50 rounded p-2">
                                            {{ $summaryData['preparation']->oneprep3remarks }}
                                        </div>
                                    @endif
                                </div>

                                <div class="bg-white rounded-lg border border-gray-200 p-3">
                                    <div class="flex items-center justify-between">
                                        <div class="text-xs font-medium text-gray-600 uppercase">Packing Specs</div>
                                        @if($summaryData['preparation']->oneprep4column)
                                            <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M9 12l2 2 4-4"/>
                                                </svg>
                                            </div>
                                        @else
                                            <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                        @endif
                                    </div>
                                    @if($summaryData['preparation']->oneprep4remarks)
                                        <div class="mt-2 text-xs text-gray-500 bg-gray-50 rounded p-2">
                                            {{ $summaryData['preparation']->oneprep4remarks }}
                                        </div>
                                    @endif
                                </div>

                                <div class="bg-white rounded-lg border border-gray-200 p-3">
                                    <div class="flex items-center justify-between">
                                        <div class="text-xs font-medium text-gray-600 uppercase">SEREM</div>
                                        @if($summaryData['preparation']->oneprep5column)
                                            <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M9 12l2 2 4-4"/>
                                                </svg>
                                            </div>
                                        @else
                                            <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                        @endif
                                    </div>
                                    @if($summaryData['preparation']->oneprep5remarks)
                                        <div class="mt-2 text-xs text-gray-500 bg-gray-50 rounded p-2">
                                            {{ $summaryData['preparation']->oneprep5remarks }}
                                        </div>
                                    @endif
                                </div>

                                <div class="bg-white rounded-lg border border-gray-200 p-3">
                                    <div class="flex items-center justify-between">
                                        <div class="text-xs font-medium text-gray-600 uppercase">Pick List</div>
                                        @if($summaryData['preparation']->oneprep6column)
                                            <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M9 12l2 2 4-4"/>
                                                </svg>
                                            </div>
                                        @else
                                            <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                        @endif
                                    </div>
                                    @if($summaryData['preparation']->oneprep6remarks)
                                        <div class="mt-2 text-xs text-gray-500 bg-gray-50 rounded p-2">
                                            {{ $summaryData['preparation']->oneprep6remarks }}
                                        </div>
                                    @endif
                                </div>

                                <div class="bg-white rounded-lg border border-gray-200 p-3">
                                    <div class="flex items-center justify-between">
                                        <div class="text-xs font-medium text-gray-600 uppercase">FG Lot Trace</div>
                                        @if($summaryData['preparation']->oneprep7column)
                                            <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M9 12l2 2 4-4"/>
                                                </svg>
                                            </div>
                                        @else
                                            <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                        @endif
                                    </div>
                                    @if($summaryData['preparation']->oneprep7remarks)
                                        <div class="mt-2 text-xs text-gray-500 bg-gray-50 rounded p-2">
                                            {{ $summaryData['preparation']->oneprep7remarks }}
                                        </div>
                                    @endif
                                </div>

                                @if($checklistInfo->scanned_qr_pc && isset($summaryData['preparation']->oneprep8column))
                                <div class="bg-white rounded-lg border border-gray-200 p-3">
                                    <div class="flex items-center justify-between">
                                        <div class="text-xs font-medium text-gray-600 uppercase">Scanned QR</div>
                                        @if($summaryData['preparation']->oneprep8column)
                                            <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M9 12l2 2 4-4"/>
                                                </svg>
                                            </div>
                                        @else
                                            <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                        @endif
                                    </div>
                                    @if($summaryData['preparation']->oneprep8remarks)
                                        <div class="mt-2 text-xs text-gray-500 bg-gray-50 rounded p-2">
                                            {{ $summaryData['preparation']->oneprep8remarks }}
                                        </div>
                                    @endif
                                </div>
                                @endif

                                <div class="bg-white rounded-lg border border-gray-200 p-3">
                                    <div class="flex items-center justify-between">
                                        <div class="text-xs font-medium text-gray-600 uppercase">Packing Slip</div>
                                        @if($summaryData['preparation']->oneprep9column)
                                            <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M9 12l2 2 4-4"/>
                                                </svg>
                                            </div>
                                        @else
                                            <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                        @endif
                                    </div>
                                    @if($summaryData['preparation']->oneprep9remarks)
                                        <div class="mt-2 text-xs text-gray-500 bg-gray-50 rounded p-2">
                                            {{ $summaryData['preparation']->oneprep9remarks }}
                                        </div>
                                    @endif
                                </div>

                                <div class="bg-white rounded-lg border border-gray-200 p-3">
                                    <div class="flex items-center justify-between">
                                        <div class="text-xs font-medium text-gray-600 uppercase">Related Docs</div>
                                        @if($summaryData['preparation']->oneprep10column)
                                            <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M9 12l2 2 4-4"/>
                                                </svg>
                                            </div>
                                        @else
                                            <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                        @endif
                                    </div>
                                    @if($summaryData['preparation']->oneprep10remarks)
                                        <div class="mt-2 text-xs text-gray-500 bg-gray-50 rounded p-2">
                                            {{ $summaryData['preparation']->oneprep10remarks }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="bg-gradient-to-r from-blue-50 to-blue-100 rounded-lg p-4 border border-blue-200">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-3">
                                        <div class="bg-blue-500 rounded-full p-2">
                                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="font-semibold text-gray-800">Preparation Checklist Status</div>
                                            <div class="text-sm text-gray-600">
                                                @php
                                                    $completedItems = collect([
                                                        $summaryData['preparation']->oneprep2column,
                                                        $summaryData['preparation']->oneprep3column,
                                                        $summaryData['preparation']->oneprep4column,
                                                        $summaryData['preparation']->oneprep5column,
                                                        $summaryData['preparation']->oneprep6column,
                                                        $summaryData['preparation']->oneprep7column,
                                                        $checklistInfo->scanned_qr_pc ? $summaryData['preparation']->oneprep8column ?? null : null,
                                                        $summaryData['preparation']->oneprep9column,
                                                        $summaryData['preparation']->oneprep10column,
                                                    ])->filter()->count();
                                                    $totalItems = $checklistInfo->scanned_qr_pc ? 9 : 8;
                                                    $percentage = $totalItems > 0 ? round(($completedItems / $totalItems) * 100) : 0;
                                                @endphp
                                                {{ $completedItems }} of {{ $totalItems }} items completed ({{ $percentage }}%)
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-2xl font-bold text-blue-600">{{ $percentage }}%</div>
                                        <div class="w-20 h-2 bg-gray-200 rounded-full mt-1">
                                            <div class="h-2 bg-blue-500 rounded-full transition-all duration-300" style="width: {{ $percentage }}%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if($summaryData['oba_kit'])
                        <div class="form-section">
                            <h3 class="text-lg font-semibold text-gray-800 mb-3 flex items-center space-x-2">
                                <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20.618 5.984A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016zM12 9v2.5a2.5 2.5 0 11-5 0V9a5 5 0 1110 0z"/>
                                </svg>
                                <span>OBA Kit Checklist</span>
                            </h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
                                <span class="col-span-3">BEFORE</span>
                                <div class="bg-white rounded-lg border border-gray-200 p-3">
                                    <div class="flex items-center justify-between">
                                        <div class="text-xs font-medium text-gray-600 uppercase">CALCULATOR</div>
                                        @if($summaryData['oba_kit']->beforecheckbox1)
                                            <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M9 12l2 2 4-4"/>
                                                </svg>
                                            </div>
                                        @else
                                            <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                        @endif
                                    </div>
                                </div>
                                <div class="bg-white rounded-lg border border-gray-200 p-3">
                                    <div class="flex items-center justify-between">
                                        <div class="text-xs font-medium text-gray-600 uppercase">CAMERA/TABLET</div>
                                        @if($summaryData['oba_kit']->beforecheckbox2)
                                            <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M9 12l2 2 4-4"/>
                                                </svg>
                                            </div>
                                        @else
                                            <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                        @endif
                                    </div>
                                </div>
                                <div class="bg-white rounded-lg border border-gray-200 p-3">
                                    <div class="flex items-center justify-between">
                                        <div class="text-xs font-medium text-gray-600 uppercase">CUTTER</div>
                                        @if($summaryData['oba_kit']->beforecheckbox3)
                                            <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M9 12l2 2 4-4"/>
                                                </svg>
                                            </div>
                                        @else
                                            <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                        @endif
                                    </div>
                                </div>
                                <div class="bg-white rounded-lg border border-gray-200 p-3">
                                    <div class="flex items-center justify-between">
                                        <div class="text-xs font-medium text-gray-600 uppercase">STAMP PAD</div>
                                        @if($summaryData['oba_kit']->beforecheckbox4)
                                            <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M9 12l2 2 4-4"/>
                                                </svg>
                                            </div>
                                        @else
                                            <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                        @endif
                                    </div>
                                </div>
                                <div class="bg-white rounded-lg border border-gray-200 p-3">
                                    <div class="flex items-center justify-between">
                                        <div class="text-xs font-medium text-gray-600 uppercase">STAMP</div>
                                        @if($summaryData['oba_kit']->beforecheckbox5)
                                            <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M9 12l2 2 4-4"/>
                                                </svg>
                                            </div>
                                        @else
                                            <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                        @endif
                                    </div>
                                </div>
                                <div class="bg-white rounded-lg border border-gray-200 p-3">
                                    <div class="flex items-center justify-between">
                                        <div class="text-xs font-medium text-gray-600 uppercase">TAPE DISPENSER</div>
                                        @if($summaryData['oba_kit']->beforecheckbox6)
                                            <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M9 12l2 2 4-4"/>
                                                </svg>
                                            </div>
                                        @else
                                            <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
                                <span class="col-span-3">AFTER</span>
                                <div class="bg-white rounded-lg border border-gray-200 p-3">
                                    <div class="flex items-center justify-between">
                                        <div class="text-xs font-medium text-gray-600 uppercase">CALCULATOR</div>
                                        @if($summaryData['oba_kit']->aftercheckbox1)
                                            <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M9 12l2 2 4-4"/>
                                                </svg>
                                            </div>
                                        @else
                                            <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                        @endif
                                    </div>
                                </div>
                                <div class="bg-white rounded-lg border border-gray-200 p-3">
                                    <div class="flex items-center justify-between">
                                        <div class="text-xs font-medium text-gray-600 uppercase">CAMERA/TABLET</div>
                                        @if($summaryData['oba_kit']->aftercheckbox2)
                                            <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M9 12l2 2 4-4"/>
                                                </svg>
                                            </div>
                                        @else
                                            <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                        @endif
                                    </div>
                                </div>
                                <div class="bg-white rounded-lg border border-gray-200 p-3">
                                    <div class="flex items-center justify-between">
                                        <div class="text-xs font-medium text-gray-600 uppercase">CUTTER</div>
                                        @if($summaryData['oba_kit']->aftercheckbox3)
                                            <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M9 12l2 2 4-4"/>
                                                </svg>
                                            </div>
                                        @else
                                            <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                        @endif
                                    </div>
                                </div>
                                <div class="bg-white rounded-lg border border-gray-200 p-3">
                                    <div class="flex items-center justify-between">
                                        <div class="text-xs font-medium text-gray-600 uppercase">STAMP PAD</div>
                                        @if($summaryData['oba_kit']->aftercheckbox4)
                                            <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M9 12l2 2 4-4"/>
                                                </svg>
                                            </div>
                                        @else
                                            <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                        @endif
                                    </div>
                                </div>
                                <div class="bg-white rounded-lg border border-gray-200 p-3">
                                    <div class="flex items-center justify-between">
                                        <div class="text-xs font-medium text-gray-600 uppercase">STAMP</div>
                                        @if($summaryData['oba_kit']->aftercheckbox5)
                                            <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M9 12l2 2 4-4"/>
                                                </svg>
                                            </div>
                                        @else
                                            <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                        @endif
                                    </div>
                                </div>
                                <div class="bg-white rounded-lg border border-gray-200 p-3">
                                    <div class="flex items-center justify-between">
                                        <div class="text-xs font-medium text-gray-600 uppercase">TAPE DISPENSER</div>
                                        @if($summaryData['oba_kit']->aftercheckbox6)
                                            <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M9 12l2 2 4-4"/>
                                                </svg>
                                            </div>
                                        @else
                                            <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="bg-gradient-to-r from-blue-50 to-blue-100 rounded-lg p-4 border border-blue-200">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-3">
                                        <div class="bg-blue-500 rounded-full p-2">
                                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="font-semibold text-gray-800">OBA KIT Checklist Status</div>
                                            <div class="text-sm text-gray-600">
                                                @php
                                                    $completedItems = collect([
                                                        $summaryData['oba_kit']->beforecheckbox1,
                                                        $summaryData['oba_kit']->beforecheckbox2,
                                                        $summaryData['oba_kit']->beforecheckbox3,
                                                        $summaryData['oba_kit']->beforecheckbox4,
                                                        $summaryData['oba_kit']->beforecheckbox5,
                                                        $summaryData['oba_kit']->beforecheckbox6,
                                                        $summaryData['oba_kit']->aftercheckbox1,
                                                        $summaryData['oba_kit']->aftercheckbox2,
                                                        $summaryData['oba_kit']->aftercheckbox3,
                                                        $summaryData['oba_kit']->aftercheckbox4,
                                                        $summaryData['oba_kit']->aftercheckbox5,
                                                        $summaryData['oba_kit']->aftercheckbox6,
                                                    ])->filter()->count();
                                                    $totalItems = 12;
                                                    $percentage = $totalItems > 0 ? round(($completedItems / $totalItems) * 100) : 0;
                                                @endphp
                                                {{ $completedItems }} of {{ $totalItems }} items completed ({{ $percentage }}%)
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-2xl font-bold text-blue-600">{{ $percentage }}%</div>
                                        <div class="w-20 h-2 bg-gray-200 rounded-full mt-1">
                                            <div class="h-2 bg-blue-500 rounded-full transition-all duration-300" style="width: {{ $percentage }}%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if($summaryData['shipment'])
                        <div class="form-section">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center space-x-2">
                                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>Shipment Information</span>
                            </h3>

                            <div class="mb-6">
                                <div class="bg-blue-50 rounded-lg p-4 border border-blue-200">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center space-x-3">
                                            <div class="bg-blue-500 rounded-full p-2">
                                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <div class="text-sm font-medium text-gray-600 uppercase">Date & Time</div>
                                                <div class="text-base font-semibold text-gray-800">
                                                    @if($summaryData['shipment']->datetime)
                                                        {{ \Carbon\Carbon::parse($summaryData['shipment']->datetime)->format('M d, Y - g:i A') }}
                                                    @else
                                                        <span class="text-gray-400 italic">Not set</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            @if($summaryData['shipment']->datetime)
                                                <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center">
                                                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M9 12l2 2 4-4"/>
                                                    </svg>
                                                </div>
                                            @else
                                                <div class="w-6 h-6 bg-gray-300 rounded-full"></div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">

                                <div class="bg-white rounded-lg border border-gray-200 p-4">
                                    <div class="flex items-center justify-between mb-2">
                                        <div class="text-xs font-medium text-gray-600 uppercase">Model Name</div>
                                        @if($summaryData['shipment']->model_name)
                                            <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M9 12l2 2 4-4"/>
                                                </svg>
                                            </div>
                                        @else
                                            <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                        @endif
                                    </div>
                                    <div class="text-sm font-semibold text-gray-800">
                                        {{ $summaryData['shipment']->model_name ?: 'Not specified' }}
                                    </div>
                                </div>

                                <div class="bg-white rounded-lg border border-gray-200 p-4">
                                    <div class="flex items-center justify-between mb-2">
                                        <div class="text-xs font-medium text-gray-600 uppercase">Invoice Number</div>
                                        @if($summaryData['shipment']->invoice_number)
                                            <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M9 12l2 2 4-4"/>
                                                </svg>
                                            </div>
                                        @else
                                            <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                        @endif
                                    </div>
                                    <div class="text-sm font-semibold text-gray-800">
                                        {{ $summaryData['shipment']->invoice_number ?: 'Not specified' }}
                                    </div>
                                </div>
                            </div>

                            <div class="mb-6">
                                <div class="flex items-center mb-3">
                                    <svg class="w-4 h-4 mr-2 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                    </svg>
                                    <h4 class="text-base font-semibold text-gray-700">Pallet Materials Used</h4>
                                </div>

                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mb-4">
                                    <div class="bg-white rounded-lg border border-gray-200 p-3">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center space-x-2">
                                                <svg class="w-4 h-4 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                                                </svg>
                                                <span class="text-xs font-medium text-gray-700">WOOD</span>
                                            </div>
                                            @if($summaryData['shipment']->wood)
                                                <div class="w-4 h-4 bg-green-500 rounded-full flex items-center justify-center">
                                                    <svg class="w-2.5 h-2.5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M9 12l2 2 4-4"/>
                                                    </svg>
                                                </div>
                                            @else
                                                <div class="w-4 h-4 bg-gray-300 rounded-full"></div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="bg-white rounded-lg border border-gray-200 p-3">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center space-x-2">
                                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                </svg>
                                                <span class="text-xs font-medium text-gray-700">PAPER</span>
                                            </div>
                                            @if($summaryData['shipment']->paper)
                                                <div class="w-4 h-4 bg-green-500 rounded-full flex items-center justify-center">
                                                    <svg class="w-2.5 h-2.5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M9 12l2 2 4-4"/>
                                                    </svg>
                                                </div>
                                            @else
                                                <div class="w-4 h-4 bg-gray-300 rounded-full"></div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="bg-white rounded-lg border border-gray-200 p-3">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center space-x-2">
                                                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                                                </svg>
                                                <span class="text-xs font-medium text-gray-700">STEEL</span>
                                            </div>
                                            @if($summaryData['shipment']->steel)
                                                <div class="w-4 h-4 bg-green-500 rounded-full flex items-center justify-center">
                                                    <svg class="w-2.5 h-2.5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M9 12l2 2 4-4"/>
                                                    </svg>
                                                </div>
                                            @else
                                                <div class="w-4 h-4 bg-gray-300 rounded-full"></div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="bg-white rounded-lg border border-gray-200 p-3">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center space-x-2">
                                                <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                                </svg>
                                                <span class="text-xs font-medium text-gray-700">PLASTIC</span>
                                            </div>
                                            @if($summaryData['shipment']->plastic)
                                                <div class="w-4 h-4 bg-green-500 rounded-full flex items-center justify-center">
                                                    <svg class="w-2.5 h-2.5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M9 12l2 2 4-4"/>
                                                    </svg>
                                                </div>
                                            @else
                                                <div class="w-4 h-4 bg-gray-300 rounded-full"></div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    @if($summaryData['shipment']->others)
                                    <div class="bg-amber-50 rounded-lg border border-amber-200 p-4">
                                        <div class="flex items-center space-x-2 mb-2">
                                            <svg class="w-4 h-4 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span class="text-xs font-medium text-amber-700 uppercase">Other Materials</span>
                                        </div>
                                        <div class="text-sm font-semibold text-gray-800">{{ $summaryData['shipment']->others }}</div>
                                    </div>
                                    @endif

                                    @if($summaryData['shipment']->pallet_size)
                                    <div class="bg-indigo-50 rounded-lg border border-indigo-200 p-4">
                                        <div class="flex items-center space-x-2 mb-2">
                                            <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"></path>
                                            </svg>
                                            <span class="text-xs font-medium text-indigo-700 uppercase">Pallet Size</span>
                                        </div>
                                        <div class="text-sm font-semibold text-gray-800">{{ $summaryData['shipment']->pallet_size }}</div>
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <div class="bg-gradient-to-r from-purple-50 to-purple-100 rounded-lg p-4 border border-purple-200">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-3">
                                        <div class="bg-purple-500 rounded-full p-2">
                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="font-semibold text-gray-800">Shipment Information Status</div>
                                            <div class="text-sm text-gray-600">
                                                @php
                                                    $completedFields = collect([
                                                        $summaryData['shipment']->datetime ? 1 : 0,
                                                        $summaryData['shipment']->model_name ? 1 : 0,
                                                        $summaryData['shipment']->invoice_number ? 1 : 0,
                                                        ($summaryData['shipment']->wood || $summaryData['shipment']->paper || $summaryData['shipment']->steel || $summaryData['shipment']->plastic || $summaryData['shipment']->others) ? 1 : 0,
                                                    ])->sum();
                                                    $totalFields = 4;
                                                    $percentage = $totalFields > 0 ? round(($completedFields / $totalFields) * 100) : 0;
                                                @endphp
                                                {{ $completedFields }} of {{ $totalFields }} sections completed ({{ $percentage }}%)
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-2xl font-bold text-purple-600">{{ $percentage }}%</div>
                                        <div class="w-20 h-2 bg-gray-200 rounded-full mt-1">
                                            <div class="h-2 bg-purple-500 rounded-full transition-all duration-300" style="width: {{ $percentage }}%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if($summaryData['check_items'])
                        <div class="form-section">
                            <h3 class="text-lg font-semibold text-gray-800 mb-3 flex items-center space-x-2">
                                <svg class="w-5 h-5 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span>Check Items</span>
                            </h3>
                        </div>
                        @endif

                        @if($summaryData['similarities'])
                        <div class="form-section">
                            <h3 class="text-lg font-semibold text-gray-800 mb-3 flex items-center space-x-2">
                                <svg class="w-5 h-5 text-yellow-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                                <span>Similarities Checking</span>
                            </h3>
                        </div>
                        @endif

                        @if($summaryData['overall'])
                        <div class="form-section">
                            <h3 class="text-lg font-semibold text-gray-800 mb-3 flex items-center space-x-2">
                                <svg class="w-5 h-5 text-indigo-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span>Overall Check</span>
                            </h3>
                        </div>
                        @endif

                        @if($summaryData['personnel'])
                        <div class="form-section">
                            <h3 class="text-lg font-semibold text-gray-800 mb-3 flex items-center space-x-2">
                                <svg class="w-5 h-5 text-teal-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                                </svg>
                                <span>Personnel</span>
                            </h3>
                        </div>
                        @endif





                        <div class="h-20 flex items-center justify-center text-gray-500">
                            <div class="flex flex-col items-center space-y-2">
                                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span class="text-sm font-medium">End of Summary</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-6 bg-gray-50 rounded-b-2xl flex justify-end space-x-4 flex-shrink-0">
                    <button wire:click='closeSummary' class="px-6 py-3 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition-colors font-medium">
                        Review More
                    </button>

                    <button wire:click='confirmFinishAudit' class="save-button px-8 py-3 rounded-lg text-white flex items-center space-x-2 font-medium transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span>Confirm & Finish</span>
                    </button>
                </div>
            </div>
        </div>
        @endif
    </form>
</div>
