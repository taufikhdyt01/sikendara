@props([
    'created_at' => '',
])

<a href="{{ route('bookings.index') }}"
    class="flex px-4 py-3 border-b hover:bg-gray-100 dark:hover:bg-gray-600 dark:border-gray-600">
    <div class="w-full pl-3">
        <div class="text-gray-500 font-normal text-sm mb-1.5 dark:text-gray-400">
            {{ $slot }}
        </div>
        <div class="text-xs font-medium text-primary-700 dark:text-primary-400">{{ $created_at }}</div>
    </div>
</a>
