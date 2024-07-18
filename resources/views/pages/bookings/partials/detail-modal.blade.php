<div id="view-reservation-details-{{ $booking->id }}" tabindex="-1"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-4xl max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Detail Pengajuan Pemesanan
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="view-reservation-details-{{ $booking->id }}">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4">
                <div class="flex justify-between mb-4">
                    <div class="flex-grow">
                        <h4 class="text-lg font-medium text-gray-900 dark:text-white">Kendaraan:
                            {{ $booking->vehicle->brand }} {{ $booking->vehicle->model }}</h4>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Plat Nomor:
                            {{ $booking->vehicle->number_plate }}</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Tipe: @if ($booking->vehicle->type === 'passenger')
                                Angkutan Orang
                            @elseif ($booking->vehicle->type === 'freight')
                                Angkutan Barang
                            @endif
                        </p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Milik: @if ($booking->vehicle->owned_by === 'company')
                                Perusahaan
                            @elseif ($booking->vehicle->owned_by === 'rental')
                                Sewa
                            @endif
                        </p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Driver: {{ $booking->driver->name }}</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Lokasi Tambang: {{ $booking->mine->name }} -
                            {{ $booking->mine->region }}</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Tanggal Penggunaan:
                            {{ date('d F Y', strtotime($booking->start_date)) }} -
                            {{ date('d F Y', strtotime($booking->end_date)) }}
                        </p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Tanggal Pengajuan:
                            {{ date('d F Y', strtotime($booking->created_at)) }}</p>
                    </div>
                    <div>
                        @if ($booking->status === 'pending')
                            <p class="text-lg font-semibold text-blue-600">Status: Menunggu Persetujuan</p>
                        @elseif ($booking->status === 'approved')
                            <p class="text-lg font-semibold text-green-600">Status: Disetujui</p>
                        @elseif ($booking->status === 'rejected')
                            <p class="text-lg font-semibold text-red-600">Status: Ditolak</p>
                        @endif
                    </div>
                </div>
                <ul class="divide-y divide-gray-200">
                    <h4 class="text-lg font-medium text-gray-900 dark:text-white">Persetujuan</h4>
                    @foreach ($booking->approvals as $approval)
                        <li class="py-2 mt-2 flex">
                            @if ($approval->status === 'pending')
                                <x-s-v-g-s.circle></x-s-v-g-s.circle>
                            @elseif ($approval->status === 'process')
                                <x-s-v-g-s.circle></x-s-v-g-s.circle>
                            @elseif ($approval->status === 'approved')
                                <x-s-v-g-s.check></x-s-v-g-s.check>
                            @elseif ($approval->status === 'rejected')
                                <x-s-v-g-s.reject></x-s-v-g-s.reject>
                            @endif
                            <div class="flex-grow">
                                <div class="flex items-center">
                                    <p class="text-sm font-medium text-gray-900 dark:text-white">
                                        {{ $approval->user->name }} ({{ $approval->user->position }}
                                        {{ $approval->user->office->name }})</p>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                @auth
                    @if (auth()->user()->canApprove($booking))
                        <div class="mt-4">
                            <p class="text-sm font-medium text-gray-900 dark:text-white">Pengajuan ini memerlukan
                                persetujuan Anda.</p>
                            <div class="mt-2 space-x-4">
                                <button type="button"
                                    class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Setujui</button>
                                <button type="button"
                                    class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Tolak</button>
                            </div>
                        </div>
                    @endif
                @endauth
            </div>
        </div>
    </div>
</div>
