<x-app-layout>
    @section('content')
        <div
            class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
            <div class="w-full mb-1">
                <div class="mb-4">
                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Manajemen Kendaraan
                    </h1>
                </div>
                <div class="items-center justify-between block sm:flex md:divide-x md:divide-gray-100 dark:divide-gray-700">
                    <div class="flex items-center mb-4 sm:mb-0">
                        <form class="sm:pr-3" action="{{ route('vehicles.index') }}" method="GET">
                            <label for="vehicles-search" class="sr-only">Cari</label>
                            <div class="relative w-48 mt-1 sm:w-64 xl:w-96">
                                <input type="text" name="search" id="vehicles-search"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Cari Kendaraan" value="{{ request('search') }}">
                            </div>
                        </form>
                    </div>
                    @if (auth()->user()->role === 'admin')
                        <button type="button" data-modal-target="add-vehicle-modal" data-modal-toggle="add-vehicle-modal"
                            class="inline-flex items-center justify-center w-1/2 px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 sm:w-auto dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            <x-s-v-g-s.plus></x-s-v-g-s.plus>
                            Tambah Kendaraan
                        </button>
                    @endif
                </div>
            </div>
        </div>
        <div class="flex flex-col">
            <div class="overflow-x-auto">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden shadow">
                        <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
                            <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr>
                                    <th scope="col"
                                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                        No.
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                        Jenis
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                        Tipe
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                        Milik
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                        Status
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                @forelse($vehicles as $vehicle)
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <td
                                            class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $loop->iteration }}.
                                        </td>
                                        <td class="flex items-center p-4 mr-12 space-x-6 whitespace-nowrap">
                                            <div class="text-sm font-normal text-gray-500 dark:text-gray-400">
                                                <div class="text-base font-semibold text-gray-900 dark:text-white">
                                                    {{ $vehicle->brand }} {{ $vehicle->model }}
                                                </div>
                                                <div class="text-sm font-normal text-gray-500 dark:text-gray-400">
                                                    {{ $vehicle->number_plate }}</div>
                                            </div>
                                        </td>
                                        <td
                                            class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            @if ($vehicle->type === 'passenger')
                                                Angkutan Orang
                                            @elseif ($vehicle->type === 'freight')
                                                Angkutan Barang
                                            @endif
                                        </td>
                                        <td
                                            class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            @if ($vehicle->owned_by === 'company')
                                                Perusahaan
                                            @elseif ($vehicle->owned_by === 'rental')
                                                Sewa
                                            @endif
                                        </td>
                                        <td
                                            class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            @if ($vehicle->status === 'available')
                                                <span
                                                    class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-green-400 border border-green-100 dark:border-green-500">Tersedia</span>
                                            @elseif ($vehicle->status === 'in use')
                                                <span
                                                    class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-red-400 border border-red-100 dark:border-red-500">Sedang
                                                    Dipakai</span>
                                            @elseif ($vehicle->status === 'maintenance')
                                                <span
                                                    class="bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-yellow-400 border border-yellow-100 dark:border-yellow-500">Dalam
                                                    Perbaikan</span>
                                            @endif
                                        </td>
                                        <td class="p-4 space-x-2 whitespace-nowrap">
                                            <button type="button"
                                                data-modal-target="view-fuel-consumption-{{ $vehicle->id }}"
                                                data-modal-toggle="view-fuel-consumption-{{ $vehicle->id }}"
                                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                                <x-s-v-g-s.fuel></x-s-v-g-s.fuel>
                                                Konsumsi BBM
                                            </button>
                                            <button type="button"
                                                data-modal-target="view-service-schedule-{{ $vehicle->id }}"
                                                data-modal-toggle="view-service-schedule-{{ $vehicle->id }}"
                                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                                <x-s-v-g-s.services></x-s-v-g-s.services>
                                                Jadwal Service
                                            </button>
                                            <button type="button"
                                                data-modal-target="view-usage-history-{{ $vehicle->id }}"
                                                data-modal-toggle="view-usage-history-{{ $vehicle->id }}"
                                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                                <x-s-v-g-s.history></x-s-v-g-s.history>
                                                Riwayat Pemakaian
                                            </button>
                                        </td>
                                    </tr>
                                    @include('pages.vehicles.partials.fuel-modal')
                                    @include('pages.vehicles.partials.service-modal')
                                    @include('pages.vehicles.partials.history-modal')
                                @empty
                                    <tr>
                                        <td colspan="6"
                                            class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                            Tidak ada data kendaraan.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @include('pages.vehicles.partials.create-modal')
    @endsection
</x-app-layout>
