<div class="p-4 m-2 rounded-2xl shadow-lg bg-white">
    <!-- Header -->
    <div class="flex items-center justify-center bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-xl mb-6 p-4">
        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <h1 class="text-xl font-bold">OBA KIT Checklist</h1>
    </div>

    <!-- Table Container -->
    <div class="overflow-x-auto bg-white rounded-xl shadow-sm border border-gray-200">
        <table class="w-full min-w-[1000px] text-sm">
            <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                <tr>
                    <th class="px-4 py-4 text-left font-semibold text-gray-700 sticky left-0 bg-gray-50 z-10 min-w-[140px] border-r border-gray-200">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Phase
                        </div>
                    </th>
                    <th class="px-3 py-4 text-center font-semibold text-gray-700 min-w-[100px]">Calculator</th>
                    <th class="px-3 py-4 text-center font-semibold text-gray-700 min-w-[100px]">Camera</th>
                    <th class="px-3 py-4 text-center font-semibold text-gray-700 min-w-[100px]">Cutter</th>
                    <th class="px-3 py-4 text-center font-semibold text-gray-700 min-w-[100px]">Stamp Pad</th>
                    <th class="px-3 py-4 text-center font-semibold text-gray-700 min-w-[100px]">Stamp</th>
                    <th class="px-3 py-4 text-center font-semibold text-gray-700 min-w-[120px]">Tape Dispenser</th>
                    <th class="px-3 py-4 text-center font-semibold text-gray-700 min-w-[100px]">Zebra Pen</th>
                </tr>
            </thead>
            <tbody>
                <!-- BEFORE OBA Row -->
                <tr class="border-b border-gray-100 hover:bg-blue-50 transition-colors duration-200">
                    <td class="px-4 py-5 font-semibold text-gray-800 sticky left-0 bg-white z-10 border-r border-gray-200">
                        BEFORE OBA
                    </td>
                    @for ($i = 1; $i <= 7; $i++)
                    <td class="px-3 py-5 text-center">
                        <x-checkbox 
                            id="2-OBA-{{ $i+1 }}column" 
                            value="ok" 
                            wire:model="inputs.beforecheckbox{{ $i }}" 
                            wire:focusout="dispatchMe('beforecheckbox{{ $i }}')" 
                            :inputStatus="$inputStatus['beforecheckbox' . $i]" 
                            class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                        />
                    </td>
                    @endfor
                </tr>

                <!-- AFTER OBA Row -->
                <tr class="bg-gray-50 border-b border-gray-100">
                    <td class="px-4 py-5 font-semibold text-gray-800 sticky left-0 bg-gray-50 z-10 border-r border-gray-200">
                        AFTER OBA
                    </td>
                    @for ($i = 1; $i <= 7; $i++)
                    <td class="px-3 py-5 text-center">
                        <x-checkbox 
                            id="2-OBA2-{{ $i+1 }}column" 
                            value="ok" 
                            wire:model="inputs.aftercheckbox{{ $i }}" 
                            wire:focusout="dispatchMe('aftercheckbox{{ $i }}')" 
                            :inputStatus="$inputStatus['aftercheckbox' . $i]" 
                            class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                        />
                    </td>
                    @endfor
                </tr>
            </tbody>
        </table>
    </div>
</div>
