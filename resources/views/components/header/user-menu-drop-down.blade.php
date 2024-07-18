<div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
    id="dropdown-2">
    <div class="px-4 py-3" role="none">
        <p class="text-sm text-gray-900 dark:text-white" role="none">
            {{ Auth::user()->name }}
        </p>
        <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
            {{ Auth::user()->position }} {{ Auth::user()->office->name }}
        </p>
    </div>
    <ul class="py-1" role="none">
        <li>
            <a href="{{ route('profile.edit') }}"
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                role="menuitem">Edit Profile</a>
        </li>
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href=""><button type="submit"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                    role="menuitem">Sign out</button></a>
            </form>
        </li>
    </ul>
</div>
