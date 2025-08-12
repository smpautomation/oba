@props([
    'inputStatus' => null,
    'marginleft' => '',
    'closingStatus' => '',
    'class' => '',
    'options' => [],
    'placeholder' => 'Select an option...',
    'emptyOption' => true,
    'emptyOptionText' => '',
])

@php
    $borderClass = match($inputStatus) {
        'success' => 'border-green-500 ring-4 ring-green-400',
        'error' => 'border-yellow-500 ring-4 ring-yellow-400',
        default => 'border-gray-300',
    };

    $isDisabled = $closingStatus === 'Closed';
    $finalClasses = trim("text-gray-900 text-sm rounded-lg block w-full p-2.5 $borderClass $class");
@endphp

<select
    {{ $attributes->except(['class', 'options', 'placeholder', 'emptyOption', 'emptyOptionText']) }}
    class="{{ $finalClasses }}"
    @disabled($isDisabled)
>
    @if($emptyOption)
        <option value="">{{ $emptyOptionText ?: $placeholder }}</option>
    @endif

    @if(!empty($options))
        @foreach($options as $value => $label)
            <option value="{{ $value }}">{{ $label }}</option>
        @endforeach
    @else
        {{ $slot }}
    @endif
</select>
