<div class="p-4 m-2 rounded-xl shadow-sm bg-slate-50" wire:ignore wire:focusout='dispatchMe'>
    <div class="flex items-center justify-center bg-gray-500 text-gray-100">
        <h1 class='text-lg'>
            <strong>4. Check Items</strong>
        </h1>
    </div>
    <div>
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
                <x-label for="4-boxes" :semibold="true" >No. OF BOXES OPEN:</x-label>
                <x-inputNumber id="4-boxes" btnID="4-boxes" wire:model='inputs.open_boxes_quantity'>BOXES</x-inputNumber>
            </div>
            <div></div>
        </div>
        <div class="grid gap-6 mb-6 md:grid-rows-3 md:grid-cols-2 rounded-xl shadow-xl p-2 bg-gray-50">
            <div class="row-span-3 col-span-2 flex items-center justify-center">
                <x-label :semibold="true">100% Checking of Barcode Label Model Name</x-label>
            </div>
            <div class="col-span-1 md:grid-cols-2">
                <div class="col-span-1 flex items-center justify-center">
                    <x-label>Are <u>ALL</u> Carton Boxes have the same Model Name?</x-label>
                </div>
                <div class="col-span-1">
                    <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                            <div class="flex items-center ps-3">
                                <input id="4-radio-model-yes" type="radio" value="1" name="4-radio-model" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" <?php //required ?> wire:model='inputs.same_model'>
                                <label for="4-radio-model-yes" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">YES</label>
                            </div>
                        </li>
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                            <div class="flex items-center ps-3">
                                <input id="4-radio-model-no" type="radio" value="0" name="4-radio-model" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" wire:model='inputs.same_model'>
                                <label for="4-radio-model-no" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">NO</label>
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
                                <input id="4-radio-judgement-ok" type="radio" value="1" name="4-radio-judgement" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" <?php //required ?> wire:model='inputs.judgement'>
                                <label for="4-radio-judgement-ok" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">OK</label>
                            </div>
                        </li>
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                            <div class="flex items-center ps-3">
                                <input id="4-radio-judgement-ng" type="radio" value="0" name="4-radio-judgement" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" wire:model='inputs.judgement'>
                                <label for="4-radio-judgement-ng" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">NG</label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-span-1 md:grid-cols-2">
                <div class="col-span-1 flex items-center justify-center">
                    <x-label for="4-text-1">If NO, What Model?</x-label><x-inputText id="4-text-1" wire:model='inputs.specify_model'></x-inputText>
                </div>

            </div>
            <div>
                <div class="col-span-1 flex items-center justify-center">
                    <x-label for="4-text-2">How many cartons?</x-label><x-inputNumber id="4-text-2" btnID="4-text-2" wire:model='inputs.carton_quantity'>CARTONS</x-inputNumber>
                </div>
            </div>
        </div>
        <div class="grid gap-6 mb-6 md:grid-rows-3 md:grid-cols-2 rounded-xl shadow-xl p-2 bg-gray-50">
            <div class="row-span-3 col-span-2 flex items-center justify-center">
                <x-label :semibold="true">SIR (Specific Inspection Report)</x-label>
            </div>
            <div class="col-span-1 md:grid-cols-2">
                <div class="col-span-1 flex items-center justify-center">
                    <x-label>Does SIR <?php //required ?>?</x-label>
                </div>
                <div class="col-span-1">
                    <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                            <div class="flex items-center ps-3">
                                <input id="4-sir-yes" type="radio" value="1" name="4-sir" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" <?php //required ?> wire:model='inputs.need_sir'>
                                <label for="4-sir-yes" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">YES</label>
                            </div>
                        </li>
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                            <div class="flex items-center ps-3">
                                <input id="4-sir-no" type="radio" value="0" name="4-sir" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" wire:model='inputs.need_sir'>
                                <label for="4-sir-no" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">NO</label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-span-1 md:grid-cols-2">
                <div class="col-span-1 flex items-center justify-center">
                    <x-label>IF YES, IS IT AVAILABLE?</x-label>
                </div>
                <div class="col-span-1">
                    <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                            <div class="flex items-center ps-3">
                                <input id="4-avail-yes" type="radio" value="1" wire:model='inputs.sir_available' name="4-avail" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="4-avail-yes" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">YES</label>
                            </div>
                        </li>
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                            <div class="flex items-center ps-3">
                                <input id="4-avail-no" type="radio" value="0" wire:model='inputs.sir_available' name="4-avail" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="4-avail-no" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">NO</label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>