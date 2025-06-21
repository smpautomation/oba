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
                        <x-checkbox id="oneprep2column1" value="1" wire:model="inputs.oneprep2column" wire:focusout="dispatchMe('oneprep2column')" :inputStatus="$inputStatus['oneprep2column']"></x-checkbox>
                    </td>
                    <td class="w-4 p-4">
                        <x-checkbox id="1-prep-3column" value="1" wire:model="inputs.oneprep3column" wire:focusout="dispatchMe('oneprep3column')" :inputStatus="$inputStatus['oneprep3column']"></x-checkbox>
                    </td>
                    <td class="w-4 p-4">
                        <x-checkbox id="1-prep-4column" value="1" wire:model="inputs.oneprep4column" wire:focusout="dispatchMe('oneprep4column')" :inputStatus="$inputStatus['oneprep4column']"></x-checkbox>
                    </td>
                    <td class="w-4 p-4">
                        <x-checkbox id="1-prep-5column" value="1" wire:model="inputs.oneprep5column" wire:focusout="dispatchMe('oneprep5column')" :inputStatus="$inputStatus['oneprep5column']"></x-checkbox>
                    </td>
                    <td class="w-4 p-4">
                        <x-checkbox id="1-prep-6column" value="1" wire:model="inputs.oneprep6column" wire:focusout="dispatchMe('oneprep6column')" :inputStatus="$inputStatus['oneprep6column']"></x-checkbox>
                    </td>
                    <td class="w-4 p-4">
                        <x-checkbox id="1-prep-7column" value="1" wire:model="inputs.oneprep7column" wire:focusout="dispatchMe('oneprep7column')" :inputStatus="$inputStatus['oneprep7column']"></x-checkbox>
                    </td>
                    <td class="w-4 p-4">
                        <x-checkbox id="1-prep-8column" value="1" wire:model="inputs.oneprep8column" wire:focusout="dispatchMe('oneprep8column')" :inputStatus="$inputStatus['oneprep8column']"></x-checkbox>
                    </td>
                    <td class="w-4 p-4">
                        <x-checkbox id="1-prep-9column" value="1" wire:model="inputs.oneprep9column" wire:focusout="dispatchMe('oneprep9column')" :inputStatus="$inputStatus['oneprep9column']"></x-checkbox>
                    </td>
                    <td class="w-4 p-4">
                        <x-checkbox id="1-prep-10column" value="1" wire:model="inputs.oneprep10column" wire:focusout="dispatchMe('oneprep10column')" :inputStatus="$inputStatus['oneprep10column']"></x-checkbox>
                    </td>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <strong>REMARKS</strong>
                    </th>
                    <td class="w-4 p-4">
                        <x-inputText id="1-prep-1remarks" wire:model="inputs.oneprep2remarks" wire:focusout="dispatchMe('oneprep2remarks')" :inputStatus="$inputStatus['oneprep2remarks']"></x-inputText>
                    </td>
                    <td class="w-4 p-4">
                        <x-inputText id="1-prep-2remarks" wire:model="inputs.oneprep3remarks" wire:focusout="dispatchMe('oneprep3remarks')" :inputStatus="$inputStatus['oneprep3remarks']"></x-inputText>
                    </td>
                    <td class="w-4 p-4">
                        <x-inputText id="1-prep-3remarks" wire:model="inputs.oneprep4remarks" wire:focusout="dispatchMe('oneprep4remarks')" :inputStatus="$inputStatus['oneprep4remarks']"></x-inputText>
                    </td>
                    <td class="w-4 p-4">
                        <x-inputText id="1-prep-4remarks" wire:model="inputs.oneprep5remarks" wire:focusout="dispatchMe('oneprep5remarks')" :inputStatus="$inputStatus['oneprep5remarks']"></x-inputText>
                    </td>
                    <td class="w-4 p-4">
                        <x-inputText id="1-prep-5remarks" wire:model="inputs.oneprep6remarks" wire:focusout="dispatchMe('oneprep6remarks')" :inputStatus="$inputStatus['oneprep6remarks']"></x-inputText>
                    </td>
                    <td class="w-4 p-4">
                        <x-inputText id="1-prep-6remarks" wire:model="inputs.oneprep7remarks" wire:focusout="dispatchMe('oneprep7remarks')" :inputStatus="$inputStatus['oneprep7remarks']"></x-inputText>
                    </td>
                    <td class="w-4 p-4">
                        <x-inputText id="1-prep-7remarks" wire:model="inputs.oneprep8remarks" wire:focusout="dispatchMe('oneprep8remarks')" :inputStatus="$inputStatus['oneprep8remarks']"></x-inputText>
                    </td>
                    <td class="w-4 p-4">
                        <x-inputText id="1-prep-8remarks" wire:model="inputs.oneprep9remarks" wire:focusout="dispatchMe('oneprep9remarks')" :inputStatus="$inputStatus['oneprep9remarks']"></x-inputText>
                    </td>
                    <td class="w-4 p-4">
                        <x-inputText id="1-prep-9remarks" wire:model="inputs.oneprep10remarks" wire:focusout="dispatchMe('oneprep10remarks')" :inputStatus="$inputStatus['oneprep10remarks']"></x-inputText>
                    </td>
                </tr>
            </tbody>
        </table>
        {{-- Auto-upload photo component template --}}
        <div class="space-y-4 p-6 ml-10">
            <div class="text-center">
                <label class="block">
                    <span class="text-gray-700">Take a photo or choose from gallery</span>
                    <input
                        type="file"
                        accept="image/*"
                        capture="environment"
                        wire:model="photo"
                        class="mt-1 block w-full"
                    />
                </label>
            </div>
            
            {{-- Loading states --}}
            <div wire:loading wire:target="photo" class="text-sm text-blue-500">
                Processing photo...
            </div>
            
            <div wire:loading wire:target="processUpload" class="text-sm text-green-500">
                Uploading photo...
            </div>
            
            {{-- Error display --}}
            @error('photo')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
            
            {{-- Success/Error messages --}}
            @if (session()->has('message'))
                <div class="mt-3 p-2 rounded bg-green-50 text-green-600">
                    {{ session('message') }}
                </div>
            @endif
            
            {{-- Show uploaded photos if any --}}
            @if (!empty($uploadedPhotos))
                <div class="mt-4">
                    <h4 class="text-sm font-medium text-gray-700 mb-2">Uploaded Photos ({{ count($uploadedPhotos) }}):</h4>
                    <div class="space-y-2 max-h-64 overflow-y-auto">
                        @foreach($uploadedPhotos as $index => $photoData)
                            <div class="flex items-center justify-between p-2 border rounded-lg hover:bg-gray-50 transition-colors">
                                <div class="flex-1">
                                    <button 
                                        wire:click="showPhoto('{{ $photoData['path'] }}')"
                                        class="flex-1 text-left text-blue-600 hover:text-blue-800 font-medium block w-full"
                                    >
                                        {{ $photoData['name'] }}
                                    </button>
                                    <p class="text-xs text-gray-500 mt-1">{{ $photoData['uploaded_at'] }}</p>
                                </div>
                                <button 
                                    wire:click="removePhoto({{ $index }})"
                                    class="ml-3 bg-red-500 hover:bg-red-600 text-white rounded-full w-7 h-7 text-sm flex items-center justify-center transition-colors"
                                    title="Remove photo"
                                    onclick="return confirm('Are you sure you want to delete this photo?')"
                                >
                                    🗑️
                                </button>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            @if($showModal)
                <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50" wire:click="closeModal">
                    <div class="bg-white rounded-lg max-w-4xl max-h-screen overflow-hidden" wire:click.stop>
                        {{-- Modal Header --}}
                        <div class="flex items-center justify-between p-4 border-b">
                            <h3 class="text-lg font-medium text-gray-900">{{ $selectedPhotoName }}</h3>
                            <button 
                                wire:click="closeModal"
                                class="text-gray-400 hover:text-gray-600 text-2xl"
                            >
                                ×
                            </button>
                        </div>
                        
                        {{-- Modal Body --}}
                        <div class="p-4">
                            <img 
                                src="{{ $selectedPhotoUrl }}" 
                                alt="{{ $selectedPhotoName }}"
                                class="max-w-full max-h-96 mx-auto object-contain"
                            />
                        </div>
                        
                        {{-- Modal Footer --}}
                        <div class="flex justify-end p-4 border-t space-x-2">
                            <button 
                                wire:click="closeModal"
                                class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded"
                            >
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
