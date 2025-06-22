<nav class="bg-white dark:bg-gray-900 shadow-lg border-b border-gray-200 dark:border-gray-700 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 md:h-20">
            <!-- Logo Section with Livewire -->
            <a wire:click="redirectTo('welcome')" class="logo-container">
                <div class="h-10 w-10 md:h-12 md:w-12">
                    <img src="" class="h-full w-full object-contain" alt="AE Logo" />
                </div>
                <div class="hidden sm:block">
                    <h1 class="logo-text text-xl md:text-2xl font-bold text-gray-900 dark:text-white">
                        Out of the Box Audit
                    </h1>
                </div>
            </a>
            
            <!-- Desktop Navigation with Livewire -->
            <div class="hidden md:flex items-center space-x-2 lg:space-x-4">
                <button wire:click="redirectTo('welcome')" 
                        class="nav-button {{ request()->routeIs('welcome') ? 'active' : '' }}">
                    <span class="flex items-center space-x-2">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                        </svg>
                        <span>Home</span>
                    </span>
                </button>
                
                <button wire:click="redirectTo('viewlist')" 
                        class="nav-button {{ request()->routeIs('viewlist') ? 'active' : '' }}">
                    <span class="flex items-center space-x-2">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 16a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"/>
                        </svg>
                        <span>View List</span>
                    </span>
                </button>
                
                <button wire:click="redirectTo('settings')" 
                        class="nav-button {{ request()->routeIs('settings') ? 'active' : '' }}">
                    <span class="flex items-center space-x-2">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
                        </svg>
                        <span>Settings</span>
                    </span>
                </button>
                
                <button wire:click="redirectTo('checklist')" 
                        class="nav-button start-oba {{ request()->routeIs('checklist') ? 'active' : '' }}">
                    <span class="flex items-center space-x-2">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span>Start OBA</span>
                    </span>
                </button>
            </div>
            
            <!-- Mobile Menu Button -->
            <button class="md:hidden mobile-menu-btn" 
                    data-collapse-toggle="navbar-cta" 
                    type="button" 
                    onclick="toggleMobileMenu()" 
                    aria-controls="navbar-cta" 
                    aria-expanded="false"
                    aria-label="Toggle navigation menu">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
        </div>
        
        <!-- Mobile Menu with Livewire -->
        <div id="navbar-cta" class="mobile-menu hidden md:hidden">
            <div class="py-2">
                <button wire:click="redirectTo('welcome')" 
                        class="mobile-nav-item {{ request()->routeIs('welcome') ? 'active' : '' }}"
                        onclick="closeMobileMenu()">
                    <div class="flex items-center space-x-3">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                        </svg>
                        <span class="font-medium">Home</span>
                    </div>
                </button>
                
                <button wire:click="redirectTo('viewlist')" 
                        class="mobile-nav-item {{ request()->routeIs('viewlist') ? 'active' : '' }}"
                        onclick="closeMobileMenu()">
                    <div class="flex items-center space-x-3">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 16a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"/>
                        </svg>
                        <span class="font-medium">View List</span>
                    </div>
                </button>
                
                <button wire:click="redirectTo('settings')" 
                        class="mobile-nav-item {{ request()->routeIs('settings') ? 'active' : '' }}"
                        onclick="closeMobileMenu()">
                    <div class="flex items-center space-x-3">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
                        </svg>
                        <span class="font-medium">Settings</span>
                    </div>
                </button>
                
                <button wire:click="redirectTo('checklist')" 
                        class="mobile-nav-item start-oba {{ request()->routeIs('checklist') ? 'active' : '' }}"
                        onclick="closeMobileMenu()">
                    <div class="flex items-center space-x-3">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="font-medium">Start OBA</span>
                    </div>
                </button>
            </div>
        </div>
    </div>
</nav>
