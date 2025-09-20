@props(['btnID' => ""])
@props(['closingStatus' => ''])
@props(['inputStatus' => null])
@php
$status = '';
    if($closingStatus == "Closed"){
        $status = 'disabled';
    }
    $borderClass = match($inputStatus) {
        'success' => 'border-green-500 ring-4 ring-green-400',
        'error' => 'border-yellow-500 ring-4 ring-yellow-400',
        default => 'border-gray-300',
    };

    $class = "bg-gray-50 border-x-0 border-gray-300 h-11 font-medium text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full pb-6 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 rounded-sm";
    $finalClasses = trim("$borderClass $class");
@endphp
<div class="relative flex items-center">

    <input
        {{ $attributes->except('class') }}
        class="{{ $finalClasses }}"
        type="number"
        aria-describedby="helper-text-explanation"
        placeholder="0"
        min='0'
        required
        {{ $status }}
        autocomplete="off" spellcheck="false"
        />
    <div class="absolute bottom-1 start-1/2 -translate-x-1/2 rtl:translate-x-1/2 flex items-center text-xs text-gray-400 space-x-1 rtl:space-x-reverse">
        <span>{{ $slot }}</span>
    </div>
</div>
