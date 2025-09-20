@props(['inputStatus' => null])
@props(['marginleft' => ""])
@props(['closingStatus' => ''])
@props(['class' => ''])
@php
    $borderClass = match($inputStatus) {
        'success' => 'border-green-500 ring-4 ring-green-400',
        'error' => 'border-yellow-500 ring-4 ring-yellow-400',
        default => 'border-gray-300',
    };
    $status = '';
    if($closingStatus == "Closed"){
        $status = 'disabled';
    }

    // Merge additional classes with existing ones
    $finalClasses = trim("text-gray-900 text-sm rounded-lg block w-full p-2.5 $borderClass $class ");
@endphp

<input
    {{ $attributes->except('class') }}
    type="text"
    class="{{ $finalClasses }}"
    {{ $status }}
    autocomplete="off" spellcheck="false"
/>
