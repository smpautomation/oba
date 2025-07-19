<div class="bg-slate-200">
    
    <form wire:submit='save' @if($checklistInfo->status == "Closed") "disabled" @endif>
        
        <div class="flex gap-4 align-content-center justify-center max-w-6xl mx-auto px-4 mt-6 bg-white rounded-xl pt-4">
            <div class="section-container glass-effect flex-1">
                <div class="status-indicator"></div>
                <div class="section-label">Checklist ID</div>
                <div class="section-value">{{ $model_id }}</div>
                <svg class="section-icon" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2L2 7V10C2 16 6 20.9 12 22C18 20.9 22 16 22 10V7L12 2Z"/>
                </svg>
            </div>
            <div class="section-container glass-effect flex-1">
                <div class="status-indicator"></div>
                <div class="section-label">Current Section</div>
                <div class="section-value">{{ $checklistInfo->section }}</div>
                <svg class="section-icon" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2L2 7V10C2 16 6 20.9 12 22C18 20.9 22 16 22 10V7L12 2Z"/>
                </svg>
            </div> 
        </div>
        <livewire:preparation-checklist :checklist_id="$model_id" :scanned_qr_code="$scanned_qr_pc"></livewire:preparation-checklist>
        <livewire:o-b-a-kit-checklist :checklist_id="$model_id"></livewire:o-b-a-kit-checklist>
        <livewire:shipment-information :checklist_id="$model_id"></livewire:shipment-information>
        <livewire:check-items :checklist_id="$model_id"></livewire:check-items>
        <livewire:similarities-checking :checklist_id="$model_id"></livewire:similarities-checking>
        <livewire:check-overall :checklist_id="$model_id"></livewire:check-overall>
        <livewire:personnel :checklist_id="$model_id"></livewire:personnel>
        <livewire:photo-documentation :checklist_id="$model_id"></livewire:photo-documentation>
        <livewire:additional-documentation :checklist_id="$model_id"></livewire:additional-documentation>
        <div class="container-bg p-6 rounded-2xl shadow-lg flex items-center justify-center">
            <button type="submit" class="save-button px-8 py-4 rounded-xl text-white flex items-center space-x-3 font-medium text-lg focus:outline-none focus:ring-4 focus:ring-purple-300 focus:ring-opacity-50">
                <svg class="button-icon w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <span class="button-text">Finish Audit</span>
            </button>
        </div>
    </form>
</div>
