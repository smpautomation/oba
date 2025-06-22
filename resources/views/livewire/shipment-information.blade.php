<div class="p-4 m-2 rounded-2xl shadow-lg bg-white">
    <!-- Header -->
    <div class="flex items-center justify-center bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-xl mb-6 p-4">
        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <h1 class="text-xl font-bold">Shipment Information</h1>
    </div>

    <!-- Content -->
    <div class="space-y-6 p-4 md:p-6">
    <!-- DateTime -->
    <div class="grid md:grid-cols-2 gap-6">
        <div>
            <x-label for="3-datetime" :semibold="true">Date & Time</x-label>
            <input 
                id="3-datetime" 
                type="datetime-local" 
                wire:model='inputs.datetime' 
                wire:focusout="dispatchMe('datetime')" 
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" 
                placeholder="Pick a date and time" 
            />
        </div>
    </div>

    <!-- Model & Invoice -->
    <div class="grid md:grid-cols-2 gap-6">
        <div>
            <x-label for="3-modelname" :semibold="true">Model Name</x-label>
            <x-inputText 
                id="3-modelname" 
                name="3-modelname" 
                wire:model="inputs.model_name" 
                wire:focusout="dispatchMe('model_name')" 
                :inputStatus="$inputStatus['model_name']" 
                disabled 
                class="mt-1" 
            />
        </div>
        <div>
            <x-label for="3-invoice" :semibold="true">Invoice No.</x-label>
            <x-inputText 
                id="3-invoice" 
                name="3-invoice" 
                wire:model="inputs.invoice_number" 
                wire:focusout="dispatchMe('invoice_number')" 
                :inputStatus="$inputStatus['invoice_number']" 
                class="mt-1" 
            />
        </div>
    </div>

    <!-- Pallet Used -->
    <div>
        <x-label :semibold="true">Pallet Used</x-label>
        <div class="flex flex-wrap gap-4 mt-3">
            <label class="flex items-center space-x-2">
                <x-checkbox 
                    id="3-SI-1" 
                    value="wood" 
                    wire:model="inputs.wood" 
                    wire:focusout="dispatchMe('wood')" 
                    :inputStatus="$inputStatus['wood']" 
                />
                <span>WOOD</span>
            </label>

            <label class="flex items-center space-x-2">
                <x-checkbox 
                    id="3-SI-2" 
                    value="paper" 
                    wire:model="inputs.paper" 
                    wire:focusout="dispatchMe('paper')" 
                    :inputStatus="$inputStatus['paper']" 
                />
                <span>PAPER</span>
            </label>

            <label class="flex items-center space-x-2">
                <x-checkbox 
                    id="3-SI-3" 
                    value="steel" 
                    wire:model="inputs.steel" 
                    wire:focusout="dispatchMe('steel')" 
                    :inputStatus="$inputStatus['steel']" 
                />
                <span>STEEL</span>
            </label>

            <label class="flex items-center space-x-2">
                <x-checkbox 
                    id="3-SI-4" 
                    value="plastic" 
                    wire:model="inputs.plastic" 
                    wire:focusout="dispatchMe('plastic')" 
                    :inputStatus="$inputStatus['plastic']" 
                />
                <span>PLASTIC</span>
            </label>

            <x-inputText 
                type="text" 
                id="3-others" 
                name="3-others" 
                placeholder="Others (Please Specify)" 
                wire:model="inputs.others" 
                wire:focusout="dispatchMe('others')" 
                :inputStatus="$inputStatus['others']" 
                class="min-w-[200px] mt-1" 
            />
        </div>
    </div>
</div>

</div>
