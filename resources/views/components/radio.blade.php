@props(['inputStatus' => null])
@props(['closingStatus' => ''])
@php
    $borderClass = match($inputStatus) {
        'success' => 'border-2 border-green-500 ring-4 ring-green-400',
        'error' => 'border-2 border-yellow-500 ring-4 ring-yellow-400',
        default => 'border-gray-300',
    };
    $status = '';
    if($closingStatus == "Closed"){
        $status = 'disabled';
    }
    $class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2";
    $finalClasses = trim("$borderClass $class");
@endphp
<div>
    <input
        {{ $attributes }}
        type="radio"
        class="{{ $finalClasses }}"
        {{ $status }}>
</div>1
