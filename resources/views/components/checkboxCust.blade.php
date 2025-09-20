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
@endphp
<div>
    <input
        {{ $attributes->except('class') }}
        type="checkbox"
        class="custom-checkbox {{ $borderClass }} "
        {{ $status }}
        autocomplete="off" spellcheck="false">
</div>
