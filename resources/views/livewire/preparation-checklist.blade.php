<div class="p-4 m-2 rounded-2xl shadow-lg bg-white max-w-4xl mx-auto">
    <!-- Header -->
    <div class="flex items-center justify-center bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-xl mb-6 p-4">
        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <h1 class="text-xl font-bold">Preparation Checklist</h1>
    </div>

    <!-- Main Table Container -->
    <div class="overflow-x-auto bg-white rounded-xl shadow-sm border border-gray-200 mb-6">
        <table class="w-full min-w-[1200px] text-sm">
            <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                <tr>
                    <th class="px-4 py-4 text-left font-semibold text-gray-700 sticky left-0 bg-gray-50 z-10 min-w-[120px] border-r border-gray-200">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"></path>
                            </svg>
                            Status
                        </div>
                    </th>
                    <th class="px-3 py-4 text-center font-semibold text-gray-700 min-w-[140px]">
                        <div class="text-xs uppercase tracking-wide leading-tight">MC Receiving<br/>Checklist</div>
                    </th>
                    <th class="px-3 py-4 text-center font-semibold text-gray-700 min-w-[100px]">
                        <div class="text-xs uppercase tracking-wide">OBA Kit</div>
                    </th>
                    <th class="px-3 py-4 text-center font-semibold text-gray-700 min-w-[120px]">
                        <div class="text-xs uppercase tracking-wide leading-tight">Packing<br/>Specs</div>
                    </th>
                    <th class="px-3 py-4 text-center font-semibold text-gray-700 min-w-[100px]">
                        <div class="text-xs uppercase tracking-wide">SEREM</div>
                    </th>
                    <th class="px-3 py-4 text-center font-semibold text-gray-700 min-w-[100px]">
                        <div class="text-xs uppercase tracking-wide">Pick List</div>
                    </th>
                    <th class="px-3 py-4 text-center font-semibold text-gray-700 min-w-[120px]">
                        <div class="text-xs uppercase tracking-wide leading-tight">FG Lot<br/>Trace</div>
                    </th>
                    <th class="px-3 py-4 text-center font-semibold text-gray-700 min-w-[120px]">
                        <div class="text-xs uppercase tracking-wide leading-tight">Scanned<br/>QR Code</div>
                    </th>
                    <th class="px-3 py-4 text-center font-semibold text-gray-700 min-w-[140px]">
                        <div class="text-xs uppercase tracking-wide leading-tight">Packing Slip/<br/>Shipping Invoice</div>
                    </th>
                    <th class="px-3 py-4 text-center font-semibold text-gray-700 min-w-[140px]">
                        <div class="text-xs uppercase tracking-wide leading-tight">Related Docs<br/>OBA Checking</div>
                    </th>
                </tr>
            </thead>
            <tbody>
                <!-- Complete Row -->
                <tr class="border-b border-gray-100 hover:bg-blue-50 transition-colors duration-200">
                    <td class="px-4 py-6 font-semibold text-gray-800 sticky left-0 bg-white z-10 border-r border-gray-200">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-green-500 rounded-full mr-3"></div>
                            COMPLETE
                        </div>
                    </td>
                    <td class="px-3 py-6 text-center">
                        <x-checkbox id="oneprep2column" value="1" wire:model="inputs.oneprep2column" wire:focusout="dispatchMe('oneprep2column')" :inputStatus="$inputStatus['oneprep2column']" ></x-checkbox>
                    </td>
                    <td class="px-3 py-6 text-center">
                        <x-checkbox id="1-prep-3column" value="1" wire:model="inputs.oneprep3column" wire:focusout="dispatchMe('oneprep3column')" :inputStatus="$inputStatus['oneprep3column']" ></x-checkbox>
                    </td>
                    <td class="px-3 py-6 text-center">
                        <x-checkbox id="1-prep-4column" value="1" wire:model="inputs.oneprep4column" wire:focusout="dispatchMe('oneprep4column')" :inputStatus="$inputStatus['oneprep4column']" ></x-checkbox>
                    </td>
                    <td class="px-3 py-6 text-center">
                        <x-checkbox id="1-prep-5column" value="1" wire:model="inputs.oneprep5column" wire:focusout="dispatchMe('oneprep5column')" :inputStatus="$inputStatus['oneprep5column']" ></x-checkbox>
                    </td>
                    <td class="px-3 py-6 text-center">
                        <x-checkbox id="1-prep-6column" value="1" wire:model="inputs.oneprep6column" wire:focusout="dispatchMe('oneprep6column')" :inputStatus="$inputStatus['oneprep6column']" ></x-checkbox>
                    </td>
                    <td class="px-3 py-6 text-center">
                        <x-checkbox id="1-prep-7column" value="1" wire:model="inputs.oneprep7column" wire:focusout="dispatchMe('oneprep7column')" :inputStatus="$inputStatus['oneprep7column']" ></x-checkbox>
                    </td>
                    <td class="px-3 py-6 text-center">
                        <x-checkbox id="1-prep-8column" value="1" wire:model="inputs.oneprep8column" wire:focusout="dispatchMe('oneprep8column')" :inputStatus="$inputStatus['oneprep8column']" ></x-checkbox>
                    </td>
                    <td class="px-3 py-6 text-center">
                        <x-checkbox id="1-prep-9column" value="1" wire:model="inputs.oneprep9column" wire:focusout="dispatchMe('oneprep9column')" :inputStatus="$inputStatus['oneprep9column']" ></x-checkbox>
                    </td>
                    <td class="px-3 py-6 text-center">
                        <x-checkbox id="1-prep-10column" value="1" wire:model="inputs.oneprep10column" wire:focusout="dispatchMe('oneprep10column')" :inputStatus="$inputStatus['oneprep10column']"></x-checkbox>
                    </td>
                </tr>

                <!-- Remarks Row -->
                <tr class="bg-gray-50 border-b border-gray-100">
                    <td class="px-4 py-6 font-semibold text-gray-800 sticky left-0 bg-gray-50 z-10 border-r border-gray-200">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-1l-4 4z"></path>
                            </svg>
                            REMARKS
                        </div>
                    </td>
                    <td class="px-2 py-4">
                        <x-inputText id="1-prep-1remarks" wire:model="inputs.oneprep2remarks" wire:focusout="dispatchMe('oneprep2remarks')" :inputStatus="$inputStatus['oneprep2remarks']" class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none min-h-[44px]" placeholder="Add remarks..."></x-inputText>
                    </td>
                    <td class="px-2 py-4">
                        <x-inputText id="1-prep-2remarks" wire:model="inputs.oneprep3remarks" wire:focusout="dispatchMe('oneprep3remarks')" :inputStatus="$inputStatus['oneprep3remarks']" class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none min-h-[44px]" placeholder="Add remarks..."></x-inputText>
                    </td>
                    <td class="px-2 py-4">
                        <x-inputText id="1-prep-3remarks" wire:model="inputs.oneprep4remarks" wire:focusout="dispatchMe('oneprep4remarks')" :inputStatus="$inputStatus['oneprep4remarks']" class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none min-h-[44px]" placeholder="Add remarks..."></x-inputText>
                    </td>
                    <td class="px-2 py-4">
                        <x-inputText id="1-prep-4remarks" wire:model="inputs.oneprep5remarks" wire:focusout="dispatchMe('oneprep5remarks')" :inputStatus="$inputStatus['oneprep5remarks']" class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none min-h-[44px]" placeholder="Add remarks..."></x-inputText>
                    </td>
                    <td class="px-2 py-4">
                        <x-inputText id="1-prep-5remarks" wire:model="inputs.oneprep6remarks" wire:focusout="dispatchMe('oneprep6remarks')" :inputStatus="$inputStatus['oneprep6remarks']" class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none min-h-[44px]" placeholder="Add remarks..."></x-inputText>
                    </td>
                    <td class="px-2 py-4">
                        <x-inputText id="1-prep-6remarks" wire:model="inputs.oneprep7remarks" wire:focusout="dispatchMe('oneprep7remarks')" :inputStatus="$inputStatus['oneprep7remarks']" class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none min-h-[44px]" placeholder="Add remarks..."></x-inputText>
                    </td>
                    <td class="px-2 py-4">
                        <x-inputText id="1-prep-7remarks" wire:model="inputs.oneprep8remarks" wire:focusout="dispatchMe('oneprep8remarks')" :inputStatus="$inputStatus['oneprep8remarks']" class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none min-h-[44px]" placeholder="Add remarks..."></x-inputText>
                    </td>
                    <td class="px-2 py-4">
                        <x-inputText id="1-prep-8remarks" wire:model="inputs.oneprep9remarks" wire:focusout="dispatchMe('oneprep9remarks')" :inputStatus="$inputStatus['oneprep9remarks']" class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none min-h-[44px]" placeholder="Add remarks..."></x-inputText>
                    </td>
                    <td class="px-2 py-4">
                        <x-inputText id="1-prep-9remarks" wire:model="inputs.oneprep10remarks" wire:focusout="dispatchMe('oneprep10remarks')" :inputStatus="$inputStatus['oneprep10remarks']" class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none min-h-[44px]" placeholder="Add remarks..."></x-inputText>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>