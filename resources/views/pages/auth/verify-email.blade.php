<x-guest-layout>
    @section('content')
        <div class="flex flex-col items-center justify-center px-6 pt-8 mx-auto md:h-screen pt:mt-0 dark:bg-gray-900">
            <a href="#" class="flex items-center justify-center mb-8 text-2xl font-semibold lg:mb-10 dark:text-white">
                <span>Sikendara PT Nickel Mining</span>
            </a>
            <!-- Card -->
            <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800">
                <div class="w-full p-6 sm:p-8">
                    <h2 class="mb-3 text-2xl font-bold text-gray-900 dark:text-white">
                        Verify your email address
                    </h2>
                    <p class="text-base font-normal text-gray-500 dark:text-gray-400">
                        Thanks for signing up! Before getting started, could you verify your email address by clicking on
                        the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
                    </p>

                    @if (session('status') == 'verification-link-sent')
                        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                            A new verification link has been sent to the email address you provided during registration.
                        </div>
                    @endif

                    <div class="mt-4 flex items-center justify-between">
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf

                            <div>
                                <button type="submit"
                                    class="w-full px-5 py-3 text-base font-medium text-center text-white bg-primary-700 rounded-lg hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 sm:w-auto dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                    Resend Verification Email
                                </button>
                            </div>
                        </form>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit"
                                class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 dark:focus:ring-offset-gray-800">
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-guest-layout>
