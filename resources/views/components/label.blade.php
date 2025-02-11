@props(['semibold' => false])

<label {{ $attributes }} class="{{ $semibold ? 'font-semibold' : 'text-sm font-medium  ' }} dark:text-white text-gray-900 block mb-2">{{ $slot }}</label>
