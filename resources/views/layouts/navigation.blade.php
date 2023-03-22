<nav 
    x-data="{ open: false }" 
    class="
        fixed w-full shadow-lg z-[999]
        bg-white dark:bg-gray-800 
        border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="w-full sm:w-[98%] md:w-[95%] lg:w-5/6 xl:w-4/5 mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">

            {{-- DESKTOP MENU --}}
            <div class="flex">

                <!-- Branding -->
                <x-btn size="sm" color="transp" href="{{ route('posts.index') }}">
                    <div class="hidden md:flex shrink-0 items-center justify-start gap-2">
                        <x-application-logo class="block h-10 w-auto fill-current" />
                            <div class="flex flex-col gap-0 items-start justify-center">
                                <span class="text-success dark:text-success-l2 font-title text-xl">SPEAKR</span>
                                <span class="text-gray-600 dark:text-success-l2/80 text-xs whitespace-nowrap">Speak your Mind</span>
                        </div>
                    </div>
                    <div class="md:hidden">
                        <x-application-logo class="block h-10 w-auto fill-current" />
                    </div>
                </x-btn>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:space-x-4 md:space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('posts.index')" :active="request()->routeIs('posts.index')">
                        Speaks
                    </x-nav-link>
                    <x-nav-link :href="route('posts.add')" :active="request()->routeIs('posts.add')">
                        Speak your Mind
                    </x-nav-link>
                    <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.index')">
                        Speakrs
                    </x-nav-link>
                    <x-nav-link :href="route('posts.tags.index')" :active="request()->routeIs('posts.tags.index')">
                        Tags
                    </x-nav-link>
                </div>

            </div>

            {{-- Extra (Options - Settings - ...) --}}
            <div class="flex gap-2 sm:gap-1 md:gap-2 items-center">
                {{-- Search bar --}}
                <x-search-bar />
                <!-- Profile Dropdown (only show when logged in) -->
                @auth
                    <x-profile-dropdown />
                @else
                    <x-login-register-btn/>
                @endauth
        
                {{-- DarkMode --}}
                <livewire:toggle-dark-mode/>

                <!-- Hamburger -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <div @click="open = ! open">
                        <x-btn color="default" size="xs" square>
                            <svg class="h-[22px] w-auto" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </x-btn>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('posts.index')" :active="request()->routeIs('posts.index')">
                Speaks
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('posts.add')" :active="request()->routeIs('posts.add')">
                Speak your Mind
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('users.index')" :active="request()->routeIs('users.index')">
                Speakrs
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('posts.tags.index')" :active="request()->routeIs('posts.tags.index')">
                Tags
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        @auth
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->username }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('users.show', Auth::user()->username)">
                    <i class="fas fa-user-circle"></i> My Profile
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('profile.edit')">
                    <i class="fas fa-user-cog"></i> Account Settings
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        <i class="fas fa-sign-out-alt"></i> Log Out
                    </x-responsive-nav-link>
                </form>

                {{-- DarkMode --}}
                <livewire:toggle-dark-mode/>
            </div>
        </div>
        @endauth
    </div>
</nav>
