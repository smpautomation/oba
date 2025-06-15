@props(['ml' => false])
@props(['inputStatus' => null])
@php
    $borderClass = match($inputStatus) {
        'success' => 'border-green-500 ring-2 ring-green-200',
        'error' => 'border-yellow-500 ring-2 ring-yellow-200',
        default => 'border-gray-300',
    };
@endphp
<div class="flex items-center justify-center">
    <input 
        {{ $attributes }}
        type="checkbox" 
        class="transition-colors duration-300 ease-in-out {{ $ml ? 'ml-3' : '' }} {{ $borderClass }} w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
</div>
