<x-app-layout>
    @section('content')
        <div class="p-4 bg-white dark:bg-gray-800 dark:border-gray-700">
            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">Dashboard</h2>

            <div class="items-center justify-between p-4 bg-white  sm:flex dark:bg-gray-800 mt-4">
                <div class="w-full">
                    <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">Grafik Pemakaian Kendaraan</h3>
                    <span
                        class="text-4xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">{{ $totalUsage }}</span>
                    <p class="flex items-center text-base font-normal text-gray-500 dark:text-gray-400">
                        Kendaraan
                    </p>
                </div>
                <div class="w-full" id="vehicle-usage-chart" data-monthly-usage='@json($monthlyUsage)'></div>
            </div>
        @endsection
</x-app-layout>
