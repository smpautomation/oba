<div class="p-4 m-2 rounded-xl shadow-sm bg-slate-50" wire:ignore wire:focusout="dispatchMe">
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
                        <x-checkbox id="2-OBA-2column" value="ok" wire:model='inputs.beforecheckbox1'></x-checkbox>
                    </td>
                    <td class="w-4 p-4">
                        <x-checkbox id="2-OBA-3column" value="ok" wire:model='inputs.beforecheckbox2'></x-checkbox>
                    </td>
                    <td class="w-4 p-4">
                        <x-checkbox id="2-OBA-4column" value="ok" wire:model='inputs.beforecheckbox3'></x-checkbox>
                    </td>
                    <td class="w-4 p-4">
                        <x-checkbox id="2-OBA-5column" value="ok" wire:model='inputs.beforecheckbox4'></x-checkbox>
                    </td>
                    <td class="w-4 p-4">
                        <x-checkbox id="2-OBA-6column" value="ok" wire:model='inputs.beforecheckbox5'></x-checkbox>
                    </td>
                    <td class="w-4 p-4">
                        <x-checkbox id="2-OBA-7column" value="ok" wire:model='inputs.beforecheckbox6'></x-checkbox>
                    </td>
                    <td class="w-4 p-4">
                        <x-checkbox id="2-OBA-8column" value="ok" wire:model='inputs.beforecheckbox7'></x-checkbox>
                    </td>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <strong>AFTER OBA</strong>
                    </th>
                    <td class="w-4 p-4">
                        <x-checkbox id="2-OBA2-2column" value="ok" wire:model='inputs.aftercheckbox1'></x-checkbox>
                    </td>
                    <td class="w-4 p-4">
                        <x-checkbox id="2-OBA2-3column" value="ok" wire:model='inputs.aftercheckbox2'></x-checkbox>
                    </td>
                    <td class="w-4 p-4">
                        <x-checkbox id="2-OBA2-4column" value="ok" wire:model='inputs.aftercheckbox3'></x-checkbox>
                    </td>
                    <td class="w-4 p-4">
                        <x-checkbox id="2-OBA2-5column" value="ok" wire:model='inputs.aftercheckbox4'></x-checkbox>
                    </td>
                    <td class="w-4 p-4">
                        <x-checkbox id="2-OBA2-6column" value="ok" wire:model='inputs.aftercheckbox5'></x-checkbox>
                    </td>
                    <td class="w-4 p-4">
                        <x-checkbox id="2-OBA2-7column" value="ok" wire:model='inputs.aftercheckbox6'></x-checkbox>
                    </td>
                    <td class="w-4 p-4">
                        <x-checkbox id="2-OBA2-8column" value="ok" wire:model='inputs.aftercheckbox7'></x-checkbox>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
