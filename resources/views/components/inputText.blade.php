@props(['inputStatus' => null])
@props(['marginleft' => ""])
@props(['closingStatus' => ''])
@php
    $borderClass = match($inputStatus) {
        'success' => 'border-green-500',
        'error' => 'border-yellow-500',
        default => 'border-gray-300',
    };
    $status = '';
    if($closingStatus == "Closed"){
        $status = 'disabled';
    }
@endphp

<input 
    {{ 
        $attributes->merge([
            'class' => 'bg-white text-gray-900 text-sm rounded-lg block w-full p-2.5 ' . $borderClass . ' ' . $marginleft
        ]) 
    }} 
    type="text"
    {{ $status }}
/>
