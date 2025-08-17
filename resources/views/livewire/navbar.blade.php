<!-- Minimalist Navbar Component -->
<nav class="bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-700 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 md:h-18">
            <!-- Clean Logo Section -->
            <div wire:click="redirectTo('login')" class="flex items-center space-x-3 cursor-pointer group">
                <div class="h-8 w-8 md:h-10 md:w-10 transition-transform duration-300 group-hover:scale-110">
                    <img src="{{ asset('photo/smp_logo.png') }}" class="h-full w-full object-contain" alt="SMP Logo" />
                </div>
                <div class="hidden sm:block">
                    <h1 class="text-lg md:text-xl font-semibold text-gray-900 dark:text-white transition-colors duration-300 group-hover:text-blue-600 dark:group-hover:text-blue-400">
                        Out of the Box Audit
                    </h1>
                </div>
            </div>

            <!-- Clean Desktop Navigation -->
            <div class="hidden md:flex items-center space-x-1">
                @auth
                    <!-- Navigation buttons with original hover effects -->
                    <button wire:click="redirectTo('login')"
                            class="nav-button {{ request()->routeIs('login') ? 'active' : '' }}">
                        Dashboard
                    </button>

                    <button wire:click="redirectTo('viewlist')"
                            class="nav-button {{ request()->routeIs('viewlist') ? 'active' : '' }}">
                        Audit List
                    </button>

                    <button wire:click="redirectTo('settings')"
                            class="nav-button {{ request()->routeIs('settings') ? 'active' : '' }}">
                        Settings
                    </button>

                    <!-- Start OBA Button with animated-button style -->
                    <button wire:click="redirectTo('checklist')"
                            class="animated-button ml-4 {{ request()->routeIs('checklist') ? 'bg-green-500 text-white' : '' }}">
                        <svg class="arr-2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="m15.997 3.985h2v12.028h-2zm4.003-2.985v18h-2v-18zm-19 9.997c0-1.103.897-2 2-2h6v2h-6v10h14v-2h2v4h-18z"></path>
                        </svg>
                        <svg class="arr-1" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="m15.997 3.985h2v12.028h-2zm4.003-2.985v18h-2v-18zm-19 9.997c0-1.103.897-2 2-2h6v2h-6v10h14v-2h2v4h-18z"></path>
                        </svg>
                        <span class="text font-medium text-gray-700 mx-2">Start OBA</span>
                        <span class="circle"></span>
                    </button>

                    <!-- Clean User Profile Section -->
                    <div class="flex items-center ml-6 pl-6 border-l border-gray-200 dark:border-gray-700">
                        <div class="flex items-center space-x-3 group">
                            <div class="h-8 w-8 bg-gray-200 dark:bg-gray-700 rounded-full flex items-center justify-center transition-all duration-300 group-hover:bg-blue-100 dark:group-hover:bg-blue-900/30 group-hover:scale-110">
                                <svg class="w-4 h-4 text-gray-600 dark:text-gray-400 transition-colors duration-300 group-hover:text-blue-600 dark:group-hover:text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="hidden lg:block">
                                <p class="text-sm font-medium text-gray-900 dark:text-white transition-colors duration-300 group-hover:text-blue-600 dark:group-hover:text-blue-400">
                                    {{ Auth::user()->name }}
                                </p>
                                <p class="text-xs text-gray-500 dark:text-gray-400 capitalize">
                                    {{ ucfirst(Auth::user()->role->name) }}
                                </p>
                            </div>
                        </div>

                        <!-- Clean Logout Button -->
                        <button wire:click="logout"
                                class="ml-3 px-3 py-2 text-sm font-medium text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-all duration-300 hover:-translate-y-0.5 hover:shadow-md hover:shadow-red-200 dark:hover:shadow-red-900/50">
                            Logout
                        </button>
                    </div>
                @else
                    <!-- Guest Navigation with animated-button -->
                    <a href="{{ route('register') }}"
                       class="animated-button">
                        <svg class="arr-2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"/>
                        </svg>
                        <svg class="arr-1" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"/>
                        </svg>
                        <span class="text font-medium text-gray-700 mx-4">Register</span>
                        <span class="circle"></span>
                    </a>
                @endauth
            </div>

            <!-- Clean Mobile Menu Button -->
            <div class="md:hidden">
                <button wire:click="$toggle('mobileMenuOpen')"
                        class="p-2 text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white hover:bg-gray-50 dark:hover:bg-gray-800 rounded-lg transition-all duration-300 hover:scale-110"
                        aria-label="Toggle navigation menu">
                    @if($mobileMenuOpen ?? false)
                        <svg class="w-6 h-6 transition-transform duration-300 rotate-90" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    @else
                        <svg class="w-6 h-6 transition-transform duration-300 hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    @endif
                </button>
            </div>
        </div>

        <!-- Clean Mobile Menu -->
        @if($mobileMenuOpen ?? false)
            <div class="md:hidden border-t border-gray-200 dark:border-gray-700 py-3">
                @auth
                    <!-- Clean User info in mobile -->
                    <div class="px-4 py-3 border-b border-gray-100 dark:border-gray-800 mb-3">
                        <div class="flex items-center space-x-3 group">
                            <div class="h-10 w-10 bg-gray-200 dark:bg-gray-700 rounded-full flex items-center justify-center transition-all duration-300 group-hover:bg-blue-100 dark:group-hover:bg-blue-900/30 group-hover:scale-110">
                                <svg class="w-5 h-5 text-gray-600 dark:text-gray-400 transition-colors duration-300 group-hover:text-blue-600 dark:group-hover:text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div>
                                <div class="font-medium text-gray-900 dark:text-white transition-colors duration-300 group-hover:text-blue-600 dark:group-hover:text-blue-400">{{ Auth::user()->name }}</div>
                                <div class="text-sm text-gray-500 dark:text-gray-400 capitalize">{{ ucfirst(Auth::user()->role->name) }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Clean Mobile navigation items -->
                    <div class="space-y-1 px-4">
                        <button wire:click="redirectTo('login')"
                                class="w-full text-left px-3 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white hover:bg-gray-50 dark:hover:bg-gray-800 rounded-lg transition-all duration-300 hover:translate-x-1 {{ request()->routeIs('login') ? 'bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-white' : '' }}">
                            Dashboard
                        </button>

                        <button wire:click="redirectTo('viewlist')"
                                class="w-full text-left px-3 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white hover:bg-gray-50 dark:hover:bg-gray-800 rounded-lg transition-all duration-300 hover:translate-x-1 {{ request()->routeIs('viewlist') ? 'bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-white' : '' }}">
                            Audit List
                        </button>

                        <button wire:click="redirectTo('settings')"
                                class="w-full text-left px-3 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white hover:bg-gray-50 dark:hover:bg-gray-800 rounded-lg transition-all duration-300 hover:translate-x-1 {{ request()->routeIs('settings') ? 'bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-white' : '' }}">
                            Settings
                        </button>

                        <!-- Start OBA Mobile Button with save-button style -->
                        <button wire:click="redirectTo('checklist')"
                                class="w-full save-button py-3 rounded-xl mt-3 {{ request()->routeIs('checklist') ? 'opacity-80' : '' }}">
                            <span class="flex items-center justify-center space-x-3">
                                <svg class="w-5 h-5 button-icon" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span class="button-text font-medium">Start OBA</span>
                            </span>
                        </button>

                        <!-- Clean Logout button in mobile -->
                        <button wire:click="logout"
                                class="w-full text-left px-3 py-2 text-sm font-medium text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-all duration-300 mt-3 hover:translate-x-1">
                            Logout
                        </button>
                    </div>
                @else
                    <!-- Guest mobile menu with save-button style -->
                    <div class="px-4">
                        <a href="{{ route('register') }}"
                           class="block w-full text-center save-button py-3 rounded-xl">
                            <span class="flex items-center justify-center space-x-3">
                                <svg class="w-5 h-5 button-icon" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"/>
                                </svg>
                                <span class="button-text font-medium">Register</span>
                            </span>
                        </a>
                    </div>
                @endauth
            </div>
        @endif
    </div>
</nav>
