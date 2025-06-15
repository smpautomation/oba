<div>
    <form wire:submit='save'>
        <div class="flex">
            <label for="section" class='mr-2'>Section:</label>
            <h5><u>&nbsp;&nbsp;{{ $checklistInfo->section }}&nbsp;&nbsp;</u></h5>
        </div>
        <livewire:preparation-checklist :checklist_id="$model_id"></livewire:preparation-checklist>
        <livewire:o-b-a-kit-checklist :checklist_id="$model_id"></livewire:o-b-a-kit-checklist>
        <livewire:shipment-information :checklist_id="$model_id"></livewire:shipment-information>
        <livewire:check-items :checklist_id="$model_id"></livewire:check-items>
        <livewire:similarities-checking :checklist_id="$model_id"></livewire:similarities-checking>
        <livewire:check-overall :checklist_id="$model_id"></livewire:check-overall>
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
                            <x-label for="7-shippingpic">Shipping PIC</x-label><x-inputText id="7-shippingpic"></x-inputText>
                        </div>
                    </div>
                    <div class="col-span-1 md:grid-cols-2">
                        <div class="col-span-1 flex items-center justify-center">
                            <x-label for="7-date">Date:</x-label><input type="date" id="7-date" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ml-8" />
                        </div>
                    </div>
                    <div class="col-span-1 md:grid-cols-2">
                        <div class="col-span-1 flex items-center justify-center">
                            <x-label for="7-oba">OBA Checked by:</x-label><x-inputText id="7-oba"></x-inputText>
                        </div>
                    </div>
                    <div class="col-span-1 md:grid-cols-2">
                        <div class="col-span-1 flex items-center justify-center">
                            <x-label for="7-judgement-oba">JUDGEMENT</x-label><x-inputText id="7-judgement-oba"></x-inputText>
                        </div>
                    </div>
                    <div class="col-span-1 md:grid-cols-2">
                        <div class="col-span-1 flex items-center justify-center">
                            <x-label for="7-obapic">OBA Picture by:</x-label><x-inputText id="7-obapic"></x-inputText>
                        </div>
                    </div>
                    <div class="col-span-1 md:grid-cols-2">
                        <div class="col-span-1 flex items-center justify-center">
                            <x-label for="7-judgement-obapic">JUDGEMENT</x-label><x-inputText id="7-judgement-obapic"></x-inputText>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-4 m-2 rounded-xl shadow=sm bg-slate-50 flex items-center justify-center">
            <button type="submit">
                <a class="fancy">
                    <span class="top-key"></span>
                    <span class="text">SAVE</span>
                    <span class="bottom-key-1"></span>
                    <span class="bottom-key-2"></span>
                </a>
            </button>
        </div>
    </form>
</div>
