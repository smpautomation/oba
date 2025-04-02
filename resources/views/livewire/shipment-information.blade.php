<div class="p-4 m-2 rounded-xl shadow-sm bg-slate-50" wire:ignore wire:focusout='dispatchMe'>
    <div class="flex items-center justify-center bg-gray-500 text-gray-100">
        <h1 class='text-lg'>
            <strong>3. Shipment Information</strong>
        </h1>
    </div>

    <div>
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
                <x-label for="3-datetime" :semibold="true">Date & Time</x-label>
                <input id="3-datetime" type="text" wire:model='inputs.datetime' value="" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Pick a date and time"/>
            </div>
            <div></div>
        </div>
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
                <x-label for="3-modelname" :semibold="true">Model Name</x-label>
                <x-inputText id='3-modelname' name='3-modelname' wire:model='inputs.model_name'></x-inputText>
            </div>
            <div>
                <x-label for="3-invoice" :semibold="true">Invoice No.</x-label>
                <x-inputText id='3-invoice' name='3-invoice' value="" wire:model='inputs.invoice_number'></x-inputText>
            </div>
        </div>
        <div class="flex">
            <div>
                <x-label :semibold="true">Pallet Used</x-label>
            </div>
            <div class="flex">
                <div class="m-8">
                    <x-checkbox id="3-SI-1" :ml="true" value="wood" wire:model='inputs.wood'></x-checkbox>
                    <x-label for="3-SI-1">WOOD</x-label>
                </div>
                <div class="m-8">
                    <x-checkbox id="3-SI-2" :ml="true" value="paper" wire:model='inputs.paper'></x-checkbox>
                    <x-label for="3-SI-2">PAPER</x-label>
                </div>
                <div class="m-8">
                    <x-checkbox id="3-SI-3" :ml="true" value="steel" wire:model='inputs.steel'></x-checkbox>
                    <x-label for="3-SI-3" >STEEL</x-label>
                </div>
                <div class="m-8">
                    <x-checkbox id="3-SI-4" :ml="true" value="plastic" wire:model='inputs.plastic'></x-checkbox>
                    <x-label for="3-SI-4">PLASTIC</x-label>
                </div>
                <div class="m-8">
                    <x-inputText type="text" id='3-others' name='3-others' placeholder="Others(Please Specify)" wire:model='inputs.others'></x-inputText>
                </div>
            </div>
        </div>
    </div>
</div>
