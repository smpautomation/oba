@props(['ml' => false])

<div class="flex items-center justify-center">
    <input {{ $attributes }} type="checkbox" class="{{ $ml ? 'ml-3' : '' }}w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
</div>
