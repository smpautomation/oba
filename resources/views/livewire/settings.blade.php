<div class="max-w-6xl mx-auto px-4 py-8">
    <!-- Header -->
    <div class="gradient-bg text-white px-8 py-6 rounded-xl mb-8 form-container">
        <div class="flex items-center justify-center">
            <div class="bg-white/20 rounded-full p-3 mr-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
            </div>
            <div>
                <h1 class="text-3xl font-bold">Model Settings</h1>          
                <p class="text-white/80 mt-1">Configure toggle-able audit parameters</p>
            </div>
        </div>
    </div>

    <!-- Success Message -->
    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('message') }}
        </div>
    @endif

    <!-- Error Message -->
    @if (session()->has('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            {{ session('error') }}
        </div>
    @endif

    

    <!-- Model Selection Section -->
    <div class="section-card card-hover rounded-2xl shadow-lg p-6 mb-8 form-container">
        <div class="flex items-center space-x-3 mb-6">
            <div class="bg-blue-100 p-2 rounded-lg">
                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                </svg>
            </div>
            <h2 class="text-xl font-semibold text-gray-800">Model Configuration</h2>
        </div>
        
        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-6">
            <label for="model-select" class="block text-sm font-medium text-gray-700 mb-3">Select Model</label>
            <select id="model-select" wire:model.live="selectedModel" class="input-field select-focus w-full md:w-96 px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:outline-none bg-white">
                <option value="">Choose a model...</option>
                @foreach ($models as $model)
                    <option value="{{ $model->model_name }}">{{ $model->model_name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- Settings Sections (Only show if model is selected) -->
    @if(!empty($selectedModel))
    <div class="space-y-6">
        <!-- Prep Checklist Settings -->
        <div class="section-card card-hover rounded-2xl shadow-lg p-6 form-container">
            <div class="flex items-center space-x-3 mb-6">
                <div class="bg-green-100 p-2 rounded-lg">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h2 class="text-xl font-semibold text-gray-800">Preparation Checklist Settings</h2>
            </div>
            
            <div class="space-y-4">
                <div class="setting-item bg-white rounded-lg p-4 border border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="font-medium text-gray-900">Scanned QR Code</h3>
                            <p class="text-sm text-gray-500">Require QR code scanning during preparation checklist</p>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" wire:model.live="scanned_qr_pc">
                            <span class="toggle-slider round"></span>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Similarities Settings -->
        <div class="section-card card-hover rounded-2xl shadow-lg p-6 form-container">
            <div class="flex items-center space-x-3 mb-6">
                <div class="bg-purple-100 p-2 rounded-lg">
                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                    </svg>
                </div>
                <h2 class="text-xl font-semibold text-gray-800">Similarities Checking Settings</h2>
            </div>
            
            <div class="space-y-4">
                <h4 class="font-medium text-gray-900">Quantity For Shipment</h4>
                <div class="setting-item bg-white rounded-lg p-4 border border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="font-medium text-gray-900">Specific Inspection Report</h3>
                            <p class="text-sm text-gray-500">Require SIR checking</p>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" wire:model.live="sir_qs">
                            <span class="toggle-slider round"></span>
                        </label>
                    </div>
                </div>
            </div>
            
            <div class="space-y-4 mt-6">
                <h4 class="font-medium text-gray-900">Model Name</h4>
                <div class="setting-item bg-white rounded-lg p-4 border border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="font-medium text-gray-900">VMI Label</h3>
                            <p class="text-sm text-gray-500">Require VMI label checking</p>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" wire:model.live="vmi_mn">
                            <span class="toggle-slider round"></span>
                        </label>
                    </div>
                </div>
            </div>
            
            <div class="space-y-4 mt-6">
                <h4 class="font-medium text-gray-900">Model Code</h4>
                <div class="setting-item bg-white rounded-lg p-4 border border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="font-medium text-gray-900">Specific Inspection Report</h3>
                            <p class="text-sm text-gray-500">Require SIR checking</p>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" wire:model.live="sir_mc">
                            <span class="toggle-slider round"></span>
                        </label>
                    </div>
                </div>
                <div class="setting-item bg-white rounded-lg p-4 border border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="font-medium text-gray-900">VMI Label</h3>
                            <p class="text-sm text-gray-500">Require VMI label checking</p>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" wire:model.live="vmi_mc">
                            <span class="toggle-slider round"></span>
                        </label>
                    </div>
                </div>
                <div class="setting-item bg-white rounded-lg p-4 border border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="font-medium text-gray-900">Specific Label</h3>
                            <p class="text-sm text-gray-500">Require Specific label checking</p>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" wire:model.live="specific_label_mc">
                            <span class="toggle-slider round"></span>
                        </label>
                    </div>
                </div>
            </div>
            
            <div class="space-y-4 mt-6">
                <h4 class="font-medium text-gray-900">Part Number</h4>
                <div class="setting-item bg-white rounded-lg p-4 border border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="font-medium text-gray-900">Pick List</h3>
                            <p class="text-sm text-gray-500">Require Pick List checking</p>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" wire:model.live="picklist_pn">
                            <span class="toggle-slider round"></span>
                        </label>
                    </div>
                </div>
                <div class="setting-item bg-white rounded-lg p-4 border border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="font-medium text-gray-900">Specific Inspection Report</h3>
                            <p class="text-sm text-gray-500">Require SIR checking</p>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" wire:model.live="sir_pn">
                            <span class="toggle-slider round"></span>
                        </label>
                    </div>
                </div>
                <div class="setting-item bg-white rounded-lg p-4 border border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="font-medium text-gray-900">VMI Label</h3>
                            <p class="text-sm text-gray-500">Require VMI label checking</p>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" wire:model.live="vmi_pn">
                            <span class="toggle-slider round"></span>
                        </label>
                    </div>
                </div>
            </div>
            
            <div class="space-y-4 mt-6">
                <h4 class="font-medium text-gray-900">Purchase Order Number Verification</h4>
                <div class="setting-item bg-white rounded-lg p-4 border border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="font-medium text-gray-900">Specific Inspection Report</h3>
                            <p class="text-sm text-gray-500">Require SIR checking</p>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" wire:model.live="sir_po">
                            <span class="toggle-slider round"></span>
                        </label>
                    </div>
                </div>
                <div class="setting-item bg-white rounded-lg p-4 border border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="font-medium text-gray-900">VMI Label</h3>
                            <p class="text-sm text-gray-500">Require VMI label checking</p>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" wire:model.live="vmi_po">
                            <span class="toggle-slider round"></span>
                        </label>
                    </div>
                </div>
                <div class="setting-item bg-white rounded-lg p-4 border border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="font-medium text-gray-900">Specific Label</h3>
                            <p class="text-sm text-gray-500">Require specific label checking</p>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" wire:model.live="specific_label_po">
                            <span class="toggle-slider round"></span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Save Button -->
    <div class="flex justify-center mt-12">
        <button wire:click="saveConfiguration" class="save-button text-white px-8 py-4 rounded-xl font-semibold text-lg flex items-center space-x-2 min-w-48">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            <span>Save Configuration</span>
        </button>
    </div>
    @endif
</div>