<div class="flex items-center justify-center min-h-screen p-4 sm:p-6 lg:p-8">
    <div class="form-container glass-effect shadow-2xl rounded-3xl w-full max-w-md sm:max-w-lg md:max-w-xl lg:max-w-2xl p-6 sm:p-8 md:p-10">
        <!-- Header Section -->
        <div class="text-center mb-8">
            <div class="w-16 h-16 bg-gradient-to-r from-cyan-500 to-blue-500 rounded-2xl mx-auto mb-4 flex items-center justify-center shadow-lg">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-2">Configuration Setup</h1>
            <p class="text-gray-600 text-sm sm:text-base">Select your preferred section and model to get started</p>
        </div>

        <form wire:submit.prevent='save' class="space-y-6">
            <!-- Section Selection -->
            <div class="space-y-3">
                <label for="section" class="block text-base sm:text-lg font-semibold text-gray-800 mb-3">
                    <span class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-cyan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                        Section
                    </span>
                </label>
                <div class="relative">
                    <select 
                        wire:model='selectedSection' 
                        id="section" 
                        class="enhanced-focus select-focus touch-target appearance-none bg-white border-2 border-gray-200 text-gray-900 text-base sm:text-lg rounded-2xl focus:ring-4 focus:ring-cyan-200 focus:border-cyan-500 block w-full p-4 sm:p-5 pr-12 transition-all duration-200 shadow-sm hover:shadow-md hover:border-gray-300"
                    >
                        <option value="" selected>Choose a section</option>
                        @foreach ($sections as $section)
                            <option value="{{ $section->section }}">{{ $section->section }}</option>
                        @endforeach
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
                <div>
                    @if (session()->has('SectionError'))
                        <div class="text-red-500 text-sm mt-2">
                            <svg class="inline w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            {{ session('SectionError') }}
                        </div>
                    @endif
                </div>
            </div?>

            <!-- Model Selection -->
            <div class="space-y-3">
                <label for="model" class="block text-base sm:text-lg font-semibold text-gray-800 mb-3">
                    <span class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        Model
                    </span>
                </label>
                <div class="relative">
                    <select 
                        wire:model='selectedModel' 
                        id="model" 
                        class="enhanced-focus select-focus touch-target appearance-none bg-white border-2 border-gray-200 text-gray-900 text-base sm:text-lg rounded-2xl focus:ring-4 focus:ring-blue-200 focus:border-blue-500 block w-full p-4 sm:p-5 pr-12 transition-all duration-200 shadow-sm hover:shadow-md hover:border-gray-300"
                    >
                        <option value="" selected>Choose a model</option>
                        @foreach ($models as $model)
                            <option value="{{ $model->model_name }}">{{ $model->model_name }}</option>
                        @endforeach
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
                <div>
                    @if (session()->has('ModelError'))
                        <div class="text-red-500 text-sm mt-2">
                            <svg class="inline w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            {{ session('ModelError') }}
                        </div>
                    @endif
                </div>
            </div>

            <!-- Success Message -->
            @if(session()->has('message'))
                <div class="bg-gradient-to-r from-green-50 to-emerald-50 border-l-4 border-green-400 p-4 rounded-lg shadow-sm animate-pulse">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-green-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <p class="text-green-700 font-medium">{{ session('message') }}</p>
                    </div>
                </div>
            @endif

            <!-- Submit Button -->
            <div class="pt-4">
                <button 
                    type="submit" 
                    class="btn-hover enhanced-focus touch-target w-full bg-gradient-to-r from-cyan-500 to-blue-500 hover:from-cyan-600 hover:to-blue-600 text-white font-bold py-4 sm:py-5 px-6 rounded-2xl text-base sm:text-lg transition-all duration-200 shadow-lg hover:shadow-xl focus:ring-4 focus:ring-cyan-200 active:transform active:scale-95"
                >
                    <span class="flex items-center justify-center gap-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                        Start Audit
                    </span>
                </button>
            </div>
        </form>

        <!-- Footer -->
        <div class="mt-8 pt-6 border-t border-gray-200 text-center">
            <p class="text-gray-500 text-sm">Ready to begin? Make your selections above.</p>
        </div>
    </div>
</div>
