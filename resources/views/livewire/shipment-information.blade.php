<div class="max-w-6xl mx-auto px-4 mt-6 bg-white rounded-xl py-4">
    <!-- Enhanced Header -->
    <div class="gradient-bg text-white px-8 py-6 rounded-xl mb-6">
        <div class="flex items-center justify-center">
            <div class="bg-white/20 rounded-full p-3 mr-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <div>
                <h1 class="text-3xl font-bold">Shipment Information</h1>
                <p class="text-white/80 mt-1">Information details for shipment</p>
            </div>
        </div>
    </div>

    <div class="space-y-6">
        <!-- DateTime Section -->
        <div class="form-section">
            <div class="flex items-center mb-4">
                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <h3 class="text-lg font-semibold text-gray-800">Date & Time</h3>
            </div>
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label for="3-datetime" class="block text-sm font-semibold text-gray-700 mb-2">
                        Select Date & Time
                    </label>
                    <input
                        id="3-datetime"
                        type="datetime-local"
                        wire:model='inputs.datetime'
                        wire:focusout="dispatchMe('datetime')"
                        class="custom-input block w-full px-4 py-3 rounded-lg shadow-sm sm:text-sm"
                        placeholder="Pick a date and time"
                        {{-- @if($checklistInfo->status == "Closed") --}}
                        disabled
                        {{-- @endif --}}
                    />
                </div>
                <div class="flex items-center justify-center">
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 text-center">
                        <svg class="w-8 h-8 mx-auto mb-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <p class="text-sm text-blue-600 font-medium">Current Time Zone</p>
                        <p class="text-xs text-blue-500" id="current-time">Loading...</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Model & Invoice Section -->
        <div class="form-section">
            <div class="flex items-center mb-4">
                <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <h3 class="text-lg font-semibold text-gray-800">Product & Invoice Details</h3>
            </div>
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label for="3-modelname" class="block text-sm font-semibold text-gray-700 mb-2">
                        Model Name
                    </label>
                    <input
                        id="3-modelname"
                        name="3-modelname"
                        wire:model="inputs.model_name"
                        wire:focusout="dispatchMe('model_name')"
                        disabled
                        class="custom-input block w-full px-4 py-3 rounded-lg shadow-sm sm:text-sm"
                        placeholder="Model name will appear here"
                    />
                    <p class="mt-1 text-xs text-gray-500">This field is auto-populated</p>
                </div>
                <div>
                    <label for="3-invoice" class="block text-sm font-semibold text-gray-700 mb-2">
                        Invoice Number
                    </label>
                    <x-inputText
                        id="3-invoice"
                        name="3-invoice"
                        wire:model="inputs.invoice_number"
                        wire:focusout="dispatchMe('invoice_number')"
                        class="custom-input block w-full px-4 py-3 rounded-lg shadow-sm sm:text-sm"
                        placeholder="Enter invoice number"
                        :inputStatus="$inputStatus['invoice_number']"
                        :closingStatus="$checklistInfo->status"
                        {{-- @if($checklistInfo->status == "Closed")
                        disabled
                        @endif --}}
                    />
                </div>
            </div>
        </div>

        <!-- Pallet Used Section -->
        <div class="form-section">
            <div class="flex items-center mb-4">
                <svg class="w-5 h-5 mr-2 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                </svg>
                <h3 class="text-lg font-semibold text-gray-800">Pallet Material Selection</h3>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                <label class="pallet-option" data-pallet="wood">
                    <div class="flex items-center space-x-3">
                        <x-checkboxCust
                            type="checkbox"
                            id="3-SI-1"
                            value="wood"
                            wire:model="inputs.wood"
                            wire:focusout="dispatchMe('wood')"
                            :inputStatus="$inputStatus['wood']"
                            :closingStatus="$checklistInfo->status"
                        />
                        <div>
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-1 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                                </svg>
                                <span class="font-medium text-gray-800">WOOD</span>
                            </div>
                            <p class="text-xs text-gray-500">Traditional wooden pallets</p>
                        </div>
                    </div>
                </label>

                <label class="pallet-option" data-pallet="paper">
                    <div class="flex items-center space-x-3">
                        <x-checkboxCust
                            type="checkbox"
                            id="3-SI-2"
                            value="paper"
                            wire:model="inputs.paper"
                            wire:focusout="dispatchMe('paper')"
                            :inputStatus="$inputStatus['paper']"
                            :closingStatus="$checklistInfo->status"
                        />
                        <div>
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-1 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <span class="font-medium text-gray-800">PAPER</span>
                            </div>
                            <p class="text-xs text-gray-500">Eco-friendly paper pallets</p>
                        </div>
                    </div>
                </label>

                <label class="pallet-option" data-pallet="steel">
                    <div class="flex items-center space-x-3">
                        <x-checkboxCust
                            type="checkbox"
                            id="3-SI-3"
                            value="steel"
                            wire:model="inputs.steel"
                            wire:focusout="dispatchMe('steel')"
                            :inputStatus="$inputStatus['steel']"
                            :closingStatus="$checklistInfo->status"
                        />
                        <div>
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-1 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                                </svg>
                                <span class="font-medium text-gray-800">STEEL</span>
                            </div>
                            <p class="text-xs text-gray-500">Heavy-duty steel pallets</p>
                        </div>
                    </div>
                </label>

                <label class="pallet-option" data-pallet="plastic">
                    <div class="flex items-center space-x-3">
                        <x-checkboxCust
                            type="checkbox"
                            id="3-SI-4"
                            value="plastic"
                            wire:model="inputs.plastic"
                            wire:focusout="dispatchMe('plastic')"
                            :inputStatus="$inputStatus['plastic']"
                            :closingStatus="$checklistInfo->status"
                        />
                        <div>
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-1 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                </svg>
                                <span class="font-medium text-gray-800">PLASTIC</span>
                            </div>
                            <p class="text-xs text-gray-500">Durable plastic pallets</p>
                        </div>
                    </div>
                </label>
            </div>

            <!-- Others Input -->
            <div>
                <label for="3-others" class="block text-sm font-semibold text-gray-700 mb-2">
                    Other Materials (Please Specify)
                </label>
                <x-inputText
                    type="text"
                    id="3-others"
                    name="3-others"
                    placeholder="Enter other pallet materials..."
                    wire:model="inputs.others"
                    wire:focusout="dispatchMe('others')"
                    class="custom-input block w-full px-4 py-3 rounded-lg shadow-sm sm:text-sm"
                    :inputStatus="$inputStatus['others']"
                    :closingStatus="$checklistInfo->status"
                    {{-- @if($checklistInfo->status == "Closed")
                    disabled
                    @endif --}}
                />
            </div>
            <div>
                <label for="3-others" class="block text-sm font-semibold text-gray-700 my-2">
                    PALLET SIZE
                </label>
                <x-inputText
                    type="text"
                    id="3-pallet_size"
                    name="3-pallet_size"
                    placeholder="Enter pallet size..."
                    wire:model="inputs.pallet_size"
                    wire:focusout="dispatchMe('pallet_size')"
                    class="custom-input block w-full px-4 py-3 rounded-lg shadow-sm sm:text-sm"
                    :inputStatus="$inputStatus['pallet_size']"
                    :closingStatus="$checklistInfo->status"
                    {{-- @if($checklistInfo->status == "Closed")
                    disabled
                    @endif --}}
                />
            </div>
        </div>
    </div>
</div>
