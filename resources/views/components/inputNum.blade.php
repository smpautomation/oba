@props(['inputStatus' => null])
@php
    $borderClass = match($inputStatus) {
        'success' => 'border-green-500',
        'error' => 'border-yellow-500',
        default => 'border-gray-300',
    };
@endphp

<input 
    {{ $attributes }} 
    type="number" placeholder="00000000" class = "bg-white text-gray-900 text-sm rounded-lg block w-full p-2.5 ml-8 {{ $borderClass }}"
/>
