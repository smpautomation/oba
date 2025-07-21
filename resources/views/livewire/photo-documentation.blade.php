
<div>
    <!-- Sidebar Toggle Button (Sticky) -->
    <div class="fixed top-[46%] {{ $sidebarOpen ? 'right-3/4' : 'right-0' }} z-50 transform -translate-y-1/2 transition-all duration-300">
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
                <div class="gradient-bg text-white px-6 py-4 rounded-xl mb-4">
                    <div class="flex items-center">
                        <div class="bg-white/20 rounded-full p-2 mr-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-xl font-bold">Photo Docs</h1>
                            <p class="text-white/80 text-sm">Capture & organize</p>
                        </div>
                    </div>
                </div>

                <!-- Photo Upload Section -->
                <div class="space-y-6">
                    <!-- Upload Area -->
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-blue-400 transition-colors duration-200 bg-gray-50 hover:bg-blue-50">
                        <svg class="mx-auto h-8 w-8 text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        <label class="cursor-pointer">
                            <span class="text-sm font-medium text-gray-700 mb-2 block">Take photo or choose</span>
                            <input
                                type="file"
                                accept="image/*"
                                capture="environment"
                                wire:model="photo"
                                class="hidden"
                                @if($checklistInfo->status == "Closed")
                                disabled
                                @endif
                            />
                            <div class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-all duration-200 text-sm">
                                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                Upload Photo
                            </div>
                        </label>
                    </div>

                    <!-- Loading States -->
                    <div wire:loading wire:target="photo" class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                        <div class="flex items-center">
                            <svg class="animate-spin -ml-1 mr-3 h-6 w-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <span class="text-blue-700 font-medium">Processing photo...</span>
                        </div>
                    </div>

                    <div wire:loading wire:target="confirmRename" class="bg-green-50 border border-green-200 rounded-lg p-4">
                        <div class="flex items-center">
                            <svg class="animate-spin -ml-1 mr-3 h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <span class="text-green-700 font-medium">Uploading photo...</span>
                        </div>
                    </div>

                    <!-- Error Display -->
                    @error('photo')
                        <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-red-600 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-red-700 font-medium">{{ $message }}</span>
                            </div>
                        </div>
                    @enderror

                    @error('photoName')
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

                    <!-- Uploaded Photos Grid -->
                    @if (!empty($uploadedPhotos))
                        <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                            <h4 class="text-lg font-semibold text-gray-700 mb-6 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                Uploaded Photos ({{ count($uploadedPhotos) }})
                            </h4>
                            <div class="grid grid-cols-1 gap-4">
                                @foreach($uploadedPhotos as $index => $photoData)
                                    <div class="bg-white rounded-xl overflow-hidden border border-gray-200 hover:shadow-lg transition-all duration-200 hover:scale-105">
                                        
                                        <div class="p-4">
                                            <h5 class="font-medium text-gray-800 text-sm mb-1 truncate">{{ $photoData['name'] }}</h5>
                                            <p class="text-xs text-gray-500 mb-4">{{ $photoData['uploaded_at'] ?? 'Just now' }}</p>
                                            <div class="flex space-x-3">
                                                <button 
                                                    wire:click="showPhoto('{{ $photoData['path'] }}')"
                                                    class="flex-1 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors duration-200 min-h-[40px]"
                                                >
                                                    View
                                                </button>
                                                <button 
                                                    wire:click="removePhoto({{ $index }})"
                                                    wire:confirm="Are you sure you want to delete this photo?"
                                                    class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-lg transition-colors duration-200 min-h-[40px] min-w-[40px]"
                                                    title="Remove photo"
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

                <!-- Rename Photo Modal -->
                @if($showRenameModal)
                    <div class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center p-4 z-50">
                        <div class="bg-white rounded-2xl max-w-md w-full shadow-2xl" wire:click.stop>
                            <div class="flex items-center justify-between p-6 border-b border-gray-200">
                                <h3 class="text-xl font-semibold text-gray-900">Rename Photo</h3>
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
                                        Original name: <span class="text-gray-500">{{ $originalPhotoName }}</span>
                                    </label>
                                </div>
                                
                                <div class="mb-6">
                                    <label for="photoName" class="block text-sm font-medium text-gray-700 mb-2">
                                        New photo name
                                    </label>
                                    <input 
                                        type="text" 
                                        id="photoName"
                                        wire:model="photoName"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                        placeholder="Enter photo name"
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
                                    <span wire:loading.remove wire:target="confirmRename">Save Photo</span>
                                    <span wire:loading wire:target="confirmRename">Saving...</span>
                                </button>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Photo Modal (for viewing individual photos) -->
                @if($showModal)
                    <div class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center p-4 z-50" wire:click="closeModal">
                        <div class="bg-white rounded-2xl max-w-4xl max-h-screen overflow-hidden shadow-2xl" wire:click.stop>
                            <div class="flex items-center justify-between p-6 border-b border-gray-200">
                                <h3 class="text-xl font-semibold text-gray-900">{{ $selectedPhotoName }}</h3>
                                <button 
                                    wire:click="closeModal"
                                    class="text-gray-400 hover:text-gray-600 transition-colors duration-200 p-2 hover:bg-gray-100 rounded-full"
                                >
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                            
                            <div class="p-6">
                                <img 
                                    src="{{ $selectedPhotoUrl }}" 
                                    alt="{{ $selectedPhotoName }}"
                                    class="max-w-full max-h-96 mx-auto object-contain rounded-lg"
                                />
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