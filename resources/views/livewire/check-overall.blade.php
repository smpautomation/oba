<div class="p-4 m-2 rounded-2xl shadow-lg bg-white">
    <!-- Header -->
    <div class="flex items-center justify-center bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-xl mb-6 p-4">
        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <h1 class="text-xl font-bold">Checking of Overall Box/Pallet Condition(Internal / External)</h1>
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
                    $row = 1;
                @endphp
                @while ($row <> 11)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td scope="row" class="px-6 py-4 w-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" colspan="5">
                        <x-inputText id="6-oqa-{{$row}}" wire:model='inputs.{{ $row }}.oqa' wire:focusout="dispatchMe('{{ $row }}', 'oqa')" :inputStatus="$inputStatus[$row]['oqa'] ?? null"></x-inputText>
                    </td>
                    <td scope="row" class="w-4 p-4">
                        <x-inputText id="6-boxno-{{$row}}" wire:model='inputs.{{ $row }}.box_no' wire:focusout="dispatchMe('{{ $row }}', 'box_no')" :inputStatus="$inputStatus[$row]['box_no'] ?? null"></x-inputText>
                    </td>
                    <td class="w-4 p-4">
                        <x-inputText id="6-actpackstdpack-{{$row}}" wire:model='inputs.{{ $row }}.std_pack' wire:focusout="dispatchMe('{{ $row }}', 'std_pack')" :inputStatus="$inputStatus[$row]['std_pack'] ?? null"></x-inputText>
                    </td>
                    <td class="w-4 p-4">
                        <x-checkbox id="6-fgbarlabel-{{$row}}" value="1" wire:model='inputs.{{ $row }}.internal_fg_label' wire:focusout="dispatchMe('{{ $row }}', 'internal_fg_label')" :inputStatus="$inputStatus[$row]['internal_fg_label'] ?? null"></x-checkbox>
                    </td>
                    <td class="w-4 p-4">
                        <x-checkbox id="6-speclabelqrcodeinternal-{{$row}}" value="1" wire:model='inputs.{{ $row }}.internal_specific_label' wire:focusout="dispatchMe('{{ $row }}', 'internal_specific_label')" :inputStatus="$inputStatus[$row]['internal_specific_label'] ?? null"></x-checkbox>
                    </td>
                    <td class="w-4 p-4">
                        <x-checkbox id="6-cartcon-{{$row}}" value="1" wire:model='inputs.{{ $row }}.internal_carton_condition' wire:focusout="dispatchMe('{{ $row }}', 'internal_carton_condition')" :inputStatus="$inputStatus[$row]['internal_carton_condition'] ?? null"></x-checkbox>
                    </td>
                    <td class="w-4 p-4">
                        <x-checkbox id="6-magnetpack-{{$row}}" value="1" wire:model='inputs.{{ $row }}.internal_magnet_pack' wire:focusout="dispatchMe('{{ $row }}', 'internal_magnet_pack')" :inputStatus="$inputStatus[$row]['internal_magnet_pack'] ?? null"></x-checkbox>
                    </td>
                    <td class="w-4 p-4">
                        <x-checkbox id="6-magnetcond-{{$row}}" value="1" wire:model='inputs.{{ $row }}.internal_magnet_cond' wire:focusout="dispatchMe('{{ $row }}', 'internal_magnet_cond')" :inputStatus="$inputStatus[$row]['internal_magnet_cond'] ?? null"></x-checkbox>
                    </td>
                    <td class="w-4 p-4">
                        <x-checkbox id="6-presdescicant-{{$row}}" value="1" wire:model='inputs.{{ $row }}.internal_dessicant' wire:focusout="dispatchMe('{{ $row }}', 'internal_dessicant')" :inputStatus="$inputStatus[$row]['internal_dessicant'] ?? null"></x-checkbox>
                    </td>
                    <td class="w-4 p-4">
                        <x-checkbox id="6-packorientation-{{$row}}" value="1" wire:model='inputs.{{ $row }}.internal_pack_orientation' wire:focusout="dispatchMe('{{ $row }}', 'internal_pack_orientation')" :inputStatus="$inputStatus[$row]['internal_pack_orientation'] ?? null"></x-checkbox>
                    </td>
                    <td class="w-4 p-4" colspan="5">
                        <x-inputText id="6-spacerused-{{$row}}" wire:model='inputs.{{ $row }}.internal_spacer' wire:focusout="dispatchMe('{{ $row }}', 'internal_spacer')" :inputStatus="$inputStatus[$row]['internal_spacer'] ?? null"></x-inputText>
                    </td>
                    <td class="w-4 p-4">
                        <x-checkbox id="6-sir-{{$row}}" value="1" wire:model='inputs.{{ $row }}.internal_sir' wire:focusout="dispatchMe('{{ $row }}', 'internal_sir')" :inputStatus="$inputStatus[$row]['internal_sir'] ?? null"></x-checkbox>
                    </td>
                    <td class="w-4 p-4">
                        <x-checkbox id="6-serem-{{$row}}" value="1" wire:model='inputs.{{ $row }}.external_serem' wire:focusout="dispatchMe('{{ $row }}', 'external_serem')" :inputStatus="$inputStatus[$row]['external_serem'] ?? null"></x-checkbox>
                    </td>
                    <td class="w-4 p-4">
                        <x-checkbox id="6-shiplabelothermodels-{{$row}}" value="1" wire:model='inputs.{{ $row }}.external_ship_label' wire:focusout="dispatchMe('{{ $row }}', 'external_ship_label')" :inputStatus="$inputStatus[$row]['external_ship_label'] ?? null"></x-checkbox>
                    </td>
                    <td class="w-4 p-4">
                        <x-checkbox id="6-vmi-{{$row}}" value="1" wire:model='inputs.{{ $row }}.external_vmi_label' wire:focusout="dispatchMe('{{ $row }}', 'external_vmi_label')" :inputStatus="$inputStatus[$row]['external_vmi_label'] ?? null"></x-checkbox>
                    </td>
                    <td class="w-4 p-4">
                        <x-checkbox id="6-mcbarlabel-{{$row}}" value="1" wire:model='inputs.{{ $row }}.external_mc_label' wire:focusout="dispatchMe('{{ $row }}', 'external_mc_label')" :inputStatus="$inputStatus[$row]['external_mc_label'] ?? null"></x-checkbox>
                    </td>
                    <td class="w-4 p-4">
                        <x-checkbox id="6-delivstate-{{$row}}" value="1" wire:model='inputs.{{ $row }}.external_delivery_sheet' wire:focusout="dispatchMe('{{ $row }}', 'external_delivery_sheet')" :inputStatus="$inputStatus[$row]['external_delivery_sheet'] ?? null"></x-checkbox>
                    </td>
                    <td class="w-4 p-4">
                        <x-checkbox id="6-specificlabelqrcodeexternal-{{$row}}" value="1" wire:model='inputs.{{ $row }}.external_specific_label' wire:focusout="dispatchMe('{{ $row }}', 'external_specific_label')" :inputStatus="$inputStatus[$row]['external_specific_label'] ?? null"></x-checkbox>
                    </td>
                    <td class="w-4 p-4">
                        <x-checkbox id="6-leakageflux-{{$row}}" value="1" wire:model='inputs.{{ $row }}.external_flux_label' wire:focusout="dispatchMe('{{ $row }}', 'external_flux_label')" :inputStatus="$inputStatus[$row]['external_flux_label'] ?? null"></x-checkbox>
                    </td>

                    <td class="w-4 p-4">
                        <x-inputText id="6-identitytape-{{$row}}" wire:model='inputs.{{ $row }}.identity_tape' wire:focusout="dispatchMe('{{ $row }}', 'identity_tape')" :inputStatus="$inputStatus[$row]['identity_tape'] ?? null"></x-inputText>
                    </td>
                    <td class="w-4 p-4">
                        <x-inputText id="6-pickedlist-{{$row}}" wire:model='inputs.{{ $row }}.pick_list' wire:focusout="dispatchMe('{{ $row }}', 'pick_list')" :inputStatus="$inputStatus[$row]['pick_list'] ?? null"></x-inputText>
                    </td>
                    <td class="w-4 p-4">
                        <x-inputText id="6-remarks-{{$row}}" wire:model='inputs.{{ $row }}.remarks' wire:focusout="dispatchMe('{{ $row }}', 'remarks')" :inputStatus="$inputStatus[$row]['remarks'] ?? null"></x-inputText>
                    </td>
                </tr>
                @php
                $row++;
                @endphp
                @endwhile
            </tbody>
        </table>
    </div>
    <div>
        <div class="grid gap-6 mb-6 mt-2 md:grid-rows-3 md:grid-cols-2 rounded-xl shadow-xl p-2 bg-gray-50">
            <div class="row-span-3 col-span-2 flex items-center justify-center">
                <x-label :semibold="true">*For palletized finished goods, check expiration date:</x-label><input type="date" id="6-datetime" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ml-8"  <?php //required ?> wire:model="inputs.expiration_date" wire:change="dispatchMe('expiration_date')" />
            </div>
            <div class="overflow-x-auto col-span-4">
                <table class="text-sm text-left rtl:text-right text-gray-500 table-auto w-screen">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            @php
                                $column = 1;
                            @endphp
                            @while($column <> 21)
                            <th scope="col" class="px-6 py-3">
                                <strong>Pallet {{$column}}</strong>
                            </th>
                            @php
                                $column++;
                            @endphp
                            @endwhile
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            @php
                                $column = 1;
                            @endphp
                            @while($column <> 21)
                            <td class="w-4 p-4">
                                <x-checkbox id="6-pallet-{{$column}}" wire:model="inputs.pallet_{{ $column }}" wire:change="dispatchMe('pallet_{{ $column }}')"       :inputStatus="$inputStatus['pallet_' . $column] ?? null"></x-checkbox>
                            </td>
                            @php
                                $column++;
                            @endphp
                            @endwhile
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row-span-3 col-span-2 flex items-center justify-center">
                <x-label :semibold="true">Results: </x-label><x-inputText id="6-results" wire:model="inputs.results" wire:change="dispatchMe('results')"       :inputStatus="$inputStatus['results'] ?? null"></x-inputText>
            </div>
        </div>
    </div>
</div>
