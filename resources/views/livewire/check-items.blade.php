<div class="p-4 m-2 rounded-2xl shadow-lg bg-white max-w-4xl mx-auto">
    <div class="flex items-center justify-center bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-xl mb-6 p-4">
        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <h1 class="text-xl font-bold">Check Items</h1>
    </div>

    <!-- Box Quantity Section -->
    <div class="section-card card-hover rounded-2xl shadow-lg p-4 md:p-6 mb-6">
        <div class="flex items-center space-x-3 mb-6">
            <div class="bg-blue-100 p-2 rounded-lg">
                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                </svg>
            </div>
            <h2 class="text-lg md:text-xl font-semibold text-gray-800">Box Inventory</h2>
        </div>
        
        <div class="tablet-grid">
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-4 md:p-6">
                <x-label for="4-boxes" :semibold="true" class="block text-sm font-medium text-gray-700 mb-3">No. OF BOXES OPEN:</x-label>
                <div class="flex items-center space-x-4">
                    <x-inputNumber 
                        id="4-boxes" 
                        btnID="4-boxes" 
                        wire:model='inputs.open_boxes_quantity' 
                        wire:focusout="dispatchMe('open_boxes_quantity')" 
                        :inputStatus="$inputStatus['open_boxes_quantity']"
                        class="input-field w-full md:w-40 px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:outline-none text-lg font-semibold text-center"
                        placeholder="0"
                        min="0">
                    </x-inputNumber>
                    <span class="text-sm font-medium text-gray-600 bg-white px-4 py-3 rounded-lg border whitespace-nowrap">BOXES</span>
                </div>
            </div>
            <div></div>
        </div>
    </div>

    <!-- Barcode Label Model Check -->
    <div class="section-card card-hover rounded-2xl shadow-lg p-4 md:p-6 mb-6">
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center space-x-3">
                <div class="bg-purple-100 p-2 rounded-lg">
                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V6a1 1 0 00-1-1H5a1 1 0 00-1 1v1a1 1 0 001 1z"></path>
                    </svg>
                </div>
                <h2 class="text-lg md:text-xl font-semibold text-gray-800">Barcode Label Model Name</h2>
            </div>
            <div class="bg-amber-100 text-amber-800 px-3 py-1 rounded-full text-xs font-semibold">
                100% CHECK
            </div>
        </div>

        <div class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-xl p-4 md:p-6">
            <x-label :semibold="true" class="block text-lg font-semibold text-gray-800 mb-4">100% Checking of Barcode Label Model Name</x-label>
            
            <!-- Model Name Question -->
            <div class="mb-6">
                <x-label class="block text-base font-medium text-gray-700 mb-4">
                    Are <u>ALL</u> Carton Boxes have the same Model Name?
                </x-label>
                
                <div class="tablet-grid gap-4">
                    <div class="radio-container rounded-lg border-2 border-gray-200 p-4">
                        <div class="flex items-center space-x-3">
                            <input 
                                id="4-radio-model-yes" 
                                type="radio" 
                                value="1" 
                                name="4-radio-model" 
                                class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                wire:model='inputs.same_model' 
                                wire:focusout="dispatchMe('same_model')"
                                >
                            <label for="4-radio-model-yes" class="text-base font-medium cursor-pointer">
                                <span class="text-green-600 text-xl mr-2">✓</span>YES
                            </label>
                        </div>
                    </div>
                    <div class="radio-container rounded-lg border-2 border-gray-200 p-4" >
                        <div class="flex items-center space-x-3">
                            <input 
                                id="4-radio-model-no" 
                                type="radio" 
                                value="0" 
                                name="4-radio-model" 
                                class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                wire:model='inputs.same_model' 
                                wire:focusout="dispatchMe('same_model')"
                                >
                            <label for="4-radio-model-no" class="text-base font-medium cursor-pointer">
                                <span class="text-red-600 text-xl mr-2">✗</span>NO
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Conditional Fields for Model Details -->
            <div id="model-details">
                <div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-4">
                    <x-label for="4-text-1" class="block text-sm font-medium text-red-800 mb-2">If NO, What Model?</x-label>
                    <x-inputText 
                        id="4-text-1" 
                        wire:model='inputs.specify_model' 
                        wire:focusout="dispatchMe('specify_model')" 
                        :inputStatus="$inputStatus['specify_model']"
                        class="input-field w-full px-4 py-3 border-2 border-red-200 rounded-lg focus:border-red-500 focus:outline-none"
                        placeholder="Enter model name(s)...">
                    </x-inputText>
                </div>
                
                <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                    <x-label for="4-text-2" class="block text-sm font-medium text-red-800 mb-2">How many cartons?</x-label>
                    <div class="flex items-center space-x-3">
                        <x-inputNumber 
                            id="4-text-2" 
                            btnID="4-text-2" 
                            wire:model='inputs.carton_quantity' 
                            wire:focusout="dispatchMe('carton_quantity')" 
                            :inputStatus="$inputStatus['carton_quantity']"
                            class="input-field w-full md:w-40 px-4 py-3 border-2 border-red-200 rounded-lg focus:border-red-500 focus:outline-none text-center"
                            placeholder="0"
                            min="0">
                        </x-inputNumber>
                        <span class="text-sm font-medium text-red-700 bg-white px-4 py-3 rounded-lg border border-red-200 whitespace-nowrap">CARTONS</span>
                    </div>
                </div>
            </div>

            <!-- Judgment Section -->
            <div class="mt-6 pt-6 border-t border-gray-200">
                <x-label class="block text-base font-medium text-gray-700 mb-4">JUDGEMENT</x-label>
                
                <div class="tablet-grid gap-4">
                    <div class="radio-container rounded-lg border-2 border-gray-200 p-4"">
                        <div class="flex items-center space-x-3">
                            <input 
                                id="4-radio-judgement-ok" 
                                type="radio" 
                                value="1" 
                                name="4-radio-judgement" 
                                class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                wire:model='inputs.judgement' 
                                wire:focusout="dispatchMe('judgement')">
                            <label for="4-radio-judgement-ok" class="text-base font-medium cursor-pointer">
                                <span class="text-green-600 text-xl mr-2">✓</span>OK
                            </label>
                        </div>
                    </div>
                    <div class="radio-container rounded-lg border-2 border-gray-200 p-4">
                        <div class="flex items-center space-x-3">
                            <input 
                                id="4-radio-judgement-ng" 
                                type="radio" 
                                value="0" 
                                name="4-radio-judgement" 
                                class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                wire:model='inputs.judgement' 
                                wire:focusout="dispatchMe('judgement')">
                            <label for="4-radio-judgement-ng" class="text-base font-medium cursor-pointer">
                                <span class="text-red-600 text-xl mr-2">✗</span>NG
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SIR Section -->
    <div class="section-card card-hover rounded-2xl shadow-lg p-4 md:p-6 mb-6">
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center space-x-3">
                <div class="bg-indigo-100 p-2 rounded-lg">
                    <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h7.586a1 1 0 01.707.293l2.414 2.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <h2 class="text-lg md:text-xl font-semibold text-gray-800">SIR Documentation</h2>
            </div>
            <div class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs font-semibold">
                INSPECTION REPORT
            </div>
        </div>

        <div class="bg-gradient-to-r from-indigo-50 to-purple-50 rounded-xl p-4 md:p-6">
            <x-label :semibold="true" class="block text-lg font-semibold text-gray-800 mb-4">SIR (Specific Inspection Report)</x-label>
            
            <!-- SIR Requirement -->
            <div class="mb-6">
                <x-label class="block text-base font-medium text-gray-700 mb-4">Does SIR require?</x-label>
                
                <div class="tablet-grid gap-4">
                    <div class="radio-container rounded-lg border-2 border-gray-200 p-4" >
                        <div class="flex items-center space-x-3">
                            <input 
                                id="4-sir-yes" 
                                type="radio" 
                                value="1" 
                                name="4-sir" 
                                class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                wire:model='inputs.need_sir' 
                                wire:focusout="dispatchMe('need_sir')"
                                >
                            <label for="4-sir-yes" class="text-base font-medium cursor-pointer">
                                <span class="text-blue-600 text-xl mr-2">✓</span>YES
                            </label>
                        </div>
                    </div>
                    <div class="radio-container rounded-lg border-2 border-gray-200 p-4" >
                        <div class="flex items-center space-x-3">
                            <input 
                                id="4-sir-no" 
                                type="radio" 
                                value="0" 
                                name="4-sir" 
                                class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                wire:model='inputs.need_sir' 
                                wire:focusout="dispatchMe('need_sir')"
                                >
                            <label for="4-sir-no" class="text-base font-medium cursor-pointer">
                                <span class="text-gray-600 text-xl mr-2">✗</span>NO
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SIR Availability -->
            <div id="sir-availability">
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                    <x-label class="block text-base font-medium text-blue-800 mb-4">IF YES, IS IT AVAILABLE?</x-label>
                    
                    <div class="tablet-grid gap-4">
                        <div class="radio-container rounded-lg border-2 border-blue-200 p-4" >
                            <div class="flex items-center space-x-3">
                                <input 
                                    id="4-avail-yes" 
                                    type="radio" 
                                    value="1" 
                                    name="4-avail" 
                                    class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                    wire:model='inputs.sir_available' 
                                    wire:focusout="dispatchMe('sir_available')">
                                <label for="4-avail-yes" class="text-base font-medium cursor-pointer">
                                    <span class="text-green-600 text-xl mr-2">✓</span>YES
                                </label>
                            </div>
                        </div>
                        <div class="radio-container rounded-lg border-2 border-blue-200 p-4">
                            <div class="flex items-center space-x-3">
                                <input 
                                    id="4-avail-no" 
                                    type="radio" 
                                    value="0" 
                                    name="4-avail" 
                                    class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                    wire:model='inputs.sir_available' 
                                    wire:focusout="dispatchMe('sir_available')">
                                <label for="4-avail-no" class="text-base font-medium cursor-pointer">
                                    <span class="text-red-600 text-xl mr-2">✗</span>NO
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

