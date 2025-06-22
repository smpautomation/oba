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
        <livewire:personnel :checklist_id="$model_id"></livewire:personnel>
        <livewire:photo-documentation :checklist_id="$model_id"></livewire:photo-documentation>
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
