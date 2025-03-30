<div class="p-4 m-2 rounded-xl shadow-sm bg-slate-50">
    <div class="flex items-center justify-center bg-gray-500 text-gray-100">
        <h1 class='text-lg'>
            <strong>1. Preparation Checklist</strong>
        </h1>
    </div>
    <div class="overflow-x-auto">
        <table class="text-sm text-left rtl:text-right text-gray-500 table-auto w-screen">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        <strong>PREPARATION Checklist</strong>
                    </th>
                    <th scope="col" class="px-6 py-3 ">
                        MC RECEIVING CHECKLIST
                    </th>
                    <th scope="col" class="px-6 py-3">
                        OBA KIT
                    </th>
                    <th scope="col" class="px-6 py-3">
                        PACKING SPECS
                    </th>
                    <th scope="col" class="px-6 py-3">
                        SEREM
                    </th>
                    <th scope="col" class="px-6 py-3">
                        PICK LIST
                    </th>
                    <th scope="col" class="px-6 py-3">
                        FG LOT TRACE
                    </th>
                    <th scope="col" class="px-6 py-3">
                        SCANNED QR CODE
                    </th>
                    <th scope="col" class="px-6 py-3">
                        PACKING SLIP/SHIPPING INVOICE/SI
                    </th>
                    <th scope="col" class="px-6 py-3">
                        RELATED DOCUMENTS ON OBA CHECKING
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td scope="row" class="px-6 py-4 w-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <strong>COMPLETE</strong>
                    </td>
                    <td class="w-4 p-4">
                        <x-checkbox id="oneprep2column1" value="1" wire:model="oneprep2column"></x-checkbox>
                    </td>
                    <td class="w-4 p-4">
                        <x-checkbox id="1-prep-3column" value="1" wire:model="columns.oneprep3column"></x-checkbox>
                    </td>
                    <td class="w-4 p-4">
                        <x-checkbox id="1-prep-4column" value="1" wire:model="columns.oneprep4column"></x-checkbox>
                    </td>
                    <td class="w-4 p-4">
                        <x-checkbox id="1-prep-5column" value="1" wire:model="columns.oneprep5column"></x-checkbox>
                    </td>
                    <td class="w-4 p-4">
                        <x-checkbox id="1-prep-6column" value="1" wire:model="columns.oneprep6column"></x-checkbox>
                    </td>
                    <td class="w-4 p-4">
                        <x-checkbox id="1-prep-7column" value="1" wire:model="columns.oneprep7column"></x-checkbox>
                    </td>
                    <td class="w-4 p-4">
                        <x-checkbox id="1-prep-8column" value="1" wire:model="columns.oneprep8column"></x-checkbox>
                    </td>
                    <td class="w-4 p-4">
                        <x-checkbox id="1-prep-9column" value="1" wire:model="columns.oneprep9column"></x-checkbox>
                    </td>
                    <td class="w-4 p-4">
                        <x-checkbox id="1-prep-10column" value="1" wire:model="columns.oneprep10column"></x-checkbox>
                    </td>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <strong>REMARKS</strong>
                    </th>
                    <td class="w-4 p-4">
                        <x-inputText id="1-prep-1remarks" wire:model="remarks.oneprep2remarks" wire:dirty.class="border-yellow"></x-inputText>
                    </td>
                    <td class="w-4 p-4">
                        <x-inputText id="1-prep-2remarks" wire:model="remarks.oneprep3remarks"></x-inputText>
                    </td>
                    <td class="w-4 p-4">
                        <x-inputText id="1-prep-3remarks" wire:model="remarks.oneprep4remarks"></x-inputText>
                    </td>
                    <td class="w-4 p-4">
                        <x-inputText id="1-prep-4remarks" wire:model="remarks.oneprep5remarks"></x-inputText>
                    </td>
                    <td class="w-4 p-4">
                        <x-inputText id="1-prep-5remarks" wire:model="remarks.oneprep6remarks"></x-inputText>
                    </td>
                    <td class="w-4 p-4">
                        <x-inputText id="1-prep-6remarks" wire:model="remarks.oneprep7remarks"></x-inputText>
                    </td>
                    <td class="w-4 p-4">
                        <x-inputText id="1-prep-7remarks" wire:model="remarks.oneprep8remarks"></x-inputText>
                    </td>
                    <td class="w-4 p-4">
                        <x-inputText id="1-prep-8remarks" wire:model="remarks.oneprep9remarks"></x-inputText>
                    </td>
                    <td class="w-4 p-4">
                        <x-inputText id="1-prep-9remarks" wire:model="remarks.oneprep10remarks"></x-inputText>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
