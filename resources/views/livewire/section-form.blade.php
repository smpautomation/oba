<div class="flex items-center justify-center h-screen">
    <div class="bg-gray-100 p-4 rounded-3xl w-full max-w-96">
        <form wire:submit.prevent='save'>
            <div class="bg-gray-50 m-1 p-2 rounded-xl">
                <div class="mb-6">
                    <label for="section" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Section</label>
                    <select wire:model='selectedSection' id="section" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose a section</option>
                        @foreach ($sections as $section)
                            <option value="{{ $section->section }}">{{ $section->section }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-6">
                    <label for="model" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Model</label>
                    <select wire:model='selectedModel' id="section" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose a model</option>
                        @foreach ($models as $model)
                            <option value="{{ $model->model_name }}">{{ $model->model_name }}</option>
                        @endforeach
                    </select>
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="bg-gray-100 m-1 p-2 rounded-xl">
                <button type="submit" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 w-full">Start</button>
            </div>
        </form>
    </div>
</div>




