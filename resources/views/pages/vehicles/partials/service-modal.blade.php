<div id="view-service-schedule-1" tabindex="-1"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-4xl max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Jadwal Service
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="view-service-schedule-1">
                    <x-s-v-g-s.close-2></x-s-v-g-s.close-2>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4">
                <ul class="divide-y divide-gray-200">
                    <!-- Contoh item list, sesuaikan dengan data Anda -->
                    <li class="py-2">
                        <div class="flex justify-between">
                            <div class="flex-grow">
                                <h4 class="text-lg font-medium text-gray-900 dark:text-white">Service ke-1</h4>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Waktu Service: 2024-07-01</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Keterangan: Penggantian oli mesin
                                </p>
                            </div>
                        </div>
                    </li>
                    <!-- Item list lainnya -->
                    <li class="py-2">
                        <div class="flex justify-between">
                            <div class="flex-grow">
                                <h4 class="text-lg font-medium text-gray-900 dark:text-white">Service ke-2</h4>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Waktu Service: 2024-06-01</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Keterangan: Penggantian filter udara
                                </p>
                            </div>
                        </div>
                    </li>
                    <!-- Item list lainnya -->
                    <li class="py-2">
                        <div class="flex justify-between">
                            <div class="flex-grow">
                                <h4 class="text-lg font-medium text-gray-900 dark:text-white">Service ke-3</h4>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Waktu Service: 2024-05-01</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Keterangan: Pengecekan rem</p>
                            </div>
                        </div>
                    </li>
                    <!-- Jadwal service yang akan datang -->
                    <li class="py-2 bg-blue-600">
                        <div class="flex justify-between">
                            <div class="flex-grow">
                                <h4 class="text-lg font-medium text-white pt-1 pl-3">Service yang
                                    akan
                                    datang
                                </h4>
                                <p class="text-sm text-white pl-3 pb-1">Waktu Service: 2024-08-01
                                </p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
