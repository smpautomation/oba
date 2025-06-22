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
        class="custom-checkbox {{ $ml ? 'ml-3' : '' }} {{ $borderClass }} ">
</div>
