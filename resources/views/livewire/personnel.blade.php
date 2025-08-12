<div class="max-w-6xl mx-auto px-4 mt-6 bg-white rounded-xl py-4">
    <div class="bg-white rounded-3xl card-shadow overflow-hidden">
        <!-- Enhanced Header -->
        <div class="gradient-bg text-white px-8 py-6">
            <div class="flex items-center justify-center">
                <div class="bg-white/20 rounded-full p-3 mr-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <div>
                    <h1 class="text-3xl font-bold">Personnel Information</h1>
                    <p class="text-white/80 mt-1">Complete the form below with accurate information</p>
                </div>
            </div>
        </div>

        <!-- Form Content -->
        <div class="p-8">
            <!-- Basic Information Section -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-gray-800 mb-6 flex items-center">
                    <div class="w-2 h-6 bg-gradient-to-b from-blue-500 to-purple-600 rounded-full mr-3"></div>
                    Basic Information
                </h2>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Shipping PIC -->
                    <div class="form-group">
                        <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-6 border border-blue-100">
                            <label for="7-shippingpic" class="block text-sm font-semibold text-gray-700 mb-3">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                        </svg>
                                        Shipping PIC
                                    </div>
                                    <button type="button"
                                            wire:click="openQrScanner('shipping_pic')"
                                            class="inline-flex items-center px-3 py-1.5 bg-blue-600 hover:bg-blue-700 text-white text-xs font-medium rounded-lg transition-colors duration-200"
                                            @if($checklistInfo->status == "Closed")
                                            disabled
                                            @endif
                                            >
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 16h4m-4 0v4m-4-4h4m-4-4h4m-4-4v4"></path>
                                        </svg>
                                        Scan QR
                                    </button>
                                </div>
                            </label>

                            <x-inputText
                                id="7-shippingpic"
                                wire:model='inputs.shipping_pic'
                                wire:focusout="dispatchMe('shipping_pic')"
                                :inputStatus="$inputStatus['shipping_pic'] ?? null"
                                placeholder="Enter shipping person in charge or scan barcode"
                                :closingStatus="$checklistInfo->status">
                            </x-inputText>
                        </div>
                    </div>

                    <!-- Date -->
                    <div class="form-group">
                        <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl p-6 border border-green-100">
                            <label for="7-date" class="block text-sm font-semibold text-gray-700 mb-3">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    Date
                                </div>
                            </label>
                            <input
                                type="date"
                                id="7-date"
                                class="input-field w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent bg-white text-gray-900"
                                wire:model='inputs.date'
                                wire:focusout="dispatchMe('date')"
                                @if($checklistInfo->status == "Closed")
                                disabled
                                @endif
                            />
                        </div>
                    </div>
                </div>
            </div>

            <!-- OBA Check Section -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-gray-800 mb-6 flex items-center">
                    <div class="w-2 h-6 bg-gradient-to-b from-orange-500 to-red-600 rounded-full mr-3"></div>
                    OBA Verification
                </h2>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- OBA Checked By -->
                    <div class="form-group">
                        <div class="bg-gradient-to-br from-orange-50 to-red-50 rounded-2xl p-6 border border-orange-100">
                            <label for="7-oba" class="block text-sm font-semibold text-gray-700 mb-3">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 mr-2 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        OBA Checked By
                                    </div>
                                    <button type="button"
                                            wire:click="openQrScanner('oba_checked_by')"
                                            class="inline-flex items-center px-3 py-1.5 bg-orange-600 hover:bg-orange-700 text-white text-xs font-medium rounded-lg transition-colors duration-200"
                                            @if($checklistInfo->status == "Closed")
                                            disabled
                                            @endif>
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 16h4m-4 0v4m-4-4h4m-4-4h4m-4-4v4"></path>
                                        </svg>
                                        Scan QR
                                    </button>
                                </div>
                            </label>
                            <x-inputText
                                id="7-oba"
                                wire:model='inputs.oba_checked_by'
                                wire:focusout="dispatchMe('oba_checked_by')"
                                :inputStatus="$inputStatus['oba_checked_by'] ?? null"
                                placeholder="Enter inspector name"
                                :closingStatus="$checklistInfo->status">
                            </x-inputText>
                        </div>
                    </div>

                    <!-- OBA Judgement -->
                    <div class="form-group">
                        <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-2xl p-6 border border-purple-100">
                            <label for="7-judgement-oba" class="block text-sm font-semibold text-gray-700 mb-3">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                                    </svg>
                                    Judgement
                                </div>
                            </label>
                            <x-inputText
                                id="7-judgement-oba"
                                wire:model='inputs.check_judgement'
                                wire:focusout="dispatchMe('check_judgement')"
                                :inputStatus="$inputStatus['check_judgement'] ?? null"
                                placeholder="Enter judgement result"
                                :closingStatus="$checklistInfo->status">
                            </x-inputText>
                        </div>
                    </div>
                </div>
            </div>

            <!-- OBA Picture Section -->
            <div>
                <h2 class="text-xl font-semibold text-gray-800 mb-6 flex items-center">
                    <div class="w-2 h-6 bg-gradient-to-b from-teal-500 to-cyan-600 rounded-full mr-3"></div>
                    OBA Picture Documentation
                </h2>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- OBA Picture By -->
                    <div class="form-group">
                        <div class="bg-gradient-to-br from-teal-50 to-cyan-50 rounded-2xl p-6 border border-teal-100">
                            <label for="7-obapic" class="block text-sm font-semibold text-gray-700 mb-3">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 mr-2 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        OBA Picture By
                                    </div>
                                    <button type="button"
                                        wire:click="openQrScanner('oba_picture_by')"
                                        class="inline-flex items-center px-3 py-1.5 bg-green-600 hover:bg-green-700 text-white text-xs font-medium rounded-lg transition-colors duration-200"
                                        @if($checklistInfo->status == "Closed")
                                        disabled
                                        @endif>
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 16h4m-4 0v4m-4-4h4m-4-4h4m-4-4v4"></path>
                                        </svg>
                                        Scan QR
                                    </button>
                                </div>
                            </label>
                            <x-inputText
                                id="7-obapic"
                                wire:model='inputs.oba_picture_by'
                                wire:focusout="dispatchMe('oba_picture_by')"
                                :inputStatus="$inputStatus['oba_picture_by'] ?? null"
                                placeholder="Enter photographer name"
                                :closingStatus="$checklistInfo->status">
                            </x-inputText>
                        </div>
                    </div>

                    <!-- Picture Judgement -->
                    <div class="form-group">
                        <div class="bg-gradient-to-br from-indigo-50 to-blue-50 rounded-2xl p-6 border border-indigo-100">
                            <label for="7-judgement-obapic" class="block text-sm font-semibold text-gray-700 mb-3">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                                    </svg>
                                    Picture Judgement
                                </div>
                            </label>
                            <x-inputText
                                id="7-judgement-obapic"
                                wire:model='inputs.picture_judgement'
                                wire:focusout="dispatchMe('picture_judgement')"
                                :inputStatus="$inputStatus['picture_judgement'] ?? null"
                                placeholder="Enter picture quality judgement"
                                :closingStatus="$checklistInfo->status">
                            </x-inputText>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <!-- QR Scanner Modal - Now displays current field being scanned -->
    @if($showQrModal)
    <div class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50"
        x-data="{ isOpen: @entangle('showQrModal') }"
        x-show="isOpen"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0">

        <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-2/3 lg:w-1/2 shadow-lg rounded-md bg-white">
            <!-- Modal Header -->
            <div class="flex items-center justify-between pb-3 border-b">
                <h3 class="text-lg font-semibold text-gray-900">
                    <svg class="w-6 h-6 inline mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 16h4m-4 0v4m-4-4h4m-4-4h4m-4-4v4"></path>
                    </svg>
                    SCAN QR CODE
                    @if($currentQrField)
                        <span class="text-sm font-normal text-gray-600">
                            - {{ ucfirst(str_replace('_', ' ', $currentQrField)) }}
                        </span>
                    @endif
                </h3>
                <button type="button"
                        wire:click="closeQrScanner"
                        class="text-gray-400 hover:text-gray-600 text-2xl font-bold">
                    &times;
                </button>
            </div>

            <!-- Modal Body -->
            <div class="py-4">
                <div class="text-center" style="border-style: inset; padding: 20px; border-radius: 8px;">
                    <video autoplay="true" id="qr-preview" width="100%" style="max-width: 400px; height: auto;"></video>
                    <div id="qr-loading" class="mt-4">
                        <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600 mx-auto"></div>
                        <p class="mt-2 text-sm text-gray-600">Initializing camera...</p>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="flex justify-between pt-3 border-t">
                <button type="button"
                        wire:click="closeQrScanner"
                        class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white text-sm font-medium rounded-md transition-colors duration-200">
                    Close
                </button>
            </div>
        </div>
    </div>
    @endif
</div>
