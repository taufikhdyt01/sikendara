<div id="view-usage-history-{{ $vehicle->id }}" tabindex="-1"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-4xl max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Riwayat Pemakaian Kendaraan
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="view-usage-history-{{ $vehicle->id }}">
                    <x-s-v-g-s.close-2></x-s-v-g-s.close-2>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4">
                <ul class="divide-y divide-gray-200">
                    @forelse ($vehicle->approvedBookings as $booking)
                        <li class="py-2 flex">
                            <span class="mr-4 text-gray-500 dark:text-gray-400">{{ $loop->iteration }}.</span>
                            <div class="flex-grow">
                                <h4 class="text-lg font-medium text-gray-900 dark:text-white">{{ $booking->start_date }}
                                    - {{ $booking->end_date }}</h4>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Lokasi Tambang:
                                    {{ $booking->mine->name }} - {{ $booking->mine->region }}</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Driver: {{ $booking->driver->name }}
                                </p>
                            </div>
                        </li>
                    @empty
                        <li class="py-2">
                            <div class="flex justify-between">
                                <div class="flex-grow">
                                    <h4 class="text-lg font-medium text-gray-900 dark:text-white">Belum ada riwayat
                                        pemakaian kendaraan
                                    </h4>
                                </div>
                            </div>
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>
