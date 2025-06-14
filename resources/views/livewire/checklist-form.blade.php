<div>
    <form wire:submit='save'>
        <div class="flex">
            <label for="section" class='mr-2'>Section:</label>
            <h5><u>&nbsp;&nbsp;{{ $checklistInfo->section }}&nbsp;&nbsp;</u></h5>
        </div>
        <livewire:preparation-checklist :checklist_id="$model_id"></livewire:preparation-checklist>
        <livewire:o-b-a-kit-checklist :checklist_id="$model_id"></livewire:o-b-a-kit-checklist>
        <livewire:shipment-information :checklist_id="$model_id"></livewire:shipment-information>
        <livewire:check-items :checklist_id="$model_id"></livewire:check-items>
        <livewire:similarities-checking :checklist_id="$model_id"></livewire:similarities-checking>
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
