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
        <div class="space-y-4 p-6 ml-10">
            <!-- File input: can open camera OR file picker -->
            <label class="block">
                <span class="text-gray-700">Take a photo or choose from gallery</span>
                <input 
                    type="file"
                    accept="image/*"
                    multiple
                    capture="environment"
                    wire:model="photos"
                    class="mt-1 block w-full"
                />
            </label>

            @error('photos')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror

            @if ($photos)
                <div class="mt-4 grid grid-cols-2 gap-4">
                    @foreach ($photos as $photo)
                        <div>
                            <img src="{{ $photo->temporaryUrl() }}" class="w-32 h-auto rounded border" />
                        </div>
                    @endforeach
                </div>
            @endif

            <button wire:click="upload" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded"
                >
                Upload All
            </button>

            @if (session()->has('message'))
                <div class="mt-3 text-green-600 font-medium">
                    {{ session('message') }}
                </div>
            @endif

            {{-- <form wire:submit.prevent="save">
                <input type="file" accept="image/*" wire:model="photo" />

                @if ($photo)
                    <img src="{{ $photo->temporaryUrl() }}" class="w-48 h-auto mt-2" />
                    <button type="submit" class="mt-3 px-4 py-2 bg-blue-600 text-white rounded">
                        Upload
                    </button>
                @endif
            </form> --}}
        </div>
        
    </div>
</div>
