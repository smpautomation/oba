<div class="bg-slate-200 no-select"
    x-data
    x-on:copy.prevent
    x-on:paste.prevent
    x-on:cut.prevent
    x-on:contextmenu.prevent
    x-on:selectstart.prevent>

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
        <livewire:preparation-checklist :checklist_id="$model_id" :scanned_qr_code="$scanned_qr_pc" :mc_checklist_pc="$mc_checklist_pc" :userIP="$userIP"></livewire:preparation-checklist>
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
            <div class="bg-white rounded-2xl shadow-2xl max-w-4xl w-full mx-4 max-h-[90vh] overflow-y-auto glass-effect" wire:click.stop='doNothing'>
                <div class="gradient-bg text-white p-6 rounded-t-2xl">
                    <div class="flex items-center justify-between">
                        <h2 class="text-2xl font-bold flex items-center space-x-3">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2L2 7V10C2 16 6 20.9 12 22C18 20.9 22 16 22 10V7L12 2Z"/>
                            </svg>
                            <span>Audit Summary</span>
                        </h2>
                        <button wire:click='closeSummary' class="text-white hover:bg-white hover:bg-opacity-20 rounded-full p-2 transition-all">
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
                            <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center space-x-2">
                                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                                <span>Items Checking</span>
                            </h3>

                            <!-- Box Inventory Summary -->
                            <div class="mb-6">
                                <div class="bg-blue-50 rounded-lg p-4 border border-blue-200">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center space-x-3">
                                            <div class="bg-blue-500 rounded-full p-2">
                                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <div class="text-sm font-medium text-gray-600 uppercase">Box Inventory</div>
                                                <div class="text-base font-semibold text-gray-800">
                                                    {{ $summaryData['check_items']->open_boxes_quantity ?? 0 }} Open Boxes
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            @if($summaryData['check_items']->open_boxes_quantity !== null)
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

                            <!-- Barcode Label Model Check Summary -->
                            <div class="mb-6">
                                <div class="flex items-center mb-3">
                                    <svg class="w-4 h-4 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V6a1 1 0 00-1-1H5a1 1 0 00-1 1v1a1 1 0 001 1z"></path>
                                    </svg>
                                    <h4 class="text-base font-semibold text-gray-700">Barcode Label Model Name</h4>
                                    <div class="ml-auto bg-amber-100 text-amber-800 px-2 py-1 rounded-full text-xs font-semibold">
                                        100% CHECK
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                    <!-- Same Model Check -->
                                    <div class="bg-white rounded-lg border border-gray-200 p-3">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="text-xs font-medium text-gray-600 uppercase">Same Model Name</div>
                                            @if($summaryData['check_items']->same_model !== null)
                                                @if($summaryData['check_items']->same_model)
                                                    <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M9 12l2 2 4-4"/>
                                                        </svg>
                                                    </div>
                                                @else
                                                    <div class="w-5 h-5 bg-red-500 rounded-full flex items-center justify-center">
                                                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M6 18L18 6M6 6l12 12"/>
                                                        </svg>
                                                    </div>
                                                @endif
                                            @else
                                                <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                            @endif
                                        </div>
                                        <div class="text-sm font-semibold text-gray-800">
                                            @if($summaryData['check_items']->same_model === null)
                                                Not checked
                                            @elseif($summaryData['check_items']->same_model)
                                                YES - All same
                                            @else
                                                NO - Different models
                                            @endif
                                        </div>

                                        @if(!$summaryData['check_items']->same_model && $summaryData['check_items']->specify_model)
                                            <div class="mt-2 text-xs text-gray-500 bg-red-50 rounded p-2 border border-red-200">
                                                <strong>Model:</strong> {{ $summaryData['check_items']->specify_model }}
                                            </div>
                                        @endif

                                        @if(!$summaryData['check_items']->same_model && $summaryData['check_items']->carton_quantity)
                                            <div class="mt-1 text-xs text-gray-500 bg-red-50 rounded p-2 border border-red-200">
                                                <strong>Cartons:</strong> {{ $summaryData['check_items']->carton_quantity }}
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Judgement -->
                                    <div class="bg-white rounded-lg border border-gray-200 p-3">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="text-xs font-medium text-gray-600 uppercase">Judgement</div>
                                            @if($summaryData['check_items']->judgement !== null)
                                                @if($summaryData['check_items']->judgement)
                                                    <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M9 12l2 2 4-4"/>
                                                        </svg>
                                                    </div>
                                                @else
                                                    <div class="w-5 h-5 bg-red-500 rounded-full flex items-center justify-center">
                                                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M6 18L18 6M6 6l12 12"/>
                                                        </svg>
                                                    </div>
                                                @endif
                                            @else
                                                <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                            @endif
                                        </div>
                                        <div class="text-sm font-semibold text-gray-800">
                                            @if($summaryData['check_items']->judgement === null)
                                                Not judged
                                            @elseif($summaryData['check_items']->judgement)
                                                OK
                                            @else
                                                NG
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- SIR Documentation Summary -->
                            <div class="mb-6">
                                <div class="flex items-center mb-3">
                                    <svg class="w-4 h-4 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h7.586a1 1 0 01.707.293l2.414 2.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    <h4 class="text-base font-semibold text-gray-700">SIR Documentation</h4>
                                    <div class="ml-auto bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs font-semibold">
                                        INSPECTION REPORT
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                    <!-- SIR Required -->
                                    <div class="bg-white rounded-lg border border-gray-200 p-3">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="text-xs font-medium text-gray-600 uppercase">SIR Required</div>
                                            @if($summaryData['check_items']->need_sir !== null)
                                                @if($summaryData['check_items']->need_sir)
                                                    <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M9 12l2 2 4-4"/>
                                                        </svg>
                                                    </div>
                                                @else
                                                    <div class="w-5 h-5 bg-gray-400 rounded-full flex items-center justify-center">
                                                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M6 18L18 6M6 6l12 12"/>
                                                        </svg>
                                                    </div>
                                                @endif
                                            @else
                                                <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                            @endif
                                        </div>
                                        <div class="text-sm font-semibold text-gray-800">
                                            @if($summaryData['check_items']->need_sir === null)
                                                Not specified
                                            @elseif($summaryData['check_items']->need_sir)
                                                YES - Required
                                            @else
                                                NO - Not required
                                            @endif
                                        </div>
                                    </div>

                                    <!-- SIR Available -->
                                    <div class="bg-white rounded-lg border border-gray-200 p-3">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="text-xs font-medium text-gray-600 uppercase">SIR Available</div>
                                            @if($summaryData['check_items']->sir_available !== null)
                                                @if($summaryData['check_items']->sir_available)
                                                    <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M9 12l2 2 4-4"/>
                                                        </svg>
                                                    </div>
                                                @else
                                                    <div class="w-5 h-5 bg-red-500 rounded-full flex items-center justify-center">
                                                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M6 18L18 6M6 6l12 12"/>
                                                        </svg>
                                                    </div>
                                                @endif
                                            @else
                                                <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                            @endif
                                        </div>
                                        <div class="text-sm font-semibold text-gray-800">
                                            @if($summaryData['check_items']->sir_available === null)
                                                Not checked
                                            @elseif($summaryData['check_items']->sir_available)
                                                YES - Available
                                            @else
                                                NO - Not available
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Items Checking Status Summary -->
                            <div class="bg-gradient-to-r from-red-50 to-red-100 rounded-lg p-4 border border-red-200">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-3">
                                        <div class="bg-red-500 rounded-full p-2">
                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="font-semibold text-gray-800">Items Checking Status</div>
                                            <div class="text-sm text-gray-600">
                                                @php
                                                    $completedFields = collect([
                                                        $summaryData['check_items']->open_boxes_quantity !== null ? 1 : 0,
                                                        $summaryData['check_items']->same_model !== null ? 1 : 0,
                                                        $summaryData['check_items']->judgement !== null ? 1 : 0,
                                                        $summaryData['check_items']->need_sir !== null ? 1 : 0,
                                                        ($summaryData['check_items']->need_sir && $summaryData['check_items']->sir_available !== null) || !$summaryData['check_items']->need_sir ? 1 : 0,
                                                    ])->sum();
                                                    $totalFields = 5;
                                                    $percentage = $totalFields > 0 ? round(($completedFields / $totalFields) * 100) : 0;
                                                @endphp
                                                {{ $completedFields }} of {{ $totalFields }} sections completed ({{ $percentage }}%)
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-2xl font-bold text-red-600">{{ $percentage }}%</div>
                                        <div class="w-20 h-2 bg-gray-200 rounded-full mt-1">
                                            <div class="h-2 bg-red-500 rounded-full transition-all duration-300" style="width: {{ $percentage }}%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if($summaryData['similarities'])
                        <div class="form-section">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center space-x-2">
                                <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                                <span>Similarities Checking</span>
                            </h3>

                            <!-- Quantity for Shipment Summary -->
                            <div class="mb-6">
                                <div class="flex items-center mb-3">
                                    <svg class="w-4 h-4 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h7.586a1 1 0 01.707.293l2.414 2.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    <h4 class="text-base font-semibold text-gray-700">Quantity for Shipment</h4>
                                </div>

                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mb-4">
                                    <!-- Pick List -->
                                    <div class="bg-white rounded-lg border border-gray-200 p-3">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="text-xs font-medium text-gray-600 uppercase">Pick List</div>
                                            @if($summaryData['similarities']->pick_list_qs)
                                                <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M9 12l2 2 4-4"/>
                                                    </svg>
                                                </div>
                                            @else
                                                <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                            @endif
                                        </div>
                                        <div class="text-sm font-semibold text-gray-800 truncate">
                                            {{ $summaryData['similarities']->pick_list_qs ?: 'Not specified' }}
                                        </div>
                                    </div>

                                    <!-- Shipping Invoice -->
                                    <div class="bg-white rounded-lg border border-gray-200 p-3">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="text-xs font-medium text-gray-600 uppercase">Shipping Invoice</div>
                                            @if($summaryData['similarities']->shipping_invoice_qs)
                                                <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M9 12l2 2 4-4"/>
                                                    </svg>
                                                </div>
                                            @else
                                                <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                            @endif
                                        </div>
                                        <div class="text-sm font-semibold text-gray-800 truncate">
                                            {{ $summaryData['similarities']->shipping_invoice_qs ?: 'Not specified' }}
                                        </div>
                                    </div>

                                    <!-- SEREM -->
                                    <div class="bg-white rounded-lg border border-gray-200 p-3">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="text-xs font-medium text-gray-600 uppercase">SEREM</div>
                                            @if($summaryData['similarities']->serem_qs)
                                                <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M9 12l2 2 4-4"/>
                                                    </svg>
                                                </div>
                                            @else
                                                <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                            @endif
                                        </div>
                                        <div class="text-sm font-semibold text-gray-800 truncate">
                                            {{ $summaryData['similarities']->serem_qs ?: 'Not specified' }}
                                        </div>
                                    </div>

                                    <!-- SIR (Conditional) -->
                                    @if($summaryData['similarities']->sir_qs)
                                    <div class="bg-white rounded-lg border border-gray-200 p-3">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="text-xs font-medium text-gray-600 uppercase">SIR</div>
                                            <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M9 12l2 2 4-4"/>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="text-sm font-semibold text-gray-800 truncate">
                                            {{ $summaryData['similarities']->sir_qs }}
                                        </div>
                                    </div>
                                    @endif
                                </div>

                                <!-- Quantity Verification -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                    <div class="bg-white rounded-lg border border-gray-200 p-3">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="text-xs font-medium text-gray-600 uppercase">Same Quantity</div>
                                            @if($summaryData['similarities']->same_quantity_qs !== null)
                                                @if($summaryData['similarities']->same_quantity_qs)
                                                    <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M9 12l2 2 4-4"/>
                                                        </svg>
                                                    </div>
                                                @else
                                                    <div class="w-5 h-5 bg-red-500 rounded-full flex items-center justify-center">
                                                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M6 18L18 6M6 6l12 12"/>
                                                        </svg>
                                                    </div>
                                                @endif
                                            @else
                                                <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                            @endif
                                        </div>
                                        <div class="text-sm font-semibold text-gray-800">
                                            @if($summaryData['similarities']->same_quantity_qs === null)
                                                Not verified
                                            @elseif($summaryData['similarities']->same_quantity_qs)
                                                YES - All same
                                            @else
                                                NO - Different quantities
                                            @endif
                                        </div>
                                    </div>

                                    <div class="bg-white rounded-lg border border-gray-200 p-3">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="text-xs font-medium text-gray-600 uppercase">Judgement</div>
                                            @if($summaryData['similarities']->judgement_qs !== null)
                                                @if($summaryData['similarities']->judgement_qs)
                                                    <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M9 12l2 2 4-4"/>
                                                        </svg>
                                                    </div>
                                                @else
                                                    <div class="w-5 h-5 bg-red-500 rounded-full flex items-center justify-center">
                                                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M6 18L18 6M6 6l12 12"/>
                                                        </svg>
                                                    </div>
                                                @endif
                                            @else
                                                <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                            @endif
                                        </div>
                                        <div class="text-sm font-semibold text-gray-800">
                                            @if($summaryData['similarities']->judgement_qs === null)
                                                Not judged
                                            @elseif($summaryData['similarities']->judgement_qs)
                                                OK
                                            @else
                                                NG
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Number of Boxes for Shipment Summary -->
                            <div class="mb-6">
                                <div class="flex items-center mb-3">
                                    <svg class="w-4 h-4 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h7.586a1 1 0 01.707.293l2.414 2.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    <h4 class="text-base font-semibold text-gray-700">Number of Boxes for Shipment</h4>
                                </div>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mb-4">
                                    <div class="bg-white rounded-lg border border-gray-200 p-3">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="text-xs font-medium text-gray-600 uppercase">Pick List</div>
                                            @if($summaryData['similarities']->picklist_bs)
                                                <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M9 12l2 2 4-4"/>
                                                    </svg>
                                                </div>
                                            @else
                                                <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                            @endif
                                        </div>
                                        <div class="text-sm font-semibold text-gray-800 truncate">
                                            {{ $summaryData['similarities']->picklist_bs ?: 'Not specified' }}
                                        </div>
                                    </div>
                                    <div class="bg-white rounded-lg border border-gray-200 p-3">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="text-xs font-medium text-gray-600 uppercase">Packing Slip</div>
                                            @if($summaryData['similarities']->packing_slip_bs)
                                                <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M9 12l2 2 4-4"/>
                                                    </svg>
                                                </div>
                                            @else
                                                <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                            @endif
                                        </div>
                                        <div class="text-sm font-semibold text-gray-800 truncate">
                                            {{ $summaryData['similarities']->packing_slip_bs ?: 'Not specified' }}
                                        </div>
                                    </div>
                                    <div class="bg-white rounded-lg border border-gray-200 p-3">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="text-xs font-medium text-gray-600 uppercase">Pallet Label</div>
                                            @if($summaryData['similarities']->pallet_label_bs)
                                                <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M9 12l2 2 4-4"/>
                                                    </svg>
                                                </div>
                                            @else
                                                <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                            @endif
                                        </div>
                                        <div class="text-sm font-semibold text-gray-800 truncate">
                                            {{ $summaryData['similarities']->pallet_label_bs ?: 'Not specified' }}
                                        </div>
                                    </div>
                                </div>
                                <!-- Quantity Verification -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                    <div class="bg-white rounded-lg border border-gray-200 p-3">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="text-xs font-medium text-gray-600 uppercase">Same Quantity</div>
                                            @if($summaryData['similarities']->same_box_bs !== null)
                                                @if($summaryData['similarities']->same_box_bs)
                                                    <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M9 12l2 2 4-4"/>
                                                        </svg>
                                                    </div>
                                                @else
                                                    <div class="w-5 h-5 bg-red-500 rounded-full flex items-center justify-center">
                                                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M6 18L18 6M6 6l12 12"/>
                                                        </svg>
                                                    </div>
                                                @endif
                                            @else
                                                <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                            @endif
                                        </div>
                                        <div class="text-sm font-semibold text-gray-800">
                                            @if($summaryData['similarities']->same_box_bs === null)
                                                Not verified
                                            @elseif($summaryData['similarities']->same_box_bs)
                                                YES - All same
                                            @else
                                                NO - Different quantities
                                            @endif
                                        </div>
                                    </div>

                                    <div class="bg-white rounded-lg border border-gray-200 p-3">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="text-xs font-medium text-gray-600 uppercase">Judgement</div>
                                            @if($summaryData['similarities']->judgement_bs !== null)
                                                @if($summaryData['similarities']->judgement_bs)
                                                    <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M9 12l2 2 4-4"/>
                                                        </svg>
                                                    </div>
                                                @else
                                                    <div class="w-5 h-5 bg-red-500 rounded-full flex items-center justify-center">
                                                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M6 18L18 6M6 6l12 12"/>
                                                        </svg>
                                                    </div>
                                                @endif
                                            @else
                                                <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                            @endif
                                        </div>
                                        <div class="text-sm font-semibold text-gray-800">
                                            @if($summaryData['similarities']->judgement_bs === null)
                                                Not judged
                                            @elseif($summaryData['similarities']->judgement_bs)
                                                OK
                                            @else
                                                NG
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Model Name Summary-->
                            <div class="mb-6">
                                <div class="flex items-center mb-3">
                                    <svg class="w-4 h-4 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h7.586a1 1 0 01.707.293l2.414 2.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    <h4 class="text-base font-semibold text-gray-700">Model Name</h4>
                                </div>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mb-4">
                                    <div class="bg-white rounded-lg border border-gray-200 p-3">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="text-xs font-medium text-gray-600 uppercase">Pick List</div>
                                            @if($summaryData['similarities']->picklist_mn)
                                                <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M9 12l2 2 4-4"/>
                                                    </svg>
                                                </div>
                                            @else
                                                <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                            @endif
                                        </div>
                                        <div class="text-sm font-semibold text-gray-800 truncate">
                                            {{ $summaryData['similarities']->picklist_mn ?: 'Not specified' }}
                                        </div>
                                    </div>
                                    <div class="bg-white rounded-lg border border-gray-200 p-3">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="text-xs font-medium text-gray-600 uppercase">Shipping Invoice</div>
                                            @if($summaryData['similarities']->shipping_invoice_mn)
                                                <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M9 12l2 2 4-4"/>
                                                    </svg>
                                                </div>
                                            @else
                                                <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                            @endif
                                        </div>
                                        <div class="text-sm font-semibold text-gray-800 truncate">
                                            {{ $summaryData['similarities']->shipping_invoice_mn ?: 'Not specified' }}
                                        </div>
                                    </div>
                                    <div class="bg-white rounded-lg border border-gray-200 p-3">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="text-xs font-medium text-gray-600 uppercase">SEREM</div>
                                            @if($summaryData['similarities']->serem_mn)
                                                <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M9 12l2 2 4-4"/>
                                                    </svg>
                                                </div>
                                            @else
                                                <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                            @endif
                                        </div>
                                        <div class="text-sm font-semibold text-gray-800 truncate">
                                            {{ $summaryData['similarities']->serem_mn ?: 'Not specified' }}
                                        </div>
                                    </div>
                                    <div class="bg-white rounded-lg border border-gray-200 p-3">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="text-xs font-medium text-gray-600 uppercase">Package Barcode Label</div>
                                            @if($summaryData['similarities']->fg_label_mn)
                                                <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M9 12l2 2 4-4"/>
                                                    </svg>
                                                </div>
                                            @else
                                                <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                            @endif
                                        </div>
                                        <div class="text-sm font-semibold text-gray-800 truncate">
                                            {{ $summaryData['similarities']->fg_label_mn ?: 'Not specified' }}
                                        </div>
                                    </div>
                                    @if($summaryData['similarities']->vmi_qr_mn)
                                    <div class="bg-white rounded-lg border border-gray-200 p-3">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="text-xs font-medium text-gray-600 uppercase">VMI Label</div>
                                            <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M9 12l2 2 4-4"/>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="text-sm font-semibold text-gray-800 truncate">
                                            {{ $summaryData['similarities']->vmi_qr_mn ?: 'Not specified' }}
                                        </div>
                                    </div>
                                    @endif
                                    <div class="bg-white rounded-lg border border-gray-200 p-3">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="text-xs font-medium text-gray-600 uppercase">Box Barcode Label</div>
                                            @if($summaryData['similarities']->mc_label_mn)
                                                <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M9 12l2 2 4-4"/>
                                                    </svg>
                                                </div>
                                            @else
                                                <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                            @endif
                                        </div>
                                        <div class="text-sm font-semibold text-gray-800 truncate">
                                            {{ $summaryData['similarities']->mc_label_mn ?: 'Not specified' }}
                                        </div>
                                    </div>
                                    <div class="bg-white rounded-lg border border-gray-200 p-3">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="text-xs font-medium text-gray-600 uppercase">Pallet Label</div>
                                            @if($summaryData['similarities']->pallet_label_mn)
                                                <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M9 12l2 2 4-4"/>
                                                    </svg>
                                                </div>
                                            @else
                                                <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                            @endif
                                        </div>
                                        <div class="text-sm font-semibold text-gray-800 truncate">
                                            {{ $summaryData['similarities']->pallet_label_mn ?: 'Not specified' }}
                                        </div>
                                    </div>
                                    <div class="bg-white rounded-lg border border-gray-200 p-3">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="text-xs font-medium text-gray-600 uppercase">Shipping Label</div>
                                            @if($summaryData['similarities']->shipping_label_mn)
                                                <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M9 12l2 2 4-4"/>
                                                    </svg>
                                                </div>
                                            @else
                                                <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                            @endif
                                        </div>
                                        <div class="text-sm font-semibold text-gray-800 truncate">
                                            {{ $summaryData['similarities']->shipping_label_mn ?: 'Not specified' }}
                                        </div>
                                    </div>
                                    @if($summaryData['similarities']->sir_mn)
                                    <div class="bg-white rounded-lg border border-gray-200 p-3">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="text-xs font-medium text-gray-600 uppercase">Specific Inspection Report</div>
                                            <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M9 12l2 2 4-4"/>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="text-sm font-semibold text-gray-800 truncate">
                                            {{ $summaryData['similarities']->sir_mn ?: 'Not specified' }}
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <!-- Quantity Verification -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                    <div class="bg-white rounded-lg border border-gray-200 p-3">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="text-xs font-medium text-gray-600 uppercase">Same Model</div>
                                            @if($summaryData['similarities']->same_model_mn !== null)
                                                @if($summaryData['similarities']->same_model_mn)
                                                    <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M9 12l2 2 4-4"/>
                                                        </svg>
                                                    </div>
                                                @else
                                                    <div class="w-5 h-5 bg-red-500 rounded-full flex items-center justify-center">
                                                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M6 18L18 6M6 6l12 12"/>
                                                        </svg>
                                                    </div>
                                                @endif
                                            @else
                                                <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                            @endif
                                        </div>
                                        <div class="text-sm font-semibold text-gray-800">
                                            @if($summaryData['similarities']->same_model_mn === null)
                                                Not verified
                                            @elseif($summaryData['similarities']->same_model_mn)
                                                YES - All same
                                            @else
                                                NO - Different quantities
                                            @endif
                                        </div>
                                    </div>

                                    <div class="bg-white rounded-lg border border-gray-200 p-3">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="text-xs font-medium text-gray-600 uppercase">Judgement</div>
                                            @if($summaryData['similarities']->judgement_mn !== null)
                                                @if($summaryData['similarities']->judgement_mn)
                                                    <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M9 12l2 2 4-4"/>
                                                        </svg>
                                                    </div>
                                                @else
                                                    <div class="w-5 h-5 bg-red-500 rounded-full flex items-center justify-center">
                                                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M6 18L18 6M6 6l12 12"/>
                                                        </svg>
                                                    </div>
                                                @endif
                                            @else
                                                <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                            @endif
                                        </div>
                                        <div class="text-sm font-semibold text-gray-800">
                                            @if($summaryData['similarities']->judgement_mn === null)
                                                Not judged
                                            @elseif($summaryData['similarities']->judgement_mn)
                                                OK
                                            @else
                                                NG
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Model Code Summary -->
                            <div class="mb-6">
                                <div class="flex items-center mb-3">
                                    <svg class="w-4 h-4 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h7.586a1 1 0 01.707.293l2.414 2.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    <h4 class="text-base font-semibold text-gray-700">Model Code</h4>
                                </div>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mb-4">
                                    <div class="bg-white rounded-lg border border-gray-200 p-3">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="text-xs font-medium text-gray-600 uppercase">Pick List</div>
                                            @if($summaryData['similarities']->picklist_mc)
                                                <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M9 12l2 2 4-4"/>
                                                    </svg>
                                                </div>
                                            @else
                                                <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                            @endif
                                        </div>
                                        <div class="text-sm font-semibold text-gray-800 truncate">
                                            {{ $summaryData['similarities']->picklist_mc ?: 'Not specified' }}
                                        </div>
                                    </div>
                                    <div class="bg-white rounded-lg border border-gray-200 p-3">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="text-xs font-medium text-gray-600 uppercase">Shipping Invoice</div>
                                            @if($summaryData['similarities']->shipping_invoice_mc)
                                                <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M9 12l2 2 4-4"/>
                                                    </svg>
                                                </div>
                                            @else
                                                <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                            @endif
                                        </div>
                                        <div class="text-sm font-semibold text-gray-800 truncate">
                                            {{ $summaryData['similarities']->shipping_invoice_mc ?: 'Not specified' }}
                                        </div>
                                    </div>
                                    <div class="bg-white rounded-lg border border-gray-200 p-3">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="text-xs font-medium text-gray-600 uppercase">SEREM</div>
                                            @if($summaryData['similarities']->serem_mc)
                                                <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M9 12l2 2 4-4"/>
                                                    </svg>
                                                </div>
                                            @else
                                                <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                            @endif
                                        </div>
                                        <div class="text-sm font-semibold text-gray-800 truncate">
                                            {{ $summaryData['similarities']->serem_mc ?: 'Not specified' }}
                                        </div>
                                    </div>
                                    @if($summaryData['similarities']->sir_mc)
                                    <div class="bg-white rounded-lg border border-gray-200 p-3">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="text-xs font-medium text-gray-600 uppercase">Specific Inspection Report</div>
                                            <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M9 12l2 2 4-4"/>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="text-sm font-semibold text-gray-800 truncate">
                                            {{ $summaryData['similarities']->sir_mc ?: 'Not specified' }}
                                        </div>
                                    </div>
                                    @endif
                                    <div class="bg-white rounded-lg border border-gray-200 p-3">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="text-xs font-medium text-gray-600 uppercase">Shipping Label</div>
                                            @if($summaryData['similarities']->shipping_label_mc)
                                                <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M9 12l2 2 4-4"/>
                                                    </svg>
                                                </div>
                                            @else
                                                <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                            @endif
                                        </div>
                                        <div class="text-sm font-semibold text-gray-800 truncate">
                                            {{ $summaryData['similarities']->shipping_label_mc ?: 'Not specified' }}
                                        </div>
                                    </div>
                                    @if($summaryData['similarities']->vmi_label_mc)
                                    <div class="bg-white rounded-lg border border-gray-200 p-3">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="text-xs font-medium text-gray-600 uppercase">VMI Label</div>
                                            <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M9 12l2 2 4-4"/>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="text-sm font-semibold text-gray-800 truncate">
                                            {{ $summaryData['similarities']->vmi_label_mc ?: 'Not specified' }}
                                        </div>
                                    </div>
                                    @endif
                                    <div class="bg-white rounded-lg border border-gray-200 p-3">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="text-xs font-medium text-gray-600 uppercase">Box Barcode Label</div>
                                            @if($summaryData['similarities']->mc_barcode_mc)
                                                <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M9 12l2 2 4-4"/>
                                                    </svg>
                                                </div>
                                            @else
                                                <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                            @endif
                                        </div>
                                        <div class="text-sm font-semibold text-gray-800 truncate">
                                            {{ $summaryData['similarities']->mc_barcode_mc ?: 'Not specified' }}
                                        </div>
                                    </div>
                                    <div class="bg-white rounded-lg border border-gray-200 p-3">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="text-xs font-medium text-gray-600 uppercase">Pallet Label</div>
                                            @if($summaryData['similarities']->pallet_label_mc)
                                                <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M9 12l2 2 4-4"/>
                                                    </svg>
                                                </div>
                                            @else
                                                <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                            @endif
                                        </div>
                                        <div class="text-sm font-semibold text-gray-800 truncate">
                                            {{ $summaryData['similarities']->pallet_label_mc ?: 'Not specified' }}
                                        </div>
                                    </div>
                                    @if($summaryData['similarities']->specific_qr_label_mc)
                                    <div class="bg-white rounded-lg border border-gray-200 p-3">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="text-xs font-medium text-gray-600 uppercase">Specific Label/QR Code Label</div>
                                                <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M9 12l2 2 4-4"/>
                                                    </svg>
                                                </div>
                                        </div>
                                        <div class="text-sm font-semibold text-gray-800 truncate">
                                            {{ $summaryData['similarities']->specific_qr_label_mc ?: 'Not specified' }}
                                        </div>
                                    </div>
                                    @endif
                                    <div class="bg-white rounded-lg border border-gray-200 p-3">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="text-xs font-medium text-gray-600 uppercase">Package  Barcode Label</div>
                                            @if($summaryData['similarities']->package_mc)
                                                <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M9 12l2 2 4-4"/>
                                                    </svg>
                                                </div>
                                            @else
                                                <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                            @endif
                                        </div>
                                        <div class="text-sm font-semibold text-gray-800 truncate">
                                            {{ $summaryData['similarities']->package_mc ?: 'Not specified' }}
                                        </div>
                                    </div>
                                </div>

                                <!-- Quantity Verification -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                    <div class="bg-white rounded-lg border border-gray-200 p-3">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="text-xs font-medium text-gray-600 uppercase">Same Model Code</div>
                                            @if($summaryData['similarities']->same_mc !== null)
                                                @if($summaryData['similarities']->same_mc)
                                                    <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M9 12l2 2 4-4"/>
                                                        </svg>
                                                    </div>
                                                @else
                                                    <div class="w-5 h-5 bg-red-500 rounded-full flex items-center justify-center">
                                                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M6 18L18 6M6 6l12 12"/>
                                                        </svg>
                                                    </div>
                                                @endif
                                            @else
                                                <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                            @endif
                                        </div>
                                        <div class="text-sm font-semibold text-gray-800">
                                            @if($summaryData['similarities']->same_mc === null)
                                                Not verified
                                            @elseif($summaryData['similarities']->same_mc)
                                                YES - All same
                                            @else
                                                NO - Different quantities
                                            @endif
                                        </div>
                                    </div>

                                    <div class="bg-white rounded-lg border border-gray-200 p-3">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="text-xs font-medium text-gray-600 uppercase">Judgement</div>
                                            @if($summaryData['similarities']->judgement_mc !== null)
                                                @if($summaryData['similarities']->judgement_mc)
                                                    <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M9 12l2 2 4-4"/>
                                                        </svg>
                                                    </div>
                                                @else
                                                    <div class="w-5 h-5 bg-red-500 rounded-full flex items-center justify-center">
                                                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M6 18L18 6M6 6l12 12"/>
                                                        </svg>
                                                    </div>
                                                @endif
                                            @else
                                                <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                            @endif
                                        </div>
                                        <div class="text-sm font-semibold text-gray-800">
                                            @if($summaryData['similarities']->judgement_mc === null)
                                                Not judged
                                            @elseif($summaryData['similarities']->judgement_mc)
                                                OK
                                            @else
                                                NG
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Part Number Summary -->
                            <div class="mb-6">
                                <div class="flex items-center mb-3">
                                    <svg class="w-4 h-4 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h7.586a1 1 0 01.707.293l2.414 2.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    <h4 class="text-base font-semibold text-gray-700">Part Number</h4>
                                </div>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mb-4">
                                    <div class="bg-white rounded-lg border border-gray-200 p-3">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="text-xs font-medium text-gray-600 uppercase">Shipping Invoice</div>
                                            @if($summaryData['similarities']->shipping_invoice_pn)
                                                <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M9 12l2 2 4-4"/>
                                                    </svg>
                                                </div>
                                            @else
                                                <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                            @endif
                                        </div>
                                        <div class="text-sm font-semibold text-gray-800 truncate">
                                            {{ $summaryData['similarities']->shipping_invoice_pn ?: 'Not specified' }}
                                        </div>
                                    </div>
                                    <div class="bg-white rounded-lg border border-gray-200 p-3">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="text-xs font-medium text-gray-600 uppercase">SEREM</div>
                                            @if($summaryData['similarities']->serem_pn)
                                                <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M9 12l2 2 4-4"/>
                                                    </svg>
                                                </div>
                                            @else
                                                <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                            @endif
                                        </div>
                                        <div class="text-sm font-semibold text-gray-800 truncate">
                                            {{ $summaryData['similarities']->serem_pn ?: 'Not specified' }}
                                        </div>
                                    </div>
                                    @if($summaryData['similarities']->sir_pn)
                                    <div class="bg-white rounded-lg border border-gray-200 p-3">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="text-xs font-medium text-gray-600 uppercase">Specific Inspection Report</div>
                                            <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M9 12l2 2 4-4"/>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="text-sm font-semibold text-gray-800 truncate">
                                            {{ $summaryData['similarities']->sir_pn ?: 'Not specified' }}
                                        </div>
                                    </div>
                                    @endif
                                    <div class="bg-white rounded-lg border border-gray-200 p-3">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="text-xs font-medium text-gray-600 uppercase">Shipping Label</div>
                                            @if($summaryData['similarities']->shipping_label_pn)
                                                <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M9 12l2 2 4-4"/>
                                                    </svg>
                                                </div>
                                            @else
                                                <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                            @endif
                                        </div>
                                        <div class="text-sm font-semibold text-gray-800 truncate">
                                            {{ $summaryData['similarities']->shipping_label_pn ?: 'Not specified' }}
                                        </div>
                                    </div>
                                    @if($summaryData['similarities']->vmi_pn)
                                    <div class="bg-white rounded-lg border border-gray-200 p-3">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="text-xs font-medium text-gray-600 uppercase">VMI Label</div>
                                            <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M9 12l2 2 4-4"/>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="text-sm font-semibold text-gray-800 truncate">
                                            {{ $summaryData['similarities']->vmi_pn ?: 'Not specified' }}
                                        </div>
                                    </div>
                                    @endif
                                    <div class="bg-white rounded-lg border border-gray-200 p-3">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="text-xs font-medium text-gray-600 uppercase">Package Barcode Label</div>
                                            @if($summaryData['similarities']->package_pn)
                                                <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M9 12l2 2 4-4"/>
                                                    </svg>
                                                </div>
                                            @else
                                                <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                            @endif
                                        </div>
                                        <div class="text-sm font-semibold text-gray-800 truncate">
                                            {{ $summaryData['similarities']->package_pn ?: 'Not specified' }}
                                        </div>
                                    </div>
                                    @if($summaryData['similarities']->qr_qa_pn)
                                    <div class="bg-white rounded-lg border border-gray-200 p-3">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="text-xs font-medium text-gray-600 uppercase">Specific Label/QR Code (Provided By QA)</div>
                                            <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M9 12l2 2 4-4"/>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="text-sm font-semibold text-gray-800 truncate">
                                            {{ $summaryData['similarities']->qr_qa_pn ?: 'Not specified' }}
                                        </div>
                                    </div>
                                    @endif
                                    @if($summaryData['similarities']->qr_mgtz_pn)
                                    <div class="bg-white rounded-lg border border-gray-200 p-3">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="text-xs font-medium text-gray-600 uppercase">Specific Label/QR Code (Provided By MGTZ)</div>
                                            <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M9 12l2 2 4-4"/>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="text-sm font-semibold text-gray-800 truncate">
                                            {{ $summaryData['similarities']->qr_mgtz_pn ?: 'Not specified' }}
                                        </div>
                                    </div>
                                    @endif
                                    @if($summaryData['similarities']->qr_mc_pn)
                                    <div class="bg-white rounded-lg border border-gray-200 p-3">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="text-xs font-medium text-gray-600 uppercase">Specific Label/QR Code (Provided By MC)</div>
                                            <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M9 12l2 2 4-4"/>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="text-sm font-semibold text-gray-800 truncate">
                                            {{ $summaryData['similarities']->qr_mc_pn ?: 'Not specified' }}
                                        </div>
                                    </div>
                                    @endif
                                    <div class="bg-white rounded-lg border border-gray-200 p-3">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="text-xs font-medium text-gray-600 uppercase">Pallet Label</div>
                                            @if($summaryData['similarities']->pallet_label_pn)
                                                <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M9 12l2 2 4-4"/>
                                                    </svg>
                                                </div>
                                            @else
                                                <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                            @endif
                                        </div>
                                        <div class="text-sm font-semibold text-gray-800 truncate">
                                            {{ $summaryData['similarities']->pallet_label_pn ?: 'Not specified' }}
                                        </div>
                                    </div>
                                    @if($summaryData['similarities']->sci_label_pn)
                                    <div class="bg-white rounded-lg border border-gray-200 p-3">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="text-xs font-medium text-gray-600 uppercase">SCI Label</div>
                                            <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M9 12l2 2 4-4"/>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="text-sm font-semibold text-gray-800 truncate">
                                            {{ $summaryData['similarities']->sci_label_pn ?: 'Not specified' }}
                                        </div>
                                    </div>
                                    @endif
                                </div>

                                <!-- Quantity Verification -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                    <div class="bg-white rounded-lg border border-gray-200 p-3">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="text-xs font-medium text-gray-600 uppercase">Same Part Number</div>
                                            @if($summaryData['similarities']->same_pn !== null)
                                                @if($summaryData['similarities']->same_pn)
                                                    <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M9 12l2 2 4-4"/>
                                                        </svg>
                                                    </div>
                                                @else
                                                    <div class="w-5 h-5 bg-red-500 rounded-full flex items-center justify-center">
                                                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M6 18L18 6M6 6l12 12"/>
                                                        </svg>
                                                    </div>
                                                @endif
                                            @else
                                                <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                            @endif
                                        </div>
                                        <div class="text-sm font-semibold text-gray-800">
                                            @if($summaryData['similarities']->same_pn === null)
                                                Not verified
                                            @elseif($summaryData['similarities']->same_pn)
                                                YES - All same
                                            @else
                                                NO - Different quantities
                                            @endif
                                        </div>
                                    </div>

                                    <div class="bg-white rounded-lg border border-gray-200 p-3">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="text-xs font-medium text-gray-600 uppercase">Judgement</div>
                                            @if($summaryData['similarities']->judgement_pn !== null)
                                                @if($summaryData['similarities']->judgement_pn)
                                                    <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M9 12l2 2 4-4"/>
                                                        </svg>
                                                    </div>
                                                @else
                                                    <div class="w-5 h-5 bg-red-500 rounded-full flex items-center justify-center">
                                                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M6 18L18 6M6 6l12 12"/>
                                                        </svg>
                                                    </div>
                                                @endif
                                            @else
                                                <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                            @endif
                                        </div>
                                        <div class="text-sm font-semibold text-gray-800">
                                            @if($summaryData['similarities']->judgement_pn === null)
                                                Not judged
                                            @elseif($summaryData['similarities']->judgement_pn)
                                                OK
                                            @else
                                                NG
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- PO Number Verification Summary -->
                            <div class="mb-6">
                                <div class="flex items-center mb-3">
                                    <svg class="w-4 h-4 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h7.586a1 1 0 01.707.293l2.414 2.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    <h4 class="text-base font-semibold text-gray-700">PO Number Verification</h4>
                                </div>

                                <!-- SEREM PO -->
                                <div class="mb-4">
                                    <div class="bg-gray-50 rounded-lg p-3 border border-gray-200">
                                        <h5 class="text-sm font-semibold text-gray-800 mb-2 flex items-center">
                                            <div class="w-3 h-3 bg-gray-800 rounded mr-2"></div>
                                            SEREM
                                        </h5>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                            <div class="text-xs">
                                                <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs mr-2">CUSTOMER</span>
                                                <span class="font-medium">{{ $summaryData['similarities']->serem_customer_po ?: 'Not specified' }}</span>
                                            </div>
                                            <div class="text-xs">
                                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs mr-2">INTERNAL</span>
                                                <span class="font-medium">{{ $summaryData['similarities']->serem_smp_po ?: 'Not specified' }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Shipping Label PO -->
                                <div class="mb-4">
                                    <div class="bg-orange-50 rounded-lg p-3 border border-orange-200">
                                        <h5 class="text-sm font-semibold text-gray-800 mb-2 flex items-center">
                                            <div class="w-3 h-3 bg-orange-600 rounded mr-2"></div>
                                            SHIPPING LABEL
                                            <span class="ml-2 bg-orange-200 text-orange-800 px-2 py-1 rounded text-xs">OTHER MODEL</span>
                                        </h5>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                            <div class="text-xs">
                                                <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs mr-2">CUSTOMER</span>
                                                <span class="font-medium">{{ $summaryData['similarities']->shipping_label_customer_po ?: 'Not specified' }}</span>
                                            </div>
                                            <div class="text-xs">
                                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs mr-2">INTERNAL</span>
                                                <span class="font-medium">{{ $summaryData['similarities']->shipping_label_smp_po ?: 'Not specified' }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- VMI Label PO (Conditional) -->
                                @if($summaryData['similarities']->vmi_customer_po || $summaryData['similarities']->vmi_smp_po)
                                <div class="mb-4">
                                    <div class="bg-purple-50 rounded-lg p-3 border border-purple-200">
                                        <h5 class="text-sm font-semibold text-gray-800 mb-2 flex items-center">
                                            <div class="w-3 h-3 bg-purple-600 rounded mr-2"></div>
                                            VMI LABEL
                                            <span class="ml-2 bg-purple-200 text-purple-800 px-2 py-1 rounded text-xs">MIN, MOR, MIS ONLY</span>
                                        </h5>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                            <div class="text-xs">
                                                <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs mr-2">CUSTOMER</span>
                                                <span class="font-medium">{{ $summaryData['similarities']->vmi_customer_po ?: 'Not specified' }}</span>
                                            </div>
                                            <div class="text-xs">
                                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs mr-2">INTERNAL</span>
                                                <span class="font-medium">{{ $summaryData['similarities']->vmi_smp_po ?: 'Not specified' }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                <!-- SIR PO (Conditional) -->
                                @if($summaryData['similarities']->sir_customer_po || $summaryData['similarities']->sir_smp_po)
                                <div class="mb-4">
                                    <div class="bg-red-50 rounded-lg p-3 border border-red-200">
                                        <h5 class="text-sm font-semibold text-gray-800 mb-2 flex items-center">
                                            <div class="w-3 h-3 bg-red-600 rounded mr-2"></div>
                                            SPECIFIC INSPECTION REPORT (SIR)
                                        </h5>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                            <div class="text-xs">
                                                <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs mr-2">CUSTOMER</span>
                                                <span class="font-medium">{{ $summaryData['similarities']->sir_customer_po ?: 'Not specified' }}</span>
                                            </div>
                                            <div class="text-xs">
                                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs mr-2">INTERNAL</span>
                                                <span class="font-medium">{{ $summaryData['similarities']->sir_smp_po ?: 'Not specified' }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                <!-- Pallet Label PO -->
                                <div class="mb-4">
                                    <div class="bg-yellow-50 rounded-lg p-3 border border-yellow-200">
                                        <h5 class="text-sm font-semibold text-gray-800 mb-2 flex items-center">
                                            <div class="w-3 h-3 bg-yellow-600 rounded mr-2"></div>
                                            PALLET LABEL
                                        </h5>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                            <div class="text-xs">
                                                <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs mr-2">CUSTOMER</span>
                                                <span class="font-medium">{{ $summaryData['similarities']->pallet_label_customer_po ?: 'Not specified' }}</span>
                                            </div>
                                            <div class="text-xs">
                                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs mr-2">INTERNAL</span>
                                                <span class="font-medium">{{ $summaryData['similarities']->pallet_label_smp_po ?: 'Not specified' }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Specific Label PO (Conditional) -->
                                @if($summaryData['similarities']->specific_label_customer_po || $summaryData['similarities']->specific_label_smp_po)
                                <div class="mb-4">
                                    <div class="bg-indigo-50 rounded-lg p-3 border border-indigo-200">
                                        <h5 class="text-sm font-semibold text-gray-800 mb-2 flex items-center">
                                            <div class="w-3 h-3 bg-indigo-600 rounded mr-2"></div>
                                            SPECIFIC LABEL / QR CODE
                                        </h5>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                            <div class="text-xs">
                                                <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs mr-2">CUSTOMER</span>
                                                <span class="font-medium">{{ $summaryData['similarities']->specific_label_customer_po ?: 'Not specified' }}</span>
                                            </div>
                                            <div class="text-xs">
                                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs mr-2">INTERNAL</span>
                                                <span class="font-medium">{{ $summaryData['similarities']->specific_label_smp_po ?: 'Not specified' }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                <!-- PO Verification -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                    <div class="bg-white rounded-lg border border-gray-200 p-3">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="text-xs font-medium text-gray-600 uppercase">Same PO Numbers</div>
                                            @if($summaryData['similarities']->same_po !== null)
                                                @if($summaryData['similarities']->same_po)
                                                    <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M9 12l2 2 4-4"/>
                                                        </svg>
                                                    </div>
                                                @else
                                                    <div class="w-5 h-5 bg-red-500 rounded-full flex items-center justify-center">
                                                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M6 18L18 6M6 6l12 12"/>
                                                        </svg>
                                                    </div>
                                                @endif
                                            @else
                                                <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                            @endif
                                        </div>
                                        <div class="text-sm font-semibold text-gray-800">
                                            @if($summaryData['similarities']->same_po === null)
                                                Not verified
                                            @elseif($summaryData['similarities']->same_po)
                                                YES - All same
                                            @else
                                                NO - Different PO numbers
                                            @endif
                                        </div>
                                    </div>

                                    <div class="bg-white rounded-lg border border-gray-200 p-3">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="text-xs font-medium text-gray-600 uppercase">Judgement</div>
                                            @if($summaryData['similarities']->judgement_po !== null)
                                                @if($summaryData['similarities']->judgement_po)
                                                    <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M9 12l2 2 4-4"/>
                                                        </svg>
                                                    </div>
                                                @else
                                                    <div class="w-5 h-5 bg-red-500 rounded-full flex items-center justify-center">
                                                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M6 18L18 6M6 6l12 12"/>
                                                        </svg>
                                                    </div>
                                                @endif
                                            @else
                                                <div class="w-5 h-5 bg-gray-300 rounded-full"></div>
                                            @endif
                                        </div>
                                        <div class="text-sm font-semibold text-gray-800">
                                            @if($summaryData['similarities']->judgement_po === null)
                                                Not judged
                                            @elseif($summaryData['similarities']->judgement_po)
                                                OK
                                            @else
                                                NG
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Similarities Checking Status Summary -->
                            <div class="bg-gradient-to-r from-yellow-50 to-yellow-100 rounded-lg p-4 border border-yellow-200">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-3">
                                        <div class="bg-yellow-500 rounded-full p-2">
                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="font-semibold text-gray-800">Similarities Checking Status</div>
                                            <div class="text-sm text-gray-600">
                                                @php
                                                    $completedFields = collect([
                                                        // Quantity fields
                                                        $summaryData['similarities']->pick_list_qs ? 1 : 0,
                                                        $summaryData['similarities']->shipping_invoice_qs ? 1 : 0,
                                                        $summaryData['similarities']->serem_qs ? 1 : 0,
                                                        $checklistInfo->sir_qs ? $summaryData['similarities']->sir_qs ?? null : null,
                                                        $summaryData['similarities']->same_quantity_qs !== null ? 1 : 0,
                                                        $summaryData['similarities']->judgement_qs !== null ? 1 : 0,
                                                        // Number Of Boxes
                                                        $summaryData['similarities']->packing_slip_bs ? 1 : 0,
                                                        $summaryData['similarities']->picklist_bs ? 1 : 0,
                                                        $summaryData['similarities']->pallet_label_bs ? 1 : 0,
                                                        $summaryData['similarities']->same_box_bs !== null ? 1 : 0,
                                                        $summaryData['similarities']->judgement_po !== null ? 1 :0,
                                                        //Model Name
                                                        $summaryData['similarities']->picklist_mn ? 1 : 0,
                                                        $summaryData['similarities']->shipping_invoice_mn ? 1 : 0,
                                                        $summaryData['similarities']->serem_mn ? 1 : 0,
                                                        $summaryData['similarities']->fg_label_mn ? 1 : 0,
                                                        $checklistInfo->vmi_mn ? $summaryData['similarities']->vmi_qr_mn ?? null : null,
                                                        $summaryData['similarities']->mc_label_mn ? 1 : 0,
                                                        $summaryData['similarities']->pallet_label_mn ? 1 : 0,
                                                        $summaryData['similarities']->shipping_label_mn ? 1 : 0,
                                                        $checklistInfo->sir_mn ? $summaryData['similarities']->sir_mn ?? null : null,
                                                        $summaryData['similarities']->same_model_mn !== null ? 1 : 0,
                                                        $summaryData['similarities']->judgement_mn !== null ? 1 : 0,
                                                        //Model Code
                                                        $summaryData['similarities']->picklist_mc ? 1 : 0,
                                                        $summaryData['similarities']->shipping_invoice_mc ? 1 : 0,
                                                        $summaryData['similarities']->serem_mc ? 1 : 0,
                                                        $checklistInfo->sir_mc ? $summaryData['similarities']->sir_mc ?? null : null,
                                                        $summaryData['similarities']->shipping_label_mc ? 1 : 0,
                                                        $checklistInfo->vmi_mc ? $summaryData['similarities']->vmi_label_mc ?? null : null,
                                                        $summaryData['similarities']->mc_barcode_mc ? 1 : 0,
                                                        $summaryData['similarities']->pallet_label_mc ? 1 : 0,
                                                        $checklistInfo->specific_label_mc ? $summaryData['similarities']->specific_qr_label_mc ?? null : null,
                                                        $summaryData['similarities']->package_mc ? 1 : 0,
                                                        $summaryData['similarities']->same_mc !== null ? 1 : 0,
                                                        $summaryData['similarities']->judgement_mc !== null ? 1 : 0,
                                                        //Part Number
                                                        $summaryData['similarities']->shipping_invoice_pn ? 1 : 0,
                                                        $summaryData['similarities']->serem_pn ? 1 : 0,
                                                        $checklistInfo->sir_pn ? $summaryData['similarities']->sir_pn ?? null : null,
                                                        $summaryData['similarities']->shipping_label_pn ? 1 : 0,
                                                        $checklistInfo->vmi_pn ? $summaryData['similarities']->vmi_pn ?? null : null,
                                                        $summaryData['similarities']->package_pn ? 1 : 0,
                                                        $checklistInfo->qr_qa_pn ? $summaryData['similarities']->qr_qa_pn ?? null : null,
                                                        $checklistInfo->qr_mc_pn ? $summaryData['similarities']->qr_mc_pn ?? null : null,
                                                        $checklistInfo->qr_mgtz_pn ? $summaryData['similarities']->qr_mgtz_pn ?? null : null,
                                                        $checklistInfo->sci_label_pn ? $summaryData['similarities']->sci_label_pn ?? null : null,
                                                        $summaryData['similarities']->pallet_label_pn ? 1 : 0,
                                                        $summaryData['similarities']->same_pn !== null ? 1 : 0,
                                                        $summaryData['similarities']->judgement_pn !== null ? 1 : 0,
                                                        // PO fields
                                                        ($summaryData['similarities']->serem_customer_po || $summaryData['similarities']->serem_smp_po) ? 1 : 0,
                                                        ($summaryData['similarities']->shipping_label_customer_po || $summaryData['similarities']->shipping_label_smp_po) ? 1 : 0,
                                                        ($summaryData['similarities']->pallet_label_customer_po || $summaryData['similarities']->pallet_label_smp_po) ? 1 : 0,
                                                        $checklistInfo->sir_po ? ($summaryData['similarities']->sir_customer_po || $summaryData['similarities']->sir_smp_po) ?? null : null,
                                                        $checklistInfo->vmi_po ? ($summaryData['similarities']->vmi_customer_po || $summaryData['similarities']->vmi_smp_po) ?? null : null,
                                                        $checklistInfo->specific_label_po ? ($summaryData['similarities']->specific_label_customer_po || $summaryData['similarities']->specific_label_smp_po) ?? null : null,
                                                        $summaryData['similarities']->same_po !== null ? 1 : 0,
                                                        $summaryData['similarities']->judgement_po !== null ? 1 : 0,
                                                    ])->filter()->count();
                                                    $totalFields = 40;
                                                    if($checklistInfo->sir_qs){$totalFields++;}
                                                    if($checklistInfo->vmi_mn){$totalFields++;}
                                                    if($checklistInfo->sir_mn){$totalFields++;}
                                                    if($checklistInfo->sir_mc){$totalFields++;}
                                                    if($checklistInfo->specific_label_mc){$totalFields++;}
                                                    if($checklistInfo->vmi_mc){$totalFields++;}
                                                    if($checklistInfo->sir_pn){$totalFields++;}
                                                    if($checklistInfo->vmi_pn){$totalFields++;}
                                                    if($checklistInfo->qr_qa_pn){$totalFields++;}
                                                    if($checklistInfo->qr_mc_pn){$totalFields++;}
                                                    if($checklistInfo->qr_mgtz_pn){$totalFields++;}
                                                    if($checklistInfo->sci_label_pn){$totalFields++;}
                                                    if($checklistInfo->sir_po){$totalFields++;}
                                                    if($checklistInfo->vmi_po){$totalFields++;}
                                                    if($checklistInfo->specific_label_po){$totalFields++;}
                                                    $percentage = $totalFields > 0 ? round(($completedFields / $totalFields) * 100) : 0;
                                                @endphp
                                                {{ $completedFields }} of {{ $totalFields }} sections completed ({{ $percentage }}%)
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-2xl font-bold text-yellow-600">{{ $percentage }}%</div>
                                        <div class="w-20 h-2 bg-gray-200 rounded-full mt-1">
                                            <div class="h-2 bg-yellow-500 rounded-full transition-all duration-300" style="width: {{ $percentage }}%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if($summaryData['overall'])
                        <div class="form-section">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center space-x-2">
                                <svg class="w-5 h-5 text-indigo-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                </svg>
                                <span>Box/Pallet Condition Inspection</span>
                            </h3>

                            <!-- Expiration Date -->
                            @if($summaryData['overall']->expiration_date)
                            <div class="mb-6">
                                <div class="bg-orange-50 rounded-lg border border-orange-200 p-4">
                                    <div class="flex items-center space-x-3">
                                        <div class="bg-orange-500 rounded-full p-2">
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium text-orange-700 uppercase">Expiration Date</div>
                                            <div class="text-base font-semibold text-gray-800">
                                                {{ \Carbon\Carbon::parse($summaryData['overall']->expiration_date)->format('M d, Y') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif

                            <!-- Box Inspection Data -->
                            <div class="mb-6">
                                <h4 class="text-base font-semibold text-gray-700 mb-3 flex items-center space-x-2">
                                    <svg class="w-4 h-4 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M20 6L9 17l-5-5"/>
                                    </svg>
                                    <span>Box Inspection Summary</span>
                                </h4>

                                @php
                                    $boxData = collect($summaryData['overall']->items ?? [])->filter(function($item) {
                                        return !empty($item->oqa) || !empty($item->box_no) || !empty($item->std_pack);
                                    });
                                @endphp

                                @if($boxData->isNotEmpty())
                                <div class="space-y-3">
                                    @foreach($boxData as $index => $item)
                                    <div class="bg-white rounded-lg border border-gray-200 p-4">
                                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                                            @if($item->oqa)
                                            <div>
                                                <div class="text-xs font-medium text-gray-600 uppercase mb-1">OQA Lot No.</div>
                                                <div class="text-sm font-semibold text-gray-800">{{ $item->oqa }}</div>
                                            </div>
                                            @endif
                                            @if($item->box_no)
                                            <div>
                                                <div class="text-xs font-medium text-gray-600 uppercase mb-1">Box No.</div>
                                                <div class="text-sm font-semibold text-gray-800">{{ $item->box_no }}</div>
                                            </div>
                                            @endif
                                            @if($item->std_pack)
                                            <div>
                                                <div class="text-xs font-medium text-gray-600 uppercase mb-1">Actual/Std Pack</div>
                                                <div class="text-sm font-semibold text-gray-800">{{ $item->std_pack }}</div>
                                            </div>
                                            @endif
                                        </div>

                                        <!-- Internal Packaging Status -->
                                        <div class="mb-4">
                                            <div class="text-xs font-medium text-red-600 uppercase mb-2">Internal Packaging</div>
                                            <div class="grid grid-cols-3 md:grid-cols-5 gap-2">
                                                @if(isset($item->internal_fg_label))
                                                <div class="flex items-center space-x-1">
                                                    @if($item->internal_fg_label)
                                                        <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                                    @else
                                                        <div class="w-6 h-6 bg-gray-300 rounded-full flex items-center justify-center">
                                                            <span class="text-[8px] text-gray-700 font-medium">N/A</span>
                                                        </div>
                                                    @endif
                                                    <span class="text-xs text-gray-600">FG Label</span>
                                                </div>
                                                @endif
                                                @if(isset($item->internal_specific_label))
                                                <div class="flex items-center space-x-1">
                                                    @if($item->internal_specific_label)
                                                        <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                                    @else
                                                        <div class="w-6 h-6 bg-gray-300 rounded-full flex items-center justify-center">
                                                            <span class="text-[8px] text-gray-700 font-medium">N/A</span>
                                                        </div>
                                                    @endif
                                                    <span class="text-xs text-gray-600">Spec Label</span>
                                                </div>
                                                @endif
                                                @if(isset($item->internal_carton_condition))
                                                <div class="flex items-center space-x-1">
                                                    @if($item->internal_carton_condition)
                                                        <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                                    @else
                                                        <div class="w-6 h-6 bg-gray-300 rounded-full flex items-center justify-center">
                                                            <span class="text-[8px] text-gray-700 font-medium">N/A</span>
                                                        </div>
                                                    @endif
                                                    <span class="text-xs text-gray-600">Carton</span>
                                                </div>
                                                @endif
                                                @if(isset($item->internal_magnet_pack))
                                                <div class="flex items-center space-x-1">
                                                    @if($item->internal_magnet_pack)
                                                        <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                                    @else
                                                        <div class="w-6 h-6 bg-gray-300 rounded-full flex items-center justify-center">
                                                            <span class="text-[8px] text-gray-700 font-medium">N/A</span>
                                                        </div>
                                                    @endif
                                                    <span class="text-xs text-gray-600">Magnet Pack</span>
                                                </div>
                                                @endif
                                                @if(isset($item->internal_magnet_pack))
                                                <div class="flex items-center space-x-1">
                                                    @if($item->internal_magnet_pack)
                                                        <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                                    @else
                                                        <div class="w-6 h-6 bg-gray-300 rounded-full flex items-center justify-center">
                                                            <span class="text-[8px] text-gray-700 font-medium">N/A</span>
                                                        </div>
                                                    @endif
                                                    <span class="text-xs text-gray-600">Magnet Condition</span>
                                                </div>
                                                @endif
                                                @if(isset($item->internal_dessicant))
                                                <div class="flex items-center space-x-1">
                                                    @if($item->internal_dessicant)
                                                        <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                                    @else
                                                        <div class="w-6 h-6 bg-gray-300 rounded-full flex items-center justify-center">
                                                            <span class="text-[8px] text-gray-700 font-medium">N/A</span>
                                                        </div>
                                                    @endif
                                                    <span class="text-xs text-gray-600">Dessicant</span>
                                                </div>
                                                @endif
                                                @if(isset($item->internal_spacer))
                                                <div class="flex items-center space-x-1">
                                                    @if($item->internal_spacer)
                                                        <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                                        <span class="text-xs text-gray-600"><strong>{{ $item->internal_spacer }}</strong> Spacer</span>
                                                    @else
                                                        <div class="w-6 h-6 bg-gray-300 rounded-full flex items-center justify-center">
                                                            <span class="text-[8px] text-gray-700 font-medium">N/A</span>
                                                        </div>
                                                    @endif
                                                    <span class="text-xs text-gray-600">Spacer</span>
                                                </div>
                                                @endif
                                                @if(isset($item->internal_sir))
                                                <div class="flex items-center space-x-1">
                                                    @if($item->internal_sir)
                                                        <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                                    @else
                                                        <div class="w-6 h-6 bg-gray-300 rounded-full flex items-center justify-center">
                                                            <span class="text-[8px] text-gray-700 font-medium">N/A</span>
                                                        </div>
                                                    @endif
                                                    <span class="text-xs text-gray-600">Specific Inspection Report</span>
                                                </div>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- External Packaging Status -->
                                        <div class="mb-4">
                                            <div class="text-xs font-medium text-blue-600 uppercase mb-2">External Packaging</div>
                                            <div class="grid grid-cols-3 md:grid-cols-4 gap-2">
                                                @if(isset($item->external_serem))
                                                <div class="flex items-center space-x-1">
                                                    @if($item->external_serem)
                                                        <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                                    @else
                                                        <div class="w-6 h-6 bg-gray-300 rounded-full flex items-center justify-center">
                                                            <span class="text-[8px] text-gray-700 font-medium">N/A</span>
                                                        </div>
                                                    @endif
                                                    <span class="text-xs text-gray-600">SEREM</span>
                                                </div>
                                                @endif
                                                @if(isset($item->external_ship_label))
                                                <div class="flex items-center space-x-1">
                                                    @if($item->external_ship_label)
                                                        <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                                    @else
                                                        <div class="w-6 h-6 bg-gray-300 rounded-full flex items-center justify-center">
                                                            <span class="text-[8px] text-gray-700 font-medium">N/A</span>
                                                        </div>
                                                    @endif
                                                    <span class="text-xs text-gray-600">Ship Label</span>
                                                </div>
                                                @endif
                                                @if(isset($item->external_vmi_label))
                                                <div class="flex items-center space-x-1">
                                                    @if($item->external_vmi_label)
                                                        <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                                    @else
                                                        <div class="w-6 h-6 bg-gray-300 rounded-full flex items-center justify-center">
                                                            <span class="text-[8px] text-gray-700 font-medium">N/A</span>
                                                        </div>
                                                    @endif
                                                    <span class="text-xs text-gray-600">VMI Label</span>
                                                </div>
                                                @endif
                                                @if(isset($item->external_mc_label))
                                                <div class="flex items-center space-x-1">
                                                    @if($item->external_mc_label)
                                                        <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                                    @else
                                                        <div class="w-6 h-6 bg-gray-300 rounded-full flex items-center justify-center">
                                                            <span class="text-[8px] text-gray-700 font-medium">N/A</span>
                                                        </div>
                                                    @endif
                                                    <span class="text-xs text-gray-600">Box Barcode Label</span>
                                                </div>
                                                @endif
                                                @if(isset($item->external_delivery_sheet))
                                                <div class="flex items-center space-x-1">
                                                    @if($item->external_delivery_sheet)
                                                        <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                                    @else
                                                        <div class="w-6 h-6 bg-gray-300 rounded-full flex items-center justify-center">
                                                            <span class="text-[8px] text-gray-700 font-medium">N/A</span>
                                                        </div>
                                                    @endif
                                                    <span class="text-xs text-gray-600">Delivery Sheet</span>
                                                </div>
                                                @endif
                                                @if(isset($item->external_specific_label))
                                                <div class="flex items-center space-x-1">
                                                    @if($item->external_specific_label)
                                                        <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                                    @else
                                                        <div class="w-6 h-6 bg-gray-300 rounded-full flex items-center justify-center">
                                                            <span class="text-[8px] text-gray-700 font-medium">N/A</span>
                                                        </div>
                                                    @endif
                                                    <span class="text-xs text-gray-600">Specific Label</span>
                                                </div>
                                                @endif
                                                @if(isset($item->external_flux_label))
                                                <div class="flex items-center space-x-1">
                                                    @if($item->external_flux_label)
                                                        <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                                    @else
                                                        <div class="w-6 h-6 bg-gray-300 rounded-full flex items-center justify-center">
                                                            <span class="text-[8px] text-gray-700 font-medium">N/A</span>
                                                        </div>
                                                    @endif
                                                    <span class="text-xs text-gray-600">Flux Label</span>
                                                </div>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Additional Info -->
                                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-xs">
                                            @if($item->identity_tape)
                                            <div>
                                                <span class="font-medium text-gray-600">Identity Tape:</span>
                                                <span class="ml-1 text-gray-800">{{ $item->identity_tape }}</span>
                                            </div>
                                            @endif
                                            @if($item->pick_list)
                                            <div>
                                                <span class="font-medium text-gray-600">Pick List:</span>
                                                <span class="ml-1 text-gray-800">{{ $item->pick_list }}</span>
                                            </div>
                                            @endif
                                            @if($item->remarks)
                                            <div>
                                                <span class="font-medium text-gray-600">Remarks:</span>
                                                <span class="ml-1 text-gray-800">{{ $item->remarks }}</span>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @endif
                            </div>

                            <!-- Pallet Verification Summary -->
                            <div class="mb-6">
                                <h4 class="text-base font-semibold text-gray-700 mb-3 flex items-center space-x-2">
                                    <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                    </svg>
                                    <span>Pallet Verification (1-20)</span>
                                </h4>

                                <div class="bg-white rounded-lg border border-gray-200 p-4">
                                    <div class="grid grid-cols-4 md:grid-cols-10 gap-2">
                                        @foreach($summaryData['overall']->pallets as $pallet)
                                        <div class="flex items-center justify-center p-2 rounded border {{ $pallet->value ? 'bg-green-50 border-green-200' : 'bg-gray-50 border-gray-200' }}">
                                            <div class="text-center">
                                                <div class="text-xs font-medium text-gray-600 mb-1">P{{ $pallet->pallet_index }}</div>
                                                @if($pallet->value)
                                                    <div class="w-4 h-4 bg-green-500 rounded-full mx-auto flex items-center justify-center">
                                                        <svg class="w-2.5 h-2.5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M9 12l2 2 4-4"/>
                                                        </svg>
                                                    </div>
                                                @else
                                                    <div class="w-4 h-4 bg-gray-300 rounded-full mx-auto"></div>
                                                @endif
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <!-- Results -->
                            @if($summaryData['overall']->results)
                            <div class="mb-6">
                                <div class="bg-indigo-50 rounded-lg border border-indigo-200 p-4">
                                    <div class="flex items-center space-x-3">
                                        <div class="bg-indigo-500 rounded-full p-2">
                                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium text-indigo-700 uppercase">Results</div>
                                            <div class="text-base font-semibold text-gray-800">{{ $summaryData['overall']->results }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif

                            <!-- Overall Status Summary -->
                            <div class="bg-gradient-to-r from-indigo-50 to-indigo-100 rounded-lg p-4 border border-indigo-200">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-3">
                                        <div class="bg-indigo-500 rounded-full p-2">
                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="font-semibold text-gray-800">Box/Pallet Inspection Status</div>
                                            <div class="text-sm text-gray-600">
                                                @php
                                                    $totalBoxes = $boxData->count();
                                                    $completedPallets = $summaryData['overall']->pallets->where('value', true)->count();

                                                    $hasBoxData = $totalBoxes > 0;
                                                    $hasPalletData = $completedPallets > 0;
                                                    $hasExpiration = !empty($summaryData['overall']->expiration_date);
                                                    $hasResults = !empty($summaryData['overall']->results);

                                                    $totalSections = 4;

                                                    $completedSections = 0;
                                                    if($hasBoxData) $completedSections++;
                                                    if($hasPalletData) $completedSections++;
                                                    if($hasExpiration) $completedSections++;
                                                    if($hasResults) $completedSections++;

                                                    $percentage = round(($completedSections / $totalSections) * 100);
                                                @endphp
                                                {{ $totalBoxes }} boxes inspected • {{ $completedPallets }} pallets verified
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-2xl font-bold text-indigo-600">{{ $percentage }}%</div>
                                        <div class="w-20 h-2 bg-gray-200 rounded-full mt-1">
                                            <div class="h-2 bg-indigo-500 rounded-full transition-all duration-300" style="width: {{ $percentage }}%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if($summaryData['personnel'])
                        <div class="form-section">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center space-x-2">
                                <svg class="w-5 h-5 text-teal-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                                </svg>
                                <span>Personnel Information</span>
                            </h3>

                            <!-- Basic Information Grid -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                                <!-- Shipping PIC -->
                                <div class="bg-white rounded-lg border border-gray-200 p-4">
                                    <div class="flex items-center justify-between mb-2">
                                        <div class="text-xs font-medium text-gray-600 uppercase flex items-center">
                                            <svg class="w-4 h-4 mr-1 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                            </svg>
                                            Shipping PIC
                                        </div>
                                        @if($summaryData['personnel']->shipping_pic)
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
                                        {{ $summaryData['personnel']->shipping_pic ?: 'Not specified' }}
                                    </div>
                                </div>

                                <!-- Date -->
                                <div class="bg-white rounded-lg border border-gray-200 p-4">
                                    <div class="flex items-center justify-between mb-2">
                                        <div class="text-xs font-medium text-gray-600 uppercase flex items-center">
                                            <svg class="w-4 h-4 mr-1 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                            Date
                                        </div>
                                        @if($summaryData['personnel']->date)
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
                                        @if($summaryData['personnel']->date)
                                            {{ \Carbon\Carbon::parse($summaryData['personnel']->date)->format('M d, Y') }}
                                        @else
                                            Not specified
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- OBA Verification Section -->
                            <div class="mb-6">
                                <div class="flex items-center mb-3">
                                    <svg class="w-4 h-4 mr-2 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <h4 class="text-base font-semibold text-gray-700">OBA Verification</h4>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                    <!-- OBA Checked By -->
                                    <div class="bg-white rounded-lg border border-gray-200 p-4">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="text-xs font-medium text-gray-600 uppercase flex items-center">
                                                <svg class="w-4 h-4 mr-1 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                OBA Checked By
                                            </div>
                                            @if($summaryData['personnel']->oba_checked_by)
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
                                            {{ $summaryData['personnel']->oba_checked_by ?: 'Not specified' }}
                                        </div>
                                    </div>

                                    <!-- OBA Judgement -->
                                    <div class="bg-white rounded-lg border border-gray-200 p-4">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="text-xs font-medium text-gray-600 uppercase flex items-center">
                                                <svg class="w-4 h-4 mr-1 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                                                </svg>
                                                OBA Judgement
                                            </div>
                                            @if($summaryData['personnel']->check_judgement)
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
                                            {{ $summaryData['personnel']->check_judgement ?: 'Not specified' }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- OBA Picture Documentation Section -->
                            <div class="mb-6">
                                <div class="flex items-center mb-3">
                                    <svg class="w-4 h-4 mr-2 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <h4 class="text-base font-semibold text-gray-700">OBA Picture Documentation</h4>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                    <!-- OBA Picture By -->
                                    <div class="bg-white rounded-lg border border-gray-200 p-4">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="text-xs font-medium text-gray-600 uppercase flex items-center">
                                                <svg class="w-4 h-4 mr-1 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                </svg>
                                                OBA Picture By
                                            </div>
                                            @if($summaryData['personnel']->oba_picture_by)
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
                                            {{ $summaryData['personnel']->oba_picture_by ?: 'Not specified' }}
                                        </div>
                                    </div>

                                    <!-- Picture Judgement -->
                                    <div class="bg-white rounded-lg border border-gray-200 p-4">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="text-xs font-medium text-gray-600 uppercase flex items-center">
                                                <svg class="w-4 h-4 mr-1 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                                                </svg>
                                                Picture Judgement
                                            </div>
                                            @if($summaryData['personnel']->picture_judgement)
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
                                            {{ $summaryData['personnel']->picture_judgement ?: 'Not specified' }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Personnel Status Summary -->
                            <div class="bg-gradient-to-r from-teal-50 to-teal-100 rounded-lg p-4 border border-teal-200">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-3">
                                        <div class="bg-teal-500 rounded-full p-2">
                                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="font-semibold text-gray-800">Personnel Information Status</div>
                                            <div class="text-sm text-gray-600">
                                                @php
                                                    $completedFields = collect([
                                                        $summaryData['personnel']->shipping_pic ? 1 : 0,
                                                        $summaryData['personnel']->date ? 1 : 0,
                                                        $summaryData['personnel']->oba_checked_by ? 1 : 0,
                                                        $summaryData['personnel']->check_judgement ? 1 : 0,
                                                        $summaryData['personnel']->oba_picture_by ? 1 : 0,
                                                        $summaryData['personnel']->picture_judgement ? 1 : 0,
                                                    ])->sum();
                                                    $totalFields = 6;
                                                    $percentage = $totalFields > 0 ? round(($completedFields / $totalFields) * 100) : 0;
                                                @endphp
                                                {{ $completedFields }} of {{ $totalFields }} fields completed ({{ $percentage }}%)
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-2xl font-bold text-teal-600">{{ $percentage }}%</div>
                                        <div class="w-20 h-2 bg-gray-200 rounded-full mt-1">
                                            <div class="h-2 bg-teal-500 rounded-full transition-all duration-300" style="width: {{ $percentage }}%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
