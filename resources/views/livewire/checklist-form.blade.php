<div class="bg-slate-200">
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
        <livewire:personnel :checklist_id="$model_id"></livewire:personnel>
        <livewire:photo-documentation :checklist_id="$model_id"></livewire:photo-documentation>
        <div class="container-bg p-6 rounded-2xl shadow-lg flex items-center justify-center">
            <button type="submit" class="save-button px-8 py-4 rounded-xl text-white flex items-center space-x-3 font-medium text-lg focus:outline-none focus:ring-4 focus:ring-purple-300 focus:ring-opacity-50">
                <svg class="button-icon w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <span class="button-text">SAVE CHANGES</span>
            </button>
        </div>
    </form>
</div>
