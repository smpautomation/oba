<div>
    <!-- Sidebar Toggle Button (Sticky) -->
    <div class="fixed top-[54%] {{ $sidebarOpen ? 'right-3/4' : 'right-0' }} z-50 transform -translate-y-1/2 transition-all duration-300">
        <button 
            wire:click="toggleSidebar"
            class="bg-blue-600 hover:bg-blue-700 text-white p-3 {{ $sidebarOpen ? 'rounded-l-lg' : 'rounded-l-lg' }} shadow-lg transition-colors duration-200"
            title="{{ $sidebarOpen ? 'Close Photo Panel' : 'Open Photo Panel' }}"
        >
            <svg class="w-6 h-6 transform transition-transform duration-200 {{ $sidebarOpen ? 'rotate-180' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </button>
    </div>
    <div class="fixed top-0 right-0 h-full w-3/4 bg-white shadow-xl z-40 transform transition-transform duration-300 overflow-y-auto {{ $sidebarOpen ? 'translate-x-0' : 'translate-x-full' }} pt-6">
        <div class="p-4">
            <div class="max-w-6xl mx-auto px-4 mb-4 mt-6 bg-white rounded-xl py-4">
                <div class="gradient-bg text-white px-8 py-6 rounded-xl mb-6">
                    <div class="flex items-center justify-center">
                        <div class="bg-white/20 rounded-full p-3 mr-4">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-3xl font-bold">Additional Documentation</h1>
                            <p class="text-white/80 mt-1">Upload and manage supporting documents (PDF, Word, Excel)</p>
                        </div>
                    </div>
                </div>

                <!-- Document Upload Section -->
                <div class="space-y-6">
                    <!-- Upload Area -->
                    <div class="border-2 border-dashed border-gray-300 rounded-xl p-8 text-center hover:border-blue-400 transition-colors duration-200 bg-gray-50 hover:bg-blue-50">
                        <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        <label class="cursor-pointer">
                            <span class="text-lg font-medium text-gray-700 mb-3 block">Upload Document</span>
                            <p class="text-sm text-gray-500 mb-4">Supported formats: PDF, Word (DOC/DOCX), Excel (XLS/XLSX)</p>
                            <input
                                type="file"
                                accept=".pdf,.docx,.doc,.xlsx,.xls"
                                wire:model="document"
                                class="hidden"
                                @if ($checklistInfo->status == 'Closed')
                                disabled
                                @endif
                            />
                            <div class="inline-flex items-center px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-all duration-200 min-h-[48px] text-lg">
                                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                </svg>
                                Choose Document
                            </div>
                        </label>
                    </div>

                    <!-- Loading States -->
                    <div wire:loading wire:target="document" class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                        <div class="flex items-center">
                            <svg class="animate-spin -ml-1 mr-3 h-6 w-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <span class="text-blue-700 font-medium">Processing document...</span>
                        </div>
                    </div>

                    <div wire:loading wire:target="confirmRename" class="bg-green-50 border border-green-200 rounded-lg p-4">
                        <div class="flex items-center">
                            <svg class="animate-spin -ml-1 mr-3 h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <span class="text-green-700 font-medium">Uploading document...</span>
                        </div>
                    </div>

                    <!-- Error Display -->
                    @error('document')
                        <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-red-600 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-red-700 font-medium">{{ $message }}</span>
                            </div>
                        </div>
                    @enderror

                    @error('documentName')
                        <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-red-600 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-red-700 font-medium">{{ $message }}</span>
                            </div>
                        </div>
                    @enderror

                    <!-- Success Message -->
                    @if (session()->has('message'))
                        <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-green-700 font-medium">{{ session('message') }}</span>
                            </div>
                        </div>
                    @endif

                    <!-- Error Message -->
                    @if (session()->has('error'))
                        <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-red-600 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-red-700 font-medium">{{ session('error') }}</span>
                            </div>
                        </div>
                    @endif

                    <!-- Uploaded Documents List -->
                    @if (!empty($uploadedDocuments))
                        <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                            <h4 class="text-lg font-semibold text-gray-700 mb-6 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Uploaded Documents ({{ count($uploadedDocuments) }})
                            </h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                @foreach($uploadedDocuments as $index => $documentData)
                                    <div class="bg-white rounded-xl overflow-hidden border border-gray-200 hover:shadow-lg transition-all duration-200">
                                        <div class="p-4">
                                            <!-- Document Icon -->
                                            <div class="flex items-center mb-3">
                                                <div class="w-12 h-12 rounded-lg flex items-center justify-center mr-3
                                                    @if($documentData['type'] === 'pdf') bg-red-100 text-red-600
                                                    @elseif(in_array($documentData['type'], ['doc', 'docx'])) bg-blue-100 text-blue-600
                                                    @elseif(in_array($documentData['type'], ['xls', 'xlsx'])) bg-green-100 text-green-600
                                                    @else bg-gray-100 text-gray-600
                                                    @endif">
                                                    @if($documentData['type'] === 'pdf')
                                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z"/>
                                                        </svg>
                                                    @elseif(in_array($documentData['type'], ['doc', 'docx']))
                                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M14,17H7V15H14M17,13H7V11H17M17,9H7V7H17M19,3H5C3.89,3 3,3.89 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3Z"/>
                                                        </svg>
                                                    @elseif(in_array($documentData['type'], ['xls', 'xlsx']))
                                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M19,3H5A2,2 0 0,0 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5A2,2 0 0,0 19,3M19,19H5V5H19V19Z"/>
                                                        </svg>
                                                    @else
                                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z"/>
                                                        </svg>
                                                    @endif
                                                </div>
                                                <div class="flex-1 min-w-0">
                                                    <h5 class="font-medium text-gray-800 text-sm truncate">{{ $documentData['name'] }}</h5>
                                                    <p class="text-xs text-gray-500 uppercase">{{ $documentData['type'] }} • {{ $documentData['size'] }}</p>
                                                </div>
                                            </div>
                                            
                                            <p class="text-xs text-gray-500 mb-4">{{ $documentData['uploaded_at'] ?? 'Just now' }}</p>
                                            
                                            <div class="flex space-x-2">
                                                <button 
                                                    wire:click="showDocument('{{ $documentData['path'] }}')"
                                                    class="flex-1 px-3 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors duration-200 min-h-[36px]"
                                                    title="View document"
                                                >
                                                    View
                                                </button>
                                                <button 
                                                    wire:click="downloadDocument('{{ $documentData['path'] }}')"
                                                    class="px-3 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-lg transition-colors duration-200 min-h-[36px]"
                                                    title="Download document"
                                                >
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                    </svg>
                                                </button>
                                                <button 
                                                    wire:click="removeDocument({{ $index }})"
                                                    wire:confirm="Are you sure you want to delete this document?"
                                                    class="px-3 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-lg transition-colors duration-200 min-h-[36px]"
                                                    title="Remove document"
                                                    @if ($checklistInfo->status == 'Closed')
                                                    disabled
                                                    @endif
                                                >
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Rename Document Modal -->
                @if($showRenameModal)
                    <div class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center p-4 z-50">
                        <div class="bg-white rounded-2xl max-w-md w-full shadow-2xl" wire:click.stop>
                            <div class="flex items-center justify-between p-6 border-b border-gray-200">
                                <h3 class="text-xl font-semibold text-gray-900">Rename Document</h3>
                                <button 
                                    wire:click="cancelRename"
                                    class="text-gray-400 hover:text-gray-600 transition-colors duration-200 p-2 hover:bg-gray-100 rounded-full"
                                >
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                            
                            <div class="p-6">
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Original name: <span class="text-gray-500">{{ $originalDocumentName }}</span>
                                    </label>
                                </div>
                                
                                <div class="mb-6">
                                    <label for="documentName" class="block text-sm font-medium text-gray-700 mb-2">
                                        New document name
                                    </label>
                                    <input 
                                        type="text" 
                                        id="documentName"
                                        wire:model="documentName"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                        placeholder="Enter document name"
                                        wire:keydown.enter="confirmRename"
                                    />
                                    <p class="text-xs text-gray-500 mt-1">
                                        The file extension will be added automatically
                                    </p>
                                </div>
                            </div>
                            
                            <div class="flex justify-end p-6 border-t border-gray-200 space-x-3">
                                <button 
                                    wire:click="cancelRename"
                                    class="px-6 py-3 bg-gray-500 hover:bg-gray-600 text-white font-medium rounded-lg transition-colors duration-200 min-h-[44px]"
                                >
                                    Cancel
                                </button>
                                <button 
                                    wire:click="confirmRename"
                                    class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors duration-200 min-h-[44px]"
                                    wire:loading.attr="disabled"
                                    wire:target="confirmRename"
                                >
                                    <span wire:loading.remove wire:target="confirmRename">Save Document</span>
                                    <span wire:loading wire:target="confirmRename">Saving...</span>
                                </button>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Document Modal (for viewing individual documents) -->
                @if($showModal)
                    <div class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center p-4 z-50" wire:click="closeModal">
                        <div class="bg-white rounded-2xl min-w-6xl h-[60rem] max-h-screen  overflow-hidden shadow-2xl" wire:click.stop>
                            <div class="flex items-center justify-between p-6 border-b border-gray-200">
                                <h3 class="text-xl font-semibold text-gray-900">{{ $selectedDocumentName }}</h3>
                                <div class="flex items-center space-x-3">
                                    <button 
                                        wire:click="downloadDocument('{{ collect($uploadedDocuments)->firstWhere('name', $selectedDocumentName)['path'] ?? '' }}')"
                                        class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition-colors duration-200 flex items-center"
                                    >
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                        Download
                                    </button>
                                    <button 
                                        wire:click="closeModal"
                                        class="text-gray-400 hover:text-gray-600 transition-colors duration-200 p-2 hover:bg-gray-100 rounded-full"
                                    >
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            
                            <div class="p-6 overflow-auto max-h-[40rem]">
                                @if($selectedDocumentType === 'pdf')
                                    <div class="text-center">
                                        <embed 
                                            src="{{ $selectedDocumentUrl }}" 
                                            type="application/pdf" 
                                            width="100%" 
                                            height = "550px"
                                            class="rounded-lg border"
                                        />
                                        <p class="text-sm text-gray-500 mt-4">
                                            If the PDF doesn't display properly, you can 
                                            <button wire:click="downloadDocument('{{ collect($uploadedDocuments)->firstWhere('name', $selectedDocumentName)['path'] ?? '' }}')" 
                                                    class="text-blue-600 hover:text-blue-800 underline">
                                                download it here
                                            </button>
                                        </p>
                                    </div>
                                @elseif(in_array($selectedDocumentType, ['doc', 'docx', 'xls', 'xlsx']))
                                    <div class="text-center py-12">
                                        <div class="w-24 h-24 mx-auto rounded-full flex items-center justify-center mb-4
                                            @if(in_array($selectedDocumentType, ['doc', 'docx'])) bg-blue-100 text-blue-600
                                            @elseif(in_array($selectedDocumentType, ['xls', 'xlsx'])) bg-green-100 text-green-600
                                            @endif">
                                            @if(in_array($selectedDocumentType, ['doc', 'docx']))
                                                <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M14,17H7V15H14M17,13H7V11H17M17,9H7V7H17M19,3H5C3.89,3 3,3.89 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3Z"/>
                                                </svg>
                                            @elseif(in_array($selectedDocumentType, ['xls', 'xlsx']))
                                                <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M19,3H5A2,2 0 0,0 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5A2,2 0 0,0 19,3M19,19H5V5H19V19Z"/>
                                                </svg>
                                            @endif
                                        </div>
                                        <h4 class="text-lg font-semibold text-gray-900 mb-2">{{ $selectedDocumentName }}</h4>
                                        <p class="text-gray-600 mb-6">
                                            @if(in_array($selectedDocumentType, ['doc', 'docx']))
                                                Word documents cannot be previewed in the browser.
                                            @elseif(in_array($selectedDocumentType, ['xls', 'xlsx']))
                                                Excel spreadsheets cannot be previewed in the browser.
                                            @endif
                                            <br>Please download the file to view its contents.
                                        </p>
                                        <button 
                                            wire:click="downloadDocument('{{ collect($uploadedDocuments)->firstWhere('name', $selectedDocumentName)['path'] ?? '' }}')"
                                            class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors duration-200 flex items-center mx-auto"
                                        >
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                            </svg>
                                            Download Document
                                        </button>
                                    </div>
                                @else
                                    <div class="text-center py-12">
                                        <div class="w-24 h-24 mx-auto bg-gray-100 text-gray-600 rounded-full flex items-center justify-center mb-4">
                                            <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z"/>
                                            </svg>
                                        </div>
                                        <h4 class="text-lg font-semibold text-gray-900 mb-2">{{ $selectedDocumentName }}</h4>
                                        <p class="text-gray-600 mb-6">
                                            This document type cannot be previewed in the browser.<br>
                                            Please download the file to view its contents.
                                        </p>
                                        <button 
                                            wire:click="downloadDocument('{{ collect($uploadedDocuments)->firstWhere('name', $selectedDocumentName)['path'] ?? '' }}')"
                                            class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors duration-200 flex items-center mx-auto"
                                        >
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                            </svg>
                                            Download Document
                                        </button>
                                    </div>
                                @endif
                            </div>
                            
                            <div class="flex justify-end p-6 border-t border-gray-200 space-x-3">
                                <button 
                                    wire:click="closeModal"
                                    class="px-6 py-3 bg-gray-500 hover:bg-gray-600 text-white font-medium rounded-lg transition-colors duration-200 min-h-[44px]"
                                >
                                    Close
                                </button>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>