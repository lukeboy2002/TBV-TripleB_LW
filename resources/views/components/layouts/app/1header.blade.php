<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    @include('partials.head')
</head>
<body class="min-h-screen bg-white dark:bg-zinc-800">

<div class="w-screen bg-green-500 h-40">
    <nav>
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <!-- Mobile menu button-->
                    <button type="button"
                            onclick="toggleMenu()"
                            class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:ring-2 focus:ring-white focus:outline-hidden focus:ring-inset"
                            aria-controls="mobile-menu"
                            aria-expanded="false">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>
                        <svg id="menu-open-icon" class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" aria-hidden="true" data-slot="icon">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                        </svg>
                        <svg id="menu-close-icon" class="hidden size-6" fill="none" viewBox="0 0 24 24"
                             stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
                <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="flex shrink-0 items-center">
                        <img class="h-8 w-auto"
                             src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
                             alt="Your Company">
                    </div>
                    <div class="hidden sm:ml-6 sm:block">
                        <div class="flex space-x-4">
                            <a href="#" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white"
                               aria-current="page">Dashboard</a>
                            <a href="#"
                               class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Team</a>
                            <a href="#"
                               class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Projects</a>
                            <a href="#"
                               class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Calendar</a>
                        </div>
                    </div>
                </div>
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <!-- Notification en profile sectie blijft hetzelfde -->
                    <!-- ... -->
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div
            class="fixed inset-y-0 left-0 transform -translate-x-full transition-transform duration-300 ease-in-out sm:hidden w-64 bg-gray-800 overflow-y-auto"
            id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="#" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white"
                   aria-current="page">Dashboard</a>
                <a href="#"
                   class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Team</a>
                <a href="#"
                   class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Projects</a>
                <a href="#"
                   class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Calendar</a>
            </div>
        </div>
    </nav>


</div>

{{ $slot }}

@fluxScripts
<script>
    function toggleMenu() {
        const menu = document.getElementById('mobile-menu');
        const openIcon = document.getElementById('menu-open-icon');
        const closeIcon = document.getElementById('menu-close-icon');

        if (menu.classList.contains('-translate-x-full')) {
            menu.classList.remove('-translate-x-full');
            openIcon.classList.add('hidden');
            openIcon.classList.remove('block');
            closeIcon.classList.add('block');
            closeIcon.classList.remove('hidden');
        } else {
            menu.classList.add('-translate-x-full');
            openIcon.classList.add('block');
            openIcon.classList.remove('hidden');
            closeIcon.classList.add('hidden');
            closeIcon.classList.remove('block');
        }
    }

    // Optioneel: sluit menu als er buiten wordt geklikt
    document.addEventListener('click', function (event) {
        const menu = document.getElementById('mobile-menu');
        const menuButton = document.querySelector('[aria-controls="mobile-menu"]');

        if (!menu.contains(event.target) && !menuButton.contains(event.target) && !menu.classList.contains('-translate-x-full')) {
            toggleMenu();
        }
    });
</script>

</body>
</html>
