<nav 
    x-data="{ open: false }" 
    class="
        fixed w-full shadow-lg
        bg-white dark:bg-gray-800 
        border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="w-full sm:w-[98%] md:w-[95%] lg:w-5/6 xl:w-4/5 mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex">
                <!-- Logo -->
                <x-logo />

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:space-x-4 md:space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('posts.index')" :active="request()->routeIs('posts.index')">
                        {{ __('All Speaks') }}
                    </x-nav-link>
                    <x-nav-link :href="route('posts.add')" :active="request()->routeIs('posts.add')">
                        {{ __('Speak your Mind') }}
                    </x-nav-link>
                    <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.index')">
                        {{ __('All Speakrs') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="flex gap-2 sm:gap-1 md:gap-2 items-center">
                {{-- Search bar --}}
                <x-search-bar />
                <!-- Settings Dropdown (only show when logged in) -->
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <x-button color="primary" size="sm">
                                <div class="flex items-center gap-2 sm:gap-0 md:gap-2">
                                    <x-profile-avatar :user="Auth::user()" size="22" />
                                    <div class="sm:hidden md:flex">{{ Auth::user()->username }}</div>
        
                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                            </x-button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('users.show', Auth::user()->username)">
                                <i class="fas fa-user-circle"></i> {{ __('My Profile') }}
                            </x-dropdown-link>

                            <x-dropdown-link :href="route('profile.edit')">
                                <i class="fas fa-user-cog"></i> {{ __('Account Settings') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    <i class="fas fa-sign-out-alt"></i> {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <x-login-register-btn/>
                @endauth
        
                {{-- DarkMode --}}
                <x-theme-switcher />

                <!-- Hamburger -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <div @click="open = ! open">
                        <x-button color="default" size="xs" square>
                            <svg class="h-[22px] w-auto" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </x-button>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('posts.index')" :active="request()->routeIs('posts.index')">
                {{ __('All Speaks') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('posts.add')" :active="request()->routeIs('posts.add')">
                {{ __('Speak your Mind') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('users.index')" :active="request()->routeIs('users.index')">
                {{ __('All Speakrs') }}
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
                    <i class="fas fa-user-circle"></i> {{ __('My Profile') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('profile.edit')">
                    <i class="fas fa-user-cog"></i> {{ __('Account Settings') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        <i class="fas fa-sign-out-alt"></i> {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
        @endauth
    </div>
</nav>
