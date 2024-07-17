<div id="view-fuel-consumption-1" tabindex="-1"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-4xl max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Konsumsi BBM
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="view-fuel-consumption-1">
                    <x-s-v-g-s.close2></x-s-v-g-s.close2>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4">
                <ul class="divide-y divide-gray-200">
                    <!-- Contoh item list, sesuaikan dengan data Anda -->
                    <li class="py-2 flex">
                        <span class="mr-4 text-gray-500 dark:text-gray-400">1.</span>
                        <div class="flex-grow">
                            <h4 class="text-lg font-medium text-gray-900 dark:text-white">Pertamax Turbo</h4>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Tanggal Pengisian: 2024-07-17</p>
                        </div>
                        <div class="flex items-center">
                            <p class="text-lg font-semibold text-blue-600">10 L</p>
                        </div>
                    </li>
                    <!-- Item list lainnya -->
                    <li class="py-2 flex">
                        <span class="mr-4 text-gray-500 dark:text-gray-400">2.</span>
                        <div class="flex-grow">
                            <h4 class="text-lg font-medium text-gray-900 dark:text-white">Premium</h4>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Tanggal Pengisian: 2024-07-16</p>
                        </div>
                        <div class="flex items-center">
                            <p class="text-lg font-semibold text-blue-600">15 L</p>
                        </div>
                    </li>
                    <!-- Dan seterusnya sesuai kebutuhan -->
                </ul>
            </div>
        </div>
    </div>
</div>
