<div class="max-w-6xl mx-auto px-4 mt-6 bg-white rounded-xl pt-4">
    <div class="form-container glass-effect rounded-3xl shadow-2xl overflow-hidden">
        <!-- Enhanced Header -->
        <div class="gradient-bg text-white px-8 py-6 rounded-xl mb-6">
            <div class="flex items-center justify-center">
                <div class="bg-white/20 rounded-full p-3 mr-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                </div>
                <div>
                    <h1 class="text-3xl font-bold">Box/Pallet Condition Inspection</h1>
                    <p class="text-white/80 mt-1">Overall Checking</p>
                </div>
            </div>
        </div>

        <!-- Main Inspection Table -->
        <div class="p-4 sm:p-6 lg:p-8">
            <div class="table-wrapper mb-8">
                <table class="enhanced-table w-full text-sm">
                    <thead>
                        <!-- Category Headers -->
                        <tr>
                            @for ($j=1;$j<=15;$j++)
                                <th class="px-3 py-4" style="border: none;"></th>
                            @endfor
                            
                            <th class="internal-header px-6 py-4 text-base sm:text-lg font-bold" colspan="13">
                                📦 INTERNAL PACKAGING
                            </th>
                            <th class="external-header px-6 py-4 text-base sm:text-lg font-bold" colspan="7">
                                📋 EXTERNAL PACKAGING
                            </th>
                            @for ($j=1;$j<=15;$j++)
                                <th class="px-3 py-4" style="border: none;"></th>
                            @endfor
                        </tr>
                        
                        <!-- Column Headers -->
                        <tr class="text-xs sm:text-sm">
                            <th class="px-4 py-3 font-semibold min-w-26" colspan="5">
                                🏷️ OQA Lot No. (last box)/<br>PN of other box
                            </th>
                            <th class="px-4 py-3 font-semibold" colspan="5">
                                📦 Box No.
                            </th>
                            <th class="px-4 py-3 font-semibold" colspan="5">
                                📊 Actual Pack/<br>Std. Pack
                            </th>
                            <th class="px-4 py-3 font-semibold bg-red-50">
                                🏷️ Package Barcode<br>Label
                            </th>
                            <th class="px-4 py-3 font-semibold bg-red-50">
                                🔍 Specific Label/<br>VDA/DMC/QR Code
                            </th>
                            <th class="px-4 py-3 font-semibold bg-red-50">
                                📦 Carton<br>Condition
                            </th>
                            <th class="px-4 py-3 font-semibold bg-red-50">
                                🧲 Magnet Pack<br>Condition
                            </th>
                            <th class="px-4 py-3 font-semibold bg-red-50">
                                🧲 Magnet<br>Condition
                            </th>
                            <th class="px-4 py-3 font-semibold bg-red-50">
                                💧 Presence of<br>Desiccant
                            </th>
                            <th class="px-4 py-3 font-semibold bg-red-50">
                                📐 Package<br>Orientation
                            </th>
                            <th class="px-4 py-3 font-semibold bg-red-50" colspan="5">
                                📏 Spacer used based on<br>Packing Specs/OPI
                            </th>
                            <th class="px-4 py-3 font-semibold bg-red-50">
                                📋 Specific<br>Inspection Report
                            </th>
                            <th class="px-4 py-3 font-semibold bg-blue-50">
                                🔒 SEREM
                            </th>
                            <th class="px-4 py-3 font-semibold bg-blue-50">
                                🚚 Shipping Label<br>(other models)
                            </th>
                            <th class="px-4 py-3 font-semibold bg-blue-50">
                                🏷️ VMI LABEL<br>(MIN,MOR & MIS)
                            </th>
                            <th class="px-4 py-3 font-semibold bg-blue-50">
                                📊 Box Barcode<br>Label
                            </th>
                            <th class="px-4 py-3 font-semibold bg-blue-50">
                                📄 Delivery Statement<br>(TOF models only)
                            </th>
                            <th class="px-4 py-3 font-semibold bg-blue-50">
                                🔍 Specific Label/<br>QR Code Label
                            </th>
                            <th class="px-4 py-3 font-semibold bg-blue-50">
                                ⚡ Leakage flux<br>Label
                            </th>
                            <th class="px-4 py-3 font-semibold" colspan="5">
                                🎯 Identity Tape<br>Used
                            </th>
                            <th class="px-4 py-3 font-semibold" colspan="5">
                                📋 Picked list<br>(FG Box Serial No.)
                            </th>
                            <th class="px-4 py-3 font-semibold" colspan="5">
                                💭 Remarks
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $row = 1;
                        @endphp
                        @while ($row <> 11)
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-4 py-4" colspan="5">
                                <x-inputText 
                                    id="6-oqa-{{$row}}" 
                                    wire:model='inputs.{{ $row }}.oqa' 
                                    wire:focusout="dispatchMe('{{ $row }}', 'oqa')" 
                                    :inputStatus="$inputStatus[$row]['oqa'] ?? null"
                                    class="touch-input w-full rounded-lg border-2 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all"
                                ></x-inputText>
                            </td>
                            <td class="px-4 py-4" colspan="5">
                                <x-inputText 
                                    id="6-boxno-{{$row}}" 
                                    wire:model='inputs.{{ $row }}.box_no' 
                                    wire:focusout="dispatchMe('{{ $row }}', 'box_no')" 
                                    :inputStatus="$inputStatus[$row]['box_no'] ?? null"
                                    class="touch-input w-full rounded-lg border-2 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all"
                                ></x-inputText>
                            </td>
                            <td class="px-4 py-4" colspan="5">
                                <x-inputText 
                                    id="6-actpackstdpack-{{$row}}" 
                                    wire:model='inputs.{{ $row }}.std_pack' 
                                    wire:focusout="dispatchMe('{{ $row }}', 'std_pack')" 
                                    :inputStatus="$inputStatus[$row]['std_pack'] ?? null"
                                    class="touch-input w-full rounded-lg border-2 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all"
                                ></x-inputText>
                            </td>
                            
                            <!-- Internal Packaging Checkboxes -->
                            <td class="px-4 py-4 bg-red-25">
                                <x-checkbox 
                                    id="6-fgbarlabel-{{$row}}" 
                                    value="1" 
                                    wire:model='inputs.{{ $row }}.internal_fg_label' 
                                    wire:focusout="dispatchMe('{{ $row }}', 'internal_fg_label')" 
                                    :inputStatus="$inputStatus[$row]['internal_fg_label'] ?? null"
                                    class="touch-checkbox rounded border-2 text-red-600 focus:ring-red-500"
                                ></x-checkbox>
                            </td>
                            <td class="px-4 py-4 bg-red-25">
                                <x-checkbox 
                                    id="6-speclabelqrcodeinternal-{{$row}}" 
                                    value="1" 
                                    wire:model='inputs.{{ $row }}.internal_specific_label' 
                                    wire:focusout="dispatchMe('{{ $row }}', 'internal_specific_label')" 
                                    :inputStatus="$inputStatus[$row]['internal_specific_label'] ?? null"
                                    class="touch-checkbox rounded border-2 text-red-600 focus:ring-red-500"
                                ></x-checkbox>
                            </td>
                            <td class="px-4 py-4 bg-red-25">
                                <x-checkbox 
                                    id="6-cartcon-{{$row}}" 
                                    value="1" 
                                    wire:model='inputs.{{ $row }}.internal_carton_condition' 
                                    wire:focusout="dispatchMe('{{ $row }}', 'internal_carton_condition')" 
                                    :inputStatus="$inputStatus[$row]['internal_carton_condition'] ?? null"
                                    class="touch-checkbox rounded border-2 text-red-600 focus:ring-red-500"
                                ></x-checkbox>
                            </td>
                            <td class="px-4 py-4 bg-red-25">
                                <x-checkbox 
                                    id="6-magnetpack-{{$row}}" 
                                    value="1" 
                                    wire:model='inputs.{{ $row }}.internal_magnet_pack' 
                                    wire:focusout="dispatchMe('{{ $row }}', 'internal_magnet_pack')" 
                                    :inputStatus="$inputStatus[$row]['internal_magnet_pack'] ?? null"
                                    class="touch-checkbox rounded border-2 text-red-600 focus:ring-red-500"
                                ></x-checkbox>
                            </td>
                            <td class="px-4 py-4 bg-red-25">
                                <x-checkbox 
                                    id="6-magnetcond-{{$row}}" 
                                    value="1" 
                                    wire:model='inputs.{{ $row }}.internal_magnet_cond' 
                                    wire:focusout="dispatchMe('{{ $row }}', 'internal_magnet_cond')" 
                                    :inputStatus="$inputStatus[$row]['internal_magnet_cond'] ?? null"
                                    class="touch-checkbox rounded border-2 text-red-600 focus:ring-red-500"
                                ></x-checkbox>
                            </td>
                            <td class="px-4 py-4 bg-red-25">
                                <x-checkbox 
                                    id="6-presdescicant-{{$row}}" 
                                    value="1" 
                                    wire:model='inputs.{{ $row }}.internal_dessicant' 
                                    wire:focusout="dispatchMe('{{ $row }}', 'internal_dessicant')" 
                                    :inputStatus="$inputStatus[$row]['internal_dessicant'] ?? null"
                                    class="touch-checkbox rounded border-2 text-red-600 focus:ring-red-500"
                                ></x-checkbox>
                            </td>
                            <td class="px-4 py-4 bg-red-25">
                                <x-checkbox 
                                    id="6-packorientation-{{$row}}" 
                                    value="1" 
                                    wire:model='inputs.{{ $row }}.internal_pack_orientation' 
                                    wire:focusout="dispatchMe('{{ $row }}', 'internal_pack_orientation')" 
                                    :inputStatus="$inputStatus[$row]['internal_pack_orientation'] ?? null"
                                    class="touch-checkbox rounded border-2 text-red-600 focus:ring-red-500"
                                ></x-checkbox>
                            </td>
                            <td class="px-4 py-4 bg-red-25" colspan="5">
                                <x-inputText 
                                    id="6-spacerused-{{$row}}" 
                                    wire:model='inputs.{{ $row }}.internal_spacer' 
                                    wire:focusout="dispatchMe('{{ $row }}', 'internal_spacer')" 
                                    :inputStatus="$inputStatus[$row]['internal_spacer'] ?? null"
                                    class="touch-input w-full rounded-lg border-2 focus:border-red-500 focus:ring-2 focus:ring-red-200 transition-all"
                                ></x-inputText>
                            </td>
                            <td class="px-4 py-4 bg-red-25">
                                <x-checkbox 
                                    id="6-sir-{{$row}}" 
                                    value="1" 
                                    wire:model='inputs.{{ $row }}.internal_sir' 
                                    wire:focusout="dispatchMe('{{ $row }}', 'internal_sir')" 
                                    :inputStatus="$inputStatus[$row]['internal_sir'] ?? null"
                                    class="touch-checkbox rounded border-2 text-red-600 focus:ring-red-500"
                                ></x-checkbox>
                            </td>
                            
                            <!-- External Packaging Checkboxes -->
                            <td class="px-4 py-4 bg-blue-25">
                                <x-checkbox 
                                    id="6-serem-{{$row}}" 
                                    value="1" 
                                    wire:model='inputs.{{ $row }}.external_serem' 
                                    wire:focusout="dispatchMe('{{ $row }}', 'external_serem')" 
                                    :inputStatus="$inputStatus[$row]['external_serem'] ?? null"
                                    class="touch-checkbox rounded border-2 text-blue-600 focus:ring-blue-500"
                                ></x-checkbox>
                            </td>
                            <td class="px-4 py-4 bg-blue-25">
                                <x-checkbox 
                                    id="6-shiplabelothermodels-{{$row}}" 
                                    value="1" 
                                    wire:model='inputs.{{ $row }}.external_ship_label' 
                                    wire:focusout="dispatchMe('{{ $row }}', 'external_ship_label')" 
                                    :inputStatus="$inputStatus[$row]['external_ship_label'] ?? null"
                                    class="touch-checkbox rounded border-2 text-blue-600 focus:ring-blue-500"
                                ></x-checkbox>
                            </td>
                            <td class="px-4 py-4 bg-blue-25">
                                <x-checkbox 
                                    id="6-vmi-{{$row}}" 
                                    value="1" 
                                    wire:model='inputs.{{ $row }}.external_vmi_label' 
                                    wire:focusout="dispatchMe('{{ $row }}', 'external_vmi_label')" 
                                    :inputStatus="$inputStatus[$row]['external_vmi_label'] ?? null"
                                    class="touch-checkbox rounded border-2 text-blue-600 focus:ring-blue-500"
                                ></x-checkbox>
                            </td>
                            <td class="px-4 py-4 bg-blue-25">
                                <x-checkbox 
                                    id="6-mcbarlabel-{{$row}}" 
                                    value="1" 
                                    wire:model='inputs.{{ $row }}.external_mc_label' 
                                    wire:focusout="dispatchMe('{{ $row }}', 'external_mc_label')" 
                                    :inputStatus="$inputStatus[$row]['external_mc_label'] ?? null"
                                    class="touch-checkbox rounded border-2 text-blue-600 focus:ring-blue-500"
                                ></x-checkbox>
                            </td>
                            <td class="px-4 py-4 bg-blue-25">
                                <x-checkbox 
                                    id="6-delivstate-{{$row}}" 
                                    value="1" 
                                    wire:model='inputs.{{ $row }}.external_delivery_sheet' 
                                    wire:focusout="dispatchMe('{{ $row }}', 'external_delivery_sheet')" 
                                    :inputStatus="$inputStatus[$row]['external_delivery_sheet'] ?? null"
                                    class="touch-checkbox rounded border-2 text-blue-600 focus:ring-blue-500"
                                ></x-checkbox>
                            </td>
                            <td class="px-4 py-4 bg-blue-25">
                                <x-checkbox 
                                    id="6-specificlabelqrcodeexternal-{{$row}}" 
                                    value="1" 
                                    wire:model='inputs.{{ $row }}.external_specific_label' 
                                    wire:focusout="dispatchMe('{{ $row }}', 'external_specific_label')" 
                                    :inputStatus="$inputStatus[$row]['external_specific_label'] ?? null"
                                    class="touch-checkbox rounded border-2 text-blue-600 focus:ring-blue-500"
                                ></x-checkbox>
                            </td>
                            <td class="px-4 py-4 bg-blue-25">
                                <x-checkbox 
                                    id="6-leakageflux-{{$row}}" 
                                    value="1" 
                                    wire:model='inputs.{{ $row }}.external_flux_label' 
                                    wire:focusout="dispatchMe('{{ $row }}', 'external_flux_label')" 
                                    :inputStatus="$inputStatus[$row]['external_flux_label'] ?? null"
                                    class="touch-checkbox rounded border-2 text-blue-600 focus:ring-blue-500"
                                ></x-checkbox>
                            </td>
                            
                            <!-- Additional Fields -->
                            <td class="px-4 py-4" colspan="5">
                                <x-inputText 
                                    id="6-identitytape-{{$row}}" 
                                    wire:model='inputs.{{ $row }}.identity_tape' 
                                    wire:focusout="dispatchMe('{{ $row }}', 'identity_tape')" 
                                    :inputStatus="$inputStatus[$row]['identity_tape'] ?? null"
                                    class="touch-input w-full rounded-lg border-2 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all"
                                ></x-inputText>
                            </td>
                            <td class="px-4 py-4" colspan="5">
                                <x-inputText 
                                    id="6-pickedlist-{{$row}}" 
                                    wire:model='inputs.{{ $row }}.pick_list' 
                                    wire:focusout="dispatchMe('{{ $row }}', 'pick_list')" 
                                    :inputStatus="$inputStatus[$row]['pick_list'] ?? null"
                                    class="touch-input w-full rounded-lg border-2 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all"
                                ></x-inputText>
                            </td>
                            <td class="px-4 py-4" colspan="5">
                                <x-inputText 
                                    id="6-remarks-{{$row}}" 
                                    wire:model='inputs.{{ $row }}.remarks' 
                                    wire:focusout="dispatchMe('{{ $row }}', 'remarks')" 
                                    :inputStatus="$inputStatus[$row]['remarks'] ?? null"
                                    class="touch-input w-full rounded-lg border-2 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition-all"
                                ></x-inputText>
                            </td>
                        </tr>
                        @php
                        $row++;
                        @endphp
                        @endwhile
                    </tbody>
                </table>
            </div>

            <!-- Bottom Section -->
            <div class="bg-gradient-to-r from-gray-50 to-gray-100 rounded-2xl p-6 sm:p-8 shadow-lg">
                <!-- Expiration Date Section -->
                <div class="mb-8">
                    <div class="bg-white rounded-xl p-6 shadow-md border-l-4 border-orange-400">
                        <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
                            <div class="flex items-center gap-2">
                                <div class="bg-orange-100 rounded-full p-2">
                                    <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <x-label :semibold="true" class="text-lg font-semibold text-gray-800">
                                    📅 For palletized finished goods, check expiration date:
                                </x-label>
                            </div>
                            <input 
                                type="date" 
                                id="6-datetime" 
                                class="touch-input bg-white border-2 border-gray-300 text-gray-900 rounded-xl focus:ring-4 focus:ring-orange-200 focus:border-orange-500 transition-all shadow-sm hover:shadow-md" 
                                wire:model="inputs.expiration_date" 
                                wire:change="dispatchMe('expiration_date')" 
                            />
                        </div>
                    </div>
                </div>

                <!-- Pallet Verification Table -->
                <div class="mb-8">
                    <div class="bg-white rounded-xl overflow-hidden shadow-md">
                        <div class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white p-4">
                            <h3 class="text-lg font-bold flex items-center gap-2">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                                🗂️ Pallet Verification (1-20)
                            </h3>
                        </div>
                        <div class="table-wrapper">
                            <table class="enhanced-table w-full">
                                <thead>
                                    <tr>
                                        @php
                                            $column = 1;
                                        @endphp
                                        @while($column <> 21)
                                        <th class="px-6 py-4 font-semibold bg-gradient-to-b from-indigo-50 to-indigo-100 text-indigo-800">
                                            📦 Pallet {{$column}}
                                        </th>
                                        @php
                                            $column++;
                                        @endphp
                                        @endwhile
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="hover:bg-indigo-50 transition-colors duration-200">
                                        @php
                                            $column = 1;
                                        @endphp
                                        @while($column <> 21)
                                        <td class="px-6 py-6">
                                            <x-checkbox 
                                                id="6-pallet-{{$column}}" 
                                                wire:model="inputs.pallet_{{ $column }}" 
                                                wire:change="dispatchMe('pallet_{{ $column }}')"       
                                                :inputStatus="$inputStatus['pallet_' . $column] ?? null"
                                                class="touch-checkbox rounded border-2 text-indigo-600 focus:ring-indigo-500"
                                            ></x-checkbox>
                                        </td>
                                        @php
                                            $column++;
                                        @endphp
                                        @endwhile
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="space-y-8">
                    
                    
                    <!-- Option 1: Modern Card with Icon -->
                    <div class="results-container bg-white rounded-2xl p-8 shadow-lg border border-gray-100">
                        <div class="flex items-center gap-6">
                            <div class="results-icon flex-shrink-0 w-14 h-14 rounded-full flex items-center justify-center text-white shadow-lg relative">
                                <i class="fas fa-chart-line text-xl"></i>
                                <div class="status-indicator bg-green-400"></div>
                            </div>
                            
                            <div class="flex-1 space-y-3">
                                <label for="results-1" class="results-label block text-lg font-bold tracking-wide">
                                    Results
                                </label>
                                <div class="input-wrapper">
                                    <input 
                                        type="text" 
                                        id="results-1"
                                        placeholder="Enter your results or outcomes here..."
                                        class="results-input w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-0 transition-all duration-300 text-gray-700 placeholder-gray-400"
                                        wire:model="inputs.results" 
                                        wire:change="dispatchMe('results')"
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    </div>
</div>
