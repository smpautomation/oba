<div>
    <!-- Sidebar Toggle Button (Sticky) -->
    <div class="fixed top-[38%] {{ $sidebarOpen ? 'right-3/4' : 'right-0' }} z-50 transform -translate-y-1/2 transition-all duration-300">
        <button
            wire:click="toggleSidebar"
            class="gradient-bg-red hover:bg-red-700 text-white p-3 {{ $sidebarOpen ? 'rounded-l-lg' : 'rounded-l-lg' }} shadow-lg transition-colors duration-200"
            title="{{ $sidebarOpen ? 'Close Photo Panel' : 'Open Photo Panel' }}"
        >
            <svg class="w-6 h-6 transform transition-transform duration-200 {{ $sidebarOpen ? 'rotate-180' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </button>
    </div>
    <div class="fixed top-0 right-0 h-full w-3/4 bg-white shadow-xl z-40 transform transition-transform duration-300 overflow-y-auto {{ $sidebarOpen ? 'translate-x-0' : 'translate-x-full' }} pt-6">
        <div class="p-4">
            <div class="max-w-6xl mx-auto px-4 mb-4 mt-6 bg-white rounded-xl py-4">
                <div class="gradient-bg-red text-white px-8 py-6 rounded-xl mb-6">
                    <div class="flex items-center justify-center">
                        <div class="bg-white/20 rounded-full p-3 mr-4">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-3xl font-bold">Issues From @php if($this->checklistInfo['failed_id_for_re-oba'] == $this->checklistInfo->id){ echo 'This Checklist';}else{ echo $this->checklistInfo['failed_id_for_re-oba']; } @endphp</h1>
                            <p class="text-white/80 mt-1">View issues from the failed audit checklist</p>
                        </div>
                    </div>

                    <div class="flex-1 overflow-y-auto p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                            <div class="section-container">
                                <div class="section-label">Model</div>
                                <div class="section-value">{{ $checklistInfoPast->model }}</div>
                            </div>
                            <div class="section-container">
                                <div class="section-label">Section</div>
                                <div class="section-value">{{ $checklistInfoPast->section }}</div>
                            </div>
                        </div>

                        @php
                            $issues = [];

                            // Check Preparation Checklist
                            if($summaryData['preparation']) {
                                if(!$summaryData['preparation']->oneprep2column) $issues[] = ['section' => 'Preparation', 'item' => 'MC Receiving', 'status' => 'Not checked', 'action' => 'Verify MC Receiving documentation'];
                                if(!$summaryData['preparation']->oneprep3column) $issues[] = ['section' => 'Preparation', 'item' => 'OBA Kit', 'status' => 'Not checked', 'action' => 'Confirm OBA Kit availability'];
                                if(!$summaryData['preparation']->oneprep4column) $issues[] = ['section' => 'Preparation', 'item' => 'Packing Specs', 'status' => 'Not checked', 'action' => 'Review packing specifications'];
                                if(!$summaryData['preparation']->oneprep5column) $issues[] = ['section' => 'Preparation', 'item' => 'SEREM', 'status' => 'Not checked', 'action' => 'Verify SEREM document'];
                                if(!$summaryData['preparation']->oneprep6column) $issues[] = ['section' => 'Preparation', 'item' => 'Pick List', 'status' => 'Not checked', 'action' => 'Check Pick List availability'];
                                if(!$summaryData['preparation']->oneprep7column) $issues[] = ['section' => 'Preparation', 'item' => 'FG Lot Trace', 'status' => 'Not checked', 'action' => 'Verify FG Lot Trace documentation'];
                                if(!$summaryData['preparation']->oneprep9column) $issues[] = ['section' => 'Preparation', 'item' => 'Packing Slip', 'status' => 'Not checked', 'action' => 'Confirm Packing Slip is available'];
                                if(!$summaryData['preparation']->oneprep10column) $issues[] = ['section' => 'Preparation', 'item' => 'Related Docs', 'status' => 'Not checked', 'action' => 'Verify all related documents'];
                            }

                            // Check Items Checking
                            if($summaryData['check_items']) {
                                if($summaryData['check_items']->same_model == 0) $issues[] = ['section' => 'Items Checking', 'item' => 'Model Name Verification', 'status' => 'Different models found', 'action' => 'Verify model: ' . ($summaryData['check_items']->specify_model ?? 'N/A')];
                                if($summaryData['check_items']->judgement == 0) $issues[] = ['section' => 'Items Checking', 'item' => 'Barcode Label Judgement', 'status' => 'NG', 'action' => 'Re-check barcode labels and correct discrepancies'];
                                if($summaryData['check_items']->need_sir && !$summaryData['check_items']->sir_available) $issues[] = ['section' => 'Items Checking', 'item' => 'SIR Document', 'status' => 'Required but not available', 'action' => 'Obtain Specific Inspection Report'];
                            }

                            // Check Similarities - Quantity
                            if($summaryData['similarities']) {
                                if($summaryData['similarities']->same_quantity_qs == 0) $issues[] = ['section' => 'Similarities', 'item' => 'Quantity for Shipment', 'status' => 'Quantities do not match', 'action' => 'Reconcile quantity differences between Pick List, Shipping Invoice, and SEREM'];
                                if($summaryData['similarities']->judgement_qs == 0) $issues[] = ['section' => 'Similarities', 'item' => 'Quantity Judgement', 'status' => 'NG', 'action' => 'Correct quantity discrepancies before proceeding'];

                                // Check Boxes
                                if($summaryData['similarities']->same_box_bs == 0) $issues[] = ['section' => 'Similarities', 'item' => 'Number of Boxes', 'status' => 'Box counts do not match', 'action' => 'Verify box counts in Pick List, Packing Slip, and Pallet Label'];
                                if($summaryData['similarities']->judgement_bs == 0) $issues[] = ['section' => 'Similarities', 'item' => 'Box Count Judgement', 'status' => 'NG', 'action' => 'Resolve box count differences'];

                                // Check Model Name
                                if($summaryData['similarities']->same_model_mn == 0) $issues[] = ['section' => 'Similarities', 'item' => 'Model Name', 'status' => 'Model names do not match', 'action' => 'Verify model names across all documents and labels'];
                                if($summaryData['similarities']->judgement_mn == 0) $issues[] = ['section' => 'Similarities', 'item' => 'Model Name Judgement', 'status' => 'NG', 'action' => 'Correct model name inconsistencies'];

                                // Check Model Code
                                if($summaryData['similarities']->same_mc == 0) $issues[] = ['section' => 'Similarities', 'item' => 'Model Code', 'status' => 'Model codes do not match', 'action' => 'Verify model codes across all documents and labels'];
                                if($summaryData['similarities']->judgement_mc == 0) $issues[] = ['section' => 'Similarities', 'item' => 'Model Code Judgement', 'status' => 'NG', 'action' => 'Correct model code inconsistencies'];

                                // Check Part Number
                                if($summaryData['similarities']->same_pn == 0) $issues[] = ['section' => 'Similarities', 'item' => 'Part Number', 'status' => 'Part numbers do not match', 'action' => 'Verify part numbers across all documents and labels'];
                                if($summaryData['similarities']->judgement_pn == 0) $issues[] = ['section' => 'Similarities', 'item' => 'Part Number Judgement', 'status' => 'NG', 'action' => 'Correct part number inconsistencies'];

                                // Check PO Number
                                if($summaryData['similarities']->same_po == 0) $issues[] = ['section' => 'Similarities', 'item' => 'PO Number', 'status' => 'PO numbers do not match', 'action' => 'Verify PO numbers across SEREM, Shipping Label, Pallet Label, and other documents'];
                                if($summaryData['similarities']->judgement_po == 0) $issues[] = ['section' => 'Similarities', 'item' => 'PO Number Judgement', 'status' => 'NG', 'action' => 'Correct PO number inconsistencies'];
                            }

                            // Check Shipment Information
                            if($summaryData['shipment']) {
                                if(!$summaryData['shipment']->datetime) $issues[] = ['section' => 'Shipment', 'item' => 'Date & Time', 'status' => 'Not set', 'action' => 'Set shipment date and time'];
                                if(!$summaryData['shipment']->model_name) $issues[] = ['section' => 'Shipment', 'item' => 'Model Name', 'status' => 'Not specified', 'action' => 'Enter model name'];
                                if(!$summaryData['shipment']->invoice_number) $issues[] = ['section' => 'Shipment', 'item' => 'Invoice Number', 'status' => 'Not specified', 'action' => 'Enter invoice number'];
                                if(!$summaryData['shipment']->wood && !$summaryData['shipment']->paper && !$summaryData['shipment']->steel && !$summaryData['shipment']->plastic && !$summaryData['shipment']->others) {
                                    $issues[] = ['section' => 'Shipment', 'item' => 'Pallet Materials', 'status' => 'Not specified', 'action' => 'Select pallet materials used'];
                                }
                            }

                            // Check Personnel
                            if($summaryData['personnel']) {
                                if(!$summaryData['personnel']->shipping_pic) $issues[] = ['section' => 'Personnel', 'item' => 'Shipping PIC', 'status' => 'Not specified', 'action' => 'Assign Shipping PIC'];
                                if(!$summaryData['personnel']->date) $issues[] = ['section' => 'Personnel', 'item' => 'Date', 'status' => 'Not specified', 'action' => 'Set audit date'];
                                if(!$summaryData['personnel']->oba_checked_by) $issues[] = ['section' => 'Personnel', 'item' => 'OBA Checked By', 'status' => 'Not specified', 'action' => 'Assign OBA checker'];
                                if(!$summaryData['personnel']->check_judgement) $issues[] = ['section' => 'Personnel', 'item' => 'OBA Judgement', 'status' => 'Not specified', 'action' => 'Provide OBA check judgement'];
                                if(!$summaryData['personnel']->oba_picture_by) $issues[] = ['section' => 'Personnel', 'item' => 'OBA Picture By', 'status' => 'Not specified', 'action' => 'Assign picture taker'];
                                if(!$summaryData['personnel']->picture_judgement) $issues[] = ['section' => 'Personnel', 'item' => 'Picture Judgement', 'status' => 'Not specified', 'action' => 'Provide picture judgement'];
                            }
                        @endphp

                        @if(count($issues) > 0)
                        <div class="mb-8 bg-red-50 border-2 border-red-200 rounded-2xl overflow-hidden">
                            <div class="bg-gradient-to-r from-red-600 to-red-700 text-white p-4">
                                <div class="flex items-center justify-between">
                                    <h2 class="text-xl font-bold flex items-center space-x-3">
                                        <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                                        </svg>
                                        <span>Issues Requiring Attention</span>
                                    </h2>
                                    <div class="bg-white text-red-600 px-4 py-2 rounded-full font-bold text-lg">
                                        {{ count($issues) }} Issue{{ count($issues) > 1 ? 's' : '' }}
                                    </div>
                                </div>
                                <div class="flex content-center justify-center items-center">
                                    {{-- <img src="{{ asset('photo/stop_call_wait_go.png') }}" class="max-h-[15vh] w-auto" alt="SMP Logo"/> --}}
                                </div>
                            </div>

                            <div class="p-6 space-y-4">
                                @foreach($issues as $index => $issue)
                                <div class="bg-white rounded-lg border-l-4 border-red-500 p-4 shadow-md hover:shadow-lg transition-shadow">
                                    <div class="flex items-start space-x-4">
                                        <div class="flex-shrink-0">
                                            <div class="w-10 h-10 bg-red-500 rounded-full flex items-center justify-center text-white font-bold">
                                                {{ $index + 1 }}
                                            </div>
                                        </div>
                                        <div class="flex-1">
                                            <div class="flex items-center justify-between mb-2">
                                                <div>
                                                    <span class="inline-block bg-red-100 text-red-800 text-xs font-semibold px-3 py-1 rounded-full">
                                                        {{ $issue['section'] }}
                                                    </span>
                                                </div>
                                                <div class="text-right">
                                                    <span class="inline-block bg-red-600 text-white text-xs font-semibold px-3 py-1 rounded-full">
                                                        {{ $issue['status'] }}
                                                    </span>
                                                </div>
                                            </div>
                                            <h4 class="text-lg font-bold text-gray-900 mb-2">{{ $issue['item'] }}</h4>
                                            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-3">
                                                <div class="flex items-start space-x-2">
                                                    <svg class="w-5 h-5 text-yellow-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M13 9h-2V7h2m0 10h-2v-6h2m-1-9A10 10 0 002 12a10 10 0 0010 10 10 10 0 0010-10A10 10 0 0012 2z"/>
                                                    </svg>
                                                    <div>
                                                        <p class="text-sm font-semibold text-yellow-800 mb-1">Recommendation:</p>
                                                        <p class="text-sm text-yellow-900">{{ $issue['action'] }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
