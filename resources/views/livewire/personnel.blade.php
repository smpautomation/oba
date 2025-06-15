<div class="p-4 m-2 rounded-xl shadow=sm bg-slate-50">
    <div class="flex items-center justify-center bg-gray-500 text-gray-100">
        <h1 class='text-lg'>
            <strong>7. Personnel</strong>
        </h1>
    </div>
    <div>
        <div class="grid gap-6 mb-6 mt-2 md:grid-rows-3 md:grid-cols-2 rounded-xl shadow-xl p-2 bg-gray-50">
            <div class="col-span-1 md:grid-cols-2">
                <div class="col-span-1 flex items-center justify-center">
                    <x-label for="7-shippingpic">Shipping PIC</x-label><x-inputText id="7-shippingpic" wire:model='inputs.shipping_pic' wire:focusout="dispatchMe('shipping_pic')" :inputStatus="$inputStatus['shipping_pic'] ?? null"></x-inputText>
                </div>
            </div>
            <div class="col-span-1 md:grid-cols-2">
                <div class="col-span-1 flex items-center justify-center">
                    <x-label for="7-date">Date:</x-label><input type="date" id="7-date" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ml-8" wire:model='inputs.date' wire:focusout="dispatchMe('date')"/>
                </div>
            </div>
            <div class="col-span-1 md:grid-cols-2">
                <div class="col-span-1 flex items-center justify-center">
                    <x-label for="7-oba">OBA Checked by:</x-label><x-inputText id="7-oba" wire:model='inputs.oba_checked_by' wire:focusout="dispatchMe('oba_checked_by')" :inputStatus="$inputStatus['oba_checked_by'] ?? null"></x-inputText>
                </div>
            </div>
            <div class="col-span-1 md:grid-cols-2">
                <div class="col-span-1 flex items-center justify-center">
                    <x-label for="7-judgement-oba">JUDGEMENT</x-label><x-inputText id="7-judgement-oba" wire:model='inputs.check_judgement' wire:focusout="dispatchMe('check_judgement')" :inputStatus="$inputStatus['check_judgement'] ?? null"></x-inputText>
                </div>
            </div>
            <div class="col-span-1 md:grid-cols-2">
                <div class="col-span-1 flex items-center justify-center">
                    <x-label for="7-obapic">OBA Picture by:</x-label><x-inputText id="7-obapic" wire:model='inputs.oba_picture_by' wire:focusout="dispatchMe('oba_picture_by')" :inputStatus="$inputStatus['oba_picture_by'] ?? null"></x-inputText>
                </div>
            </div>
            <div class="col-span-1 md:grid-cols-2">
                <div class="col-span-1 flex items-center justify-center">
                    <x-label for="7-judgement-obapic">JUDGEMENT</x-label><x-inputText id="7-judgement-obapic" wire:model='inputs.picture_judgement' wire:focusout="dispatchMe('picture_judgement')" :inputStatus="$inputStatus['picture_judgement'] ?? null"></x-inputText>
                </div>
            </div>
        </div>
    </div>
</div>