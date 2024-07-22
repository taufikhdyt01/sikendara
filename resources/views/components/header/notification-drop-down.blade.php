<div class="z-20 z-50 hidden max-w-sm my-4 overflow-hidden text-base list-none bg-white divide-y divide-gray-100 rounded shadow-lg dark:divide-gray-600 dark:bg-gray-700"
    id="notification-dropdown">
    <div
        class="block px-4 py-2 text-base font-medium text-center text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        Notifikasi
    </div>
    <div>
        @forelse ($notifications as $notification)
            <x-header.notification-drop-down-items created_at="{{ $notification->created_at }}">
                <x-slot:svgs>
                    <div
                        class="absolute flex items-center justify-center w-5 h-5 ml-6 -mt-5 border border-white rounded-full bg-primary-700">
                        <x-s-v-g-s.messages class="w-3 h-3 text-white" />
                    </div>
                </x-slot:svgs>
                <p>{{ $notification->message }}</p>
            </x-header.notification-drop-down-items>
        @empty
            <p class="px-4 py-2 text-center text-gray-500">Tidak ada notifikasi</p>
        @endforelse
    </div>
</div>
