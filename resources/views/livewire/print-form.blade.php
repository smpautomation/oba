<div>
    <div class="a4-landscape">
        <div style="display: flex; justify-content: space-between; align-items: start;" class="mb-1 mt-10">
            <div style="display: flex; align-items: center; gap: 10px;">
                <div>
                    <img src="{{ asset('photo/smp_logo2.png') }}" alt="smp_logo" style="height: 1.5rem">
                    <div style="font-size: 8px;">Shinetsu Magnetics Phils. Inc.</div>
                </div>
            </div>
            <div style="text-align: left; font-size: 9px;">
                <div>SD-QA-0452</div>
                {{-- <div>Rev No. 23</div> --}}
                <div>Effectivity date: October 10, 2025</div>
            </div>
        </div>

        <!-- Main Title -->
        <div style="text-align: center; font-weight: bold; font-size: 14px; border: 2px solid #000; padding: 0.1px; margin-bottom: 5px;background-color: #E0E0E0">
            OUT OF THE BOX AUDIT CHECKLIST
        </div>

        <!-- Main Content -->
        <div class="main-container">
            <!-- Left Section -->
            <div class="left-section">
                <!-- Section Header -->
                <table style="margin-bottom: 3px;" >
                    <tr>
                        <td colspan="10" class="border-none">SECTION:  <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $checklistInfo->section }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
                    </tr>
                    <tr>
                        <td colspan="10" style="color: red; font-weight: bold; font-size: 9px; padding: 2px;" class="border-none">
                            REMINDERS: NO PICKLIST, NO FG LOT TRACEABILITY, INCOMPLETE REFERENCE, NO OBA KIT DO NOT PROCEED WITH OBA.
                        </td>
                    </tr>
                </table>

                <!-- 1. Preparation Checklist -->
                <table style="margin-bottom: 3px;">
                    <thead>
                        <th style='width: 2rem;' class="border-none w-20 text-left" colspan="2">
                                1. Preparation Checklist
                        </th>
                        <th class="border border-r-0 border-t-2 border-l-2">
                            <img src="{{ asset('photo/ex-point.png') }}" alt="smp_logo" class='h-4 pl-5'>
                        </th>
                        <th colspan='8' class="border border-l-0 border-r-0 border-t-2">
                            <p class="ml-20">CHECK ITEMS</p>
                        </th>
                        <th class="border border-l-0 border-t-2 border-r-2" colspan='2'>
                            <img src="{{ asset('photo/ex-point.png') }}" alt="smp_logo" class='h-4 pl-4'>
                        </th>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="2" class="text-center align-middle font-bold border-t-2 border-l-2">PREPARTION Checklist</td>
                            <td class="check-item-cell font-bold">MC RECEIVING<br>CHECKLIST</td>
                            <td class="check-item-cell font-bold" colspan='2'>OBA KIT</td>
                            <td class="check-item-cell font-bold" colspan='2'>Packing<br>Specs</td>
                            <td class="check-item-cell font-bold">SEREM</td>
                            <td class="check-item-cell font-bold">PICK LIST</td>
                            <td class="check-item-cell font-bold">FG LOT TRACE</td>
                            <td class="check-item-cell font-bold">Scanned QR<br>Code</td>
                            <td class="check-item-cell font-bold">Packing Slip/<br>Shipping<br>Invoice/SI</td>
                            <td class="check-item-cell font-bold border-r-2">RELATED DOCUMENTS<br>ON OBA Checking</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-center align-middle font-bold border-l-2">COMPLETE</td>
                            <td class="check-item-cell">
                                @php
                                    if($checklistInfo->mc_checklist_pc){
                                        echo $checklistInfo->prepCheck->oneprep2column ? '✓' : "X";
                                    }else{
                                        echo "N/A";
                                    }
                                @endphp
                            </td>
                            <td class="check-item-cell" colspan='2'>@php echo $checklistInfo->prepCheck->oneprep3column ? '✓' : "X"; @endphp</td>
                            <td class="check-item-cell" colspan='2'>@php echo $checklistInfo->prepCheck->oneprep4column ? '✓' : "X"; @endphp</td>
                            <td class="check-item-cell">@php echo $checklistInfo->prepCheck->oneprep5column ? '✓' : "X"; @endphp</td>
                            <td class="check-item-cell">@php echo $checklistInfo->prepCheck->oneprep6column ? '✓' : "X"; @endphp</td>
                            <td class="check-item-cell">@php echo $checklistInfo->prepCheck->oneprep7column ? '✓' : "X"; @endphp</td>
                            <td class="check-item-cell">
                                @php
                                    if($checklistInfo->scanned_qr_pc){
                                        echo $checklistInfo->prepCheck->oneprep8column ? '✓' : "X";
                                    }else{
                                        echo "N/A";
                                    }
                                @endphp
                            </td>
                            <td class="check-item-cell">@php echo $checklistInfo->prepCheck->oneprep9column ? '✓' : "X"; @endphp</td>
                            <td class="check-item-cell border-r-2">@php echo $checklistInfo->prepCheck->oneprep10column ? '✓' : "X"; @endphp</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-center align-middle font-bold border-l-2 border-b-2">REMARKS</td>
                            <td class="check-item-cell border-b-2">
                                @php
                                    if($checklistInfo->mc_checklist_pc){
                                        echo $checklistInfo->prepCheck->oneprep2remarks ?? $checklistInfo->prepCheck->oneprep2remarks;
                                    }else{
                                        echo "N/A";
                                    }
                                @endphp
                            </td>
                            <td class="check-item-cell border-b-2" colspan='2'>@php echo $checklistInfo->prepCheck->oneprep3remarks ?? $checklistInfo->prepCheck->oneprep3remarks; @endphp</td>
                            <td class="check-item-cell border-b-2" colspan='2'>@php echo $checklistInfo->prepCheck->oneprep4remarks ?? $checklistInfo->prepCheck->oneprep4remarks; @endphp</td>
                            <td class="check-item-cell border-b-2">@php echo $checklistInfo->prepCheck->oneprep5remarks ?? $checklistInfo->prepCheck->oneprep5remarks; @endphp</td>
                            <td class="check-item-cell border-b-2">@php echo $checklistInfo->prepCheck->oneprep6remarks ?? $checklistInfo->prepCheck->oneprep6remarks; @endphp</td>
                            <td class="check-item-cell border-b-2">@php echo $checklistInfo->prepCheck->oneprep7remarks ?? $checklistInfo->prepCheck->oneprep7remarks; @endphp</td>
                            <td class="check-item-cell border-b-2">
                                @php
                                    if($checklistInfo->scanned_qr_pc){
                                        echo $checklistInfo->prepCheck->oneprep8remarks ?? $checklistInfo->prepCheck->oneprep8remarks;
                                    }else{
                                        echo "N/A";
                                    }
                                @endphp
                            </td>
                            <td class="check-item-cell border-b-2">@php echo $checklistInfo->prepCheck->oneprep9remarks ?? $checklistInfo->prepCheck->oneprep9remarks; @endphp</td>
                            <td class="check-item-cell border-b-2 border-r-2">@php echo $checklistInfo->prepCheck->oneprep10remarks ?? $checklistInfo->prepCheck->oneprep10remarks; @endphp</td>
                        </tr>
                    </tbody>
                </table>

                <!-- 2. OBA KIT Checklist -->
                <table style="margin-bottom: 3px;">
                    <thead>
                        <th style='width: 2rem;' class="border-none w-20 text-left" colspan="2">
                                2. OBA KIT Checklist
                        </th>
                        <th colspan='7' class=" border-t-2 border-l-2 border-r-2">
                            <p class="ml-20">CHECK ITEMS</p>
                        </th>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="2" class="text-center align-middle font-bold border-t-2 border-l-2">OBA KIT Checklist</td>
                            <td class="check-item-cell font-bold">CALCULATOR</td>
                            <td class="check-item-cell font-bold" >CAMERA OR <br>TABLET</td>
                            <td class="check-item-cell font-bold">CUTTER</td>
                            <td class="check-item-cell font-bold">STAMP PAD</td>
                            <td class="check-item-cell font-bold">STAMP</td>
                            <td class="check-item-cell font-bold">TAPE<br>DISPENSER</td>
                            <td class="check-item-cell font-bold border-r-2">ZEBRA PEN or<br>BALLPEN</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-center align-middle font-bold border-l-2">BEFORE OBA</td>
                            <td class="check-item-cell">{{ $checklistInfo->obaCheck->beforecheckbox1 ? "✓" : "X" }}</td>
                            <td class="check-item-cell">{{ $checklistInfo->obaCheck->beforecheckbox2 ? "✓" : "X" }}</td>
                            <td class="check-item-cell">{{ $checklistInfo->obaCheck->beforecheckbox3 ? "✓" : "X" }}</td>
                            <td class="check-item-cell">{{ $checklistInfo->obaCheck->beforecheckbox4 ? "✓" : "X" }}</td>
                            <td class="check-item-cell">{{ $checklistInfo->obaCheck->beforecheckbox5 ? "✓" : "X" }}</td>
                            <td class="check-item-cell">{{ $checklistInfo->obaCheck->beforecheckbox6 ? "✓" : "X" }}</td>
                            <td class="check-item-cell border-r-2">N/A</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-center align-middle font-bold border-l-2 border-b-2">AFTER OBA</td>
                            <td class="check-item-cell border-b-2">{{ $checklistInfo->obaCheck->aftercheckbox1 ? "✓" : "X" }}</td>
                            <td class="check-item-cell border-b-2">{{ $checklistInfo->obaCheck->aftercheckbox2 ? "✓" : "X" }}</td>
                            <td class="check-item-cell border-b-2">{{ $checklistInfo->obaCheck->aftercheckbox3 ? "✓" : "X" }}</td>
                            <td class="check-item-cell border-b-2">{{ $checklistInfo->obaCheck->aftercheckbox4 ? "✓" : "X" }}</td>
                            <td class="check-item-cell border-b-2">{{ $checklistInfo->obaCheck->aftercheckbox5 ? "✓" : "X" }}</td>
                            <td class="check-item-cell border-b-2">{{ $checklistInfo->obaCheck->aftercheckbox6 ? "✓" : "X" }}</td>
                            <td class="check-item-cell border-b-2 border-r-2">N/A</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Right Section -->
            <div class="right-section">
                <div class="flex">
                    <!-- Legend Box -->
                    <div style="border: 2px solid #000; padding: 5px; margin-top: 7rem;" class="h-20 mr-1">
                        <div style="font-weight: bold; margin-bottom: 3px;">LEGEND:</div>
                        <div>OK = ☑</div>
                        <div>NG = ☒</div>
                        <div>N/A = Not Applicable</div>
                    </div>
                    <!-- OBA Sampling Matrix -->
                    <table style="margin-bottom: 5px;" class="w-72">
                        <tr>
                            <td colspan="2" class="bg-yellow border-l-2 border-t-2 border-r-2" style="text-align: center; font-weight: bold;">OBA SAMPLING MATRIX</td>
                        </tr>
                        <tr>
                            <td style="text-align: center; font-weight: bold;" class="section-header border-l-2">No. of Boxes</td>
                            <td style="text-align: center; font-weight: bold;" class="section-header border-r-2">No. of Box to be Inspected</td>
                        </tr>
                        <tr>
                            <td style="text-align: center;" class="border-l-2">1 - 5</td>
                            <td style="text-align: center;" class="border-r-2">1</td>
                        </tr>
                        <tr>
                            <td style="text-align: center;" class="border-l-2">6 - 15</td>
                            <td style="text-align: center;" class="border-r-2">3</td>
                        </tr>
                        <tr>
                            <td style="text-align: center;" class="border-l-2">16 - 30</td>
                            <td style="text-align: center;" class="border-r-2">5</td>
                        </tr>
                        <tr>
                            <td style="text-align: center;" class="border-l-2">31 - up</td>
                            <td style="text-align: center;" class="border-r-2">10</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="section-header border-l-2 border-r-2">Cell Partition</td>
                        </tr>
                        <tr>
                            <td style="text-align: center;" class="border-l-2">1 Pallet</td>
                            <td style="text-align: center;" class="border-r-2">1 box</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="section-header border-l-2 border-r-2" style="font-size: 8px;">For TTM Model using Specific Pallet</td>
                        </tr>
                        <tr>
                            <td style="font-size: 8px;" class="border-l-2">If shipment is 1 Pallet only</td>
                            <td style="text-align: center;" class="border-r-2">4 boxes</td>
                        </tr>
                        <tr>
                            <td style="font-size: 8px;" class="border-l-2">If shipment is 2 Pallets only</td>
                            <td style="text-align: center;" class="border-r-2">8 boxes</td>
                        </tr>
                        <tr>
                            <td style="font-size: 8px;" class="border-l-2">If shipment is 3 Pallets or more</td>
                            <td style="text-align: center; font-size: 8px;" class="border-r-2">Follow Standard Matrix</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-left text-blue-600 border-l-2 border-b-2 border-r-2" style="font-size: 8px;">
                                <strong>Note: For TTM Models applicable only to<br>
                                TTM0A30D, TTM0576D, TTM0664D, TTM0978D</strong>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>


        </div>
        <!-- Full Section -->
        <div>
            <table>
                <thead>
                    <th colspan="6" class="text-left border-none w-fit">
                        3. Shipment Information
                    </th>
                    <th colspan="10" class="text-left border-none">
                        4. Check Items
                    </th>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="3" class="border-t-2 border-l-2 font-bold">
                            DATE: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ date("M d, Y", strtotime($checklistInfo->shipInfoCheck->datetime)) }}
                        </td>
                        <td colspan="3" class="border-t-2 font-bold">
                            TIME: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ date("H:i", strtotime($checklistInfo->shipInfoCheck->datetime)) }}
                        </td>
                        <td colspan="" class="border-t-2 w-20 border-r-1 text-center font-bold">
                            <p class="ml-2 w-44">NO. OF BOXES OPEN:</p>
                        </td>
                        <td class="border-t-2 border-r-2" colspan="3">
                            <p class="ml-10">{{ $checklistInfo->checkItemsCheck->open_boxes_quantity }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" class="border-r-0 font-bold border-l-2">
                            MODEL NAME: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $checklistInfo->model }}
                        </td>
                        <td rowspan="3" class="text-center font-bold">100% Checking of Box Barcode Label Model Name</td>
                        <td class="border-r-0 font-bold">Are ALL Carton Boxes have  the same Model Name?</td>
                        <td class="border-l-0 border-r-0 font-bold">
                            <input type="checkbox" disabled
                                @php
                                    echo $checklistInfo->checkItemsCheck->same_model ? 'checked' : '';
                                @endphp>
                            YES
                        </td>
                        <td class="border-l-0 font-bold border-r-2">
                            <input type="checkbox" disabled
                                @php
                                    echo $checklistInfo->checkItemsCheck->same_model ? '' : 'checked';
                                @endphp>
                            NO
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" class="border-r-0 font-bold border-l-2">
                            INVOICE NO.: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $checklistInfo->shipInfoCheck->invoice_number }}
                        </td>
                        <td class="border-r-0 font-bold">Judgement:</td>
                        <td class="border-l-0 border-r-0 font-bold">
                            <input type="checkbox" disabled
                                @php
                                    echo $checklistInfo->checkItemsCheck->judgement ? 'checked' : '';
                                @endphp>
                            OK
                        </td>
                        <td class="border-l-0 font-bold border-r-2">
                            <input type="checkbox" disabled
                                @php
                                    echo $checklistInfo->checkItemsCheck->judgement ? '' : 'checked';
                                @endphp>
                            NG
                        </td>
                    </tr>
                    <tr>
                        <td colspan="1" rowspan="2" class="border-r-0 font-bold border-l-2">
                            PALLET USED:
                        </td>
                        <td colspan="1" class="text-center border-r-0 border-l-0" rowspan="2">
                            <div>
                                <input type="checkbox" disabled
                                    @php
                                        echo $checklistInfo->shipInfoCheck->wood ? 'checked' : '';
                                    @endphp
                                ><br> WOOD
                            </div>
                        </td>
                        <td colspan="1" class="text-center border-r-0 border-l-0" rowspan="2">
                            <div>
                                <input type="checkbox" disabled
                                    @php
                                        echo $checklistInfo->shipInfoCheck->paper ? 'checked' : '';
                                    @endphp
                                ><br> PAPER</div>
                        </td>
                        <td colspan="1" class="text-center border-r-0 border-l-0" rowspan="2">
                            <div>
                                <input type="checkbox" disabled
                                    @php
                                        echo $checklistInfo->shipInfoCheck->steel ? 'checked' : '';
                                    @endphp
                                ><br> STEEL</div>
                        </td>
                        <td colspan="1" class="text-center border-r-0 border-l-0" rowspan="2">
                            <div>
                                <input type="checkbox" disabled
                                    @php
                                        echo $checklistInfo->shipInfoCheck->plastic ? 'checked' : '';
                                    @endphp
                                ><br> PLASTIC</div>
                        </td>
                        <td colspan="1" class="text-center border-l-0" rowspan="2">
                            <div>
                                <input type="checkbox" disabled
                                    @php
                                        echo $checklistInfo->shipInfoCheck->others ? 'checked' : '';
                                    @endphp
                                >
                                <input type="text" style="font-size: 9px" disabled class="w-20 h-4 border-t-0 border-l-0 border-r-0" value="{{ $checklistInfo->shipInfoCheck->others }}"><br>
                                OTHERS(PLS SPECIFY)
                            </div>
                        </td>
                        <td colspan="3" class="border-r-2">If NO, What Model?: &nbsp;<u>&nbsp;&nbsp;&nbsp;&nbsp;{{ $checklistInfo->checkItemsCheck->specify_model }}&nbsp;&nbsp;&nbsp;&nbsp;</u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  How many cartons?:&nbsp;&nbsp;&nbsp;<u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $checklistInfo->checkItemsCheck->carton_quantity }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
                    </tr>
                    <tr>
                        <td class="text-center font-bold border-b-2" rowspan="2">
                            SIR(Specific Inspection Report)
                        </td>
                        <td class="border-r-0">
                            Does SIR Required?
                        </td>
                        <td class="border-l-0 border-r-0 font-bold"><input type="checkbox" disabled
                            @php
                                echo $checklistInfo->checkItemsCheck->need_sir ? 'checked' : '';
                            @endphp>YES</td>
                        <td class="border-l-0 font-bold border-r-2"><input type="checkbox" disabled
                            @php
                                echo $checklistInfo->checkItemsCheck->need_sir ? '' : 'checked';
                            @endphp>NO</td>
                    </tr>
                    <tr>
                        <td colspan="6" class=" border-l-2 border-b-2">
                            <p class="ml-10 font-bold">PALLET SIZE: &nbsp;&nbsp;&nbsp;&nbsp;<u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $checklistInfo->shipInfoCheck->pallet_size }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></p>
                        </td>
                        <td class="border-r-0 border-b-2">IF YES, IS IT AVAILABLE?</td>
                        <td class="border-l-0 border-r-0 border-b-2 font-bold"><input type="checkbox" disabled
                            @php
                                echo $checklistInfo->checkItemsCheck->judgement ? 'checked' : '';
                            @endphp>YES</td>
                        <td class="border-l-0 border-b-2 border-r-2 font-bold"><input type="checkbox" disabled
                            @php
                                echo $checklistInfo->checkItemsCheck->judgement ? '' : 'checked';
                            @endphp>NO</td>
                    </tr>
                </tbody>
            </table>

            <table>
                <thead>
                    <th colspan="13" class="text-left border-none w-fit">
                        5. Checking of Similarities
                    </th>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td rowspan="4" colspan="1" class="text-center font-bold border-t-2 border-l-2">
                            <p>QUANTITY FOR SHIPMENT</p>
                        </td>
                        <td class="border-t-2">PICK LIST</td>
                        <td colspan="5" class="border-t-2">{{ $checklistInfo->similaritiesCheck->pick_list_qs }}</td>
                        <td rowspan="4" colspan="1" class="text-center font-bold border-l-2 border-t-2">
                            <p>NO OF BOXES FOR SHIPMENT</p>
                        </td>
                        <td class="border-t-2">PICK LIST</td>
                        <td colspan="5" class="border-t-2 border-r-2">{{ $checklistInfo->similaritiesCheck->picklist_bs }}</td>
                    </tr>
                    <tr class="text-center">
                        <td>SHIPPING INVOICE</td>
                        <td colspan="5">{{ $checklistInfo->similaritiesCheck->shipping_invoice_qs }}</td>
                        <td>PACKING SLIP</td>
                        <td colspan="5" class="border-r-2">{{ $checklistInfo->similaritiesCheck->packing_slip_bs }}</td>
                    </tr>
                    <tr class="text-center">
                        <td>SEREM</td>
                        <td colspan="5">{{ $checklistInfo->similaritiesCheck->serem_qs }}</td>
                        <td>SEREM</td>
                        <td colspan="5" class="border-r-2">
                            @php
                                if(!$checklistInfo->similaritiesCheck->serem_bs){
                                    echo "N/A";
                                }
                            @endphp
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td>SIR</td>
                        <td colspan="5">
                            @php
                                if(!$checklistInfo->sir_qs){
                                    echo "N/A";
                                }else{
                                    echo $checklistInfo->similaritiesCheck->sir_qs;
                                }
                            @endphp
                        </td>
                        <td>PALLET LABEL</td>
                        <td colspan="5" class="border-r-2">{{ $checklistInfo->similaritiesCheck->pallet_label_bs }}</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="border-r-0 border-b-2 border-l-2"><p class="font-bold">Are all Quantity for shipment the same?</p></td>
                        <td class="border-l-0 border-r-0 border-b-2 font-bold">YES<input type="checkbox" disabled
                            @php
                                echo $checklistInfo->similaritiesCheck->same_quantity_qs ? 'checked' : '';
                            @endphp></td>
                        <td class="border-l-0 border-r-0 border-b-2 font-bold">NO<input type="checkbox" disabled
                            @php
                                echo $checklistInfo->similaritiesCheck->same_quantity_qs ? '' : 'checked';
                            @endphp></td>
                        <td class="border-l-0 border-r-0 border-b-2 text-right">Judgement:</td>
                        <td class="border-l-0 border-r-0 border-b-2 font-bold">OK<input type="checkbox" disabled
                            @php
                                echo $checklistInfo->similaritiesCheck->judgement_qs ? 'checked' : '';
                            @endphp></td>
                        <td class="border-l-0 border-r-2 border-b-2 font-bold">NG<input type="checkbox" disabled
                            @php
                                echo $checklistInfo->similaritiesCheck->judgement_qs ? '' : 'checked';
                            @endphp></td>
                        <td colspan="2" class="font-bold border-r-0 border-b-2 border-l-2">Are all no. of boxes for shipment the same?</td>
                        <td class="border-l-0 border-r-0 border-b-2 font-bold">YES<input type="checkbox" disabled
                            @php
                                echo $checklistInfo->similaritiesCheck->same_box_bs ? 'checked' : '';
                            @endphp></td>
                        <td class="border-l-0 border-r-0 border-b-2 font-bold">NO<input type="checkbox" disabled
                            @php
                                echo $checklistInfo->similaritiesCheck->same_box_bs ? '' : 'checked';
                            @endphp></td>
                        <td class="border-l-0 border-r-0 border-b-2 text-right">Judgement:</td>
                        <td class="border-l-0 border-r-0 border-b-2 font-bold">OK<input type="checkbox" disabled
                            @php
                                echo $checklistInfo->similaritiesCheck->judgement_bs ? 'checked' : '';
                            @endphp></td>
                        <td class="border-l-0 border-r-2 border-b-2 font-bold">NG<input type="checkbox" disabled
                            @php
                                echo $checklistInfo->similaritiesCheck->judgement_bs ? '' : 'checked';
                            @endphp></td>
                    </tr>
                    <tr>
                        <td rowspan="4" class="font-bold border-l-2 border-b-2 text-center">
                            MODEL NAME
                        </td>
                        <td class="text-center">PICK LIST</td>
                        <td colspan="5" class="text-center">{{ $checklistInfo->similaritiesCheck->picklist_mn }}</td>
                        <td colspan="2" class="text-center border-l-1">VMI LABEL(MIN,MOR & MIS MODELS ONLY)/QR CODE LABEL</td>
                        <td colspan="5" class="border-r-2 text-center">
                            @php
                                if(!$checklistInfo->vmi_mn){
                                    echo "N/A";
                                }else{
                                    echo $checklistInfo->similaritiesCheck->vmi_qr_mn;
                                }
                            @endphp
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">SHIPPING INVOICE</td>
                        <td colspan="5" class="text-center">{{ $checklistInfo->similaritiesCheck->shipping_invoice_mn }}</td>
                        <td colspan="2" class="text-center border-l-1">BOX BARCODE LABEL</td>
                        <td colspan="5" class="border-r-2 text-center">{{ $checklistInfo->similaritiesCheck->fg_label_mn }}</td>
                    </tr>
                    <tr>
                        <td class="text-center">SEREM</td>
                        <td colspan="5" class="text-center">{{ $checklistInfo->similaritiesCheck->serem_mn }}</td>
                        <td colspan="2" class="text-center border-l-1">PALLET LABEL</td>
                        <td colspan="5" class="border-r-2 text-center">{{ $checklistInfo->similaritiesCheck->pallet_label_mn }}</td>
                    </tr>
                    <tr>
                        <td class="text-center border-b-2">PACKAGE BARCODE LABEL</td>
                        <td colspan="5" class="border-b-2 text-center">{{ $checklistInfo->similaritiesCheck->mc_label_mn }}</td>
                        <td colspan="2" class="font-bold border-r-0 border-b-2 border-l-1">Are all model name the same?</td>
                        <td class="border-l-0 border-r-0 border-b-2 font-bold">YES<input type="checkbox" disabled
                            @php
                                echo $checklistInfo->similaritiesCheck->same_model_mn ? 'checked' : '';
                            @endphp></td>
                        <td class="border-l-0 border-r-0 border-b-2 font-bold">NO<input type="checkbox" disabled
                            @php
                                echo $checklistInfo->similaritiesCheck->same_model_mn ? '' : 'checked';
                            @endphp></td>
                        <td class="border-l-0 border-r-0 border-b-2 text-right">Judgement:</td>
                        <td class="border-l-0 border-r-0 border-b-2 font-bold">OK<input type="checkbox" disabled
                            @php
                                echo $checklistInfo->similaritiesCheck->judgement_mn ? 'checked' : '';
                            @endphp></td>
                        <td class="border-l-0 border-r-2 border-b-2 font-bold">NG<input type="checkbox" disabled
                            @php
                                echo $checklistInfo->similaritiesCheck->judgement_mn ? '' : 'checked';
                            @endphp></td>
                    </tr>
                    <tr>
                        <td rowspan="5" class="font-bold border-l-2 border-b-2 text-center">
                            MODEL CODE
                        </td>
                        <td class="text-center">PICK LIST</td>
                        <td colspan="5" class="text-center">{{ $checklistInfo->similaritiesCheck->picklist_mc }}</td>
                        <td colspan="2" class="text-center border-l-1">VMI LABEL(MIN,MOR & MIS MODELS ONLY)</td>
                        <td colspan="5" class="border-r-2 text-center">
                            @php
                                if(!$checklistInfo->vmi_mc){
                                    echo "N/A";
                                }else{
                                    echo $checklistInfo->similaritiesCheck->vmi_label_mc;
                                }
                            @endphp
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">PACKAGE BARCODE LABEL</td>
                        <td colspan="5" class="text-center">{{ $checklistInfo->similaritiesCheck->package_mc }}</td>
                        <td colspan="2" class="text-center border-l-1">BOX BARCODE LABEL</td>
                        <td colspan="5" class="border-r-2 text-center">{{ $checklistInfo->similaritiesCheck->mc_barcode_mc }}</td>
                    </tr>
                    <tr>
                        <td class="text-center">SEREM</td>
                        <td colspan="5" class="text-center">{{ $checklistInfo->similaritiesCheck->serem_mc }}</td>
                        <td colspan="2" class="text-center border-l-1">PALLET LABEL</td>
                        <td colspan="5" class="border-r-2 text-center">{{ $checklistInfo->similaritiesCheck->pallet_label_mc }}</td>
                    </tr>
                    <tr>
                        <td class="text-center">SPECIFIC INSPECTION REPORT(SIR)</td>
                        <td colspan="5" class="text-center">
                            @php
                                if(!$checklistInfo->sir_mc){
                                    echo "N/A";
                                }else{
                                    echo $checklistInfo->similaritiesCheck->sir_mc;
                                }
                            @endphp
                        </td>
                        <td colspan="2" class="text-center border-l-1">SPECIFIC LABEL/QR CODE LABEL</td>
                        <td colspan="5" class="border-r-2 text-center">
                            @php
                                if(!$checklistInfo->specific_label_mc){
                                    echo "N/A";
                                }else{
                                    echo $checklistInfo->similaritiesCheck->specific_qr_label_mc;
                                }
                            @endphp
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center border-b-2">SHIPPING LABEL(OTHER MODEL)</td>
                        <td colspan="5" class="border-b-2 text-center">{{ $checklistInfo->similaritiesCheck->shipping_label_mc }}</td>
                        <td colspan="2" class="font-bold border-r-0 border-b-2 border-l-1">Are all model code the same?</td>
                        <td class="border-l-0 border-r-0 border-b-2 font-bold">YES<input type="checkbox" disabled
                            @php
                                echo $checklistInfo->similaritiesCheck->same_mc ? 'checked' : '';
                            @endphp></td>
                        <td class="border-l-0 border-r-0 border-b-2 font-bold">NO<input type="checkbox" disabled
                            @php
                                echo $checklistInfo->similaritiesCheck->same_mc ? '' : 'checked';
                            @endphp></td>
                        <td class="border-l-0 border-r-0 border-b-2 text-right">Judgement:</td>
                        <td class="border-l-0 border-r-0 border-b-2 font-bold">OK<input type="checkbox" disabled
                            @php
                                echo $checklistInfo->similaritiesCheck->judgement_mc ? 'checked' : '';
                            @endphp></td>
                        <td class="border-l-0 border-r-2 border-b-2 font-bold">NG<input type="checkbox" disabled
                            @php
                                echo $checklistInfo->similaritiesCheck->judgement_mc ? '' : 'checked';
                            @endphp></td>
                    </tr>
                    <tr>
                        <td rowspan="6" class="font-bold border-l-2 border-b-2 text-center">
                            PART NUMBER
                        </td>
                        <td class="text-center">PICKLIST</td>
                        <td colspan="5" class="text-center">
                            @php
                                if(!$checklistInfo->similaritiesCheck->picklist_pn){
                                    echo "N/A";
                                }
                            @endphp
                        </td>
                        <td colspan="2" class="text-center border-l-1">SPECIFIC LABEL/QR CODE LABEL(PROVIDED BY QA)</td>
                        <td colspan="5" class="border-r-2 text-center">
                            @php
                                if(!$checklistInfo->qr_qa_pn){
                                    echo "N/A";
                                }else{
                                    echo $checklistInfo->similaritiesCheck->qr_qa_pn;
                                }
                            @endphp</td>
                    </tr>
                    <tr>
                        <td class="text-center">PACKAGE BARCODE LABEL</td>
                        <td colspan="5" class="text-center">{{ $checklistInfo->similaritiesCheck->package_pn }}</td>
                        <td colspan="2" class="text-center border-l-1">SPECIFIC LABEL/QR CODE LABEL(PROVIDED BY MGTZ)</td>
                        <td colspan="5" class="border-r-2 text-center">
                            @php
                                if(!$checklistInfo->qr_mgtz_pn){
                                    echo "N/A";
                                }else{
                                    echo $checklistInfo->similaritiesCheck->qr_mgtz_pn;
                                }
                            @endphp
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">SEREM</td>
                        <td colspan="5" class="text-center">{{ $checklistInfo->similaritiesCheck->serem_pn }}</td>
                        <td colspan="2" class="text-center border-l-1">SPECIFIC LABEL/QR CODE LABEL(PROVIDED BY MC)</td>
                        <td colspan="5" class="border-r-2 text-center">
                            @php
                                if(!$checklistInfo->qr_mc_pn){
                                    echo "N/A";
                                }else{
                                    echo $checklistInfo->similaritiesCheck->qr_mc_pn;
                                }
                            @endphp
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">SPECIFIC INSPECTION REPORT(SIR)</td>
                        <td colspan="5" class="text-center">
                            @php
                                if(!$checklistInfo->sir_pn){
                                    echo "N/A";
                                }else{
                                    echo $checklistInfo->similaritiesCheck->sir_pn;
                                }
                            @endphp</td>
                        <td colspan="2" class="text-center border-l-1">PALLET LABEL</td>
                        <td colspan="5" class="border-r-2 text-center">{{ $checklistInfo->similaritiesCheck->pallet_label_pn }}</td>
                    </tr>
                    <tr>
                        <td class="text-center">SHIPPING LABEL (OTHER MODEL)</td>
                        <td colspan="5" class="text-center">{{ $checklistInfo->similaritiesCheck->shipping_label_pn }}</td>
                        <td colspan="2" class="text-center border-l-1">SCI LABEL (SIAM COMPRESSOR INDUSTRY CO.,LTD)</td>
                        <td colspan="5" class="border-r-2 text-center">
                            @php
                                if(!$checklistInfo->sci_label_pn){
                                    echo "N/A";
                                }else{
                                    echo $checklistInfo->similaritiesCheck->sci_label_pn;
                                }
                            @endphp
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center border-b-2">VMI LABEL (MIN,MOR,MIS MODELS ONLY)</td>
                        <td colspan="5" class="border-b-2 text-center">
                            @php
                                if(!$checklistInfo->vmi_pn){
                                    echo "N/A";
                                }else{
                                    echo $checklistInfo->similaritiesCheck->vmi_pn;
                                }
                            @endphp</td>
                        <td colspan="2" class="font-bold border-r-0 border-b-2 border-l-1">Are all part number the same?</td>
                        <td class="border-l-0 border-r-0 border-b-2 font-bold">YES<input type="checkbox" disabled
                            @php
                                echo $checklistInfo->similaritiesCheck->same_pn ? 'checked' : '';
                            @endphp></td>
                        <td class="border-l-0 border-r-0 border-b-2 font-bold">NO<input type="checkbox" disabled
                            @php
                                echo $checklistInfo->similaritiesCheck->same_pn ? '' : 'checked';
                            @endphp></td>
                        <td class="border-l-0 border-r-0 border-b-2 text-right">Judgement:</td>
                        <td class="border-l-0 border-r-0 border-b-2 font-bold">OK<input type="checkbox" disabled
                            @php
                                echo $checklistInfo->similaritiesCheck->judgement_pn ? 'checked' : '';
                            @endphp></td>
                        <td class="border-l-0 border-r-2 border-b-2 font-bold">NG<input type="checkbox" disabled
                            @php
                                echo $checklistInfo->similaritiesCheck->judgement_pn ? '' : 'checked';
                            @endphp></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="a4-landscape">
        <div style="display: flex; justify-content: space-between; align-items: start;" class="mb-1">
            <div style="display: flex; align-items: center; gap: 10px;">
                <div>
                    <img src="{{ asset('photo/smp_logo2.png') }}" alt="smp_logo" style="height: 1.5rem">
                    <div style="font-size: 8px;">Shinetsu Magnetics Phils. Inc.</div>
                </div>
            </div>
            <div style="text-align: left; font-size: 9px;">
                <div>SD-QA-0452</div>
                {{-- <div>Rev No. 23</div> --}}
                <div>Effectivity date: October 10, 2025</div>
            </div>
        </div>
        <div>
            <table>
                <thead>
                    <th colspan="13" class="text-left border-none w-fit">
                        5. Checking of Similarities
                    </th>
                </thead>
                <tbody>
                    <tr>
                        <td class="border-t-2 border-l-2 border-b-2 text-center font-bold" rowspan="14" colspan="6" style="font-size: 7px">
                            PO NUMBER
                        </td>
                        <td class="text-center font-bold border-t-2 border-b-2" rowspan="2" colspan="" style="font-size: 7px">
                            SEREM
                        </td>
                        <td class="border-t-2" style="font-size: 7px">
                            Customer PO
                        </td>
                        <td class="border-t-2 text-center" style="font-size: 7px">
                            <p class="w-96">
                                {{ $checklistInfo->similaritiesCheck->serem_customer_po }}
                            </p>
                        </td>
                        <td class="border-r-2 border-t-2 border-b-0" style="font-size: 7px">

                        </td>
                    </tr>
                    <tr>
                        <td class="border-b-2" style="font-size: 7px">Our PO</td>
                        <td class="border-b-2 text-center" style="font-size: 7px">
                            <p class="w-96">
                            {{ $checklistInfo->similaritiesCheck->serem_smp_po }}
                            </p>
                        </td>
                        <td class="border-r-2 border-t-0 border-b-0" style="font-size: 7px">

                        </td>
                    </tr>
                    <tr>
                        <td class="text-center font-bold border-b-2" rowspan="2" style="font-size: 7px">
                            SHIPPING LABEL (OTHER MODEL)
                        </td>
                        <td style="font-size: 7px">
                            Customer PO
                        </td>
                        <td class="text-center" style="font-size: 7px">
                            <p class="w-96">
                            {{ $checklistInfo->similaritiesCheck->shipping_label_customer_po }}
                            </p>
                        </td>
                        <td class="border-r-2 border-t-0 border-b-0" style="font-size: 7px">

                        </td>
                    </tr>
                    <tr>
                        <td class="border-b-2" style="font-size: 7px">Our PO</td>
                        <td class="border-b-2 text-center" style="font-size: 7px">
                            <p class="w-96">
                            {{ $checklistInfo->similaritiesCheck->shipping_label_smp_po }}
                            </p>
                        </td>
                        <td class="border-r-2 border-t-0 border-b-0" style="font-size: 7px">

                        </td>
                    </tr>
                    <tr>
                        <td class="text-center font-bold border-b-2" rowspan="2" style="font-size: 7px">
                            VMI LABEL (MIN,MOR,MIS MODELS ONLY)
                        </td>
                        <td style="font-size: 7px">
                            Customer PO
                        </td>
                        <td style="font-size: 7px" class="text-center">
                            <p class="w-96">
                                @php
                                    if($checklistInfo->vmi_po){
                                        echo $checklistInfo->similaritiesCheck->vmi_customer_po;
                                    }else{
                                        echo "N/A";
                                    }
                                @endphp
                            </p>
                        </td>
                        <td class="border-r-2 text-center border-t-0 border-b-0 font-bold" style="font-size: 7px">
                            Are all PO Number the same?
                        </td>
                    </tr>
                    <tr>
                        <td class="border-b-2" style="font-size: 7px">Our PO</td>
                        <td class="border-b-2 text-center" style="font-size: 7px">
                            <p class="w-96">
                                @php
                                    if($checklistInfo->vmi_po){
                                        echo $checklistInfo->similaritiesCheck->vmi_smp_po;
                                    }else{
                                        echo "N/A";
                                    }
                                @endphp
                            </p>
                        </td>
                        <td class="border-r-2 text-center border-t-0 border-b-0 font-bold" style="font-size: 7px">
                            YES<input type="checkbox" disabled
                            @php
                                echo $checklistInfo->similaritiesCheck->same_po ? 'checked' : '';
                            @endphp>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NO<input type="checkbox" disabled
                            @php
                                echo $checklistInfo->similaritiesCheck->same_po ? '' : 'checked';
                            @endphp>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center font-bold border-b-2" rowspan="2" style="font-size: 7px">
                            SPECIFIC INSPECTION REPORT (SIR)
                        </td>
                        <td style="font-size: 7px">
                            Customer PO
                        </td>
                        <td class="text-center" style="font-size: 7px">
                            <p class="w-96">
                            @php
                                if($checklistInfo->sir_po){
                                    echo $checklistInfo->similaritiesCheck->sir_customer_po;
                                }else{
                                    echo "N/A";
                                }
                            @endphp
                            </p>
                        </td>
                        <td class="border-r-2 text-center border-t-0 border-b-0 font-bold" style="font-size: 7px">
                            Judgement:
                        </td>
                    </tr>
                    <tr>
                        <td class="border-b-2" style="font-size: 7px">Our PO</td>
                        <td class="border-b-2 text-center" style="font-size: 7px">
                            <p class="w-96">
                            @php
                                if($checklistInfo->sir_po){
                                    echo $checklistInfo->similaritiesCheck->sir_smp_po;
                                }else{
                                    echo "N/A";
                                }
                            @endphp
                            </p>
                        </td>
                        <td class="border-r-2 text-center border-t-0 border-b-0 font-bold" style="font-size: 7px">
                            OK<input type="checkbox" disabled
                            @php
                                echo $checklistInfo->similaritiesCheck->judgement_po ? 'checked' : '';
                            @endphp>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NG<input type="checkbox" disabled
                            @php
                                echo $checklistInfo->similaritiesCheck->judgement_po ? '' : 'checked';
                            @endphp>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center font-bold border-b-2" rowspan="2" style="font-size: 7px">
                            SPECIFIC LABEL / QR CODE LABEL
                        </td>
                        <td style="font-size: 7px">
                            Customer PO
                        </td>
                        <td class="text-center" style="font-size: 7px">
                            <p class="w-96">
                            @php
                                if($checklistInfo->specific_label_po){
                                    echo $checklistInfo->similaritiesCheck->specific_label_customer_po;
                                }else{
                                    echo "N/A";
                                }
                            @endphp
                            </p>
                        </td>
                        <td class="border-r-2 border-t-0 border-b-0" style="font-size: 7px">

                        </td>
                    </tr>
                    <tr>
                        <td class="border-b-2" style="font-size: 7px">Our PO</td>
                        <td class="border-b-2 text-center" style="font-size: 7px">
                            <p class="w-96">
                            @php
                                if($checklistInfo->specific_label_po){
                                    echo $checklistInfo->similaritiesCheck->specific_label_smp_po;
                                }else{
                                    echo "N/A";
                                }
                            @endphp
                            </p>
                        </td>
                        <td class="border-r-2 border-t-0 border-b-0" style="font-size: 7px">

                        </td>
                    </tr>
                    <tr>
                        <td class="text-center font-bold border-b-2" rowspan="2" style="font-size: 7px">
                            SCI LABEL
                        </td>
                        <td style="font-size: 7px">
                            Customer PO
                        </td>
                        <td class="text-center" style="font-size: 7px">
                            <p class="w-96">
                            @php
                                if($checklistInfo->sci_label_po){
                                    echo $checklistInfo->similaritiesCheck->sci_label_customer_po;
                                }else{
                                    echo "N/A";
                                }
                            @endphp
                            </p>
                        </td>
                        <td class="border-r-2 border-t-0 border-b-0" style="font-size: 7px">

                        </td>
                    </tr>
                    <tr>
                        <td class="border-b-2" style="font-size: 7px">Our PO</td>
                        <td class="border-b-2 text-center" style="font-size: 7px">
                            <p class="w-96">
                            @php
                                if($checklistInfo->sci_label_po){
                                    echo $checklistInfo->similaritiesCheck->sci_label_smp_po;
                                }else{
                                    echo "N/A";
                                }
                            @endphp
                            </p>
                        </td>
                        <td class="border-b-0 border-r-2 border-t-0" style="font-size: 7px">

                        </td>
                    </tr>
                    <tr>
                        <td class="text-center font-bold border-b-2" rowspan="2" style="font-size: 7px">
                            PALLET LABEL
                        </td>
                        <td style="font-size: 7px">
                            Customer PO
                        </td>
                        <td class="text-center" style="font-size: 7px">
                            <p class="w-96">
                            {{ $checklistInfo->similaritiesCheck->pallet_label_customer_po }}
                            </p>
                        </td>
                        <td class="border-r-2 border-t-0 border-b-0" style="font-size: 7px">

                        </td>
                    </tr>
                    <tr>
                        <td class="border-b-2" style="font-size: 7px">Our PO</td>
                        <td class="border-b-2 text-center" style="font-size: 7px">
                            <p class="w-96">
                            {{ $checklistInfo->similaritiesCheck->pallet_label_smp_po }}
                            </p>
                        </td>
                        <td class="border-b-2 border-r-2 border-t-0" style="font-size: 7px">

                        </td>
                    </tr>
                </tbody>
            </table>
            <table>
                <thead>
                    <th colspan="22" class="text-left border-none w-fit">
                        6. Checking of overall Box/Pallet condition (Internal / External)
                    </th>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="22" class="font-bold text-center border-2">
                            Check Items - Availability & Content
                        </td>
                    </tr>
                    <tr>
                        <td class="border-l-2 border-r-0"></td>
                        <td class="border-none"></td>
                        <td class="border-none"></td>
                        <td class="text-center font-bold border-l-2" colspan="9">
                            INTERNAL PACKAGING
                        </td>
                        <td class="text-center font-bold border-l-2 border-r-2" colspan="7">
                            EXTERNAL PACKAGING
                        </td>
                        <td class="border-none"></td>
                        <td class="border-none"></td>
                        <td class="border-r-2 border-l-0"></td>
                    </tr>
                    <tr>
                        <td class="text-center border-l-2" style="font-size: 6.5px">
                            OQA LOT NO. (LAST BOX) / PN OF OTHER BOX
                        </td>
                        <td class="text-center" style="font-size: 6.5px">
                            BOX NO.
                        </td>
                        <td class="text-center" style="font-size: 6.5px">
                            ACTUAL <BR>
                            PACK/STD. <BR>
                            PACK
                        </td>
                        <td class="text-center border-l-2" style="font-size: 6.5px">
                            PACKAGE<BR>
                            BARCODE <BR>
                            LABEL
                        </td>
                        <td class="text-center" style="font-size: 6.5px">
                            SPECIFIC <BR>
                            LABEL/ <BR>
                            VDA/ <BR>
                            DMC/<strong>QR <BR>
                            CODE LABEL</strong>
                        </td>
                        <td class="text-center" style="font-size: 6.5px">
                            CARTON<BR>
                            CONDITION
                        </td>
                        <td class="text-center" style="font-size: 6.5px">
                            MAGNET<BR>
                            PACKAGING<BR>
                            CONDITION
                        </td>
                        <td class="text-center" style="font-size: 6.5px">
                            MAGNET<BR>
                            CONDITION
                        </td>
                        <td class="text-center" style="font-size: 6.5px">
                            PRESENCE OF <BR>
                            DESSICANT
                        </td>
                        <td class="text-center" style="font-size: 6.5px">
                            PACKAGE <BR>
                            ORIENTATION
                        </td>
                        <td class="text-center" style="font-size: 6.5px">
                            SPACER USED <BR>
                            BASED ON <BR>
                            PACKING <BR>
                            SPECS / <BR>
                            OPI
                        </td>
                        <td class="text-center" style="font-size: 6.5px">
                            SPECIFIC <BR>
                            INSPECTION <BR>
                            REPORT <BR>
                            (SIR)
                        </td>
                        <td class="text-center border-l-2" style="font-size: 6.5px">
                            SEREM
                        </td>
                        <td class="text-center" style="font-size: 6.5px">
                            SHIPPING LABEL <BR>
                            (OTHER MODEL)
                        </td>
                        <td class="text-center" style="font-size: 6.5px">
                            VMI LABEL (MIN, <BR>
                            MOR & MIS MODEL <BR>
                            ONLY)
                        </td>
                        <td class="text-center" style="font-size: 6.5px">
                            BOX <BR>
                            BARCODE <BR>
                            LABEL
                        </td>
                        <td class="text-center" style="font-size: 6.5px">
                            DELIVERY <BR>
                            STATEMENT <BR>
                            SHEET <BR>
                            (TOF MODELS <BR>
                            ONLY)
                        </td>
                        <td class="text-center" style="font-size: 6.5px">
                            SPECIFIC<BR>
                            LABEL / <STRONG>QR <BR>
                            CODE LABEL</STRONG>
                        </td>
                        <td class="text-center border-r-2" style="font-size: 6.5px">
                            LEAKAGE <BR>
                            FLUX LABEL
                        </td>
                        <td class="text-center" style="font-size: 6.5px">
                            IDENTITY TAPE <BR>
                            USED
                        </td>
                        <td class="text-center" style="font-size: 6.5px">
                            PICKED LIST <BR>
                            (INDICATED FG BOX SERIAL NO.)
                        </td>
                        <td class="text-center border-r-2" style="font-size: 6.5px">
                            REMARKS( WRITE 'DOCS INSIDE' ON WHICH <BR>
                            BOX; WRITE 'SHIPPING DOCS COMPLETE' <BR>
                            IF ALL ARE AVAILABLE; SHIPPING INVOICE, <BR>
                            PACKING SLIP)
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td class="border-l-2" style="height: 14px;font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[0]->oqa) ? $checklistInfo->checkOverall->items[0]->oqa : '';
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[0]->box_no) ? $checklistInfo->checkOverall->items[0]->box_no : '';
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[0]->std_pack) ? $checklistInfo->checkOverall->items[0]->std_pack : '';
                            @endphp
                        </td>
                        <td class="border-l-2" style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[0]->internal_fg_label)){
                                    if($checklistInfo->checkOverall->items[0]->internal_fg_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }else{
                                    echo "";
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[0]->internal_specific_label)){
                                    if($checklistInfo->checkOverall->items[0]->internal_specific_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[0]->internal_carton_condition)){
                                    if($checklistInfo->checkOverall->items[0]->internal_carton_condition){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[0]->internal_magnet_pack )){
                                    if($checklistInfo->checkOverall->items[0]->internal_magnet_pack ){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[0]->internal_magnet_cond )){
                                    if($checklistInfo->checkOverall->items[0]->internal_magnet_cond ){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[0]->internal_dessicant)){
                                    if($checklistInfo->checkOverall->items[0]->internal_dessicant){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[0]->internal_pack_orientation)){
                                    if($checklistInfo->checkOverall->items[0]->internal_pack_orientation){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[0]->internal_spacer) ? $checklistInfo->checkOverall->items[0]->internal_spacer : '';
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[0]->internal_sir)){
                                    if($checklistInfo->checkOverall->items[0]->internal_sir){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td class="border-l-2" style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[0]->external_serem)){
                                    if($checklistInfo->checkOverall->items[0]->external_serem){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[0]->external_ship_label)){
                                    if($checklistInfo->checkOverall->items[0]->external_ship_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[0]->external_vmi_label)){
                                    if($checklistInfo->checkOverall->items[0]->external_vmi_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[0]->external_mc_label)){
                                    if($checklistInfo->checkOverall->items[0]->external_mc_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[0]->external_delivery_sheet)){
                                    if($checklistInfo->checkOverall->items[0]->external_delivery_sheet){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[0]->external_specific_label)){
                                    if($checklistInfo->checkOverall->items[0]->external_specific_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td class="border-r-2" style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[0]->external_flux_label)){
                                    if($checklistInfo->checkOverall->items[0]->external_flux_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[0]->identity_tape) ? $checklistInfo->checkOverall->items[0]->identity_tape : '';
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[0]->pick_list) ? $checklistInfo->checkOverall->items[0]->pick_list : '';
                            @endphp
                        </td>
                        <td class="border-r-2" style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[0]->remarks) ? $checklistInfo->checkOverall->items[0]->remarks : '';
                            @endphp
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td class="border-l-2" style="height: 14px;font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[1]->oqa) ? $checklistInfo->checkOverall->items[1]->oqa : '';
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[1]->box_no) ? $checklistInfo->checkOverall->items[1]->box_no : '';
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[1]->std_pack) ? $checklistInfo->checkOverall->items[1]->std_pack : '';
                            @endphp
                        </td>
                        <td class="border-l-2" style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[1]->internal_fg_label)){
                                    if($checklistInfo->checkOverall->items[1]->internal_fg_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[1]->internal_specific_label)){
                                    if($checklistInfo->checkOverall->items[1]->internal_specific_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[1]->internal_carton_condition)){
                                    if($checklistInfo->checkOverall->items[1]->internal_carton_condition){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[1]->internal_magnet_pack )){
                                    if($checklistInfo->checkOverall->items[1]->internal_magnet_pack ){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[1]->internal_magnet_cond )){
                                    if($checklistInfo->checkOverall->items[1]->internal_magnet_cond ){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[1]->internal_dessicant)){
                                    if($checklistInfo->checkOverall->items[1]->internal_dessicant){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[1]->internal_pack_orientation)){
                                    if($checklistInfo->checkOverall->items[1]->internal_pack_orientation){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[1]->internal_spacer) ? $checklistInfo->checkOverall->items[1]->internal_spacer : '';
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[1]->internal_sir)){
                                    if($checklistInfo->checkOverall->items[1]->internal_sir){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td class="border-l-2" style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[1]->external_serem)){
                                    if($checklistInfo->checkOverall->items[1]->external_serem){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[1]->external_ship_label)){
                                    if($checklistInfo->checkOverall->items[1]->external_ship_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[1]->external_vmi_label)){
                                    if($checklistInfo->checkOverall->items[1]->external_vmi_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[1]->external_mc_label)){
                                    if($checklistInfo->checkOverall->items[1]->external_mc_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[1]->external_delivery_sheet)){
                                    if($checklistInfo->checkOverall->items[1]->external_delivery_sheet){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[1]->external_specific_label)){
                                    if($checklistInfo->checkOverall->items[1]->external_specific_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td class="border-r-2" style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[1]->external_flux_label)){
                                    if($checklistInfo->checkOverall->items[1]->external_flux_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[1]->identity_tape) ? $checklistInfo->checkOverall->items[1]->identity_tape : '';
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[1]->pick_list) ? $checklistInfo->checkOverall->items[1]->pick_list : '';
                            @endphp
                        </td>
                        <td class="border-r-2" style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[1]->remarks) ? $checklistInfo->checkOverall->items[1]->remarks : '';
                            @endphp
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td class="border-l-2" style="height: 14px;font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[2]->oqa) ? $checklistInfo->checkOverall->items[2]->oqa : '';
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[2]->box_no) ? $checklistInfo->checkOverall->items[2]->box_no : '';
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[2]->std_pack) ? $checklistInfo->checkOverall->items[2]->std_pack : '';
                            @endphp
                        </td>
                        <td class="border-l-2" style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[2]->internal_fg_label)){
                                    if($checklistInfo->checkOverall->items[2]->internal_fg_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }else{
                                    echo "";
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[2]->internal_specific_label)){
                                    if($checklistInfo->checkOverall->items[2]->internal_specific_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[2]->internal_carton_condition)){
                                    if($checklistInfo->checkOverall->items[2]->internal_carton_condition){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[2]->internal_magnet_pack )){
                                    if($checklistInfo->checkOverall->items[2]->internal_magnet_pack ){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[2]->internal_magnet_cond )){
                                    if($checklistInfo->checkOverall->items[2]->internal_magnet_cond ){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[2]->internal_dessicant)){
                                    if($checklistInfo->checkOverall->items[2]->internal_dessicant){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[2]->internal_pack_orientation)){
                                    if($checklistInfo->checkOverall->items[2]->internal_pack_orientation){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[2]->internal_spacer) ? $checklistInfo->checkOverall->items[2]->internal_spacer : '';
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[2]->internal_sir)){
                                    if($checklistInfo->checkOverall->items[2]->internal_sir){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td class="border-l-2" style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[2]->external_serem)){
                                    if($checklistInfo->checkOverall->items[2]->external_serem){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[2]->external_ship_label)){
                                    if($checklistInfo->checkOverall->items[2]->external_ship_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[2]->external_vmi_label)){
                                    if($checklistInfo->checkOverall->items[2]->external_vmi_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[2]->external_mc_label)){
                                    if($checklistInfo->checkOverall->items[2]->external_mc_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[2]->external_delivery_sheet)){
                                    if($checklistInfo->checkOverall->items[2]->external_delivery_sheet){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[2]->external_specific_label)){
                                    if($checklistInfo->checkOverall->items[2]->external_specific_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td class="border-r-2" style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[2]->external_flux_label)){
                                    if($checklistInfo->checkOverall->items[2]->external_flux_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[2]->identity_tape) ? $checklistInfo->checkOverall->items[2]->identity_tape : '';
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[2]->pick_list) ? $checklistInfo->checkOverall->items[2]->pick_list : '';
                            @endphp
                        </td>
                        <td class="border-r-2" style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[2]->remarks) ? $checklistInfo->checkOverall->items[2]->remarks : '';
                            @endphp
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td class="border-l-2" style="height: 14px;font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[3]->oqa) ? $checklistInfo->checkOverall->items[3]->oqa : '';
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[3]->box_no) ? $checklistInfo->checkOverall->items[3]->box_no : '';
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[3]->std_pack) ? $checklistInfo->checkOverall->items[3]->std_pack : '';
                            @endphp
                        </td>
                        <td class="border-l-2" style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[3]->internal_fg_label)){
                                    if($checklistInfo->checkOverall->items[3]->internal_fg_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }else{
                                    echo "";
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[3]->internal_specific_label)){
                                    if($checklistInfo->checkOverall->items[3]->internal_specific_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[3]->internal_carton_condition)){
                                    if($checklistInfo->checkOverall->items[3]->internal_carton_condition){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[3]->internal_magnet_pack )){
                                    if($checklistInfo->checkOverall->items[3]->internal_magnet_pack ){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[3]->internal_magnet_cond )){
                                    if($checklistInfo->checkOverall->items[3]->internal_magnet_cond ){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[3]->internal_dessicant)){
                                    if($checklistInfo->checkOverall->items[3]->internal_dessicant){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[3]->internal_pack_orientation)){
                                    if($checklistInfo->checkOverall->items[3]->internal_pack_orientation){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[3]->internal_spacer) ? $checklistInfo->checkOverall->items[3]->internal_spacer : '';
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[3]->internal_sir)){
                                    if($checklistInfo->checkOverall->items[3]->internal_sir){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td class="border-l-2" style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[3]->external_serem)){
                                    if($checklistInfo->checkOverall->items[3]->external_serem){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[3]->external_ship_label)){
                                    if($checklistInfo->checkOverall->items[3]->external_ship_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[3]->external_vmi_label)){
                                    if($checklistInfo->checkOverall->items[3]->external_vmi_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[3]->external_mc_label)){
                                    if($checklistInfo->checkOverall->items[3]->external_mc_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[3]->external_delivery_sheet)){
                                    if($checklistInfo->checkOverall->items[3]->external_delivery_sheet){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[3]->external_specific_label)){
                                    if($checklistInfo->checkOverall->items[3]->external_specific_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td class="border-r-2" style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[3]->external_flux_label)){
                                    if($checklistInfo->checkOverall->items[3]->external_flux_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[3]->identity_tape) ? $checklistInfo->checkOverall->items[3]->identity_tape : '';
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[3]->pick_list) ? $checklistInfo->checkOverall->items[3]->pick_list : '';
                            @endphp
                        </td>
                        <td class="border-r-2" style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[3]->remarks) ? $checklistInfo->checkOverall->items[3]->remarks : '';
                            @endphp
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td class="border-l-2" style="height: 14px;font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[4]->oqa) ? $checklistInfo->checkOverall->items[4]->oqa : '';
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[4]->box_no) ? $checklistInfo->checkOverall->items[4]->box_no : '';
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[4]->std_pack) ? $checklistInfo->checkOverall->items[4]->std_pack : '';
                            @endphp
                        </td>
                        <td class="border-l-2" style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[4]->internal_fg_label)){
                                    if($checklistInfo->checkOverall->items[4]->internal_fg_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }else{
                                    echo "";
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[4]->internal_specific_label)){
                                    if($checklistInfo->checkOverall->items[4]->internal_specific_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[4]->internal_carton_condition)){
                                    if($checklistInfo->checkOverall->items[4]->internal_carton_condition){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[4]->internal_magnet_pack )){
                                    if($checklistInfo->checkOverall->items[4]->internal_magnet_pack ){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[4]->internal_magnet_cond )){
                                    if($checklistInfo->checkOverall->items[4]->internal_magnet_cond ){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[4]->internal_dessicant)){
                                    if($checklistInfo->checkOverall->items[4]->internal_dessicant){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[4]->internal_pack_orientation)){
                                    if($checklistInfo->checkOverall->items[4]->internal_pack_orientation){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[4]->internal_spacer) ? $checklistInfo->checkOverall->items[4]->internal_spacer : '';
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[4]->internal_sir)){
                                    if($checklistInfo->checkOverall->items[4]->internal_sir){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td class="border-l-2" style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[4]->external_serem)){
                                    if($checklistInfo->checkOverall->items[4]->external_serem){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[4]->external_ship_label)){
                                    if($checklistInfo->checkOverall->items[4]->external_ship_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[4]->external_vmi_label)){
                                    if($checklistInfo->checkOverall->items[4]->external_vmi_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[4]->external_mc_label)){
                                    if($checklistInfo->checkOverall->items[4]->external_mc_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[4]->external_delivery_sheet)){
                                    if($checklistInfo->checkOverall->items[4]->external_delivery_sheet){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[4]->external_specific_label)){
                                    if($checklistInfo->checkOverall->items[4]->external_specific_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td class="border-r-2" style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[4]->external_flux_label)){
                                    if($checklistInfo->checkOverall->items[4]->external_flux_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[4]->identity_tape) ? $checklistInfo->checkOverall->items[4]->identity_tape : '';
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[4]->pick_list) ? $checklistInfo->checkOverall->items[4]->pick_list : '';
                            @endphp
                        </td>
                        <td class="border-r-2" style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[4]->remarks) ? $checklistInfo->checkOverall->items[4]->remarks : '';
                            @endphp
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td class="border-l-2" style="height: 14px;font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[5]->oqa) ? $checklistInfo->checkOverall->items[5]->oqa : '';
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[5]->box_no) ? $checklistInfo->checkOverall->items[5]->box_no : '';
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[5]->std_pack) ? $checklistInfo->checkOverall->items[5]->std_pack : '';
                            @endphp
                        </td>
                        <td class="border-l-2" style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[5]->internal_fg_label)){
                                    if($checklistInfo->checkOverall->items[5]->internal_fg_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }else{
                                    echo "";
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[5]->internal_specific_label)){
                                    if($checklistInfo->checkOverall->items[5]->internal_specific_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[5]->internal_carton_condition)){
                                    if($checklistInfo->checkOverall->items[5]->internal_carton_condition){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[5]->internal_magnet_pack )){
                                    if($checklistInfo->checkOverall->items[5]->internal_magnet_pack ){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[5]->internal_magnet_cond )){
                                    if($checklistInfo->checkOverall->items[5]->internal_magnet_cond ){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[5]->internal_dessicant)){
                                    if($checklistInfo->checkOverall->items[5]->internal_dessicant){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[5]->internal_pack_orientation)){
                                    if($checklistInfo->checkOverall->items[5]->internal_pack_orientation){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[5]->internal_spacer) ? $checklistInfo->checkOverall->items[5]->internal_spacer : '';
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[5]->internal_sir)){
                                    if($checklistInfo->checkOverall->items[5]->internal_sir){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td class="border-l-2" style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[5]->external_serem)){
                                    if($checklistInfo->checkOverall->items[5]->external_serem){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[5]->external_ship_label)){
                                    if($checklistInfo->checkOverall->items[5]->external_ship_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[5]->external_vmi_label)){
                                    if($checklistInfo->checkOverall->items[5]->external_vmi_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[5]->external_mc_label)){
                                    if($checklistInfo->checkOverall->items[5]->external_mc_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[5]->external_delivery_sheet)){
                                    if($checklistInfo->checkOverall->items[5]->external_delivery_sheet){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[5]->external_specific_label)){
                                    if($checklistInfo->checkOverall->items[5]->external_specific_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td class="border-r-2" style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[5]->external_flux_label)){
                                    if($checklistInfo->checkOverall->items[5]->external_flux_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[5]->identity_tape) ? $checklistInfo->checkOverall->items[5]->identity_tape : '';
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[5]->pick_list) ? $checklistInfo->checkOverall->items[5]->pick_list : '';
                            @endphp
                        </td>
                        <td class="border-r-2" style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[5]->remarks) ? $checklistInfo->checkOverall->items[5]->remarks : '';
                            @endphp
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td class="border-l-2" style="height: 14px;font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[6]->oqa) ? $checklistInfo->checkOverall->items[6]->oqa : '';
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[6]->box_no) ? $checklistInfo->checkOverall->items[6]->box_no : '';
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[6]->std_pack) ? $checklistInfo->checkOverall->items[6]->std_pack : '';
                            @endphp
                        </td>
                        <td class="border-l-2" style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[6]->internal_fg_label)){
                                    if($checklistInfo->checkOverall->items[6]->internal_fg_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }else{
                                    echo "";
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[6]->internal_specific_label)){
                                    if($checklistInfo->checkOverall->items[6]->internal_specific_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[6]->internal_carton_condition)){
                                    if($checklistInfo->checkOverall->items[6]->internal_carton_condition){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[6]->internal_magnet_pack )){
                                    if($checklistInfo->checkOverall->items[6]->internal_magnet_pack ){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[6]->internal_magnet_cond )){
                                    if($checklistInfo->checkOverall->items[6]->internal_magnet_cond ){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[6]->internal_dessicant)){
                                    if($checklistInfo->checkOverall->items[6]->internal_dessicant){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[6]->internal_pack_orientation)){
                                    if($checklistInfo->checkOverall->items[6]->internal_pack_orientation){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[6]->internal_spacer) ? $checklistInfo->checkOverall->items[6]->internal_spacer : '';
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[6]->internal_sir)){
                                    if($checklistInfo->checkOverall->items[6]->internal_sir){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td class="border-l-2" style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[6]->external_serem)){
                                    if($checklistInfo->checkOverall->items[6]->external_serem){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[6]->external_ship_label)){
                                    if($checklistInfo->checkOverall->items[6]->external_ship_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[6]->external_vmi_label)){
                                    if($checklistInfo->checkOverall->items[6]->external_vmi_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[6]->external_mc_label)){
                                    if($checklistInfo->checkOverall->items[6]->external_mc_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[6]->external_delivery_sheet)){
                                    if($checklistInfo->checkOverall->items[6]->external_delivery_sheet){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[6]->external_specific_label)){
                                    if($checklistInfo->checkOverall->items[6]->external_specific_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td class="border-r-2" style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[6]->external_flux_label)){
                                    if($checklistInfo->checkOverall->items[6]->external_flux_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[6]->identity_tape) ? $checklistInfo->checkOverall->items[6]->identity_tape : '';
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[6]->pick_list) ? $checklistInfo->checkOverall->items[6]->pick_list : '';
                            @endphp
                        </td>
                        <td class="border-r-2" style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[6]->remarks) ? $checklistInfo->checkOverall->items[6]->remarks : '';
                            @endphp
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td class="border-l-2" style="height: 14px;font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[7]->oqa) ? $checklistInfo->checkOverall->items[7]->oqa : '';
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[7]->box_no) ? $checklistInfo->checkOverall->items[7]->box_no : '';
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[7]->std_pack) ? $checklistInfo->checkOverall->items[7]->std_pack : '';
                            @endphp
                        </td>
                        <td class="border-l-2" style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[7]->internal_fg_label)){
                                    if($checklistInfo->checkOverall->items[7]->internal_fg_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }else{
                                    echo "";
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[7]->internal_specific_label)){
                                    if($checklistInfo->checkOverall->items[7]->internal_specific_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[7]->internal_carton_condition)){
                                    if($checklistInfo->checkOverall->items[7]->internal_carton_condition){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[7]->internal_magnet_pack )){
                                    if($checklistInfo->checkOverall->items[7]->internal_magnet_pack ){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[7]->internal_magnet_cond )){
                                    if($checklistInfo->checkOverall->items[7]->internal_magnet_cond ){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[7]->internal_dessicant)){
                                    if($checklistInfo->checkOverall->items[7]->internal_dessicant){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[7]->internal_pack_orientation)){
                                    if($checklistInfo->checkOverall->items[7]->internal_pack_orientation){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[7]->internal_spacer) ? $checklistInfo->checkOverall->items[7]->internal_spacer : '';
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[7]->internal_sir)){
                                    if($checklistInfo->checkOverall->items[7]->internal_sir){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td class="border-l-2" style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[7]->external_serem)){
                                    if($checklistInfo->checkOverall->items[7]->external_serem){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[7]->external_ship_label)){
                                    if($checklistInfo->checkOverall->items[7]->external_ship_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[7]->external_vmi_label)){
                                    if($checklistInfo->checkOverall->items[7]->external_vmi_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[7]->external_mc_label)){
                                    if($checklistInfo->checkOverall->items[7]->external_mc_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[7]->external_delivery_sheet)){
                                    if($checklistInfo->checkOverall->items[7]->external_delivery_sheet){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[7]->external_specific_label)){
                                    if($checklistInfo->checkOverall->items[7]->external_specific_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td class="border-r-2" style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[7]->external_flux_label)){
                                    if($checklistInfo->checkOverall->items[7]->external_flux_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[7]->identity_tape) ? $checklistInfo->checkOverall->items[7]->identity_tape : '';
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[7]->pick_list) ? $checklistInfo->checkOverall->items[7]->pick_list : '';
                            @endphp
                        </td>
                        <td class="border-r-2" style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[7]->remarks) ? $checklistInfo->checkOverall->items[7]->remarks : '';
                            @endphp
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td class="border-l-2" style="height: 14px;font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[8]->oqa) ? $checklistInfo->checkOverall->items[8]->oqa : '';
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[8]->box_no) ? $checklistInfo->checkOverall->items[8]->box_no : '';
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[8]->std_pack) ? $checklistInfo->checkOverall->items[8]->std_pack : '';
                            @endphp
                        </td>
                        <td class="border-l-2" style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[8]->internal_fg_label)){
                                    if($checklistInfo->checkOverall->items[8]->internal_fg_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }else{
                                    echo "";
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[8]->internal_specific_label)){
                                    if($checklistInfo->checkOverall->items[8]->internal_specific_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[8]->internal_carton_condition)){
                                    if($checklistInfo->checkOverall->items[8]->internal_carton_condition){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[8]->internal_magnet_pack )){
                                    if($checklistInfo->checkOverall->items[8]->internal_magnet_pack ){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[8]->internal_magnet_cond )){
                                    if($checklistInfo->checkOverall->items[8]->internal_magnet_cond ){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[8]->internal_dessicant)){
                                    if($checklistInfo->checkOverall->items[8]->internal_dessicant){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[8]->internal_pack_orientation)){
                                    if($checklistInfo->checkOverall->items[8]->internal_pack_orientation){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[8]->internal_spacer) ? $checklistInfo->checkOverall->items[8]->internal_spacer : '';
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[8]->internal_sir)){
                                    if($checklistInfo->checkOverall->items[8]->internal_sir){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td class="border-l-2" style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[8]->external_serem)){
                                    if($checklistInfo->checkOverall->items[8]->external_serem){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[8]->external_ship_label)){
                                    if($checklistInfo->checkOverall->items[8]->external_ship_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[8]->external_vmi_label)){
                                    if($checklistInfo->checkOverall->items[8]->external_vmi_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[8]->external_mc_label)){
                                    if($checklistInfo->checkOverall->items[8]->external_mc_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[8]->external_delivery_sheet)){
                                    if($checklistInfo->checkOverall->items[8]->external_delivery_sheet){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[8]->external_specific_label)){
                                    if($checklistInfo->checkOverall->items[8]->external_specific_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td class="border-r-2" style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[8]->external_flux_label)){
                                    if($checklistInfo->checkOverall->items[8]->external_flux_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[8]->identity_tape) ? $checklistInfo->checkOverall->items[8]->identity_tape : '';
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[8]->pick_list) ? $checklistInfo->checkOverall->items[8]->pick_list : '';
                            @endphp
                        </td>
                        <td class="border-r-2" style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[8]->remarks) ? $checklistInfo->checkOverall->items[8]->remarks : '';
                            @endphp
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td class="border-l-2" style="height: 14px;font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[9]->oqa) ? $checklistInfo->checkOverall->items[9]->oqa : '';
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[9]->box_no) ? $checklistInfo->checkOverall->items[9]->box_no : '';
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[9]->std_pack) ? $checklistInfo->checkOverall->items[9]->std_pack : '';
                            @endphp
                        </td>
                        <td class="border-l-2" style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[9]->internal_fg_label)){
                                    if($checklistInfo->checkOverall->items[9]->internal_fg_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }else{
                                    echo "";
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[9]->internal_specific_label)){
                                    if($checklistInfo->checkOverall->items[9]->internal_specific_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[9]->internal_carton_condition)){
                                    if($checklistInfo->checkOverall->items[9]->internal_carton_condition){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[9]->internal_magnet_pack )){
                                    if($checklistInfo->checkOverall->items[9]->internal_magnet_pack ){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[9]->internal_magnet_cond )){
                                    if($checklistInfo->checkOverall->items[9]->internal_magnet_cond ){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[9]->internal_dessicant)){
                                    if($checklistInfo->checkOverall->items[9]->internal_dessicant){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[9]->internal_pack_orientation)){
                                    if($checklistInfo->checkOverall->items[9]->internal_pack_orientation){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[9]->internal_spacer) ? $checklistInfo->checkOverall->items[9]->internal_spacer : '';
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[9]->internal_sir)){
                                    if($checklistInfo->checkOverall->items[9]->internal_sir){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td class="border-l-2" style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[9]->external_serem)){
                                    if($checklistInfo->checkOverall->items[9]->external_serem){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[9]->external_ship_label)){
                                    if($checklistInfo->checkOverall->items[9]->external_ship_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[9]->external_vmi_label)){
                                    if($checklistInfo->checkOverall->items[9]->external_vmi_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[9]->external_mc_label)){
                                    if($checklistInfo->checkOverall->items[9]->external_mc_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[9]->external_delivery_sheet)){
                                    if($checklistInfo->checkOverall->items[9]->external_delivery_sheet){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[9]->external_specific_label)){
                                    if($checklistInfo->checkOverall->items[9]->external_specific_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td class="border-r-2" style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[9]->external_flux_label)){
                                    if($checklistInfo->checkOverall->items[9]->external_flux_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[9]->identity_tape) ? $checklistInfo->checkOverall->items[9]->identity_tape : '';
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[9]->pick_list) ? $checklistInfo->checkOverall->items[9]->pick_list : '';
                            @endphp
                        </td>
                        <td class="border-r-2" style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[9]->remarks) ? $checklistInfo->checkOverall->items[9]->remarks : '';
                            @endphp
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td class="border-l-2" style="height: 14px;font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[10]->oqa) ? $checklistInfo->checkOverall->items[10]->oqa : '';
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[10]->box_no) ? $checklistInfo->checkOverall->items[10]->box_no : '';
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[10]->std_pack) ? $checklistInfo->checkOverall->items[10]->std_pack : '';
                            @endphp
                        </td>
                        <td class="border-l-2" style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[10]->internal_fg_label)){
                                    if($checklistInfo->checkOverall->items[10]->internal_fg_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }else{
                                    echo "";
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[10]->internal_specific_label)){
                                    if($checklistInfo->checkOverall->items[10]->internal_specific_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[10]->internal_carton_condition)){
                                    if($checklistInfo->checkOverall->items[10]->internal_carton_condition){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[10]->internal_magnet_pack )){
                                    if($checklistInfo->checkOverall->items[10]->internal_magnet_pack ){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[10]->internal_magnet_cond )){
                                    if($checklistInfo->checkOverall->items[10]->internal_magnet_cond ){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[10]->internal_dessicant)){
                                    if($checklistInfo->checkOverall->items[10]->internal_dessicant){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[10]->internal_pack_orientation)){
                                    if($checklistInfo->checkOverall->items[10]->internal_pack_orientation){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[10]->internal_spacer) ? $checklistInfo->checkOverall->items[10]->internal_spacer : '';
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[10]->internal_sir)){
                                    if($checklistInfo->checkOverall->items[10]->internal_sir){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td class="border-l-2" style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[10]->external_serem)){
                                    if($checklistInfo->checkOverall->items[10]->external_serem){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[10]->external_ship_label)){
                                    if($checklistInfo->checkOverall->items[10]->external_ship_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[10]->external_vmi_label)){
                                    if($checklistInfo->checkOverall->items[10]->external_vmi_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[10]->external_mc_label)){
                                    if($checklistInfo->checkOverall->items[10]->external_mc_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[10]->external_delivery_sheet)){
                                    if($checklistInfo->checkOverall->items[10]->external_delivery_sheet){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[10]->external_specific_label)){
                                    if($checklistInfo->checkOverall->items[10]->external_specific_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td class="border-r-2" style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[10]->external_flux_label)){
                                    if($checklistInfo->checkOverall->items[10]->external_flux_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[10]->identity_tape) ? $checklistInfo->checkOverall->items[10]->identity_tape : '';
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[10]->pick_list) ? $checklistInfo->checkOverall->items[10]->pick_list : '';
                            @endphp
                        </td>
                        <td class="border-r-2" style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[10]->remarks) ? $checklistInfo->checkOverall->items[10]->remarks : '';
                            @endphp
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td class="border-l-2" style="height: 14px;font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[11]->oqa) ? $checklistInfo->checkOverall->items[11]->oqa : '';
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[11]->box_no) ? $checklistInfo->checkOverall->items[11]->box_no : '';
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[11]->std_pack) ? $checklistInfo->checkOverall->items[11]->std_pack : '';
                            @endphp
                        </td>
                        <td class="border-l-2" style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[11]->internal_fg_label)){
                                    if($checklistInfo->checkOverall->items[11]->internal_fg_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }else{
                                    echo "";
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[11]->internal_specific_label)){
                                    if($checklistInfo->checkOverall->items[11]->internal_specific_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[11]->internal_carton_condition)){
                                    if($checklistInfo->checkOverall->items[11]->internal_carton_condition){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[11]->internal_magnet_pack )){
                                    if($checklistInfo->checkOverall->items[11]->internal_magnet_pack ){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[11]->internal_magnet_cond )){
                                    if($checklistInfo->checkOverall->items[11]->internal_magnet_cond ){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[11]->internal_dessicant)){
                                    if($checklistInfo->checkOverall->items[11]->internal_dessicant){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[11]->internal_pack_orientation)){
                                    if($checklistInfo->checkOverall->items[11]->internal_pack_orientation){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[11]->internal_spacer) ? $checklistInfo->checkOverall->items[11]->internal_spacer : '';
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[11]->internal_sir)){
                                    if($checklistInfo->checkOverall->items[11]->internal_sir){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td class="border-l-2" style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[11]->external_serem)){
                                    if($checklistInfo->checkOverall->items[11]->external_serem){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[11]->external_ship_label)){
                                    if($checklistInfo->checkOverall->items[11]->external_ship_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[11]->external_vmi_label)){
                                    if($checklistInfo->checkOverall->items[11]->external_vmi_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[11]->external_mc_label)){
                                    if($checklistInfo->checkOverall->items[11]->external_mc_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[11]->external_delivery_sheet)){
                                    if($checklistInfo->checkOverall->items[11]->external_delivery_sheet){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[11]->external_specific_label)){
                                    if($checklistInfo->checkOverall->items[11]->external_specific_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td class="border-r-2" style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[11]->external_flux_label)){
                                    if($checklistInfo->checkOverall->items[11]->external_flux_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[11]->identity_tape) ? $checklistInfo->checkOverall->items[11]->identity_tape : '';
                            @endphp
                        </td>
                        <td style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[11]->pick_list) ? $checklistInfo->checkOverall->items[11]->pick_list : '';
                            @endphp
                        </td>
                        <td class="border-r-2" style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[11]->remarks) ? $checklistInfo->checkOverall->items[11]->remarks : '';
                            @endphp
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td class="border-l-2 border-b-2" style="height: 14px;font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[12]->oqa) ? $checklistInfo->checkOverall->items[12]->oqa : '';
                            @endphp
                        </td>
                        <td style="font-size: 6.5px" class="border-b-2">
                            @php
                                echo isset($checklistInfo->checkOverall->items[12]->box_no) ? $checklistInfo->checkOverall->items[12]->box_no : '';
                            @endphp
                        </td>
                        <td style="font-size: 6.5px" class="border-b-2">
                            @php
                                echo isset($checklistInfo->checkOverall->items[12]->std_pack) ? $checklistInfo->checkOverall->items[12]->std_pack : '';
                            @endphp
                        </td>
                        <td class="border-l-2 border-b-2" style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[12]->internal_fg_label)){
                                    if($checklistInfo->checkOverall->items[12]->internal_fg_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }else{
                                    echo "";
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px" class="border-b-2">
                            @php
                                if(isset($checklistInfo->checkOverall->items[12]->internal_specific_label)){
                                    if($checklistInfo->checkOverall->items[12]->internal_specific_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px" class="border-b-2">
                            @php
                                if(isset($checklistInfo->checkOverall->items[12]->internal_carton_condition)){
                                    if($checklistInfo->checkOverall->items[12]->internal_carton_condition){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px" class="border-b-2">
                            @php
                                if(isset($checklistInfo->checkOverall->items[12]->internal_magnet_pack )){
                                    if($checklistInfo->checkOverall->items[12]->internal_magnet_pack ){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px" class="border-b-2">
                            @php
                                if(isset($checklistInfo->checkOverall->items[12]->internal_magnet_cond )){
                                    if($checklistInfo->checkOverall->items[12]->internal_magnet_cond ){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px" class="border-b-2">
                            @php
                                if(isset($checklistInfo->checkOverall->items[12]->internal_dessicant)){
                                    if($checklistInfo->checkOverall->items[12]->internal_dessicant){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px" class="border-b-2">
                            @php
                                if(isset($checklistInfo->checkOverall->items[12]->internal_pack_orientation)){
                                    if($checklistInfo->checkOverall->items[12]->internal_pack_orientation){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px" class="border-b-2">
                            @php
                                echo isset($checklistInfo->checkOverall->items[12]->internal_spacer) ? $checklistInfo->checkOverall->items[12]->internal_spacer : '';
                            @endphp
                        </td>
                        <td style="font-size: 6.5px" class="border-b-2">
                            @php
                                if(isset($checklistInfo->checkOverall->items[12]->internal_sir)){
                                    if($checklistInfo->checkOverall->items[12]->internal_sir){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td class="border-l-2 border-b-2" style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[12]->external_serem)){
                                    if($checklistInfo->checkOverall->items[12]->external_serem){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px" class="border-b-2">
                            @php
                                if(isset($checklistInfo->checkOverall->items[12]->external_ship_label)){
                                    if($checklistInfo->checkOverall->items[12]->external_ship_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px" class="border-b-2">
                            @php
                                if(isset($checklistInfo->checkOverall->items[12]->external_vmi_label)){
                                    if($checklistInfo->checkOverall->items[12]->external_vmi_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px" class="border-b-2">
                            @php
                                if(isset($checklistInfo->checkOverall->items[12]->external_mc_label)){
                                    if($checklistInfo->checkOverall->items[12]->external_mc_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px" class="border-b-2">
                            @php
                                if(isset($checklistInfo->checkOverall->items[12]->external_delivery_sheet)){
                                    if($checklistInfo->checkOverall->items[12]->external_delivery_sheet){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px" class="border-b-2">
                            @php
                                if(isset($checklistInfo->checkOverall->items[12]->external_specific_label)){
                                    if($checklistInfo->checkOverall->items[12]->external_specific_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td class="border-r-2 border-b-2" style="font-size: 6.5px">
                            @php
                                if(isset($checklistInfo->checkOverall->items[12]->external_flux_label)){
                                    if($checklistInfo->checkOverall->items[12]->external_flux_label){
                                        echo '✓';
                                    }else{
                                        echo "N/A";
                                    }
                                }
                            @endphp
                        </td>
                        <td style="font-size: 6.5px" class="border-b-2">
                            @php
                                echo isset($checklistInfo->checkOverall->items[12]->identity_tape) ? $checklistInfo->checkOverall->items[12]->identity_tape : '';
                            @endphp
                        </td>
                        <td style="font-size: 6.5px" class="border-b-2">
                            @php
                                echo isset($checklistInfo->checkOverall->items[12]->pick_list) ? $checklistInfo->checkOverall->items[12]->pick_list : '';
                            @endphp
                        </td>
                        <td class="border-r-2 border-b-2" style="font-size: 6.5px">
                            @php
                                echo isset($checklistInfo->checkOverall->items[12]->remarks) ? $checklistInfo->checkOverall->items[12]->remarks : '';
                            @endphp
                        </td>
                    </tr>
                </tbody>
            </table>
            <table>
                <thead>
                    <th colspan="22" class="text-left border-none w-fit">
                        7. Personnel
                    </th>
                </thead>
                <tbody>
                    <tr>
                        <td class="w-28 border-none"></td>
                        <td class="border-none w-14" style="font-size: 7px">
                            Shipping PIC:
                        </td>
                        <td class="w-24 border-none" style="font-size: 7px"><u>&nbsp;&nbsp;{{$checklistInfo->personnelCheck->shipping_pic}}&nbsp;&nbsp;</u></td>
                        <td class="border-none w-10" style="font-size: 7px">
                            Date:
                        </td>
                        <td class="w-16 border" style="font-size: 7px"><u>&nbsp;&nbsp;{{date("M d, Y" , strtotime($checklistInfo->personnelCheck->date))}}&nbsp;&nbsp;</u></td>
                        <td class="w-5 border-none" style="font-size: 7px"></td>
                        <td class="border-l-2 border-t-2 border-r-2 border-b-0" style="font-size: 7px" colspan="10">*For palletized Finished Goods, check expiration date: (applicable only for wooden pallet)</td>
                    </tr>
                    <tr>
                        <td class="w-28 border-none" style="font-size: 7px"></td>
                        <td class="border-none w-14" style="font-size: 7px">
                            OBA Checklist by:
                        </td>
                        <td class="w-24 border-none" style="font-size: 7px"><u>&nbsp;&nbsp;{{$checklistInfo->personnelCheck->oba_checked_by}}&nbsp;&nbsp;</u></td>
                        <td class="border-none w-10" style="font-size: 7px">
                            Judgement:
                        </td>
                        <td class="border-none" style="font-size: 7px"><u>&nbsp;&nbsp;{{$checklistInfo->personnelCheck->check_judgement}}&nbsp;&nbsp;</u></td>
                        <td class="border-none" style="font-size: 7px"></td>
                        <td class="font-bold pl-1 border-l-2 border-t-0 border-r-0 border-b-0" style="font-size: 7px">Pallet 1 <input type="checkbox" disabled style="width: 1rem"
                            @php
                                if(isset($checklistInfo->checkOverall->pallets[0]->value) && $checklistInfo->checkOverall->pallets[0]->value != 0){
                                    echo "checked";
                                }
                            @endphp></td>
                        <td class="font-bold pl-1 border-l-0 border-t-0 border-r-0 border-b-0" style="font-size: 7px">Pallet 2 <input type="checkbox" disabled style="width: 1rem"
                            @php
                                if(isset($checklistInfo->checkOverall->pallets[1]->value) && $checklistInfo->checkOverall->pallets[1]->value != 0){
                                    echo "checked";
                                }
                            @endphp></td>
                        <td class="font-bold pl-1 border-l-0 border-t-0 border-r-0 border-b-0" style="font-size: 7px">Pallet 3 <input type="checkbox" disabled style="width: 1rem"
                            @php
                                if(isset($checklistInfo->checkOverall->pallets[2]->value) && $checklistInfo->checkOverall->pallets[2]->value != 0){
                                    echo "checked";
                                }
                            @endphp></td>
                        <td class="font-bold pl-1 border-l-0 border-t-0 border-r-0 border-b-0" style="font-size: 7px">Pallet 4 <input type="checkbox" disabled style="width: 1rem"
                            @php
                                if(isset($checklistInfo->checkOverall->pallets[3]->value) && $checklistInfo->checkOverall->pallets[3]->value != 0){
                                    echo "checked";
                                }
                            @endphp></td>
                        <td class="font-bold pl-1 border-l-0 border-t-0 border-r-0 border-b-0" style="font-size: 7px">Pallet 5 <input type="checkbox" disabled style="width: 1rem"
                            @php
                                if(isset($checklistInfo->checkOverall->pallets[4]->value) && $checklistInfo->checkOverall->pallets[4]->value != 0){
                                    echo "checked";
                                }
                            @endphp></td>
                        <td class="font-bold pl-1 border-l-0 border-t-0 border-r-0 border-b-0" style="font-size: 7px">Pallet 6 <input type="checkbox" disabled style="width: 1rem"
                            @php
                                if(isset($checklistInfo->checkOverall->pallets[5]->value) && $checklistInfo->checkOverall->pallets[5]->value != 0){
                                    echo "checked";
                                }
                            @endphp></td>
                        <td class="font-bold pl-1 border-l-0 border-t-0 border-r-0 border-b-0" style="font-size: 7px">Pallet 7 <input type="checkbox" disabled style="width: 1rem"
                            @php
                                if(isset($checklistInfo->checkOverall->pallets[6]->value) && $checklistInfo->checkOverall->pallets[6]->value != 0){
                                    echo "checked";
                                }
                            @endphp></td>
                        <td class="font-bold pl-1 border-l-0 border-t-0 border-r-0 border-b-0" style="font-size: 7px">Pallet 8 <input type="checkbox" disabled style="width: 1rem"
                            @php
                                if(isset($checklistInfo->checkOverall->pallets[7]->value) && $checklistInfo->checkOverall->pallets[7]->value != 0){
                                    echo "checked";
                                }
                            @endphp></td>
                        <td class="font-bold pl-1 border-l-0 border-t-0 border-r-0 border-b-0" style="font-size: 7px">Pallet 9 <input type="checkbox" disabled style="width: 1rem"
                            @php
                                if(isset($checklistInfo->checkOverall->pallets[8]->value) && $checklistInfo->checkOverall->pallets[8]->value != 0){
                                    echo "checked";
                                }
                            @endphp></td>
                        <td class="font-bold pl-1 border-l-0 border-t-0 border-r-2 border-b-0" style="font-size: 7px">Pallet 10 <input type="checkbox" disabled style="width: 1rem"
                            @php
                                if(isset($checklistInfo->checkOverall->pallets[9]->value) && $checklistInfo->checkOverall->pallets[9]->value != 0){
                                    echo "checked";
                                }
                            @endphp></td>
                    </tr>
                    <tr>
                        <td class="w-28 border-none" style="font-size: 7px"></td>
                        <td class="border-none w-20" style="font-size: 7px">
                            OBA Picture by:
                        </td>
                        <td class="w-24 border-none" style="font-size: 7px"><u>&nbsp;&nbsp;{{$checklistInfo->personnelCheck->oba_picture_by}}&nbsp;&nbsp;</u></td>
                        <td class="border-none w-10" style="font-size: 7px">
                            Judgement:
                        </td>
                        <td class="border-none" style="font-size: 7px"><u>&nbsp;&nbsp;{{$checklistInfo->personnelCheck->picture_judgement}}&nbsp;&nbsp;</u></td>
                        <td class="border-none" style="font-size: 7px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="font-bold pl-1 border-l-2 border-t-0 border-r-0 border-b-0" style="font-size: 7px">Pallet 11 <input type="checkbox" disabled style="width: 1rem"
                            @php
                                if(isset($checklistInfo->checkOverall->pallets[10]->value) && $checklistInfo->checkOverall->pallets[10]->value != 0){
                                    echo "checked";
                                }
                            @endphp></td>
                        <td class="font-bold pl-1 border-l-0 border-t-0 border-r-0 border-b-0" style="font-size: 7px">Pallet 12<input type="checkbox" disabled style="width: 1rem"
                            @php
                                if(isset($checklistInfo->checkOverall->pallets[11]->value) && $checklistInfo->checkOverall->pallets[11]->value != 0){
                                    echo "checked";
                                }
                            @endphp></td>
                        <td class="font-bold pl-1 border-l-0 border-t-0 border-r-0 border-b-0" style="font-size: 7px">Pallet 13 <input type="checkbox" disabled style="width: 1rem"
                            @php
                                if(isset($checklistInfo->checkOverall->pallets[12]->value) && $checklistInfo->checkOverall->pallets[12]->value != 0){
                                    echo "checked";
                                }
                            @endphp></td>
                        <td class="font-bold pl-1 border-l-0 border-t-0 border-r-0 border-b-0" style="font-size: 7px">Pallet 14 <input type="checkbox" disabled style="width: 1rem"
                            @php
                                if(isset($checklistInfo->checkOverall->pallets[13]->value) && $checklistInfo->checkOverall->pallets[13]->value != 0){
                                    echo "checked";
                                }
                            @endphp></td>
                        <td class="font-bold pl-1 border-l-0 border-t-0 border-r-0 border-b-0" style="font-size: 7px">Pallet 15 <input type="checkbox" disabled style="width: 1rem"
                            @php
                                if(isset($checklistInfo->checkOverall->pallets[14]->value) && $checklistInfo->checkOverall->pallets[14]->value != 0){
                                    echo "checked";
                                }
                            @endphp></td>
                        <td class="font-bold pl-1 border-l-0 border-t-0 border-r-0 border-b-0" style="font-size: 7px">Pallet 16 <input type="checkbox" disabled style="width: 1rem"
                            @php
                                if(isset($checklistInfo->checkOverall->pallets[15]->value) && $checklistInfo->checkOverall->pallets[15]->value != 0){
                                    echo "checked";
                                }
                            @endphp></td>
                        <td class="font-bold pl-1 border-l-0 border-t-0 border-r-0 border-b-0" style="font-size: 7px">Pallet 17 <input type="checkbox" disabled style="width: 1rem"
                            @php
                                if(isset($checklistInfo->checkOverall->pallets[16]->value) && $checklistInfo->checkOverall->pallets[16]->value != 0){
                                    echo "checked";
                                }
                            @endphp></td>
                        <td class="font-bold pl-1 border-l-0 border-t-0 border-r-0 border-b-0" style="font-size: 7px">Pallet 18 <input type="checkbox" disabled style="width: 1rem"
                            @php
                                if(isset($checklistInfo->checkOverall->pallets[17]->value) && $checklistInfo->checkOverall->pallets[17]->value != 0){
                                    echo "checked";
                                }
                            @endphp></td>
                        <td class="font-bold pl-1 border-l-0 border-t-0 border-r-0 border-b-0" style="font-size: 7px">Pallet 19 <input type="checkbox" disabled style="width: 1rem"
                            @php
                                if(isset($checklistInfo->checkOverall->pallets[18]->value) && $checklistInfo->checkOverall->pallets[18]->value != 0){
                                    echo "checked";
                                }
                            @endphp></td>
                        <td class="font-bold pl-1 border-l-0 border-t-0 border-r-2 border-b-0" style="font-size: 7px">Pallet 20 <input type="checkbox" disabled style="width: 1rem"
                            @php
                                if(isset($checklistInfo->checkOverall->pallets[19]->value) && $checklistInfo->checkOverall->pallets[19]->value != 0){
                                    echo "checked";
                                }
                            @endphp></td>
                    </tr>
                    <tr>
                        <td class="border-none text-blue-700 font-bold" style="font-size: 12px">Additional Note:</td>
                        <td class="border-none"></td>
                        <td class="border-none"></td>
                        <td class="border-none"></td>
                        <td class="border-none"></td>
                        <td class="border-none"></td>
                        <td class="pl-1 border-l-2 border-t-0 border-b-2 border-r-0">
                            Results:
                        </td>
                        <td class="border-l-0 border-t-0 border-b-2 border-r-2" colspan="9">
                            <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $checklistInfo->checkOverall->results }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" style="font-size: 7px" class="border-none">
                            1. Include last carton/box during OBA checking to ensure completeness and availablitiy of documents.
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" style="font-size: 7px" class="border-none">
                            2. Stamp "OQA PASSED" on the last carton/box with documents inside & all the Box Barcode label of all boxes opened.
                        </td>
                        <td colspan="10" style="font-size: 7px"  class="text-blue-700 border-t-2 border-l-2 border-r-2 border-b-0">
                            <strong class="ml-1">8D-21-EX-0017 MED 0698G Unreasonable QR Code -</strong> Include on the OBA the checking of packs on Lot Traceability versus on the scanned QR Code.
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" style="font-size: 7px" class="border-none">
                            3. For Full Carton Box. Check actual quantity inside the box versus the standard quantity per carton, if lacking or excess quantity open all cartons
                        </td>
                        <td colspan="10" style="font-size: 7px"  class="text-blue-700 border-t-0 border-l-2 border-r-2 border-b-0">
                            <strong class="ml-1">8D-21-EX-0006 MED 0697G No Attached QR Code -</strong> Include on the OBA, the checking of packs on Lot Traceability versus on the scanned QR Code.
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" style="font-size: 7px" class="border-none">
                            &nbsp;&nbsp;&nbsp; In case of partial qty inside the box, check actual pack insde the box versus the required packs insde the box
                        </td>
                        <td colspan="10" style="font-size: 7px"  class="text-blue-700 border-t-0 border-l-2 border-r-2 border-b-0">
                            <strong class="ml-1">8D-21-EX-0018 TTM 0874D Wrong Orientation -</strong> Include checking of package orientation during OBA.
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" style="font-size: 7px" class="border-none">
                            <p class="ml-16"><strong>ex. 8 = <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Actual packs/box&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u> ; &nbsp;&nbsp;<u>&nbsp;&nbsp;2&nbsp;&nbsp;</u> = <u>&nbsp;&nbsp;&nbsp;&nbsp;Actual Packs&nbsp;&nbsp;&nbsp;&nbsp;</u></strong></p>
                        </td>
                        <td colspan="10" style="font-size: 7px"  class="text-blue-700 border-t-0 border-l-2 border-r-2 border-b-0">
                            <strong class="ml-1">8D-21-EX-0028 TSI 0858G Loose Pack -</strong> Additional check item of the OBA checker the checklist record of MC Shipping. Operator.
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" style="font-size: 7px" class="align-text-top border-none">
                            <p class="ml-16"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 8 &nbsp;&nbsp;&nbsp; &nbsp;Standard packs/box&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp; = &nbsp;&nbsp;&nbsp;Required Packs&nbsp;&nbsp;</strong></p>
                        </td>
                        <td colspan="10" style="font-size: 7px"  class="text-blue-700 border-t-0 border-l-2 border-r-2 border-b-2">
                            <strong class="ml-1">8D-21-EX-0047 MIE 0859G Wrong Label -</strong> Additional check item of QR code label on external packaging.
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" style="font-size: 7px" class="border-none">
                            4. For PN, Model Code and PO number, please write the actual information written in the Package Barcode Sticker, Shipping Label<br>
                            &nbsp;Box Barcode Label, Specific label and SEREM. If not required, please write N/A( Not Applicable ).
                        </td>
                        <td colspan="10" rowspan="5" style="font-size: 7px"  class="text-blue-700 border-none">
                            {{-- <img src={{ asset("./photo/rev23.png") }}> --}}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" style="font-size: 7px" class="border-none">
                            5. For Serem row, check "YES" if you see the ("with SIR attachement") on the Lower Right side of the Inspection Report, or else write "NO".
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" style="font-size: 7px" class="border-none">
                            6. Upon OBA checking, if first check is failed, OBA personnel should indicate in the remarks as Fail, and reason of failure. <br>
                            <p class="text-blue-700">&nbsp;&nbsp;&nbsp;&nbsp;After correcting the problem, QA personnel needs to perform OBA again on the failed item.</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" style="font-size: 7px" class="border-none">
                            7. Person who prepared the SEREM is not allowed to do the OBA.
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" style="font-size: 7px" class="border-none">
                            8. Add OBA Judgment by OBA personnel doing the OBA Checklist and OBA Photo ( Write <strong><u>PASS</u></strong> - if all OK; write <strong><u>FAIL</u></strong> at least 1 item is NG then follow Note 6.)
                        </td>
                    </tr>
                    <tr>
                        <td colspan="8" style="font-size: 7px" class="border-none">
                            9. Add Preparation and OBA KIT Checklist to check items(camera or tablet, cutter, zebra pen or ballpen, stamp, tape dispenser, stamp pad, and calculator)inside OBA KIT, before and after OBA checking.
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" style="font-size: 7px" class="border-none">
                            10. MC Receiving checklist for the vacuum sealed condition of packed magnet.
                        </td>
                        <td colspan="5" class="border-none">

                        </td>
                        {{-- <td colspan="2" class="text-right font-bold" style="font-size: 8px">
                            OBA Photos Uploaded By:
                        </td>
                        <td colspan="3">

                        </td> --}}
                    </tr>
                    <tr>
                        <td colspan="10" style="font-size: 7px" class="border-none">
                            11. Need to include checking of Lot no. in Package Barcode Label (standard is 2 digit only). <strong class="ml-6">(ex. </strong><strong class="text-blue-700 ml-1">CORRECT - 0846-05-B-042321-F0-0001</strong><strong class="text-red-700 ml-8">WRONG - 0846-<u>0</u>05-B-042321-F0-0001</strong>
                        </td>
                        <td class="border-none">

                        </td>
                        {{-- <td colspan="2" class="text-right font-bold" style="font-size: 8px">
                            Date:
                        </td>
                        <td colspan="3">

                        </td> --}}
                    </tr>
                    <tr>
                        <td colspan="6" style="font-size: 7px" class="border-none">
                            12. Ensure that all OBA Photos were uploaded right after the OBA.
                        </td>
                        <td colspan="5" class="border-none">

                        </td>
                        {{-- <td colspan="2" class="text-right font-bold" style="font-size: 8px">
                            Time:
                        </td>
                        <td colspan="3">

                        </td> --}}
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
