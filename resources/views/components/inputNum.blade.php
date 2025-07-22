@props(['inputStatus' => null])
@props(['closingStatus' => ''])
@props(['class' => ''])
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
    
    // Merge additional classes with existing ones
    $finalClasses = trim("text-gray-900 text-sm rounded-lg block w-full p-2.5 ml-8 $borderClass $class");
@endphp

<input 
    {{ $attributes->except('class') }}
    type="number" 
    placeholder="00000000" 
    class="{{ $finalClasses }}"
    {{ $status }}
/>
