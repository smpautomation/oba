@props(['ml' => false])
@props(['inputStatus' => null])
@props(['closingStatus' => ''])
@php
    $borderClass = match($inputStatus) {
        'success' => 'border-2 border-green-500 ring-4 ring-green-400',
        'error' => 'border-2 border-yellow-500 ring-4 ring-yellow-400',
        default => '',
    };
    $status = '';
    if($closingStatus == "Closed"){
        $status = 'disabled';
    }
    $class="touch-checkbox rounded border-2 text-blue-600 focus:ring-blue-500";
    $finalClasses = trim("$borderClass $class")
@endphp
<div class="flex items-center justify-center">
    <input
        {{ $attributes }}
        type="checkbox"
        class="{{ $finalClasses }}"
        {{ $status }}
        autocomplete="off" spellcheck="false">
</div>
