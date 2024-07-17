<nav class="fixed z-30 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">

                <x-header.sidebar-toggler-button />

                <x-header.logo />

                <x-header.search-form />

            </div>
            <div class="flex items-center">
                <!-- Search mobile -->
                <x-header.mobile-search />
                <!-- Notifications -->
                <x-header.notification-button />
                <!-- Dropdown menu -->
                <x-header.notification-drop-down />

                <x-header.dark-white-mode-toggler />

                <!-- Profile -->
                <div class="flex items-center ml-3">
                    <x-header.user-menu-avatar />
                    <!-- Dropdown menu -->
                    <x-header.user-menu-drop-down />
                </div>
            </div>
        </div>
    </div>
</nav>
