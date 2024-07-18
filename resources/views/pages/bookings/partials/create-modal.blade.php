<div id="create-reservation-modal" tabindex="-1"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-4xl max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Buat Pemesanan Kendaraan
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="create-reservation-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <form action="{{ route('bookings.store') }}" method="POST">
                @csrf
                <div class="p-6 space-y-6 max-h-[75vh] overflow-y-auto">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="vehicle"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kendaraan</label>
                            <select name="vehicle" id="vehicle" required
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                <option value="">Pilih Kendaraan</option>
                                @foreach ($vehicles as $vehicle)
                                    @if ($vehicle->status === 'available')
                                        <option value="{{ $vehicle->id }}">{{ $vehicle->brand }} {{ $vehicle->model }}
                                            ({{ $vehicle->number_plate }})
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="driver"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Driver</label>
                            <select name="driver" id="driver" required
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                <option value="">Pilih Driver</option>
                                @foreach ($drivers as $driver)
                                    @if ($driver->status === 'available')
                                        <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="location"
                                class="block text-sWm font-medium text-gray-700 dark:text-gray-300">Lokasi
                                Tambang</label>
                            <select name="mine" id="location" required
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                <option value="">Pilih Lokasi Tambang</option>
                                @foreach ($mines as $mine)
                                    <option value="{{ $mine->id }}">{{ $mine->name }} - {{ $mine->region }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="start_date"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Mulai Tanggal
                                Penggunaan</label>
                            <input type="date" name="start_date" id="start_date" required
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="end_date"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Akhir Tanggal
                                Penggunaan</label>
                            <input type="date" name="end_date" id="end_date" required
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                        </div>
                        <div class="col-span-6">
                            <label for="approvers"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pengajuan
                                Persetujuan</label>
                            <div class="mt-2 space-y-2">
                                @foreach ($approvers as $approver)
                                    <div class="flex items-start">
                                        <input id="approver{{ $loop->iteration }}" name="approvers[]" type="checkbox"
                                            value="{{ $approver->id }}"
                                            class="w-4 h-4 text-primary-600 border-gray-300 rounded focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="approver{{ $loop->iteration }}"
                                            class="ml-2 text-sm font-medium text-gray-700 dark:text-gray-300">{{ $approver->name }}
                                            ({{ $approver->position }} {{ $approver->office->name }})
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button type="submit"
                        class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Simpan</button>
                    <button type="button" data-modal-hide="create-reservation-modal"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
