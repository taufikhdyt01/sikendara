<div id="add-fuel-modal" tabindex="-1"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-4xl max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Buat Laporan Konsumsi BBM
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="add-fuel-modal">
                    <x-s-v-g-s.close-2></x-s-v-g-s.close-2>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <form action="{{ route('fuel-consumptions.store') }}" method="POST">
                @csrf
                <div class="p-6 space-y-6 max-h-[75vh] overflow-y-auto">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="vehicle_id"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kendaraan</label>
                            <select name="vehicle_id" id="vehicle_id" required
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                <option value="">Pilih Kendaraan</option>
                                @foreach ($vehicles as $vehicle)
                                    <option value="{{ $vehicle->id }}">{{ $vehicle->brand }} {{ $vehicle->model }}
                                        ({{ $vehicle->number_plate }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="fuel_type"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jenis BBM</label>
                            <select name="fuel_type" id="fuel_type" required
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                <option value="">Pilih Jenis BBM</option>
                                <option value="Pertamax">Pertamax Turbo</option>
                                <option value="Pertamax">Pertamax</option>
                                <option value="Pertalite">Pertalite</option>
                                <option value="Premium">Premium</option>
                                <option value="Dex">Dex</option>
                                <option value="Dexlite">Dexlite</option>
                                <option value="Solar">Solar</option>
                            </select>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="date"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal
                                Pengisian</label>
                            <input type="date" name="date" id="date" required
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="liters"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Banyak
                                (Liter)</label>
                            <input type="number" name="liters" id="liters" required
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                        </div>
                    </div>
                </div>
                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button type="submit"
                        class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Simpan</button>
                    <button type="button" data-modal-hide="add-fuel-modal"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
