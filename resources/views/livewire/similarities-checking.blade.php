<div class="p-4 m-2 rounded-2xl shadow-lg bg-white">
    <!-- Header -->
    <div class="flex items-center justify-center bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-xl mb-6 p-4">
        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <h1 class="text-xl font-bold">Checking of Similarities</h1>
    </div>
    <div>
        <div class="grid gap-6 mb-6 mt-2 md:grid-rows-3 md:grid-cols-2 rounded-xl shadow-xl p-2 bg-gray-50">
            <div class="row-span-3 col-span-2 flex items-center justify-center">
                <x-label :semibold="true">QUANTITY FOR SHIPMENT</x-label>
            </div>
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
            <div class="col-span-1 md:grid-cols-2">
                <div class="col-span-1 flex items-center justify-center">
                    <x-label for="5-sir-num-input">SIR</x-label><x-inputNum id="5-sir-num-input" wire:model='inputs.sir_qs' wire:focusout="dispatchMe('sir_qs')" :inputStatus="$inputStatus['sir_qs']"></x-inputNum>
                </div>
            </div>

            <div class="col-span-1 md:grid-cols-2">
                <div class="col-span-1 flex items-center justify-center">
                    <x-label>ARE ALL QUANTITY FOR SHIPMENT THE SAME?</x-label>
                </div>
                <div class="col-span-1">
                    <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                            <div class="flex items-center ps-3">
                                <input id="5-radio-qfs-yes" type="radio" value="1" wire:model='inputs.same_quantity_qs' wire:focusout="dispatchMe('same_quantity_qs')" name="5-radio-qfs-shipment" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" <?php //required ?>>
                                <label for="5-radio-qfs-yes" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">YES</label>
                            </div>
                        </li>
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                            <div class="flex items-center ps-3">
                                <input id="5-radio-qfs-no" type="radio" value="0" wire:model='inputs.same_quantity_qs' wire:focusout="dispatchMe('same_quantity_qs')" name="5-radio-qfs-shipment" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="5-radio-qfs-no" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">NO</label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-span-1 md:grid-cols-2">
                <div class="col-span-1 flex items-center justify-center">
                    <x-label>JUDGEMENT</x-label>
                </div>
                <div class="col-span-1">
                    <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                            <div class="flex items-center ps-3">
                                <input id="5-radio-qfs-ok" type="radio" value="1" wire:model='inputs.judgement_qs' wire:focusout="dispatchMe('judgement_qs')" name="5-radio-qfs-judgement" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" <?php //required ?>>
                                <label for="5-radio-qfs-ok" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">OK</label>
                            </div>
                        </li>
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                            <div class="flex items-center ps-3">
                                <input id="5-radio-qfs-ng" type="radio" value="0" wire:model='inputs.judgement_qs' wire:focusout="dispatchMe('judgement_qs')" name="5-radio-qfs-judgement" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="5-radio-qfs-ng" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">NG</label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="grid gap-6 mb-6 mt-2 md:grid-rows-3 md:grid-cols-2 rounded-xl shadow-xl p-2 bg-gray-50">
            <div class="row-span-3 col-span-2 flex items-center justify-center">
                <x-label :semibold="true">NUMBER OF BOXES FOR SHIPMENT</x-label>
            </div>
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

            <div class="col-span-1 md:grid-cols-2">
                <div class="col-span-1 flex items-center justify-center">
                    <x-label>ARE ALL NO. OF BOXES FOR SHIPMENT THE SAME?</x-label>
                </div>
                <div class="col-span-1">
                    <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                            <div class="flex items-center ps-3">
                                <input id="5-boxship-radio-yes" type="radio" value="1" wire:model='inputs.same_box_bs' wire:focusout="dispatchMe('same_box_bs')" name="5-boxship-radio-same" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" <?php //required ?>>
                                <label for="5-boxship-radio-yes" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">YES</label>
                            </div>
                        </li>
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                            <div class="flex items-center ps-3">
                                <input id="5-boxship-radio-no" type="radio" value="0" wire:model='inputs.same_box_bs' wire:focusout="dispatchMe('same_box_bs')" name="5-boxship-radio-same" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="5-boxship-radio-no" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">NO</label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-span-1 md:grid-cols-2">
                <div class="col-span-1 flex items-center justify-center">
                    <x-label>JUDGEMENT</x-label>
                </div>
                <div class="col-span-1">
                    <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                            <div class="flex items-center ps-3">
                                <input id="horizontal-list-radio-license" type="radio" value="1" wire:model='inputs.judgement_bs' wire:focusout="dispatchMe('judgement_bs')" name="5-boxship-radio-judgement" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" <?php //required ?>>
                                <label for="horizontal-list-radio-license" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">OK</label>
                            </div>
                        </li>
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                            <div class="flex items-center ps-3">
                                <input id="horizontal-list-radio-id" type="radio" value="0" wire:model='inputs.judgement_bs' wire:focusout="dispatchMe('judgement_bs')" name="5-boxship-radio-judgement" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="horizontal-list-radio-id" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">NG</label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="grid gap-6 mb-6 mt-2 md:grid-rows-3 md:grid-cols-2 rounded-xl shadow-xl p-2 bg-gray-50">
            <div class="row-span-3 col-span-2 flex items-center justify-center">
                <x-label :semibold="true">MODEL NAME</x-label>
            </div>
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
                    <x-label for="5-fglabel-model-input">FG LABEL</x-label><x-inputText id="5-fglabel-model-input" wire:model='inputs.fg_label_mn' wire:focusout="dispatchMe('fg_label_mn')" :inputStatus="$inputStatus['fg_label_mn']"></x-inputText>
                </div>
            </div>
            <div class="col-span-1 md:grid-cols-2">
                <div class="col-span-1 flex items-center justify-center">
                    <x-label for="5-vmi-model-input">VMI LABEL / QR CODE LABEL</x-label><x-inputText id="5-vmi-model-input" wire:model='inputs.vmi_qr_mn' wire:focusout="dispatchMe('vmi_qr_mn')" :inputStatus="$inputStatus['vmi_qr_mn']"></x-inputText>
                </div>
            </div>
            <div class="col-span-1 md:grid-cols-2">
                <div class="col-span-1 flex items-center justify-center">
                    <x-label for="5-mc-model-input">MC BARCODE LABEL</x-label><x-inputText id="5-mc-model-input" wire:model='inputs.mc_label_mn' wire:focusout="dispatchMe('mc_label_mn')" :inputStatus="$inputStatus['mc_label_mn']"></x-inputText>
                </div>
            </div>
            <div class="col-span-1 md:grid-cols-2">
                <div class="col-span-1 flex items-center justify-center">
                    <x-label for="5-pallet-model-input">PALLET LABEL</x-label><x-inputText id="5-pallet-model-input" wire:model='inputs.pallet_label_mn' wire:focusout="dispatchMe('pallet_label_mn')" :inputStatus="$inputStatus['pallet_label_mn']"></x-inputText>
                </div>
            </div>
            <div>
            </div>
            <div class="col-span-1 md:grid-cols-2">
                <div class="col-span-1 flex items-center justify-center">
                    <x-label>ARE ALL MODEL NAME THE SAME?</x-label>
                </div>
                <div class="col-span-1">
                    <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                            <div class="flex items-center ps-3">
                                <input id="5-model-same-yes" type="radio" value="1" wire:model='inputs.same_model_mn' wire:focusout="dispatchMe('same_model_mn')" name="5-model-same" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" <?php //required ?>>
                                <label for="5-model-same-yes" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">YES</label>
                            </div>
                        </li>
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                            <div class="flex items-center ps-3">
                                <input id="5-model-same-no" type="radio" value="0" wire:model='inputs.same_model_mn' wire:focusout="dispatchMe('same_model_mn')" name="5-model-same" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" <?php //required ?>>
                                <label for="5-model-same-no" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">NO</label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-span-1 md:grid-cols-2">
                <div class="col-span-1 flex items-center justify-center">
                    <x-label>JUDGEMENT</x-label>
                </div>
                <div class="col-span-1">
                    <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                            <div class="flex items-center ps-3">
                                <input id="5-model-judgement-ok" type="radio" value="1" wire:model='inputs.judgement_mn' wire:focusout="dispatchMe('judgement_mn')" name="5-model-judgement" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" <?php //required ?>>
                                <label for="5-model-judgement-ok" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">OK</label>
                            </div>
                        </li>
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                            <div class="flex items-center ps-3">
                                <input id="5-model-judgement-ng" type="radio" value="0" wire:model='inputs.judgement_mn' wire:focusout="dispatchMe('judgement_mn')" name="5-model-judgement" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="5-model-judgement-ng" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">NG</label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="grid gap-6 mb-6 mt-2 md:grid-rows-3 md:grid-cols-2 rounded-xl shadow-xl p-2 bg-gray-50">
            <div class="row-span-3 col-span-2 flex items-center justify-center">
                <x-label :semibold="true">MODEL CODE</x-label>
            </div>
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
            <div class="col-span-1 md:grid-cols-2">
                <div class="col-span-1 flex items-center justify-center">
                    <x-label for="5-sir-modelcode-input">SIR</x-label><x-inputText id="5-sir-modelcode-input" marginleft="ml-6" wire:model='inputs.sir_mc' wire:focusout="dispatchMe('sir_mc')" :inputStatus="$inputStatus['sir_mc']"></x-inputText>
                </div>
            </div>
            <div class="col-span-1 md:grid-cols-2">
                <div class="col-span-1 flex items-center justify-center">
                    <x-label for="5-shiplabel-modelcode-input">SHIPPING LABEL (OTHER MODEL)</x-label><x-inputText id="5-shiplabel-shiplabel-input" wire:model='inputs.shipping_label_mc' wire:focusout="dispatchMe('shipping_label_mc')" :inputStatus="$inputStatus['shipping_label_mc']"></x-inputText>
                </div>
            </div>
            <div class="col-span-1 md:grid-cols-2">
                <div class="col-span-1 flex items-center justify-center">
                    <x-label for="5-vmi-modelcode-input">VMI LABEL</x-label><x-inputText id="5-vmi-shiplabel-input" wire:model='inputs.vmi_label_mc' wire:focusout="dispatchMe('vmi_label_mc')" :inputStatus="$inputStatus['vmi_label_mc']"></x-inputText>
                </div>
            </div>
            <div class="col-span-1 md:grid-cols-2">
                <div class="col-span-1 flex items-center justify-center">
                    <x-label for="5-mc-modelcode-input">MC BARCODE LABEL</x-label><x-inputText id="5-mc-shiplabel-input" wire:model='inputs.mc_barcode_mc' wire:focusout="dispatchMe('mc_barcode_mc')" :inputStatus="$inputStatus['mc_barcode_mc']"></x-inputText>
                </div>
            </div>
            <div class="col-span-1 md:grid-cols-2">
                <div class="col-span-1 flex items-center justify-center">
                    <x-label for="5-pallet-modelcode-input">PALLET LABEL</x-label><x-inputText id="5-pallet-shiplabel-input" wire:model='inputs.pallet_label_mc' wire:focusout="dispatchMe('pallet_label_mc')" :inputStatus="$inputStatus['pallet_label_mc']"></x-inputText>
                </div>
            </div>
            <div class="col-span-1 md:grid-cols-2">
                <div class="col-span-1 flex items-center justify-center">
                    <x-label for="5-speciallabel-modelcode-input">SPECIFIC LABEL/QR CODE LABEL</x-label><x-inputText id="5-speciallabel-shiplabel-input" wire:model='inputs.specific_qr_label_mc' wire:focusout="dispatchMe('specific_qr_label_mc')" :inputStatus="$inputStatus['specific_qr_label_mc']"></x-inputText>
                </div>
            </div>
            <div>
            </div>
            <div class="col-span-1 md:grid-cols-2">
                <div class="col-span-1 flex items-center justify-center">
                    <x-label>ARE ALL MODEL CODE THE SAME?</x-label>
                </div>
                <div class="col-span-1">
                    <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                            <div class="flex items-center ps-3">
                                <input id="5-modelcode-same-yes" type="radio" value="1" wire:model='inputs.same_mc' wire:focusout="dispatchMe('same_mc')" name="5-modelcode-same" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" <?php //required ?>>
                                <label for="5-modelcode-same-yes" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">YES</label>
                            </div>
                        </li>
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                            <div class="flex items-center ps-3">
                                <input id="5-modelcode-same-no" type="radio" value="0" wire:model='inputs.same_mc' wire:focusout="dispatchMe('same_mc')" name="5-modelcode-same" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="5-modelcode-same-no" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">NO</label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-span-1 md:grid-cols-2">
                <div class="col-span-1 flex items-center justify-center">
                    <x-label>JUDGEMENT</x-label>
                </div>
                <div class="col-span-1">
                    <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                            <div class="flex items-center ps-3">
                                <input id="5-modelcode-judegment-ok" type="radio" value="1" wire:model='inputs.judgement_mc' wire:focusout="dispatchMe('judgement_mc')" name="5-modelcode-judegment" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" <?php //required ?>>
                                <label for="5-modelcode-judegment-ok" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">OK</label>
                            </div>
                        </li>
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                            <div class="flex items-center ps-3">
                                <input id="5-modelcode-judegment-ng" type="radio" value="0" wire:model='inputs.judgement_mc' wire:focusout="dispatchMe('judgement_mc')" name="5-modelcode-judegment" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="5-modelcode-judegment-ng" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">NG</label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="grid gap-6 mb-6 mt-2 md:grid-rows-3 md:grid-cols-2 rounded-xl shadow-xl p-2 bg-gray-50">
            <div class="row-span-3 col-span-2 flex items-center justify-center">
                <x-label :semibold="true">PART NUMBER</x-label>
            </div>
            <div class="col-span-1 md:grid-cols-2">
                <div class="col-span-1 flex items-center justify-center">
                    <x-label for="5-picklist-partnumber-input">PICK LIST</x-label><x-inputText id="5-picklist-partnumber-input" wire:model='inputs.picklist_pn' wire:focusout="dispatchMe('picklist_pn')" :inputStatus="$inputStatus['picklist_pn']"></x-inputText>
                </div>
            </div>
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
            <div class="col-span-1 md:grid-cols-2">
                <div class="col-span-1 flex items-center justify-center">
                    <x-label for="5-sir-partnumber-input">SIR</x-label><x-inputText id="5-sir-partnumber-input" marginleft="ml-6" wire:model='inputs.sir_pn' wire:focusout="dispatchMe('sir_pn')" :inputStatus="$inputStatus['sir_pn']"></x-inputText>
                </div>
            </div>
            <div class="col-span-1 md:grid-cols-2">
                <div class="col-span-1 flex items-center justify-center">
                    <x-label for="5-shiplabel-partnumber-input">SHIPPING LABEL (OTHER MODEL)</x-label><x-inputText id="5-shiplabel-partnumber-input" wire:model='inputs.shipping_label_pn' wire:focusout="dispatchMe('shipping_label_pn')" :inputStatus="$inputStatus['shipping_label_pn']"></x-inputText>
                </div>
            </div>
            <div class="col-span-1 md:grid-cols-2">
                <div class="col-span-1 flex items-center justify-center">
                    <x-label for="5-vmi-partnumber-input">VMI LABEL</x-label><x-inputText id="5-vmi-partnumber-input" wire:model='inputs.vmi_pn' wire:focusout="dispatchMe('vmi_pn')" :inputStatus="$inputStatus['vmi_pn']"></x-inputText>
                </div>
            </div>
            <div class="col-span-1 md:grid-cols-2">
                <div class="col-span-1 flex items-center justify-center">
                    <x-label>ARE ALL PART NUMBER THE SAME?</x-label>
                </div>
                <div class="col-span-1">
                    <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                            <div class="flex items-center ps-3">
                                <input id="5-partnumber-same-yes" type="radio" value="1" wire:model='inputs.same_pn' wire:focusout="dispatchMe('same_pn')" name="5-partnumber-same" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" <?php //required ?>>
                                <label for="5-partnumber-same-yes" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">YES</label>
                            </div>
                        </li>
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                            <div class="flex items-center ps-3">
                                <input id="5-partnumber-same-no" type="radio" value="0" wire:model='inputs.same_pn' wire:focusout="dispatchMe('same_pn')" name="5-partnumber-same" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="5-partnumber-same-no" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">NO</label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-span-1 md:grid-cols-2">
                <div class="col-span-1 flex items-center justify-center">
                    <x-label>JUDGEMENT</x-label>
                </div>
                <div class="col-span-1">
                    <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                            <div class="flex items-center ps-3">
                                <input id="5-partnumber-judgement-ok" type="radio" value="1" wire:model='inputs.judgement_pn' wire:focusout="dispatchMe('judgement_pn')" name="5-partnumber-judgement" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" <?php //required ?>>
                                <label for="5-partnumber-judgement-ok" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">OK</label>
                            </div>
                        </li>
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                            <div class="flex items-center ps-3">
                                <input id="5-partnumber-judgement-ng" type="radio" value="0" wire:model='inputs.judgement_pn' wire:focusout="dispatchMe('judgement_pn')" name="5-partnumber-judgement" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="5-partnumber-judgement-ng" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">NG</label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="grid gap-6 mb-6 mt-2 md:grid-rows-3 md:grid-cols-2 rounded-xl shadow-xl p-2 bg-gray-50">
            <div class="row-span-3 col-span-2 flex items-center justify-center">
                <x-label :semibold="true">PO NUMBER</x-label>
            </div>
            <div class="col-span-1 md:grid-cols-2 bg-gray-100 rounded-md">
                <div class="col-span-2 text-center">
                    <x-label class="font-semibold">SEREM</x-label>
                </div>
                <div class="p-2">
                    <div class="col-span-1 flex items-center justify-center">
                        <x-label for="5-ponumber-serem-co">CUSTOMER PO</x-label><x-inputText id="5-ponumber-serem-co" wire:model='inputs.serem_customer_po' wire:focusout="dispatchMe('serem_customer_po')" :inputStatus="$inputStatus['serem_customer_po']"></x-inputText>
                    </div>
                    <div class="col-span-1 flex items-center justify-center">
                        <x-label for="5-ponumber-serem-oo">OUR PO</x-label><x-inputText id="5-ponumber-serem-oo" wire:model='inputs.serem_smp_po' wire:focusout="dispatchMe('serem_smp_po')" :inputStatus="$inputStatus['serem_smp_po']"></x-inputText>
                    </div>
                </div>
            </div>
            <div class="col-span-1 md:grid-cols-2 bg-gray-100 rounded-md">
                <div class="col-span-2 text-center">
                    <x-label class="font-semibold">SHIPPING LABEL(OTHER MODEL)</x-label>
                </div>
                <div class="p-2">
                    <div class="col-span-1 flex items-center justify-center">
                        <x-label for="5-ponumber-shiplabel-co">CUSTOMER PO</x-label><x-inputText id="5-ponumber-shiplabel-co" wire:model='inputs.shipping_label_customer_po' wire:focusout="dispatchMe('shipping_label_customer_po')" :inputStatus="$inputStatus['shipping_label_customer_po']"></x-inputText>
                    </div>
                    <div class="col-span-1 flex items-center justify-center">
                        <x-label for="5-ponumber-shiplabel-oo">OUR PO</x-label><x-inputText id="5-ponumber-shiplabel-oo" wire:model='inputs.shipping_label_smp_po' wire:focusout="dispatchMe('shipping_label_smp_po')" :inputStatus="$inputStatus['shipping_label_smp_po']"></x-inputText>
                    </div>
                </div>
            </div>
            <div class="col-span-1 md:grid-cols-2 bg-gray-100 rounded-md">
                <div class="col-span-2 text-center">
                    <x-label class="font-semibold">VMI LABEL (MIN,MOR,MIS MODELS ONLY)</x-label>
                </div>
                <div class="p-2">
                    <div class="col-span-1 flex items-center justify-center">
                        <x-label for="5-ponumber-vmi-co">CUSTOMER PO</x-label><x-inputText id="5-ponumber-vmi-co" wire:model='inputs.vmi_customer_po' wire:focusout="dispatchMe('vmi_customer_po')" :inputStatus="$inputStatus['vmi_customer_po']"></x-inputText>
                    </div>
                    <div class="col-span-1 flex items-center justify-center">
                        <x-label for="5-ponumber-vmi-oo">OUR PO</x-label><x-inputText id="5-ponumber-vmi-oo" wire:model='inputs.vmi_smp_po' wire:focusout="dispatchMe('vmi_smp_po')" :inputStatus="$inputStatus['vmi_smp_po']"></x-inputText>
                    </div>
                </div>
            </div>
            <div class="col-span-1 md:grid-cols-2 bg-gray-100 rounded-md">
                <div class="col-span-2 text-center">
                    <x-label class="font-semibold">SPECIFIC INSPECTION REPORT (SIR)</x-label>
                </div>
                <div class="p-2">
                    <div class="col-span-1 flex items-center justify-center">
                        <x-label for="5-ponumber-sir-co">CUSTOMER PO</x-label><x-inputText id="5-ponumber-vmi-co" wire:model='inputs.sir_customer_po' wire:focusout="dispatchMe('sir_customer_po')" :inputStatus="$inputStatus['sir_customer_po']"></x-inputText>
                    </div>
                    <div class="col-span-1 flex items-center justify-center">
                        <x-label for="5-ponumber-vmi-oo">OUR PO</x-label><x-inputText id="5-ponumber-vmi-oo" wire:model='inputs.sir_smp_po' wire:focusout="dispatchMe('sir_smp_po')" :inputStatus="$inputStatus['sir_smp_po']"></x-inputText>
                    </div>
                </div>
            </div>
            <div class="col-span-1 md:grid-cols-2 bg-gray-100 rounded-md">
                <div class="col-span-2 text-center">
                    <x-label class="font-semibold">SPECIFIC LABEL / QR CODE LABEL</x-label>
                </div>
                <div class="p-2">
                    <div class="col-span-1 flex items-center justify-center">
                        <x-label for="5-ponumber-specqr-co">CUSTOMER PO</x-label><x-inputText id="5-ponumber-specqr-co" wire:model='inputs.specific_label_customer_po' wire:focusout="dispatchMe('specific_label_customer_po')" :inputStatus="$inputStatus['specific_label_customer_po']"></x-inputText>
                    </div>
                    <div class="col-span-1 flex items-center justify-center">
                        <x-label for="5-ponumber-specqr-oo">OUR PO</x-label><x-inputText id="5-ponumber-specqr-oo" wire:model='inputs.specific_label_smp_po' wire:focusout="dispatchMe('specific_label_smp_po')" :inputStatus="$inputStatus['specific_label_smp_po']"></x-inputText>
                    </div>
                </div>
            </div>
            <div class="col-span-1 md:grid-cols-2 bg-gray-100 rounded-md">
                <div class="col-span-2 text-center">
                    <x-label class="font-semibold">PALLET LABEL</x-label>
                </div>
                <div class="p-2">
                    <div class="col-span-1 flex items-center justify-center">
                        <x-label for="5-ponumber-pallet-co">CUSTOMER PO</x-label><x-inputText id="5-ponumber-pallet-co" wire:model='inputs.pallet_label_customer_po' wire:focusout="dispatchMe('pallet_label_customer_po')" :inputStatus="$inputStatus['pallet_label_customer_po']"></x-inputText>
                    </div>
                    <div class="col-span-1 flex items-center justify-center">
                        <x-label for="5-ponumber-pallet-oo">OUR PO</x-label><x-inputText id="5-ponumber-pallet-oo" wire:model='inputs.pallet_label_smp_po' wire:focusout="dispatchMe('pallet_label_smp_po')" :inputStatus="$inputStatus['pallet_label_smp_po']"></x-inputText>
                    </div>
                </div>
            </div>
            <div class="col-span-1 md:grid-cols-2">
                <div class="col-span-1 flex items-center justify-center">
                    <x-label>ARE ALL PO NUMBER THE SAME?</x-label>
                </div>
                <div class="col-span-1">
                    <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                            <div class="flex items-center ps-3">
                                <input id="5-ponumber-same-yes" type="radio" value="1" wire:model='inputs.same_po' wire:focusout="dispatchMe('same_po')" name="5-ponumber-same" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" <?php //required ?>>
                                <label for="5-ponumber-same-yes" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">YES</label>
                            </div>
                        </li>
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                            <div class="flex items-center ps-3">
                                <input id="horizontal-list-radio-id" type="radio" value="0" wire:model='inputs.same_po' wire:focusout="dispatchMe('same_po')" name="5-ponumber-same" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="horizontal-list-radio-id" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">NO</label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-span-1 md:grid-cols-2">
                <div class="col-span-1 flex items-center justify-center">
                    <x-label>JUDGEMENT</x-label>
                </div>
                <div class="col-span-1">
                    <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                            <div class="flex items-center ps-3">
                                <input id="5-ponumber-judgement-ok" type="radio" value="1" wire:model='inputs.judgement_po' wire:focusout="dispatchMe('judgement_po')" name="5-ponumber-judgement" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="5-ponumber-judgement-ok" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">OK</label>
                            </div>
                        </li>
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                            <div class="flex items-center ps-3">
                                <input id="5-ponumber-judgement-ng" type="radio" value="0" wire:model='inputs.judgement_po' wire:focusout="dispatchMe('judgement_po')" name="5-ponumber-judgement" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="5-ponumber-judgement-ng" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">NG</label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
