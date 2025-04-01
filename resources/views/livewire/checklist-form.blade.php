<div>
    <form wire:submit='save'>
        <div class="flex">
            <label for="section" class='mr-2'>Section:</label>
            <h5><u>&nbsp;&nbsp;{{ $checklistInfo->section }}&nbsp;&nbsp;</u></h5>
        </div>
        <livewire:preparation-checklist></livewire:preparation-checklist>
        <div class="p-4 m-2 rounded-xl shadow-sm bg-slate-50">
            <div class="flex items-center justify-center bg-gray-500 text-gray-100">
                <h1 class='text-lg '>
                    <strong>2. OBA KIT Checklist</strong>
                </h1>
            </div>
            <div class="overflow-x-scroll">
                <table class="table-auto w-screen text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                <strong>OBA KIT Checklist</strong>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                CALCULATOR
                            </th>
                            <th scope="col" class="px-6 py-3">
                                CAMERA
                            </th>
                            <th scope="col" class="px-6 py-3">
                                CUTTER
                            </th>
                            <th scope="col" class="px-6 py-3">
                                STAMP PAD
                            </th>
                            <th scope="col" class="px-6 py-3">
                                STAMP
                            </th>
                            <th scope="col" class="px-6 py-3">
                                TAPE DISPENSER
                            </th>
                            <th scope="col" class="px-6 py-3">
                                ZEBRA PEN
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <strong>BEFORE OBA</strong>
                            </th>
                            <td class="w-4 p-4">
                                <x-checkbox id="2-OBA-2column" value="ok"></x-checkbox>
                            </td>
                            <td class="w-4 p-4">
                                <x-checkbox id="2-OBA-3column" value="ok"></x-checkbox>
                            </td>
                            <td class="w-4 p-4">
                                <x-checkbox id="2-OBA-4column" value="ok"></x-checkbox>
                            </td>
                            <td class="w-4 p-4">
                                <x-checkbox id="2-OBA-5column" value="ok"></x-checkbox>
                            </td>
                            <td class="w-4 p-4">
                                <x-checkbox id="2-OBA-6column" value="ok"></x-checkbox>
                            </td>
                            <td class="w-4 p-4">
                                <x-checkbox id="2-OBA-7column" value="ok"></x-checkbox>
                            </td>
                            <td class="w-4 p-4">
                                <x-checkbox id="2-OBA-8column" value="ok"></x-checkbox>
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <strong>AFTER OBA</strong>
                            </th>
                            <td class="w-4 p-4">
                                <x-checkbox id="2-OBA2-2column" value="ok"></x-checkbox>
                            </td>
                            <td class="w-4 p-4">
                                <x-checkbox id="2-OBA2-3column" value="ok"></x-checkbox>
                            </td>
                            <td class="w-4 p-4">
                                <x-checkbox id="2-OBA2-4column" value="ok"></x-checkbox>
                            </td>
                            <td class="w-4 p-4">
                                <x-checkbox id="2-OBA2-5column" value="ok"></x-checkbox>
                            </td>
                            <td class="w-4 p-4">
                                <x-checkbox id="2-OBA2-6column" value="ok"></x-checkbox>
                            </td>
                            <td class="w-4 p-4">
                                <x-checkbox id="2-OBA2-7column" value="ok"></x-checkbox>
                            </td>
                            <td class="w-4 p-4">
                                <x-checkbox id="2-OBA2-8column" value="ok"></x-checkbox>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="p-4 m-2 rounded-xl shadow-sm bg-slate-50">
            <div class="flex items-center justify-center bg-gray-500 text-gray-100">
                <h1 class='text-lg'>
                    <strong>3. Shipment Information</strong>
                </h1>
            </div>

            <div>
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <x-label for="3-datetime" :semibold="true">Date & Time</x-label>
                        <input id="3-datetime" type="text" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500       sm:text-sm" placeholder="Pick a date and time" />
                    </div>
                    <div></div>
                </div>
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <x-label for="3-modelname" :semibold="true">Model Name</x-label>
                        <x-inputText id='3-modelname' name='3-modelname' value="{{ $checklistInfo->model }}" ></x-inputText>
                    </div>
                    <div>
                        <x-label for="3-invoice" :semibold="true">Invoice No.</x-label>
                        <x-inputText id='3-invoice' name='3-invoice' value=""></x-inputText>
                    </div>
                </div>
                <div class="flex">
                    <div>
                        <x-label :semibold="true">Pallet Used</x-label>
                    </div>
                    <div class="flex">
                        <div class="m-8">
                            <x-checkbox id="3-SI-1" :ml="true" value="wood"></x-checkbox>
                            <x-label for="3-SI-1">WOOD</x-label>
                        </div>
                        <div class="m-8">
                            <x-checkbox id="3-SI-2" :ml="true" value="paper"></x-checkbox>
                            <x-label for="3-SI-2">PAPER</x-label>
                        </div>
                        <div class="m-8">
                            <x-checkbox id="3-SI-3" :ml="true" value="steel"></x-checkbox>
                            <x-label for="3-SI-3" >STEEL</x-label>
                        </div>
                        <div class="m-8">
                            <x-checkbox id="3-SI-4" :ml="true" value="plastic"></x-checkbox>
                            <x-label for="3-SI-4">PLASTIC</x-label>
                        </div>
                        <div class="m-8">
                            <x-inputText type="text" id='3-others' name='3-others' placeholder="Others(Please Specify)"></x-inputText>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-4 m-2 rounded-xl shadow-sm bg-slate-50">
            <div class="flex items-center justify-center bg-gray-500 text-gray-100">
                <h1 class='text-lg'>
                    <strong>4. Check Items</strong>
                </h1>
            </div>
            <div>
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <x-label for="4-boxes" :semibold="true">No. OF BOXES OPEN:</x-label>
                        <x-inputNumber id="4-boxes" btnID="boxes">BOXES</x-inputNumber>
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
                                        <input id="4-radio-model-yes" type="radio" value="yes" name="4-radio-model" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" <?php //required ?>>
                                        <label for="4-radio-model-yes" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">YES</label>
                                    </div>
                                </li>
                                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                    <div class="flex items-center ps-3">
                                        <input id="4-radio-model-no" type="radio" value="no" name="4-radio-model" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
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
                                        <input id="4-radio-judgement-ok" type="radio" value="ok" name="4-radio-judgement" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" <?php //required ?>>
                                        <label for="4-radio-judgement-ok" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">OK</label>
                                    </div>
                                </li>
                                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                    <div class="flex items-center ps-3">
                                        <input id="4-radio-judgement-ng" type="radio" value="ng" name="4-radio-judgement" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="4-radio-judgement-ng" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">NG</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-span-1 md:grid-cols-2">
                        <div class="col-span-1 flex items-center justify-center">
                            <x-label for="4-text-1">If NO, What Model?</x-label><x-inputText id="4-text-1"></x-inputText>
                        </div>

                    </div>
                    <div>
                        <div class="col-span-1 flex items-center justify-center">
                            <x-label for="4-text-2">How many cartons?</x-label><x-inputNumber id="4-text-2" btnID="4-text-2">CARTONS</x-inputNumber>
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
                                        <input id="4-sir-yes" type="radio" value="yes" name="4-sir" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" <?php //required ?>>
                                        <label for="4-sir-yes" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">YES</label>
                                    </div>
                                </li>
                                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                    <div class="flex items-center ps-3">
                                        <input id="4-sir-no" type="radio" value="no" name="4-sir" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
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
                                        <input id="4-avail-yes" type="radio" value="yes" name="4-avail" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="4-avail-yes" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">YES</label>
                                    </div>
                                </li>
                                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                    <div class="flex items-center ps-3">
                                        <input id="4-avail-no" type="radio" value="no" name="4-avail" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="4-avail-no" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">NO</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-4 m-2 rounded-xl shadow=sm bg-slate-50">
            <div class="flex items-center justify-center bg-gray-500 text-gray-100">
                <h1 class='text-lg'>
                    <strong>5. Checking of Similarities</strong>
                </h1>
            </div>
            <div>
                <div class="grid gap-6 mb-6 mt-2 md:grid-rows-3 md:grid-cols-2 rounded-xl shadow-xl p-2 bg-gray-50">
                    <div class="row-span-3 col-span-2 flex items-center justify-center">
                        <x-label :semibold="true">QUANTITY FOR SHIPMENT</x-label>
                    </div>
                    <div class="col-span-1 md:grid-cols-2">
                        <div class="col-span-1 flex items-center justify-center">
                            <x-label for="5-picklist-num-input">PICK LIST</x-label><x-inputNum id="5-picklist-num-input"></x-inputNum>
                        </div>
                    </div>
                    <div class="col-span-1 md:grid-cols-2">
                        <div class="col-span-1 flex items-center justify-center">
                            <x-label for="5-shipinv-num-input">SHIPPING INVOICE</x-label><x-inputNum id="5-shipinv-num-input"></x-inputNum>
                        </div>
                    </div>
                    <div class="col-span-1 md:grid-cols-2">
                        <div class="col-span-1 flex items-center justify-center">
                            <x-label for="5-serem-num-input">SEREM</x-label><x-inputNum id="5-serem-num-input"></x-inputNum>
                        </div>
                    </div>
                    <div class="col-span-1 md:grid-cols-2">
                        <div class="col-span-1 flex items-center justify-center">
                            <x-label for="5-sir-num-input">SIR</x-label><x-inputNum id="5-sir-num-input"></x-inputNum>
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
                                        <input id="5-radio-qfs-yes" type="radio" value="yes" name="5-radio-qfs-shipment" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" <?php //required ?>>
                                        <label for="5-radio-qfs-yes" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">YES</label>
                                    </div>
                                </li>
                                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                    <div class="flex items-center ps-3">
                                        <input id="5-radio-qfs-no" type="radio" value="no" name="5-radio-qfs-shipment" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
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
                                        <input id="5-radio-qfs-ok" type="radio" value="ok" name="5-radio-qfs-judgement" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" <?php //required ?>>
                                        <label for="5-radio-qfs-ok" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">OK</label>
                                    </div>
                                </li>
                                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                    <div class="flex items-center ps-3">
                                        <input id="5-radio-qfs-ng" type="radio" value="ng" name="5-radio-qfs-judgement" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
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
                            <x-label for="5-picklist-boxship-input">PICK LIST</x-label><x-inputNum id="5-picklist-boxship-input"></x-inputNum>
                        </div>
                    </div>
                    <div class="col-span-1 md:grid-cols-2">
                        <div class="col-span-1 flex items-center justify-center">
                            <x-label for="5-packslip-boxship-input">PACKING SLIP</x-label><x-inputNum id="5-packslip-boxship-input"></x-inputNum>
                        </div>
                    </div>
                    <div class="col-span-1 md:grid-cols-2">
                        <div class="col-span-1 flex items-center justify-center">
                            <x-label for="5-serem-boxship-input">SEREM</x-label><x-inputNum id="5-serem-boxship-input"></x-inputNum>
                        </div>
                    </div>
                    <div class="col-span-1 md:grid-cols-2">
                        <div class="col-span-1 flex items-center justify-center">
                            <x-label for="5-palletlabel-boxship-input">PALLET LABEL</x-label><x-inputNum id="5-palletlabel-boxship-input"></x-inputNum>
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
                                        <input id="5-boxship-radio-yes" type="radio" value="yes" name="5-boxship-radio-same" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" <?php //required ?>>
                                        <label for="5-boxship-radio-yes" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">YES</label>
                                    </div>
                                </li>
                                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                    <div class="flex items-center ps-3">
                                        <input id="5-boxship-radio-no" type="radio" value="no" name="5-boxship-radio-same" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
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
                                        <input id="horizontal-list-radio-license" type="radio" value="ok" name="5-boxship-radio-judgement" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" <?php //required ?>>
                                        <label for="horizontal-list-radio-license" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">OK</label>
                                    </div>
                                </li>
                                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                    <div class="flex items-center ps-3">
                                        <input id="horizontal-list-radio-id" type="radio" value="ng" name="5-boxship-radio-judgement" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
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
                            <x-label for="5-picklist-model-input">PICK LIST</x-label><x-inputText id="5-picklist-model-input"></x-inputText>
                        </div>
                    </div>
                    <div class="col-span-1 md:grid-cols-2">
                        <div class="col-span-1 flex items-center justify-center">
                            <x-label for="5-shipinv-model-input">SHIPPING INVOICE</x-label><x-inputText id="5-shipinv-model-input"></x-inputText>
                        </div>
                    </div>
                    <div class="col-span-1 md:grid-cols-2">
                        <div class="col-span-1 flex items-center justify-center">
                            <x-label for="5-serem-model-input">SEREM</x-label><x-inputText id="5-serem-model-input" marginleft="ml-4"></x-inputText>
                        </div>
                    </div>
                    <div class="col-span-1 md:grid-cols-2">
                        <div class="col-span-1 flex items-center justify-center">
                            <x-label for="5-fglabel-model-input">FG LABEL</x-label><x-inputText id="5-fglabel-model-input"></x-inputText>
                        </div>
                    </div>
                    <div class="col-span-1 md:grid-cols-2">
                        <div class="col-span-1 flex items-center justify-center">
                            <x-label for="5-vmi-model-input">VMI LABEL / QR CODE LABEL</x-label><x-inputText id="5-vmi-model-input"></x-inputText>
                        </div>
                    </div>
                    <div class="col-span-1 md:grid-cols-2">
                        <div class="col-span-1 flex items-center justify-center">
                            <x-label for="5-mc-model-input">MC BARCODE LABEL</x-label><x-inputText id="5-mc-model-input"></x-inputText>
                        </div>
                    </div>
                    <div class="col-span-1 md:grid-cols-2">
                        <div class="col-span-1 flex items-center justify-center">
                            <x-label for="5-pallet-model-input">PALLET LABEL</x-label><x-inputText id="5-pallet-model-input"></x-inputText>
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
                                        <input id="5-model-same-yes" type="radio" value=yes"" name="5-model-same" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" <?php //required ?>>
                                        <label for="5-model-same-yes" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">YES</label>
                                    </div>
                                </li>
                                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                    <div class="flex items-center ps-3">
                                        <input id="5-model-same-no" type="radio" value="no" name="5-model-same" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" <?php //required ?>>
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
                                        <input id="5-model-judgement-ok" type="radio" value="ok" name="5-model-judgement" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" <?php //required ?>>
                                        <label for="5-model-judgement-ok" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">OK</label>
                                    </div>
                                </li>
                                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                    <div class="flex items-center ps-3">
                                        <input id="5-model-judgement-ng" type="radio" value="ng" name="5-model-judgement" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
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
                            <x-label for="5-picklist-modelcode-input">PICK LIST</x-label><x-inputText id="5-picklist-modelcode-input"></x-inputText>
                        </div>
                    </div>
                    <div class="col-span-1 md:grid-cols-2">
                        <div class="col-span-1 flex items-center justify-center">
                            <x-label for="5-shipinv-modelcode-input">SHIPPING INVOICE</x-label><x-inputText id="5-shipinv-modelcode-input"></x-inputText>
                        </div>
                    </div>
                    <div class="col-span-1 md:grid-cols-2">
                        <div class="col-span-1 flex items-center justify-center">
                            <x-label for="5-serem-momodelcodedel-input">SEREM</x-label><x-inputText id="5-serem-modelcode-input" marginleft="ml-4"></x-inputText>
                        </div>
                    </div>
                    <div class="col-span-1 md:grid-cols-2">
                        <div class="col-span-1 flex items-center justify-center">
                            <x-label for="5-sir-modelcode-input">SIR</x-label><x-inputText id="5-sir-modelcode-input" marginleft="ml-6"></x-inputText>
                        </div>
                    </div>
                    <div class="col-span-1 md:grid-cols-2">
                        <div class="col-span-1 flex items-center justify-center">
                            <x-label for="5-shiplabel-modelcode-input">SHIPPING LABEL (OTHER MODEL)</x-label><x-inputText id="5-shiplabel-shiplabel-input"></x-inputText>
                        </div>
                    </div>
                    <div class="col-span-1 md:grid-cols-2">
                        <div class="col-span-1 flex items-center justify-center">
                            <x-label for="5-vmi-modelcode-input">VMI LABEL</x-label><x-inputText id="5-vmi-shiplabel-input"></x-inputText>
                        </div>
                    </div>
                    <div class="col-span-1 md:grid-cols-2">
                        <div class="col-span-1 flex items-center justify-center">
                            <x-label for="5-mc-modelcode-input">MC BARCODE LABEL</x-label><x-inputText id="5-mc-shiplabel-input"></x-inputText>
                        </div>
                    </div>
                    <div class="col-span-1 md:grid-cols-2">
                        <div class="col-span-1 flex items-center justify-center">
                            <x-label for="5-pallet-modelcode-input">PALLET LABEL</x-label><x-inputText id="5-pallet-shiplabel-input"></x-inputText>
                        </div>
                    </div>
                    <div class="col-span-1 md:grid-cols-2">
                        <div class="col-span-1 flex items-center justify-center">
                            <x-label for="5-speciallabel-modelcode-input">SPECIFIC LABEL/QR CODE LABEL</x-label><x-inputText id="5-speciallabel-shiplabel-input"></x-inputText>
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
                                        <input id="5-modelcode-same-yes" type="radio" value="yes" name="5-modelcode-same" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" <?php //required ?>>
                                        <label for="5-modelcode-same-yes" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">YES</label>
                                    </div>
                                </li>
                                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                    <div class="flex items-center ps-3">
                                        <input id="5-modelcode-same-no" type="radio" value="no" name="5-modelcode-same" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
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
                                        <input id="5-modelcode-judegment-ok" type="radio" value="ok" name="5-modelcode-judegment" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" <?php //required ?>>
                                        <label for="5-modelcode-judegment-ok" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">OK</label>
                                    </div>
                                </li>
                                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                    <div class="flex items-center ps-3">
                                        <input id="5-modelcode-judegment-ng" type="radio" value="ng" name="5-modelcode-judegment" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
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
                            <x-label for="5-picklist-partnumber-input">PICK LIST</x-label><x-inputText id="5-picklist-partnumber-input"></x-inputText>
                        </div>
                    </div>
                    <div class="col-span-1 md:grid-cols-2">
                        <div class="col-span-1 flex items-center justify-center">
                            <x-label for="5-shipinv-partnumber-input">SHIPPING INVOICE</x-label><x-inputText id="5-shipinv-partnumber-input"></x-inputText>
                        </div>
                    </div>
                    <div class="col-span-1 md:grid-cols-2">
                        <div class="col-span-1 flex items-center justify-center">
                            <x-label for="5-serem-partnumber-input">SEREM</x-label><x-inputText id="5-serem-partnumber-input" marginleft="ml-4"></x-inputText>
                        </div>
                    </div>
                    <div class="col-span-1 md:grid-cols-2">
                        <div class="col-span-1 flex items-center justify-center">
                            <x-label for="5-sir-partnumber-input">SIR</x-label><x-inputText id="5-sir-partnumber-input" marginleft="ml-6"></x-inputText>
                        </div>
                    </div>
                    <div class="col-span-1 md:grid-cols-2">
                        <div class="col-span-1 flex items-center justify-center">
                            <x-label for="5-shiplabel-partnumber-input">SHIPPING LABEL (OTHER MODEL)</x-label><x-inputText id="5-shiplabel-partnumber-input"></x-inputText>
                        </div>
                    </div>
                    <div class="col-span-1 md:grid-cols-2">
                        <div class="col-span-1 flex items-center justify-center">
                            <x-label for="5-vmi-partnumber-input">VMI LABEL</x-label><x-inputText id="5-vmi-partnumber-input"></x-inputText>
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
                                        <input id="5-partnumber-same-yes" type="radio" value="yes" name="5-partnumber-same" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" <?php //required ?>>
                                        <label for="5-partnumber-same-yes" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">YES</label>
                                    </div>
                                </li>
                                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                    <div class="flex items-center ps-3">
                                        <input id="5-partnumber-same-no" type="radio" value="no" name="5-partnumber-same" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
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
                                        <input id="5-partnumber-judgement-ok" type="radio" value="ok" name="5-partnumber-judgement" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" <?php //required ?>>
                                        <label for="5-partnumber-judgement-ok" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">OK</label>
                                    </div>
                                </li>
                                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                    <div class="flex items-center ps-3">
                                        <input id="5-partnumber-judgement-ng" type="radio" value="ng" name="5-partnumber-judgement" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
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
                                <x-label for="5-ponumber-serem-co">CUSTOMER PO</x-label><x-inputText id="5-ponumber-serem-co"></x-inputText>
                            </div>
                            <div class="col-span-1 flex items-center justify-center">
                                <x-label for="5-ponumber-serem-oo">OUR PO</x-label><x-inputText id="5-ponumber-serem-oo"></x-inputText>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-1 md:grid-cols-2 bg-gray-100 rounded-md">
                        <div class="col-span-2 text-center">
                            <x-label class="font-semibold">SHIPPING LABEL(OTHER MODEL)</x-label>
                        </div>
                        <div class="p-2">
                            <div class="col-span-1 flex items-center justify-center">
                                <x-label for="5-ponumber-shiplabel-co">CUSTOMER PO</x-label><x-inputText id="5-ponumber-shiplabel-co"></x-inputText>
                            </div>
                            <div class="col-span-1 flex items-center justify-center">
                                <x-label for="5-ponumber-shiplabel-oo">OUR PO</x-label><x-inputText id="5-ponumber-shiplabel-oo"></x-inputText>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-1 md:grid-cols-2 bg-gray-100 rounded-md">
                        <div class="col-span-2 text-center">
                            <x-label class="font-semibold">VMI LABEL (MIN,MOR,MIS MODELS ONLY)</x-label>
                        </div>
                        <div class="p-2">
                            <div class="col-span-1 flex items-center justify-center">
                                <x-label for="5-ponumber-vmi-co">CUSTOMER PO</x-label><x-inputText id="5-ponumber-vmi-co"></x-inputText>
                            </div>
                            <div class="col-span-1 flex items-center justify-center">
                                <x-label for="5-ponumber-vmi-oo">OUR PO</x-label><x-inputText id="5-ponumber-vmi-oo"></x-inputText>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-1 md:grid-cols-2 bg-gray-100 rounded-md">
                        <div class="col-span-2 text-center">
                            <x-label class="font-semibold">SPECIFIC INSPECTION REPORT (SIR)</x-label>
                        </div>
                        <div class="p-2">
                            <div class="col-span-1 flex items-center justify-center">
                                <x-label for="5-ponumber-sir-co">CUSTOMER PO</x-label><x-inputText id="5-ponumber-vmi-co"></x-inputText>
                            </div>
                            <div class="col-span-1 flex items-center justify-center">
                                <x-label for="5-ponumber-vmi-oo">OUR PO</x-label><x-inputText id="5-ponumber-vmi-oo"></x-inputText>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-1 md:grid-cols-2 bg-gray-100 rounded-md">
                        <div class="col-span-2 text-center">
                            <x-label class="font-semibold">SPECIFIC LABEL / QR CODE LABEL</x-label>
                        </div>
                        <div class="p-2">
                            <div class="col-span-1 flex items-center justify-center">
                                <x-label for="5-ponumber-specqr-co">CUSTOMER PO</x-label><x-inputText id="5-ponumber-specqr-co"></x-inputText>
                            </div>
                            <div class="col-span-1 flex items-center justify-center">
                                <x-label for="5-ponumber-specqr-oo">OUR PO</x-label><x-inputText id="5-ponumber-specqr-oo"></x-inputText>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-1 md:grid-cols-2 bg-gray-100 rounded-md">
                        <div class="col-span-2 text-center">
                            <x-label class="font-semibold">PALLET LABEL</x-label>
                        </div>
                        <div class="p-2">
                            <div class="col-span-1 flex items-center justify-center">
                                <x-label for="5-ponumber-pallet-co">CUSTOMER PO</x-label><x-inputText id="5-ponumber-pallet-co"></x-inputText>
                            </div>
                            <div class="col-span-1 flex items-center justify-center">
                                <x-label for="5-ponumber-pallet-oo">OUR PO</x-label><x-inputText id="5-ponumber-pallet-oo"></x-inputText>
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
                                        <input id="5-ponumber-same-yes" type="radio" value="yes" name="5-ponumber-same" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" <?php //required ?>>
                                        <label for="5-ponumber-same-yes" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">YES</label>
                                    </div>
                                </li>
                                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                    <div class="flex items-center ps-3">
                                        <input id="horizontal-list-radio-id" type="radio" value="no" name="5-ponumber-same" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
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
                                        <input id="5-ponumber-judgement-ok" type="radio" value="ok" name="5-ponumber-judgement" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="5-ponumber-judgement-ok" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">OK</label>
                                    </div>
                                </li>
                                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                    <div class="flex items-center ps-3">
                                        <input id="5-ponumber-judgement-ng" type="radio" value="ng" name="5-ponumber-judgement" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="5-ponumber-judgement-ng" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">NG</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-4 m-2 rounded-xl shadow=sm bg-slate-50">
            <div class="flex items-center justify-center bg-gray-500 text-gray-100">
                <h1 class='text-lg'>
                    <strong>6. Checking of Overall Box/Pallet Condition(Internal / External)</strong>
                </h1>
            </div>
            <div class="overflow-x-auto">
                <table class="text-sm text-left rtl:text-right text-gray-500 table-auto w-screen">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                            </th>
                            <th scope="col" class="px-6 py-3">
                            </th>
                            <th scope="col" class="px-6 py-3">
                            </th>
                            <th scope="col" class="px-6 py-3">
                            </th>
                            <th scope="col" class="px-6 py-3">
                            </th>
                            <th scope="col" class="px-6 py-3">
                            </th>
                            <th scope="col" class="px-6 py-3">
                            </th>
                            <th scope="col" colspan="13" class="px-6 py-3 bg-red-50 text-center font-bold text-lg">
                                <strong>INTERNAL PACKAGING</strong>
                            </th>
                            <th scope="col" colspan="7" class="px-6 py-3 bg-blue-50 text-center font-bold text-lg">
                                <strong>EXTERNAL PACKAGING</strong>
                            </th>
                            <th scope="col" class="px-6 py-3">
                            </th>
                        </tr>
                        <tr>
                            <th class="px-6 py-3" colspan="5">
                                <strong>OQA Lot No. (last box)/ PN of other box</strong>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <strong>Box No.</strong>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <strong>Actual Pack/Std. Pack</strong>
                            </th>
                            <th scope="col" class="px-6 py-3 bg-red-50">
                                <strong>FG Barcode Label</strong>
                            </th>
                            <th scope="col" class="px-6 py-3 bg-red-50">
                                <strong>Specific Label/VDA/DMC/QR Code Label</strong>
                            </th>
                            <th scope="col" class="px-6 py-3 bg-red-50">
                                <strong>Carton Condition</strong>
                            </th>
                            <th scope="col" class="px-6 py-3 bg-red-50">
                                <strong>Magnet Packaging Condition</strong>
                            </th>
                            <th scope="col" class="px-6 py-3 bg-red-50">
                                <strong>Magnet Condition</strong>
                            </th>
                            <th scope="col" class="px-6 py-3 bg-red-50">
                                <strong>Presence of Dessicant</strong>
                            </th>
                            <th scope="col" class="px-6 py-3 bg-red-50">
                                <strong>Package Orientation</strong>
                            </th>
                            <th class="px-6 py-3 bg-red-50" colspan="5">
                                <strong>Spacer used based on Packing Specs/OPI</strong>
                            </th>
                            <th scope="col" class="px-6 py-3 bg-red-50">
                                <strong>Specific Inspection Report</strong>
                            </th>
                            <th scope="col" class="px-6 py-3 bg-blue-50">
                                <strong>SEREM</strong>
                            </th>
                            <th scope="col" class="px-6 py-3 bg-blue-50">
                                <strong>Shipping Label(other models)</strong>
                            </th>
                            <th scope="col" class="px-6 py-3 bg-blue-50">
                                <strong>VMI LABEL(MIN,MOR & MIS MODEL ONLY)</strong>
                            </th>
                            <th scope="col" class="px-6 py-3 bg-blue-50">
                                <strong>MC Barcode Label</strong>
                            </th>
                            <th scope="col" class="px-6 py-3 bg-blue-50">
                                <strong>Delivery Statement Sheet(TOF models only)</strong>
                            </th>
                            <th scope="col" class="px-6 py-3 bg-blue-50">
                                <strong>Specific Label/QR Code Label</strong>
                            </th>
                            <th scope="col" class="px-6 py-3 bg-blue-50">
                                <strong>Leakage flux Label</strong>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <strong>Identity Tape Used</strong>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <strong>Picked list(Indicated FG Box Serial No.)</strong>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <strong>Remarks</strong>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $control = 1;
                        @endphp
                        @while ($control <> 11)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td scope="row" class="px-6 py-4 w-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" colspan="5">
                                <x-inputText id="6-oqa-{{$control}}"></x-inputText>
                            </td>
                            <td scope="row" class="w-4 p-4">
                                <x-inputText id="6-boxno-{{$control}}"></x-inputText>
                            </td>
                            <td class="w-4 p-4">
                                <x-inputText id="6-actpackstdpack-{{$control}}"></x-inputText>
                            </td>
                            <td class="w-4 p-4">
                                <x-checkbox id="6-fgbarlabel-{{$control}}" value="ok"></x-checkbox>
                            </td>
                            <td class="w-4 p-4">
                                <x-checkbox id="6-speclabelqrcodeinternal-{{$control}}" value="ok"></x-checkbox>
                            </td>
                            <td class="w-4 p-4">
                                <x-checkbox id="6-cartcon-{{$control}}" value="ok"></x-checkbox>
                            </td>
                            <td class="w-4 p-4">
                                <x-checkbox id="6-magnetpack-{{$control}}" value="ok"></x-checkbox>
                            </td>
                            <td class="w-4 p-4">
                                <x-checkbox id="6-magnetcond-{{$control}}" value="ok"></x-checkbox>
                            </td>
                            <td class="w-4 p-4">
                                <x-checkbox id="6-presdescicant-{{$control}}" value="ok"></x-checkbox>
                            </td>
                            <td class="w-4 p-4">
                                <x-checkbox id="6-packorientation-{{$control}}" value="ok"></x-checkbox>
                            </td>
                            <td class="w-4 p-4" colspan="5">
                                <x-inputText id="6-spacerused-{{$control}}"></x-inputText>
                            </td>
                            <td class="w-4 p-4">
                                <x-checkbox id="6-sir-{{$control}}" value="ok"></x-checkbox>
                            </td>
                            <td class="w-4 p-4">
                                <x-checkbox id="6-serem-{{$control}}" value="ok"></x-checkbox>
                            </td>
                            <td class="w-4 p-4">
                                <x-checkbox id="6-shiplabelothermodels-{{$control}}" value="ok"></x-checkbox>
                            </td>
                            <td class="w-4 p-4">
                                <x-checkbox id="6-vmi-{{$control}}" value="ok"></x-checkbox>
                            </td>
                            <td class="w-4 p-4">
                                <x-checkbox id="6-mcbarlabel-{{$control}}" value="ok"></x-checkbox>
                            </td>
                            <td class="w-4 p-4">
                                <x-checkbox id="6-delivstate-{{$control}}" value="ok"></x-checkbox>
                            </td>
                            <td class="w-4 p-4">
                                <x-checkbox id="6-specificlabelqrcodeexternal-{{$control}}" value="ok"></x-checkbox>
                            </td>
                            <td class="w-4 p-4">
                                <x-checkbox id="6-leakageflux-{{$control}}" value="ok"></x-checkbox>
                            </td>

                            <td class="w-4 p-4">
                                <x-inputText id="6-identitytape-{{$control}}"></x-inputText>
                            </td>
                            <td class="w-4 p-4">
                                <x-inputText id="6-pickedlist-{{$control}}"></x-inputText>
                            </td>
                            <td class="w-4 p-4">
                                <x-inputText id="6-remarks-{{$control}}"></x-inputText>
                            </td>
                        </tr>
                        @php
                        $control++;
                        @endphp
                        @endwhile
                    </tbody>
                </table>
            </div>
            <div>
                <div class="grid gap-6 mb-6 mt-2 md:grid-rows-3 md:grid-cols-2 rounded-xl shadow-xl p-2 bg-gray-50">
                    <div class="row-span-3 col-span-2 flex items-center justify-center">
                        <x-label :semibold="true">*For palletized finished goods, check expiration date:</x-label><input type="date" id="6-datetime" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ml-8"  <?php //required ?>/>
                    </div>
                    <div class="overflow-x-auto col-span-4">
                        <table class="text-sm text-left rtl:text-right text-gray-500 table-auto w-screen">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    @php
                                        $control = 1;
                                    @endphp
                                    @while($control <> 21)
                                    <th scope="col" class="px-6 py-3">
                                        <strong>Pallet {{$control}}</strong>
                                    </th>
                                    @php
                                        $control++;
                                    @endphp
                                    @endwhile
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    @php
                                        $control = 1;
                                    @endphp
                                    @while($control <> 21)
                                    <td class="w-4 p-4">
                                        <x-checkbox id="6-pallet-{{$control}}"></x-checkbox>
                                    </td>
                                    @php
                                        $control++;
                                    @endphp
                                    @endwhile
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row-span-3 col-span-2 flex items-center justify-center">
                        <x-label :semibold="true">Results: </x-label><x-inputText id="6-results"></x-inputText>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-4 m-2 rounded-xl shadow=sm bg-slate-50">
            <div class="flex items-center justify-center bg-gray-500 text-gray-100">
                <h1 class='text-lg'>
                    <strong>7. Personnel</strong>
                </h1>
            </div>
            <div>
                <div class="grid gap-6 mb-6 mt-2 md:grid-rows-3 md:grid-cols-2 rounded-xl shadow-xl p-2 bg-gray-50">
                    <div class="col-span-1 md:grid-cols-2">
                        <div class="col-span-1 flex items-center justify-center">
                            <x-label for="7-shippingpic">Shipping PIC</x-label><x-inputText id="7-shippingpic"></x-inputText>
                        </div>
                    </div>
                    <div class="col-span-1 md:grid-cols-2">
                        <div class="col-span-1 flex items-center justify-center">
                            <x-label for="7-date">Date:</x-label><input type="date" id="7-date" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ml-8" />
                        </div>
                    </div>
                    <div class="col-span-1 md:grid-cols-2">
                        <div class="col-span-1 flex items-center justify-center">
                            <x-label for="7-oba">OBA Checked by:</x-label><x-inputText id="7-oba"></x-inputText>
                        </div>
                    </div>
                    <div class="col-span-1 md:grid-cols-2">
                        <div class="col-span-1 flex items-center justify-center">
                            <x-label for="7-judgement-oba">JUDGEMENT</x-label><x-inputText id="7-judgement-oba"></x-inputText>
                        </div>
                    </div>
                    <div class="col-span-1 md:grid-cols-2">
                        <div class="col-span-1 flex items-center justify-center">
                            <x-label for="7-obapic">OBA Picture by:</x-label><x-inputText id="7-obapic"></x-inputText>
                        </div>
                    </div>
                    <div class="col-span-1 md:grid-cols-2">
                        <div class="col-span-1 flex items-center justify-center">
                            <x-label for="7-judgement-obapic">JUDGEMENT</x-label><x-inputText id="7-judgement-obapic"></x-inputText>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-4 m-2 rounded-xl shadow=sm bg-slate-50 flex items-center justify-center">
            <button type="submit">
                <a class="fancy">
                    <span class="top-key"></span>
                    <span class="text">SAVE</span>
                    <span class="bottom-key-1"></span>
                    <span class="bottom-key-2"></span>
                </a>
            </button>
        </div>
    </form>
</div>
