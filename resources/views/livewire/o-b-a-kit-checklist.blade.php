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
                        <x-checkbox id="2-OBA-2column" value="ok" wire:model='inputs.beforecheckbox1' wire:focusout="dispatchMe('beforecheckbox1')" :inputStatus="$inputStatus['beforecheckbox1']"></x-checkbox>
                    </td>
                    <td class="w-4 p-4">
                        <x-checkbox id="2-OBA-3column" value="ok" wire:model='inputs.beforecheckbox2' wire:focusout="dispatchMe('beforecheckbox2')" :inputStatus="$inputStatus['beforecheckbox2']"></x-checkbox>
                    </td>
                    <td class="w-4 p-4">
                        <x-checkbox id="2-OBA-4column" value="ok" wire:model='inputs.beforecheckbox3' wire:focusout="dispatchMe('beforecheckbox3')" :inputStatus="$inputStatus['beforecheckbox3']"></x-checkbox>
                    </td>
                    <td class="w-4 p-4">
                        <x-checkbox id="2-OBA-5column" value="ok" wire:model='inputs.beforecheckbox4' wire:focusout="dispatchMe('beforecheckbox4')" :inputStatus="$inputStatus['beforecheckbox4']"></x-checkbox>
                    </td>
                    <td class="w-4 p-4">
                        <x-checkbox id="2-OBA-6column" value="ok" wire:model='inputs.beforecheckbox5' wire:focusout="dispatchMe('beforecheckbox5')" :inputStatus="$inputStatus['beforecheckbox5']"></x-checkbox>
                    </td>
                    <td class="w-4 p-4">
                        <x-checkbox id="2-OBA-7column" value="ok" wire:model='inputs.beforecheckbox6' wire:focusout="dispatchMe('beforecheckbox6')" :inputStatus="$inputStatus['beforecheckbox6']"></x-checkbox>
                    </td>
                    <td class="w-4 p-4">
                        <x-checkbox id="2-OBA-8column" value="ok" wire:model='inputs.beforecheckbox7' wire:focusout="dispatchMe('beforecheckbox7')" :inputStatus="$inputStatus['beforecheckbox7']"></x-checkbox>
                    </td>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <strong>AFTER OBA</strong>
                    </th>
                    <td class="w-4 p-4">
                        <x-checkbox id="2-OBA2-2column" value="ok" wire:model='inputs.aftercheckbox1' wire:focusout="dispatchMe('aftercheckbox1')" :inputStatus="$inputStatus['aftercheckbox1']"></x-checkbox>
                    </td>
                    <td class="w-4 p-4">
                        <x-checkbox id="2-OBA2-3column" value="ok" wire:model='inputs.aftercheckbox2' wire:focusout="dispatchMe('aftercheckbox2')" :inputStatus="$inputStatus['aftercheckbox2']"></x-checkbox>
                    </td>
                    <td class="w-4 p-4">
                        <x-checkbox id="2-OBA2-4column" value="ok" wire:model='inputs.aftercheckbox3' wire:focusout="dispatchMe('aftercheckbox3')" :inputStatus="$inputStatus['aftercheckbox3']"></x-checkbox>
                    </td>
                    <td class="w-4 p-4">
                        <x-checkbox id="2-OBA2-5column" value="ok" wire:model='inputs.aftercheckbox4' wire:focusout="dispatchMe('aftercheckbox4')" :inputStatus="$inputStatus['aftercheckbox4']"></x-checkbox>
                    </td>
                    <td class="w-4 p-4">
                        <x-checkbox id="2-OBA2-6column" value="ok" wire:model='inputs.aftercheckbox5' wire:focusout="dispatchMe('aftercheckbox5')" :inputStatus="$inputStatus['aftercheckbox5']"></x-checkbox>
                    </td>
                    <td class="w-4 p-4">
                        <x-checkbox id="2-OBA2-7column" value="ok" wire:model='inputs.aftercheckbox6' wire:focusout="dispatchMe('aftercheckbox6')" :inputStatus="$inputStatus['aftercheckbox6']"></x-checkbox>
                    </td>
                    <td class="w-4 p-4">
                        <x-checkbox id="2-OBA2-8column" value="ok" wire:model='inputs.aftercheckbox7' wire:focusout="dispatchMe('aftercheckbox7')" :inputStatus="$inputStatus['aftercheckbox7']"></x-checkbox>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
