<aside id="sidebar"
    class="fixed top-0 left-0 z-20 flex flex-col flex-shrink-0 hidden w-64 h-full pt-16 font-normal duration-75 lg:flex transition-width"
    aria-label="Sidebar">
    <div
        class="relative flex flex-col flex-1 min-h-0 pt-0 bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="flex flex-col flex-1 pt-5 pb-4 overflow-y-auto">
            <div class="flex-1 px-3 space-y-1 bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                <ul class="pb-2 space-y-2">
                    {{-- search --}}
                    <li>
                        <x-sidebar.mobile-search-form />
                    </li>

                    {{-- dashboard --}}
                    <li>
                        <x-sidebar.item class="items-start">
                            <x-s-v-g-s.dashboard class="w-6 h-6" />
                        </x-sidebar.item>
                    </li>

                    {{-- manajemen kendaraan --}}
                    <li>
                        <x-sidebar.item path="{{ route('vehicles.index') }}" content="Manajemen Kendaraan">
                            <x-s-v-g-s.vehicles
                                class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" />
                        </x-sidebar.item>
                    </li>

                    {{-- manajemen driver --}}
                    <li>
                        <x-sidebar.item path="{{ route('drivers.index') }}" content="Manajemen Driver">
                            <x-s-v-g-s.driver
                                class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" />
                        </x-sidebar.item>
                    </li>

                    {{-- Pemesanan Kendaraan --}}
                    <li>
                        <x-sidebar.item path="{{ route('booking.index') }}" content="Pemesanan Kendaraan">
                            <x-s-v-g-s.bookings
                                class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" />
                        </x-sidebar.item>
                    </li>

                    {{-- Laporan Konsumsi BBM --}}
                    <li>
                        <x-sidebar.item path="{{ route('fuel-consumptions.index') }}" content="Laporan Konsumsi BBM">
                            <x-s-v-g-s.fuel-2
                                class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" />
                        </x-sidebar.item>
                    </li>

                    {{-- Laporan Service --}}
                    <li>
                        <x-sidebar.item path="{{ route('services.index') }}" content="Laporan Service">
                            <x-s-v-g-s.services-2
                                class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" />
                        </x-sidebar.item>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</aside>
