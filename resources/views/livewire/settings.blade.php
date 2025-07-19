<div class="max-w-6xl mx-auto px-4 py-8">
    <!-- Header -->
    <div class="gradient-bg text-white px-8 py-8 rounded-2xl mb-8 form-container shadow-2xl">
            <!-- Header Section -->
            <div class="flex items-center justify-center mb-8">
                <div class="glass-effect rounded-full p-4 mr-6 shadow-lg">
                    <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center">
                        <img src="photo/cogwheel.png" />
                        
                    </div>
                </div>
                <div class="text-center">
                    <h1 class="text-4xl font-bold mb-2 tracking-tight">Settings</h1>          
                    <p class="text-white/90 text-lg font-medium">Configure Website Setting</p>
                    <div class="w-24 h-1 bg-white/30 rounded-full mx-auto mt-3"></div>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Compact Button 1 -->
                <button class="group relative p-6 bg-gradient-to-br from-blue-50 to-indigo-100 rounded-2xl border-2 border-transparent hover:border-blue-300 transition-all duration-300 hover:shadow-lg" wire:click="showAddRemoveSection">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-blue-500 rounded-xl flex items-center justify-center shadow-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                        </div>
                        <div class="flex-1 text-left">
                            <h3 class="font-bold text-gray-900">Add/Remove</h3>
                            <p class="text-sm text-gray-600">Manage Model and Sections</p>
                        </div>
                        <div class="w-8 h-8 bg-white rounded-full flex items-center justify-center shadow-sm group-hover:shadow-md transition-shadow">
                            <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </div>
                </button>
                
                <!-- Compact Button 2 -->
                <button class="group relative p-6 bg-gradient-to-br from-purple-50 to-pink-100 rounded-2xl border-2 border-transparent hover:border-purple-300 transition-all duration-300 hover:shadow-lg" wire:click="showChecklistConfigurationSection">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-purple-500 rounded-xl flex items-center justify-center shadow-lg">
                            <img src="photo/manage_logo.png" class="w-10 h-10" />
                        </div>
                        <div class="flex-1 text-left">
                            <h3 class="font-bold text-gray-900">Model Configuration</h3>
                            <p class="text-sm text-gray-600">Setup Toggle-able Checklist Parameters</p>
                        </div>
                        <div class="w-8 h-8 bg-white rounded-full flex items-center justify-center shadow-sm group-hover:shadow-md transition-shadow">
                            <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </div>
                </button>

                <button wire:click="showSystemLogsSection" class="group relative p-6 bg-gradient-to-br from-emerald-50 to-teal-100 rounded-2xl border-2 border-transparent hover:border-emerald-300 transition-all duration-300 hover:shadow-lg">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-emerald-500 rounded-xl flex items-center justify-center shadow-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <div class="flex-1 text-left">
                            <h3 class="font-bold text-gray-900">System Logs</h3>
                            <p class="text-sm text-gray-600">View activity logs</p>
                        </div>
                        <div class="w-8 h-8 bg-white rounded-full flex items-center justify-center shadow-sm group-hover:shadow-md transition-shadow">
                            <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </div>
                </button>
            </div>
    </div>
    

    

    @if($showAddRemove)
    <div class="bg-red-50 rounded-xl shadow-lg p-6 space-y-6 bg-opacity-90 backdrop-blur-md">
        <!-- Add/Remove Section -->
        <div class="section-card card-hover rounded-2xl shadow-lg p-6 mb-8 form-container">
            <div class="flex items-center space-x-3 mb-6">
                <div class="bg-blue-500 p-2 rounded-lg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                </div>
                <h2 class="text-xl font-semibold text-gray-800">Add/Remove Configuration</h2>
            </div>
            
            <!-- Models -->
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-6 mb-4">
                <h1 class="text-xl font-semibold text-gray-800">Models</h1>
                <label class="block text-sm font-medium text-gray-700 mb-3">*To delete a model, please select the model name.</label>
                
                <!-- Success Message -->
                @if (session()->has('message'))
                    <div class="mb-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                        {{ session('message') }}
                    </div>
                @endif

                <!-- Add Model Button and Form -->
                <div class="mb-4">
                    @if(!$showAddForm)
                        <button 
                            wire:click="$set('showAddForm', true)"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg font-medium transition-colors duration-200"
                        >
                            + Add New Model
                        </button>
                    @else
                        <div class="bg-white border-2 border-blue-200 rounded-lg p-4">
                            <div class="flex items-center justify-between mb-3">
                                <h3 class="font-medium text-gray-800">Add New Model</h3>
                                <button 
                                    wire:click="cancelAdd"
                                    class="text-gray-500 hover:text-gray-700"
                                >
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                            
                            <div class="space-y-3">
                                <div>
                                    <input 
                                        type="text" 
                                        wire:model="newModelName"
                                        placeholder="Enter model name..."
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:border-blue-500 focus:outline-none"
                                    >
                                    @error('newModelName') 
                                        <span class="text-red-500 text-sm">{{ $message }}</span> 
                                    @enderror
                                </div>
                                
                                <div class="flex space-x-2">
                                    <button 
                                        wire:click="addModel"
                                        class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg font-medium transition-colors duration-200"
                                    >
                                        Add Model
                                    </button>
                                    <button 
                                        wire:click="cancelAdd"
                                        class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg font-medium transition-colors duration-200"
                                    >
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                
                <!-- Search Input -->
                <div class="relative mb-4">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input 
                        type="text" 
                        wire:model.live.debounce.300ms="searchTerm"
                        placeholder="Search models..." 
                        class="w-full md:w-96 pl-10 pr-4 py-3 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:outline-none bg-white transition-colors duration-200"
                    >
                    @if($searchTerm)
                        <button 
                            wire:click="$set('searchTerm', '')"
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 transition-colors"
                        >
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    @endif
                </div>

                <!-- Selected Model Display -->
                @if($selectedModelAddRemove)
                    <div class="mb-4 p-4 bg-white border-2 border-blue-200 rounded-lg flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-2 h-2 bg-green-500 rounded-full mr-3"></div>
                            <span class="font-medium text-gray-800">{{ $selectedModelAddRemove }}</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <button 
                                wire:click="deleteModel"
                                wire:confirm="Are you sure you want to delete this model?"
                                class="text-red-500 hover:text-red-700 hover:bg-red-50 px-3 py-1 rounded-md text-sm font-medium transition-colors duration-200"
                                title="Delete model"
                            >
                                Delete
                            </button>
                            <button 
                                wire:click="clearSelection"
                                class="text-gray-500 hover:text-gray-700 hover:bg-gray-50 p-1 rounded-full transition-colors duration-200"
                                title="Clear selection"
                            >
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                @endif

                <!-- Model Selection List -->
                @if(!$selectedModelAddRemove)
                    <div class="bg-white border-2 border-gray-200 rounded-lg max-h-64 overflow-y-auto">
                        @if($filteredModels->isEmpty())
                            <div class="p-4 text-center text-gray-500">
                                @if($searchTerm)
                                    No models found matching "{{ $searchTerm }}"
                                @else
                                    No models available
                                @endif
                            </div>
                        @else
                            @foreach($filteredModels as $model)
                                <button 
                                    wire:click="selectModel('{{ $model->model_name }}')"
                                    class="w-full text-left px-4 py-3 hover:bg-blue-50 focus:bg-blue-50 focus:outline-none border-b border-gray-100 last:border-b-0 transition-colors duration-150"
                                >
                                    <div class="flex items-center justify-between">
                                        <span class="font-medium text-gray-800">{{ $model->model_name }}</span>
                                        @if($model->description ?? false)
                                            <span class="text-sm text-gray-500 ml-2">{{ Str::limit($model->description, 30) }}</span>
                                        @endif
                                    </div>
                                </button>
                            @endforeach
                        @endif
                    </div>
                @endif

                <!-- Model Count -->
                @if(!$selectedModelAddRemove && $filteredModels->isNotEmpty())
                    <div class="mt-3 text-sm text-gray-600">
                        Showing {{ $filteredModels->count() }} of {{ $totalModels }} models
                    </div>
                @endif
            </div>

            <!-- Sections -->
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-6">
                <h1 class="text-xl font-semibold text-gray-800">Sections</h1>
                <label class="block text-sm font-medium text-gray-700 mb-3">*To delete a section, please select the section name.</label>
                
                <!-- Success Message -->
                @if (session()->has('message'))
                    <div class="mb-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                        {{ session('message') }}
                    </div>
                @endif

                <!-- Add Section Button and Form -->
                <div class="mb-4">
                    @if(!$showAddFormSection)
                        <button 
                            wire:click="$set('showAddFormSection', true)"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg font-medium transition-colors duration-200"
                        >
                            + Add New Section
                        </button>
                    @else
                        <div class="bg-white border-2 border-blue-200 rounded-lg p-4">
                            <div class="flex items-center justify-between mb-3">
                                <h3 class="font-medium text-gray-800">Add New Section</h3>
                                <button 
                                    wire:click="cancelAddSection"
                                    class="text-gray-500 hover:text-gray-700"
                                >
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                            
                            <div class="space-y-3">
                                <div>
                                    <input 
                                        type="text" 
                                        wire:model="newSectionName"
                                        placeholder="Enter section name..."
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:border-blue-500 focus:outline-none"
                                    >
                                    @error('newSectionName') 
                                        <span class="text-red-500 text-sm">{{ $message }}</span> 
                                    @enderror
                                </div>
                                
                                <div class="flex space-x-2">
                                    <button 
                                        wire:click="addSection"
                                        class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg font-medium transition-colors duration-200"
                                    >
                                        Add Section
                                    </button>
                                    <button 
                                        wire:click="cancelAddSection"
                                        class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg font-medium transition-colors duration-200"
                                    >
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                
                <!-- Search Input -->
                <div class="relative mb-4">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input 
                        type="text" 
                        wire:model.live.debounce.300ms="searchTermSection"
                        placeholder="Search section..." 
                        class="w-full md:w-96 pl-10 pr-4 py-3 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:outline-none bg-white transition-colors duration-200"
                    >
                    @if($searchTermSection)
                        <button 
                            wire:click="$set('searchTermSection', '')"
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 transition-colors"
                        >
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    @endif
                </div>

                <!-- Selected Section Display -->
                @if($selectedSectionAddRemove)
                    <div class="mb-4 p-4 bg-white border-2 border-blue-200 rounded-lg flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-2 h-2 bg-green-500 rounded-full mr-3"></div>
                            <span class="font-medium text-gray-800">{{ $selectedSectionAddRemove }}</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <button 
                                wire:click="deleteSection"
                                wire:confirm="Are you sure you want to delete this section?"
                                class="text-red-500 hover:text-red-700 hover:bg-red-50 px-3 py-1 rounded-md text-sm font-medium transition-colors duration-200"
                                title="Delete section"
                            >
                                Delete
                            </button>
                            <button 
                                wire:click="clearSelectionSection"
                                class="text-gray-500 hover:text-gray-700 hover:bg-gray-50 p-1 rounded-full transition-colors duration-200"
                                title="Clear selection section"
                            >
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                @endif

                <!-- Section Selection List -->
                @if(!$selectedModelAddRemove)
                    <div class="bg-white border-2 border-gray-200 rounded-lg max-h-64 overflow-y-auto">
                        @if($filteredSections->isEmpty())
                            <div class="p-4 text-center text-gray-500">
                                @if($searchTermSection)
                                    No section found matching "{{ $searchTermSection }}"
                                @else
                                    No section available
                                @endif
                            </div>
                        @else
                            @foreach($filteredSections as $section)
                                <button 
                                    wire:click="selectSection('{{ $section->section }}')"
                                    class="w-full text-left px-4 py-3 hover:bg-blue-50 focus:bg-blue-50 focus:outline-none border-b border-gray-100 last:border-b-0 transition-colors duration-150"
                                >
                                    <div class="flex items-center justify-between">
                                        <span class="font-medium text-gray-800">{{ $section->section }}</span>
                                        @if($section->description ?? false)
                                            <span class="text-sm text-gray-500 ml-2">{{ Str::limit($section->description, 30) }}</span>
                                        @endif
                                    </div>
                                </button>
                            @endforeach
                        @endif
                    </div>
                @endif

                <!-- Section Count -->
                @if(!$selectedSectionAddRemove && $filteredSections->isNotEmpty())
                    <div class="mt-3 text-sm text-gray-600">
                        Showing {{ $filteredSections->count() }} of {{ $totalSections }} sections
                    </div>
                @endif
            </div>
        </div>
    </div>
    @endif

    @if($showChecklistConfiguration)
    <div class="bg-red-50 rounded-xl shadow-lg p-6 space-y-6 bg-opacity-90 backdrop-blur-md mt-10">
        <!-- Model Selection Section -->
        <div class="section-card card-hover rounded-2xl shadow-lg p-6 mb-8 form-container">
            <div class="flex items-center space-x-3 mb-6">
                <div class="bg-blue-100 p-2 rounded-lg">
                    <img src="photo/manage_logo.png" class="w-8 h-8" />
                </div>
                <h2 class="text-xl font-semibold text-gray-800">Model Configuration</h2>
            </div>

            <div class="mb-4 bg-purple-100 rounded-lg w-1/2">
                <p class="block text-sm font-medium text-gray-700 mb-3"><strong class='text-red-700'>*</strong>Note: Default Checklist Configuration is True for all parameter</p>
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
    </div>
    @endif

    @if ($showSystemLogs)
        <div class="bg-red-50 rounded-xl shadow-lg p-6 space-y-6 bg-opacity-90 backdrop-blur-md">
            <div class="section-card card-hover rounded-2xl shadow-lg p-6 mb-8 form-container">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center space-x-3">
                        <div class="bg-emerald-500 p-2 rounded-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <h2 class="text-xl font-semibold text-gray-800">System Logs</h2>
                    </div>
                    
                    <div class="flex flex-wrap items-center gap-4 mb-6">
                        <!-- Search Box -->
                        <div class="flex-1 min-w-64">
                            <input type="text" 
                                wire:model.live.debounce.300ms="searchTerm"
                                placeholder="Search description..." 
                                class="input-field w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        
                        <!-- Date Range -->
                        <div class="flex items-center space-x-2">
                            <input type="date" 
                                wire:model.live="startDate"
                                class="input-field px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <span class="text-gray-500">to</span>
                            <input type="date" 
                                wire:model.live="endDate"
                                class="input-field px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        
                        <!-- Existing Filters -->
                        <select wire:model.live="logTypeFilter" 
                                class="input-field select-focus px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">All Types</option>
                            <option value="info">Info</option>
                            <option value="error">Error</option>
                            <option value="warning">Warning</option>
                        </select>
                        
                        <select wire:model.live="logNameFilter" 
                                class="input-field select-focus px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">All Logs</option>
                            <option value="System">System</option>
                            <option value="User Actions">User Actions</option>
                        </select>
                        
                        <!-- Clear Filters Button -->
                        <button wire:click="clearFilters" 
                                class="filter-button px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500">
                            Clear Filters
                        </button>
                    </div>
                </div>
                
                <!-- Table Container -->
                <div class="overflow-x-auto">
                    <table class="w-full bg-white rounded-lg shadow-sm">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Log Type
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Log Name
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Action
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Description
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Date
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($this->systemLogs as $logs)
                            <tr class="table-row">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="log-badge inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                        @if ($logs['LogType'] == 'info')
                                        bg-blue-100 text-blue-800
                                        @elseif ($logs['LogType'] == 'error')
                                        bg-red-100 text-red-800
                                        @elseif ($logs['LogType'] == 'warning')
                                        bg-yellow-100 text-yellow-800
                                        @endif ">
                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ $logs['LogType'] }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $logs['LogName'] }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $logs['action'] }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    <div class="max-w-xs">
                                        {{ $logs['description'] }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $logs['created_at'] }}
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination -->
                <div class="flex flex-col sm:flex-row items-center justify-between mt-6 gap-4">
                    <div class="flex items-center space-x-2 text-sm text-gray-500">
                        <span>Showing</span>
                        <span class="font-medium">{{ $this->systemLogs->firstItem() ?? 0 }}</span>
                        <span>to</span>
                        <span class="font-medium">{{ $this->systemLogs->lastItem() ?? 0 }}</span>
                        <span>of</span>
                        <span class="font-medium">{{ $this->systemLogs->total() }}</span>
                        <span>results</span>
                    </div>
                    
                    <div class="flex items-center space-x-2">
                        {{ $this->systemLogs->links() }}
                    </div>
                    
                    <!-- Per Page Selector -->
                    <div class="flex items-center space-x-2 text-sm">
                        <span>Show:</span>
                        <select wire:model.live="perPage" 
                                class="border border-gray-300 rounded px-2 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                        <span>per page</span>
                    </div>
                </div>
            </div>
        </div>
    @endif

    
</div>