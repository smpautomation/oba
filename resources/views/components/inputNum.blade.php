@props(['inputStatus' => null])
@props(['bgStatus' => null])
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
    $backgroundClass = match($bgStatus){
        'success' => 'bg-green-200',
        'error' => 'bg-red-200',
        default => 'bg-white',
    };
@endphp

<input 
    {{ $attributes }} 
    type="number" placeholder="00000000" class = "{{ $backgroundClass }} text-gray-900 text-sm rounded-lg block w-full p-2.5 ml-8 {{ $borderClass }}"
    {{ $status }}
/>
