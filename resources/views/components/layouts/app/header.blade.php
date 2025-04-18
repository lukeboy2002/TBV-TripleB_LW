<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    @include('partials.head')
</head>
<body class="min-h-screen bg-white dark:bg-zinc-800">
<flux:header container class="border-b border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
    <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left"/>

    <a href="{{ route('home') }}" class="ms-2 me-5 flex items-center space-x-2 rtl:space-x-reverse lg:ms-0"
       wire:navigate>
        <x-app-logo/>
    </a>

    <flux:navbar class="-mb-px max-lg:hidden">
        <flux:navbar.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')"
                          wire:navigate>
            {{ __('Home') }}
        </flux:navbar.item>
        <flux:navbar.item icon="users" :href="route('team')" :current="request()->routeIs('team')"
                          wire:navigate>
            {{ __('Team') }}
        </flux:navbar.item>
        <flux:navbar.item icon="newspaper" :href="route('blog')" :current="request()->routeIs('blog')"
                          wire:navigate>
            {{ __('Blog') }}
        </flux:navbar.item>
        <flux:navbar.item icon="calendar-date-range" :href="route('events')" :current="request()->routeIs('events')"
                          wire:navigate>
            {{ __('Events') }}
        </flux:navbar.item>
        <flux:navbar.item icon="envelope" :href="route('contact')" :current="request()->routeIs('contact')"
                          wire:navigate>
            {{ __('Contact') }}
        </flux:navbar.item>
    </flux:navbar>

    <flux:spacer/>

    <flux:navbar class="me-1.5 space-x-0.5 rtl:space-x-reverse py-0!">
        <flux:tooltip :content="__('Search')" position="bottom">
            <flux:navbar.item class="!h-10 [&>div>svg]:size-5" icon="magnifying-glass" href="#" :label="__('Search')"/>
        </flux:tooltip>
    </flux:navbar>

    @if (Route::has("login"))
        @auth
            <!-- Desktop User Menu -->
            <flux:dropdown position="top" align="end">
                <flux:profile
                    class="cursor-pointer"
                    :initials="auth()->user()->initials()"
                />

                <flux:menu>
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->username }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator/>

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('settings.profile')" icon="cog"
                                        wire:navigate>{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator/>

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        @else
            <flux:navbar.item :href="route('login')" :current="request()->routeIs('login')"
                              wire:navigate>
                {{ __('Login') }}
            </flux:navbar.item>
            <flux:navbar.item :href="route('register')" :current="request()->routeIs('register')"
                              wire:navigate>
                {{ __('Register') }}
            </flux:navbar.item>
        @endauth
    @endif

</flux:header>

<!-- Mobile Menu -->
<flux:sidebar stashable sticky
              class="lg:hidden border-r border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
    <flux:sidebar.toggle class="lg:hidden" icon="x-mark"/>

    <a href="{{ route('dashboard') }}" class="ms-1 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
        <x-app-logo/>
    </a>

    <flux:navlist variant="outline">
        <flux:navlist.group>
            <flux:navlist.item icon="home" :href="route('home')" :current="request()->routeIs('home')"
                               wire:navigate>
                {{ __('Home') }}
            </flux:navlist.item>
            <flux:navlist.item icon="users" :href="route('team')" :current="request()->routeIs('team')"
                               wire:navigate>
                {{ __('Team') }}
            </flux:navlist.item>
            <flux:navlist.item icon="newspaper" :href="route('blog')" :current="request()->routeIs('blog')"
                               wire:navigate>
                {{ __('Blog') }}
            </flux:navlist.item>
            <flux:navlist.item icon="calendar-date-range" :href="route('events')"
                               :current="request()->routeIs('events')"
                               wire:navigate>
                {{ __('Events') }}
            </flux:navlist.item>
            <flux:navlist.item icon="envelope" :href="route('contact')" :current="request()->routeIs('contact')"
                               wire:navigate>
                {{ __('Contact') }}
            </flux:navlist.item>
        </flux:navlist.group>
    </flux:navlist>

</flux:sidebar>

{{ $slot }}

@fluxScripts
</body>
</html>
