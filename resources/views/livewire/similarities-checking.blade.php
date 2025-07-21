<div class="max-w-6xl mx-auto px-4 mt-6 bg-white rounded-xl py-4">
    <!-- Enhanced Header -->
    <div class="gradient-bg text-white px-8 py-6 rounded-xl mb-6">
        <div class="flex items-center justify-center">
            <div class="bg-white/20 rounded-full p-3 mr-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                </svg>
            </div>
            <div>
                <h1 class="text-3xl font-bold">Similarities Checking</h1>
                <p class="text-white/80 mt-1">Labels and documentation</p>
            </div>
        </div>
    </div>
    <div>
        <div class="section-card card-hover rounded-2xl shadow-lg p-4 md:p-6 mb-6">
            <div class="flex items-center space-x-3 mb-6">
                <div class="bg-blue-100 p-2 rounded-lg">
                    <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h7.586a1 1 0 01.707.293l2.414 2.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <h2 class="text-lg md:text-xl font-semibold text-gray-800">Quantity For Shipment</h2>
            </div>
            <div class="grid gap-6 mb-6 mt-2 md:grid-rows-3 md:grid-cols-2 rounded-xl p-2 bg-gradient-to-r from-blue-50 to-indigo-50 pt-12">
                
                <div class="col-span-1 md:grid-cols-2">
                    <div class="col-span-1 flex items-center justify-center">
                        <x-label for="5-picklist-num-input">PICK LIST</x-label>
                        <x-inputNum id="5-picklist-num-input" wire:model='inputs.pick_list_qs' wire:focusout="dispatchMe('pick_list_qs')" :inputStatus="$inputStatus['pick_list_qs']"
                        > </x-inputNum>
                    </div>
                </div>
                <div class="col-span-1 md:grid-cols-2">
                    <div class="col-span-1 flex items-center justify-center">
                        <x-label for="5-shipinv-num-input">SHIPPING INVOICE</x-label><x-inputNum id="5-shipinv-num-input" wire:model='inputs.shipping_invoice_qs' wire:focusout="dispatchMe('shipping_invoice_qs')" :inputStatus="$inputStatus['shipping_invoice_qs']"></x-inputNum>
                    </div>
                </div>
                <div class="col-span-1 md:grid-cols-2">
                    <div class="col-span-1 flex items-center justify-center">
                        <x-label for="5-serem-num-input">SEREM</x-label><x-inputNum id="5-serem-num-input" wire:model='inputs.serem_qs' wire:focusout="dispatchMe('serem_qs')" :inputStatus="$inputStatus['serem_qs']"></x-inputNum>
                    </div>
                </div>
                @if($sir_qs)
                <div class="col-span-1 md:grid-cols-2">
                    <div class="col-span-1 flex items-center justify-center">
                        <x-label for="5-sir-num-input">SIR</x-label><x-inputNum id="5-sir-num-input" wire:model='inputs.sir_qs' wire:focusout="dispatchMe('sir_qs')" :inputStatus="$inputStatus['sir_qs']"></x-inputNum>
                    </div>
                </div>
                @endif
            </div>
            <div class="bg-gradient-to-r from-slate-50 to-slate-100 rounded-lg border-2 border-slate-200 p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-6 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    VERIFICATION
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-3">
                        <x-label class="text-base font-medium text-gray-700 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                            </svg>
                            ARE ALL QUANTITY FOR SHIPMENT THE SAME?
                        </x-label>
                        <div class="bg-white rounded-lg border border-gray-200 p-1">
                            <div class="grid grid-cols-2 gap-1 radio-container rounded-lg p-4" >
                                <div class="flex items-center space-x-3">
                                    <input 
                                        id="5-radio-qfs-yes" 
                                        type="radio" 
                                        value="1" 
                                        wire:model='inputs.same_quantity_qs' 
                                        wire:focusout="dispatchMe('same_quantity_qs')" 
                                        name="5-radio-qfs-shipment" 
                                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                        >
                                    <label for="4-radio-model-yes" class="text-base font-medium cursor-pointer">
                                        <span class="text-green-600 text-xl mr-2">✓</span>YES
                                    </label>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <input 
                                        id="5-radio-qfs-no" 
                                        type="radio" 
                                        value="0" 
                                        wire:model='inputs.same_quantity_qs' 
                                        wire:focusout="dispatchMe('same_quantity_qs')" 
                                        name="5-radio-qfs-shipment" 
                                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                        >
                                    <label for="4-radio-model-yes" class="text-base font-medium cursor-pointer">
                                        <span class="text-red-600 text-xl mr-2">✗</span>NO
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Judgement -->
                    <div class="space-y-3">
                        <x-label class="text-base font-medium text-gray-700 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-purple-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z" clip-rule="evenodd"/>
                            </svg>
                            Final Judgement
                        </x-label>
                        <div class="bg-white rounded-lg border border-gray-200 p-1">
                            <div class="grid grid-cols-2 gap-1 radio-container rounded-lg p-4">
                                <div class="flex items-center space-x-3">
                                    <input 
                                        id="5-radio-qfs-ok" 
                                        type="radio" value="1"
                                        wire:model='inputs.judgement_qs' 
                                        wire:focusout="dispatchMe('judgement_qs')" 
                                        name="5-radio-qfs-judgement"  
                                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                        >
                                    <label for="4-radio-model-yes" class="text-base font-medium cursor-pointer">
                                        <span class="text-green-600 text-xl mr-2">✓</span>OK
                                    </label>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <input 
                                        id="5-radio-qfs-ng" 
                                        type="radio" 
                                        value="0" 
                                        wire:model='inputs.judgement_qs' 
                                        wire:focusout="dispatchMe('judgement_qs')" 
                                        name="5-radio-qfs-judgement" 
                                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                        >
                                    <label for="4-radio-model-yes" class="text-base font-medium cursor-pointer">
                                        <span class="text-red-600 text-xl mr-2">✗</span>NG
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-card card-hover rounded-2xl shadow-lg p-4 md:p-6 mb-6">
            <div class="flex items-center space-x-3 mb-6">
                <div class="bg-blue-100 p-2 rounded-lg">
                    <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h7.586a1 1 0 01.707.293l2.414 2.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <h2 class="text-lg md:text-xl font-semibold text-gray-800">NUMBER OF BOXES FOR SHIPMENT</h2>
            </div>
            <div class="grid gap-6 mb-6 mt-2 md:grid-rows-3 md:grid-cols-2 rounded-xl p-2 bg-gradient-to-r from-blue-50 to-indigo-50 pt-12">
                <div class="col-span-1 md:grid-cols-2">
                    <div class="col-span-1 flex items-center justify-center">
                        <x-label for="5-picklist-boxship-input">PICK LIST</x-label><x-inputNum id="5-picklist-boxship-input" wire:model='inputs.picklist_bs' wire:focusout="dispatchMe('picklist_bs')" :inputStatus="$inputStatus['picklist_bs']"></x-inputNum>
                    </div>
                </div>
                <div class="col-span-1 md:grid-cols-2">
                    <div class="col-span-1 flex items-center justify-center">
                        <x-label for="5-packslip-boxship-input">PACKING SLIP</x-label><x-inputNum id="5-packslip-boxship-input" wire:model='inputs.packing_slip_bs' wire:focusout="dispatchMe('packing_slip_bs')" :inputStatus="$inputStatus['packing_slip_bs']"></x-inputNum>
                    </div>
                </div>
                <div class="col-span-1 md:grid-cols-2">
                    <div class="col-span-1 flex items-center justify-center">
                        <x-label for="5-serem-boxship-input">SEREM</x-label><x-inputNum id="5-serem-boxship-input" wire:model='inputs.serem_bs' wire:focusout="dispatchMe('serem_bs')" :inputStatus="$inputStatus['serem_bs']"></x-inputNum>
                    </div>
                </div>
                <div class="col-span-1 md:grid-cols-2">
                    <div class="col-span-1 flex items-center justify-center">
                        <x-label for="5-palletlabel-boxship-input">PALLET LABEL</x-label><x-inputNum id="5-palletlabel-boxship-input" wire:model='inputs.pallet_label_bs' wire:focusout="dispatchMe('pallet_label_bs')" :inputStatus="$inputStatus['pallet_label_bs']"></x-inputNum>
                    </div>
                </div>
            </div>
            <div class="bg-gradient-to-r from-slate-50 to-slate-100 rounded-lg border-2 border-slate-200 p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-6 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    VERIFICATION
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-3">
                        <x-label class="text-base font-medium text-gray-700 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                            </svg>
                            ARE ALL NO. OF BOXES FOR SHIPMENT THE SAME?
                        </x-label>
                        <div class="bg-white rounded-lg border border-gray-200 p-1">
                            <div class="grid grid-cols-2 gap-1 radio-container rounded-lg p-4" >
                                <div class="flex items-center space-x-3">
                                    <input 
                                        id="5-boxship-radio-yes" 
                                        type="radio" value="1" 
                                        wire:model='inputs.same_box_bs' 
                                        wire:focusout="dispatchMe('same_box_bs')" 
                                        name="5-boxship-radio-same" 
                                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                        >
                                    <label for="4-radio-model-yes" class="text-base font-medium cursor-pointer">
                                        <span class="text-green-600 text-xl mr-2">✓</span>YES
                                    </label>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <input 
                                        id="5-boxship-radio-no" 
                                        type="radio" 
                                        value="0" 
                                        wire:model='inputs.same_box_bs' 
                                        wire:focusout="dispatchMe('same_box_bs')" 
                                        name="5-boxship-radio-same" 
                                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                        >
                                    <label for="4-radio-model-yes" class="text-base font-medium cursor-pointer">
                                        <span class="text-red-600 text-xl mr-2">✗</span>NO
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Judgement -->
                    <div class="space-y-3">
                        <x-label class="text-base font-medium text-gray-700 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-purple-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z" clip-rule="evenodd"/>
                            </svg>
                            Final Judgement
                        </x-label>
                        <div class="bg-white rounded-lg border border-gray-200 p-1">
                            <div class="grid grid-cols-2 gap-1 radio-container rounded-lg p-4">
                                <div class="flex items-center space-x-3">
                                    <input 
                                        id="horizontal-list-radio-license" 
                                        type="radio" 
                                        value="1" 
                                        wire:model='inputs.judgement_bs' 
                                        wire:focusout="dispatchMe('judgement_bs')" 
                                        name="5-boxship-radio-judgement" 
                                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                        >
                                    <label for="4-radio-model-yes" class="text-base font-medium cursor-pointer">
                                        <span class="text-green-600 text-xl mr-2">✓</span>OK
                                    </label>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <input 
                                        id="horizontal-list-radio-id" 
                                        type="radio"
                                        value="0" 
                                        wire:model='inputs.judgement_bs' 
                                        wire:focusout="dispatchMe('judgement_bs')" 
                                        name="5-boxship-radio-judgement"
                                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                        >
                                    <label for="4-radio-model-yes" class="text-base font-medium cursor-pointer">
                                        <span class="text-red-600 text-xl mr-2">✗</span>NG
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="section-card card-hover rounded-2xl shadow-lg p-4 md:p-6 mb-6">
            <div class="flex items-center space-x-3 mb-6">
                <div class="bg-blue-100 p-2 rounded-lg">
                    <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h7.586a1 1 0 01.707.293l2.414 2.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <h2 class="text-lg md:text-xl font-semibold text-gray-800">MODEL NAME</h2>
            </div>
            <div class="grid gap-6 mb-6 mt-2 md:grid-rows-3 md:grid-cols-2 rounded-xl p-2 bg-gradient-to-r from-blue-50 to-indigo-50 pt-12">
                <div class="col-span-1 md:grid-cols-2">
                    <div class="col-span-1 flex items-center justify-center">
                        <x-label for="5-picklist-model-input">PICK LIST</x-label><x-inputText id="5-picklist-model-input" wire:model='inputs.picklist_mn' wire:focusout="dispatchMe('picklist_mn')" :inputStatus="$inputStatus['picklist_mn']"></x-inputText>
                    </div>
                </div>
                <div class="col-span-1 md:grid-cols-2">
                    <div class="col-span-1 flex items-center justify-center">
                        <x-label for="5-shipinv-model-input">SHIPPING INVOICE</x-label><x-inputText id="5-shipinv-model-input" wire:model='inputs.shipping_invoice_mn' wire:focusout="dispatchMe('shipping_invoice_mn')" :inputStatus="$inputStatus['shipping_invoice_mn']"></x-inputText>
                    </div>
                </div>
                <div class="col-span-1 md:grid-cols-2">
                    <div class="col-span-1 flex items-center justify-center">
                        <x-label for="5-serem-model-input">SEREM</x-label><x-inputText id="5-serem-model-input" marginleft="ml-4" wire:model='inputs.serem_mn' wire:focusout="dispatchMe('serem_mn')" :inputStatus="$inputStatus['serem_mn']"></x-inputText>
                    </div>
                </div>
                <div class="col-span-1 md:grid-cols-2">
                    <div class="col-span-1 flex items-center justify-center">
                        {{-- //FG BARCODE LABEL --}}
                        <x-label for="5-fglabel-model-input">PACKAGE BARCODE LABEL</x-label><x-inputText id="5-fglabel-model-input" wire:model='inputs.fg_label_mn' wire:focusout="dispatchMe('fg_label_mn')" :inputStatus="$inputStatus['fg_label_mn']"></x-inputText>
                    </div>
                </div>
                @if($vmi_mn)
                <div class="col-span-1 md:grid-cols-2">
                    <div class="col-span-1 flex items-center justify-center">
                        <x-label for="5-vmi-model-input">VMI LABEL / QR CODE LABEL</x-label><x-inputText id="5-vmi-model-input" wire:model='inputs.vmi_qr_mn' wire:focusout="dispatchMe('vmi_qr_mn')" :inputStatus="$inputStatus['vmi_qr_mn']"></x-inputText>
                    </div>
                </div>
                @endif
                <div class="col-span-1 md:grid-cols-2">
                    <div class="col-span-1 flex items-center justify-center">
                        <x-label for="5-mc-model-input">BOX BARCODE LABEL</x-label><x-inputText id="5-mc-model-input" wire:model='inputs.mc_label_mn' wire:focusout="dispatchMe('mc_label_mn')" :inputStatus="$inputStatus['mc_label_mn']"></x-inputText>
                    </div>
                </div>
                <div class="col-span-1 md:grid-cols-2">
                    <div class="col-span-1 flex items-center justify-center">
                        <x-label for="5-pallet-model-input">PALLET LABEL</x-label><x-inputText id="5-pallet-model-input" wire:model='inputs.pallet_label_mn' wire:focusout="dispatchMe('pallet_label_mn')" :inputStatus="$inputStatus['pallet_label_mn']"></x-inputText>
                    </div>
                </div>
            </div>
            
            <div class="bg-gradient-to-r from-slate-50 to-slate-100 rounded-lg border-2 border-slate-200 p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-6 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    VERIFICATION
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-3">
                        <x-label class="text-base font-medium text-gray-700 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                            </svg>
                            ARE ALL MODEL NAME THE SAME?
                        </x-label>
                        <div class="bg-white rounded-lg border border-gray-200 p-1">
                            <div class="grid grid-cols-2 gap-1 radio-container rounded-lg p-4" >
                                <div class="flex items-center space-x-3">
                                    <input 
                                        id="5-model-same-yes" 
                                        type="radio" 
                                        value="1" 
                                        wire:model='inputs.same_model_mn' 
                                        wire:focusout="dispatchMe('same_model_mn')" 
                                        name="5-model-same" 
                                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                        >
                                    <label for="4-radio-model-yes" class="text-base font-medium cursor-pointer">
                                        <span class="text-green-600 text-xl mr-2">✓</span>YES
                                    </label>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <input 
                                        id="5-model-same-no" 
                                        type="radio" 
                                        value="0" 
                                        wire:model='inputs.same_model_mn' 
                                        wire:focusout="dispatchMe('same_model_mn')" 
                                        name="5-model-same" 
                                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                        >
                                    <label for="4-radio-model-yes" class="text-base font-medium cursor-pointer">
                                        <span class="text-red-600 text-xl mr-2">✗</span>NO
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Judgement -->
                    <div class="space-y-3">
                        <x-label class="text-base font-medium text-gray-700 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-purple-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z" clip-rule="evenodd"/>
                            </svg>
                            Final Judgement
                        </x-label>
                        <div class="bg-white rounded-lg border border-gray-200 p-1">
                            <div class="grid grid-cols-2 gap-1 radio-container rounded-lg p-4">
                                <div class="flex items-center space-x-3">
                                    <input 
                                        id="5-model-judgement-ok" 
                                        type="radio" 
                                        value="1" 
                                        wire:model='inputs.judgement_mn' 
                                        wire:focusout="dispatchMe('judgement_mn')" 
                                        name="5-model-judgement" 
                                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                        >
                                    <label for="4-radio-model-yes" class="text-base font-medium cursor-pointer">
                                        <span class="text-green-600 text-xl mr-2">✓</span>OK
                                    </label>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <input 
                                        id="5-model-judgement-ng" 
                                        type="radio" 
                                        value="0" 
                                        wire:model='inputs.judgement_mn' 
                                        wire:focusout="dispatchMe('judgement_mn')" 
                                        name="5-model-judgement" 
                                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                        >
                                    <label for="4-radio-model-yes" class="text-base font-medium cursor-pointer">
                                        <span class="text-red-600 text-xl mr-2">✗</span>NG
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-card card-hover rounded-2xl shadow-lg p-4 md:p-6 mb-6">
            <div class="flex items-center space-x-3 mb-6">
                <div class="bg-blue-100 p-2 rounded-lg">
                    <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h7.586a1 1 0 01.707.293l2.414 2.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <h2 class="text-lg md:text-xl font-semibold text-gray-800">MODEL CODE</h2>
            </div>
            <div class="grid gap-6 mb-6 mt-2 md:grid-rows-3 md:grid-cols-2 rounded-xl p-2 bg-gradient-to-r from-blue-50 to-indigo-50 pt-12">
                <div class="col-span-1 md:grid-cols-2">
                    <div class="col-span-1 flex items-center justify-center">
                        <x-label for="5-picklist-modelcode-input">PICK LIST</x-label><x-inputText id="5-picklist-modelcode-input" wire:model='inputs.picklist_mc' wire:focusout="dispatchMe('picklist_mc')" :inputStatus="$inputStatus['picklist_mc']"></x-inputText>
                    </div>
                </div>
                <div class="col-span-1 md:grid-cols-2">
                    <div class="col-span-1 flex items-center justify-center">
                        <x-label for="5-shipinv-modelcode-input">SHIPPING INVOICE</x-label><x-inputText id="5-shipinv-modelcode-input" wire:model='inputs.shipping_invoice_mc' wire:focusout="dispatchMe('shipping_invoice_mc')" :inputStatus="$inputStatus['shipping_invoice_mc']"></x-inputText>
                    </div>
                </div>
                <div class="col-span-1 md:grid-cols-2">
                    <div class="col-span-1 flex items-center justify-center">
                        <x-label for="5-serem-momodelcodedel-input">SEREM</x-label><x-inputText id="5-serem-modelcode-input" marginleft="ml-4" wire:model='inputs.serem_mc' wire:focusout="dispatchMe('serem_mc')" :inputStatus="$inputStatus['serem_mc']"></x-inputText>
                    </div>
                </div>
                @if($sir_mc)
                <div class="col-span-1 md:grid-cols-2">
                    <div class="col-span-1 flex items-center justify-center">
                        <x-label for="5-sir-modelcode-input">SIR</x-label><x-inputText id="5-sir-modelcode-input" marginleft="ml-6" wire:model='inputs.sir_mc' wire:focusout="dispatchMe('sir_mc')" :inputStatus="$inputStatus['sir_mc']"></x-inputText>
                    </div>
                </div>
                @endif
                <div class="col-span-1 md:grid-cols-2">
                    <div class="col-span-1 flex items-center justify-center">
                        <x-label for="5-shiplabel-modelcode-input">SHIPPING LABEL (OTHER MODEL)</x-label><x-inputText id="5-shiplabel-modelcode-input" wire:model='inputs.shipping_label_mc' wire:focusout="dispatchMe('shipping_label_mc')" :inputStatus="$inputStatus['shipping_label_mc']"></x-inputText>
                    </div>
                </div>
                @if($vmi_mc)
                <div class="col-span-1 md:grid-cols-2">
                    <div class="col-span-1 flex items-center justify-center">
                        <x-label for="5-vmi-modelcode-input">VMI LABEL</x-label><x-inputText id="5-vmi-modelcode-input" wire:model='inputs.vmi_label_mc' wire:focusout="dispatchMe('vmi_label_mc')" :inputStatus="$inputStatus['vmi_label_mc']"></x-inputText>
                    </div>
                </div>
                @endif
                <div class="col-span-1 md:grid-cols-2">
                    <div class="col-span-1 flex items-center justify-center">
                        <x-label for="5-mc-modelcode-input">BOX BARCODE LABEL</x-label><x-inputText id="5-mc-modelcode-input" wire:model='inputs.mc_barcode_mc' wire:focusout="dispatchMe('mc_barcode_mc')" :inputStatus="$inputStatus['mc_barcode_mc']"></x-inputText>
                    </div>
                </div>
                <div class="col-span-1 md:grid-cols-2">
                    <div class="col-span-1 flex items-center justify-center">
                        <x-label for="5-pallet-modelcode-input">PALLET LABEL</x-label><x-inputText id="5-pallet-modelcode-input" wire:model='inputs.pallet_label_mc' wire:focusout="dispatchMe('pallet_label_mc')" :inputStatus="$inputStatus['pallet_label_mc']"></x-inputText>
                    </div>
                </div>
                @if($specific_label_mc)
                <div class="col-span-1 md:grid-cols-2">
                    <div class="col-span-1 flex items-center justify-center">
                        <x-label for="5-speciallabel-modelcode-input">SPECIFIC LABEL/QR CODE LABEL</x-label><x-inputText id="5-speciallabel-modelcode-input" wire:model='inputs.specific_qr_label_mc' wire:focusout="dispatchMe('specific_qr_label_mc')" :inputStatus="$inputStatus['specific_qr_label_mc']"></x-inputText>
                    </div>
                </div>
                @endif
                <div class="col-span-1 md:grid-cols-2">
                    <div class="col-span-1 flex items-center justify-center">
                        <x-label for="5-package-modelcode-input">PACKAGE BARCODE LABEL</x-label><x-inputText id="5-package-modelcode-input" wire:model='inputs.package_mc' wire:focusout="dispatchMe('package_mc')" :inputStatus="$inputStatus['package_mc']"></x-inputText>
                    </div>
                </div>
            </div>
            <div class="bg-gradient-to-r from-slate-50 to-slate-100 rounded-lg border-2 border-slate-200 p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-6 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    VERIFICATION
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-3">
                        <x-label class="text-base font-medium text-gray-700 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                            </svg>
                            ARE ALL MODEL CODE THE SAME?
                        </x-label>
                        <div class="bg-white rounded-lg border border-gray-200 p-1">
                            <div class="grid grid-cols-2 gap-1 radio-container rounded-lg p-4" >
                                <div class="flex items-center space-x-3">
                                    <input 
                                        id="5-modelcode-same-yes" 
                                        type="radio" 
                                        value="1" 
                                        wire:model='inputs.same_mc' 
                                        wire:focusout="dispatchMe('same_mc')" 
                                        name="5-modelcode-same" 
                                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                        >
                                    <label for="4-radio-model-yes" class="text-base font-medium cursor-pointer">
                                        <span class="text-green-600 text-xl mr-2">✓</span>YES
                                    </label>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <input 
                                        id="5-modelcode-same-no" 
                                        type="radio" 
                                        value="0"
                                        wire:model='inputs.same_mc' 
                                        wire:focusout="dispatchMe('same_mc')" 
                                        name="5-modelcode-same" 
                                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                        >
                                    <label for="4-radio-model-yes" class="text-base font-medium cursor-pointer">
                                        <span class="text-red-600 text-xl mr-2">✗</span>NO
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Judgement -->
                    <div class="space-y-3">
                        <x-label class="text-base font-medium text-gray-700 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-purple-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z" clip-rule="evenodd"/>
                            </svg>
                            Final Judgement
                        </x-label>
                        <div class="bg-white rounded-lg border border-gray-200 p-1">
                            <div class="grid grid-cols-2 gap-1 radio-container rounded-lg p-4">
                                <div class="flex items-center space-x-3">
                                    <input 
                                        id="5-modelcode-judegment-ok" 
                                        type="radio" 
                                        value="1" 
                                        wire:model='inputs.judgement_mc' 
                                        wire:focusout="dispatchMe('judgement_mc')" 
                                        name="5-modelcode-judegment" 
                                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                        >
                                    <label for="4-radio-model-yes" class="text-base font-medium cursor-pointer">
                                        <span class="text-green-600 text-xl mr-2">✓</span>OK
                                    </label>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <input 
                                        id="5-modelcode-judegment-ng" 
                                        type="radio" 
                                        value="0" 
                                        wire:model='inputs.judgement_mc' 
                                        wire:focusout="dispatchMe('judgement_mc')" 
                                        name="5-modelcode-judegment" 
                                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                        >
                                    <label for="4-radio-model-yes" class="text-base font-medium cursor-pointer">
                                        <span class="text-red-600 text-xl mr-2">✗</span>NG
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-card card-hover rounded-2xl shadow-lg p-4 md:p-6 mb-6">
            <div class="flex items-center space-x-3 mb-6">
                <div class="bg-blue-100 p-2 rounded-lg">
                    <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h7.586a1 1 0 01.707.293l2.414 2.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <h2 class="text-lg md:text-xl font-semibold text-gray-800">PART NUMBER</h2>
            </div>
            <div class="grid gap-6 mb-6 mt-2 md:grid-rows-3 md:grid-cols-2 rounded-xl p-2 bg-gradient-to-r from-blue-50 to-indigo-50 pt-12">
                @if($picklist_pn)
                <div class="col-span-1 md:grid-cols-2">
                    <div class="col-span-1 flex items-center justify-center">
                        <x-label for="5-picklist-partnumber-input">PICK LIST</x-label><x-inputText id="5-picklist-partnumber-input" wire:model='inputs.picklist_pn' wire:focusout="dispatchMe('picklist_pn')" :inputStatus="$inputStatus['picklist_pn']"></x-inputText>
                    </div>
                </div>
                @endif
                <div class="col-span-1 md:grid-cols-2">
                    <div class="col-span-1 flex items-center justify-center">
                        <x-label for="5-shipinv-partnumber-input">SHIPPING INVOICE</x-label><x-inputText id="5-shipinv-partnumber-input" wire:model='inputs.shipping_invoice_pn' wire:focusout="dispatchMe('shipping_invoice_pn')" :inputStatus="$inputStatus['shipping_invoice_pn']"></x-inputText>
                    </div>
                </div>
                <div class="col-span-1 md:grid-cols-2">
                    <div class="col-span-1 flex items-center justify-center">
                        <x-label for="5-serem-partnumber-input">SEREM</x-label><x-inputText id="5-serem-partnumber-input" marginleft="ml-4" wire:model='inputs.serem_pn' wire:focusout="dispatchMe('serem_pn')" :inputStatus="$inputStatus['serem_pn']"></x-inputText>
                    </div>
                </div>
                @if($sir_pn)
                <div class="col-span-1 md:grid-cols-2">
                    <div class="col-span-1 flex items-center justify-center">
                        <x-label for="5-sir-partnumber-input">SIR</x-label><x-inputText id="5-sir-partnumber-input" marginleft="ml-6" wire:model='inputs.sir_pn' wire:focusout="dispatchMe('sir_pn')" :inputStatus="$inputStatus['sir_pn']"></x-inputText>
                    </div>
                </div>
                @endif
                <div class="col-span-1 md:grid-cols-2">
                    <div class="col-span-1 flex items-center justify-center">
                        <x-label for="5-shiplabel-partnumber-input">SHIPPING LABEL (OTHER MODEL)</x-label><x-inputText id="5-shiplabel-partnumber-input" wire:model='inputs.shipping_label_pn' wire:focusout="dispatchMe('shipping_label_pn')" :inputStatus="$inputStatus['shipping_label_pn']"></x-inputText>
                    </div>
                </div>
                @if($vmi_pn)
                <div class="col-span-1 md:grid-cols-2">
                    <div class="col-span-1 flex items-center justify-center">
                        <x-label for="5-vmi-partnumber-input">VMI LABEL</x-label><x-inputText id="5-vmi-partnumber-input" wire:model='inputs.vmi_pn' wire:focusout="dispatchMe('vmi_pn')" :inputStatus="$inputStatus['vmi_pn']"></x-inputText>
                    </div>
                </div>
                @endif
                <div class="col-span-1 md:grid-cols-2">
                    <div class="col-span-1 flex items-center justify-center">
                        <x-label for="5-package-partnumber-input">PACKAGE BARCODE LABEL</x-label><x-inputText id="5-package-partnumber-input" wire:model='inputs.package_pn' wire:focusout="dispatchMe('package_pn')" :inputStatus="$inputStatus['package_pn']"></x-inputText>
                    </div>
                </div>
                <div class="col-span-1 md:grid-cols-2">
                    <div class="col-span-1 flex items-center justify-center">
                        <x-label for="5-qr_qa-partnumber-input">SPECIFIC LABEL/QR CODE LABEL(PROVIDED BY QA)</x-label><x-inputText id="5-qr_qa-partnumber-input" wire:model='inputs.qr_qa_pn' wire:focusout="dispatchMe('qr_qa_pn')" :inputStatus="$inputStatus['qr_qa_pn']"></x-inputText>
                    </div>
                </div>
                <div class="col-span-1 md:grid-cols-2">
                    <div class="col-span-1 flex items-center justify-center">
                        <x-label for="5-qr_mgtz-partnumber-input">SPECIFIC LABEL/QR CODE LABEL(PROVIDED BY MGTZ)</x-label><x-inputText id="5-qr_mgtz-partnumber-input" wire:model='inputs.qr_mgtz_pn' wire:focusout="dispatchMe('qr_mgtz_pn')" :inputStatus="$inputStatus['qr_mgtz_pn']"></x-inputText>
                    </div>
                </div>
                <div class="col-span-1 md:grid-cols-2">
                    <div class="col-span-1 flex items-center justify-center">
                        <x-label for="5-qr_mc-partnumber-input">SPECIFIC LABEL/QR CODE LABEL(PROVIDED BY MC)</x-label><x-inputText id="5-qr_mc-partnumber-input" wire:model='inputs.qr_mc_pn' wire:focusout="dispatchMe('qr_mc_pn')" :inputStatus="$inputStatus['qr_mc_pn']"></x-inputText>
                    </div>
                </div>
                <div class="col-span-1 md:grid-cols-2">
                    <div class="col-span-1 flex items-center justify-center">
                        <x-label for="5-pallet-partnumber-input">PALLET LABEL</x-label><x-inputText id="5-pallet-partnumber-input" wire:model='inputs.pallet_label_pn' wire:focusout="dispatchMe('pallet_label_pn')" :inputStatus="$inputStatus['pallet_label_pn']"></x-inputText>
                    </div>
                </div>
                <div class="col-span-1 md:grid-cols-2">
                    <div class="col-span-1 flex items-center justify-center">
                        <x-label for="5-sci_label-partnumber-input">SCI LABEL(SIAM COMPRESSOR INDUSTRY CO.,LTD)</x-label><x-inputText id="5-sci_label-partnumber-input" wire:model='inputs.sci_label_pn' wire:focusout="dispatchMe('sci_label_pn')" :inputStatus="$inputStatus['sci_label_pn']"></x-inputText>
                    </div>
                </div>
            </div>
            <div class="bg-gradient-to-r from-slate-50 to-slate-100 rounded-lg border-2 border-slate-200 p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-6 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    VERIFICATION
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-3">
                        <x-label class="text-base font-medium text-gray-700 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                            </svg>
                            ARE ALL PART NUMBER THE SAME?
                        </x-label>
                        <div class="bg-white rounded-lg border border-gray-200 p-1">
                            <div class="grid grid-cols-2 gap-1 radio-container rounded-lg p-4" >
                                <div class="flex items-center space-x-3">
                                    <input 
                                        id="5-partnumber-same-yes" 
                                        type="radio" 
                                        value="1" 
                                        wire:model='inputs.same_pn'
                                        wire:focusout="dispatchMe('same_pn')" 
                                        name="5-partnumber-same"  
                                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                        >
                                    <label for="4-radio-model-yes" class="text-base font-medium cursor-pointer">
                                        <span class="text-green-600 text-xl mr-2">✓</span>YES
                                    </label>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <input 
                                        id="5-partnumber-same-no" 
                                        type="radio" 
                                        value="0" 
                                        wire:model='inputs.same_pn' 
                                        wire:focusout="dispatchMe('same_pn')" 
                                        name="5-partnumber-same" 
                                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                        >
                                    <label for="4-radio-model-yes" class="text-base font-medium cursor-pointer">
                                        <span class="text-red-600 text-xl mr-2">✗</span>NO
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Judgement -->
                    <div class="space-y-3">
                        <x-label class="text-base font-medium text-gray-700 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-purple-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z" clip-rule="evenodd"/>
                            </svg>
                            Final Judgement
                        </x-label>
                        <div class="bg-white rounded-lg border border-gray-200 p-1">
                            <div class="grid grid-cols-2 gap-1 radio-container rounded-lg p-4">
                                <div class="flex items-center space-x-3">
                                    <input 
                                        id="5-partnumber-judgement-ok" 
                                        type="radio" 
                                        value="1" 
                                        wire:model='inputs.judgement_pn' 
                                        wire:focusout="dispatchMe('judgement_pn')" 
                                        name="5-partnumber-judgement" 
                                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                        >
                                    <label for="4-radio-model-yes" class="text-base font-medium cursor-pointer">
                                        <span class="text-green-600 text-xl mr-2">✓</span>OK
                                    </label>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <input 
                                        id="5-partnumber-judgement-ng" 
                                        type="radio" 
                                        value="0" 
                                        wire:model='inputs.judgement_pn' 
                                        wire:focusout="dispatchMe('judgement_pn')" 
                                        name="5-partnumber-judgement"
                                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                        >
                                    <label for="4-radio-model-yes" class="text-base font-medium cursor-pointer">
                                        <span class="text-red-600 text-xl mr-2">✗</span>NG
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mx-auto section-card card-hover rounded-2xl shadow-lg p-4 md:p-6 mb-6"">
            <div class="flex items-center space-x-3 mb-6">
                <div class="bg-blue-100 p-2 rounded-lg">
                    <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h7.586a1 1 0 01.707.293l2.414 2.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <h2 class="text-lg md:text-xl font-semibold text-gray-800">PO Number Verification</h2>
            </div>

            <div class="p-4 space-y-4">
                
                <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-lg border border-gray-200 overflow-hidden">
                    <div class="bg-gray-800 px-4 py-3">
                        <h3 class="text-white font-semibold text-lg flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            SEREM
                        </h3>
                    </div>
                    <div class="p-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <x-label for="5-ponumber-serem-co" class="text-sm font-medium text-gray-700 flex items-center">
                                <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs mr-2">CUSTOMER</span>
                                Customer PO
                            </x-label>
                            <x-inputText 
                                id="5-ponumber-serem-co" 
                                wire:model='inputs.serem_customer_po' 
                                wire:focusout="dispatchMe('serem_customer_po')" 
                                :inputStatus="$inputStatus['serem_customer_po']"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                            </x-inputText>
                        </div>
                        <div class="space-y-2">
                            <x-label for="5-ponumber-serem-oo" class="text-sm font-medium text-gray-700 flex items-center">
                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs mr-2">INTERNAL</span>
                                Our PO
                            </x-label>
                            <x-inputText 
                                id="5-ponumber-serem-oo" 
                                wire:model='inputs.serem_smp_po' 
                                wire:focusout="dispatchMe('serem_smp_po')" 
                                :inputStatus="$inputStatus['serem_smp_po']"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                            </x-inputText>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    
                    <!-- Left Column -->
                    <div class="space-y-6">
                        
                        <!-- Shipping Label Section -->
                        <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-lg border border-gray-200 overflow-hidden">
                            <div class="bg-orange-600 px-4 py-3">
                                <h3 class="text-white font-semibold flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"/>
                                        <path d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1V5a1 1 0 00-1-1H3zM14 7a1 1 0 00-1 1v6.05A2.5 2.5 0 0115.95 16H17a1 1 0 001-1V8a1 1 0 00-1-1h-3z"/>
                                    </svg>
                                    SHIPPING LABEL
                                    <span class="ml-2 bg-orange-200 text-orange-800 px-2 py-1 rounded text-xs">OTHER MODEL</span>
                                </h3>
                            </div>
                            <div class="p-4 space-y-4">
                                <div class="space-y-2">
                                    <x-label for="5-ponumber-shiplabel-co" class="text-sm font-medium text-gray-700 flex items-center">
                                        <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs mr-2">CUSTOMER</span>
                                        Customer PO
                                    </x-label>
                                    <x-inputText 
                                        id="5-ponumber-shiplabel-co" 
                                        wire:model='inputs.shipping_label_customer_po' 
                                        wire:focusout="dispatchMe('shipping_label_customer_po')" 
                                        :inputStatus="$inputStatus['shipping_label_customer_po']"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-colors">
                                    </x-inputText>
                                </div>
                                <div class="space-y-2">
                                    <x-label for="5-ponumber-shiplabel-oo" class="text-sm font-medium text-gray-700 flex items-center">
                                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs mr-2">INTERNAL</span>
                                        Our PO
                                    </x-label>
                                    <x-inputText 
                                        id="5-ponumber-shiplabel-oo" 
                                        wire:model='inputs.shipping_label_smp_po' 
                                        wire:focusout="dispatchMe('shipping_label_smp_po')" 
                                        :inputStatus="$inputStatus['shipping_label_smp_po']"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-colors">
                                    </x-inputText>
                                </div>
                            </div>
                        </div>
                        
                        @if($vmi_po)
                        <!-- VMI Label Section -->
                        <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-lg border border-gray-200 overflow-hidden">
                            <div class="bg-purple-600 px-4 py-3">
                                <h3 class="text-white font-semibold flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                                    </svg>
                                    VMI LABEL
                                    <span class="ml-2 bg-purple-200 text-purple-800 px-2 py-1 rounded text-xs">MIN, MOR, MIS ONLY</span>
                                </h3>
                            </div>
                            <div class="p-4 space-y-4">
                                <div class="space-y-2">
                                    <x-label for="5-ponumber-vmi-co" class="text-sm font-medium text-gray-700 flex items-center">
                                        <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs mr-2">CUSTOMER</span>
                                        Customer PO
                                    </x-label>
                                    <x-inputText 
                                        id="5-ponumber-vmi-co" 
                                        wire:model='inputs.vmi_customer_po' 
                                        wire:focusout="dispatchMe('vmi_customer_po')" 
                                        :inputStatus="$inputStatus['vmi_customer_po']"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-colors">
                                    </x-inputText>
                                </div>
                                <div class="space-y-2">
                                    <x-label for="5-ponumber-vmi-oo" class="text-sm font-medium text-gray-700 flex items-center">
                                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs mr-2">INTERNAL</span>
                                        Our PO
                                    </x-label>
                                    <x-inputText 
                                        id="5-ponumber-vmi-oo" 
                                        wire:model='inputs.vmi_smp_po' 
                                        wire:focusout="dispatchMe('vmi_smp_po')" 
                                        :inputStatus="$inputStatus['vmi_smp_po']"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-colors">
                                    </x-inputText>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if($specific_label_po)
                        <!-- Specific Label Section -->
                        <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-lg border border-gray-200 overflow-hidden">
                            <div class="bg-indigo-600 px-4 py-3">
                                <h3 class="text-white font-semibold flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h3a1 1 0 011 1v3a1 1 0 01-1 1H4a1 1 0 01-1-1V4zm2 2V5h1v1H5zM3 13a1 1 0 011-1h3a1 1 0 011 1v3a1 1 0 01-1 1H4a1 1 0 01-1-1v-3zm2 2v-1h1v1H5zM13 3a1 1 0 00-1 1v3a1 1 0 001 1h3a1 1 0 001-1V4a1 1 0 00-1-1h-3zm1 2v1h1V5h-1z" clip-rule="evenodd"/>
                                    </svg>
                                    SPECIFIC LABEL / QR CODE
                                </h3>
                            </div>
                            <div class="p-4 space-y-4">
                                <div class="space-y-2">
                                    <x-label for="5-ponumber-specqr-co" class="text-sm font-medium text-gray-700 flex items-center">
                                        <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs mr-2">CUSTOMER</span>
                                        Customer PO
                                    </x-label>
                                    <x-inputText 
                                        id="5-ponumber-specqr-co" 
                                        wire:model='inputs.specific_label_customer_po' 
                                        wire:focusout="dispatchMe('specific_label_customer_po')" 
                                        :inputStatus="$inputStatus['specific_label_customer_po']"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors">
                                    </x-inputText>
                                </div>
                                <div class="space-y-2">
                                    <x-label for="5-ponumber-specqr-oo" class="text-sm font-medium text-gray-700 flex items-center">
                                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs mr-2">INTERNAL</span>
                                        Our PO
                                    </x-label>
                                    <x-inputText 
                                        id="5-ponumber-specqr-oo" 
                                        wire:model='inputs.specific_label_smp_po' 
                                        wire:focusout="dispatchMe('specific_label_smp_po')" 
                                        :inputStatus="$inputStatus['specific_label_smp_po']"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors">
                                    </x-inputText>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        @if($sir_po)
                        <!-- SIR Section -->
                        <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-lg border border-gray-200 overflow-hidden">
                            <div class="bg-red-600 px-4 py-3">
                                <h3 class="text-white font-semibold flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M3 5a2 2 0 012-2h10a2 2 0 012 2v8a2 2 0 01-2 2h-2.22l.123.489.804.804A1 1 0 0113 18H7a1 1 0 01-.707-1.707l.804-.804L7.22 15H5a2 2 0 01-2-2V5zm5.771 7H9a1 1 0 010 2H7.771l.062-.245L8.771 12zm1.062.245L10.771 12H11a1 1 0 110 2H9.229l.604-.755z" clip-rule="evenodd"/>
                                    </svg>
                                    SPECIFIC INSPECTION REPORT (SIR)
                                </h3>
                            </div>
                            <div class="p-4 space-y-4">
                                <div class="space-y-2">
                                    <x-label for="5-ponumber-sir-co" class="text-sm font-medium text-gray-700 flex items-center">
                                        <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs mr-2">CUSTOMER</span>
                                        Customer PO
                                    </x-label>
                                    <x-inputText 
                                        id="5-ponumber-sir-co" 
                                        wire:model='inputs.sir_customer_po' 
                                        wire:focusout="dispatchMe('sir_customer_po')" 
                                        :inputStatus="$inputStatus['sir_customer_po']"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-colors">
                                    </x-inputText>
                                </div>
                                <div class="space-y-2">
                                    <x-label for="5-ponumber-sir-oo" class="text-sm font-medium text-gray-700 flex items-center">
                                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs mr-2">INTERNAL</span>
                                        Our PO
                                    </x-label>
                                    <x-inputText 
                                        id="5-ponumber-sir-oo" 
                                        wire:model='inputs.sir_smp_po' 
                                        wire:focusout="dispatchMe('sir_smp_po')" 
                                        :inputStatus="$inputStatus['sir_smp_po']"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-colors">
                                    </x-inputText>
                                </div>
                            </div>
                        </div>
                        @endif

                        <!-- Pallet Label Section -->
                        <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-lg border border-gray-200 overflow-hidden">
                            <div class="bg-yellow-600 px-4 py-3">
                                <h3 class="text-white font-semibold flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                                    </svg>
                                    PALLET LABEL
                                </h3>
                            </div>
                            <div class="p-4 space-y-4">
                                <div class="space-y-2">
                                    <x-label for="5-ponumber-pallet-co" class="text-sm font-medium text-gray-700 flex items-center">
                                        <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs mr-2">CUSTOMER</span>
                                        Customer PO
                                    </x-label>
                                    <x-inputText 
                                        id="5-ponumber-pallet-co" 
                                        wire:model='inputs.pallet_label_customer_po' 
                                        wire:focusout="dispatchMe('pallet_label_customer_po')" 
                                        :inputStatus="$inputStatus['pallet_label_customer_po']"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-colors">
                                    </x-inputText>
                                </div>
                                <div class="space-y-2">
                                    <x-label for="5-ponumber-pallet-oo" class="text-sm font-medium text-gray-700 flex items-center">
                                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs mr-2">INTERNAL</span>
                                        Our PO
                                    </x-label>
                                    <x-inputText 
                                        id="5-ponumber-pallet-oo" 
                                        wire:model='inputs.pallet_label_smp_po' 
                                        wire:focusout="dispatchMe('pallet_label_smp_po')" 
                                        :inputStatus="$inputStatus['pallet_label_smp_po']"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-colors">
                                    </x-inputText>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-r from-slate-50 to-slate-100 rounded-lg border-2 border-slate-200 p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-6 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        VERIFICATION
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Same PO Question -->
                        <div class="space-y-3">
                            <x-label class="text-base font-medium text-gray-700 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                                </svg>
                                Are all PO numbers the same?
                            </x-label>
                            <div class="bg-white rounded-lg border border-gray-200 p-1">
                                <div class="grid grid-cols-2 gap-1 radio-container rounded-lg p-4" >
                                    <div class="flex items-center space-x-3">
                                        <input 
                                            id="5-ponumber-same-yes" 
                                            type="radio" 
                                            value="1" 
                                            wire:model='inputs.same_po' 
                                            wire:focusout="dispatchMe('same_po')" 
                                            name="5-ponumber-same" 
                                            class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                            >
                                        <label for="4-radio-model-yes" class="text-base font-medium cursor-pointer">
                                            <span class="text-green-600 text-xl mr-2">✓</span>YES
                                        </label>
                                    </div>
                                    <div class="flex items-center space-x-3">
                                        <input 
                                            id="5-ponumber-same-no" 
                                            type="radio" 
                                            value="0" 
                                            wire:model='inputs.same_po' 
                                            wire:focusout="dispatchMe('same_po')" 
                                            name="5-ponumber-same" 
                                            class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                            >
                                        <label for="4-radio-model-yes" class="text-base font-medium cursor-pointer">
                                            <span class="text-red-600 text-xl mr-2">✗</span>NO
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Judgement -->
                        <div class="space-y-3">
                            <x-label class="text-base font-medium text-gray-700 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-purple-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z" clip-rule="evenodd"/>
                                </svg>
                                Final Judgement
                            </x-label>
                            <div class="bg-white rounded-lg border border-gray-200 p-1">
                                <div class="grid grid-cols-2 gap-1 radio-container rounded-lg p-4">
                                    <div class="flex items-center space-x-3">
                                        <input 
                                            id="5-ponumber-judgement-ok" 
                                            type="radio" 
                                            value="1" 
                                            wire:model='inputs.judgement_po' 
                                            wire:focusout="dispatchMe('judgement_po')" 
                                            name="5-ponumber-judgement"
                                            class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                            >
                                        <label for="4-radio-model-yes" class="text-base font-medium cursor-pointer">
                                            <span class="text-green-600 text-xl mr-2">✓</span>OK
                                        </label>
                                    </div>
                                    <div class="flex items-center space-x-3">
                                        <input 
                                            id="5-ponumber-judgement-ok" 
                                            type="radio" 
                                            value="0" 
                                            wire:model='inputs.judgement_po' 
                                            wire:focusout="dispatchMe('judgement_po')" 
                                            name="5-ponumber-judgement"  
                                            class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                            >
                                        <label for="4-radio-model-yes" class="text-base font-medium cursor-pointer">
                                            <span class="text-red-600 text-xl mr-2">✗</span>NG
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
