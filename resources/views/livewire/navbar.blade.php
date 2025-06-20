<nav class="bg-gray-50 border-gray-50 dark:bg-gray-900">
    <div class="w-full flex flex-wrap items-center justify-between mx-auto p-4">
        <a wire:click="redirectTo('welcome')" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('images/ae-mis.png') }}" class="h-8" alt="AE Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Automation Engineering</span>
        </a>
        <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            <button data-collapse-toggle="navbar-cta" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-cta" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
            <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-50 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-gray-50 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <button wire:click="redirectTo('welcome')" class="{{ request()->routeIs('welcome') ? 'text-black font-semibold bg-lightblue p-2.5 pl-6 pr-6 rounded-lg mt-1' : 'animated-button'}}">
                          <span class="text">Home</span>
                          <span class="circle"></span>
                    </button>
                </li>
                <li>
                    <button wire:click="redirectTo('viewlist')" class="{{ request()->routeIs('viewlist') ? 'text-black font-semibold bg-lightblue p-2.5 pl-6 pr-6 rounded-lg mt-1' : 'animated-button'}}">
                          <span class="text">View List</span>
                          <span class="circle"></span>
                    </button>
                </li>
                <li>
                    <button wire:click="redirectTo('settings')" class="{{ request()->routeIs('settings') ? 'text-black font-semibold bg-lightblue p-2.5 pl-6 pr-6 rounded-lg mt-1' : 'animated-button'}}">
                        <span class="text">Settings</span>
                        <span class="circle"></span>
                    </button>
                </li>
                <li>
                    <button wire:click="redirectTo('checklist')" class="{{ request()->routeIs('checklist') ? 'text-black font-semibold bg-lightblue p-2.5 pl-6 pr-6 rounded-lg mt-1' : 'animated-button'}}">
                        <span class="text">Start OBA</span>
                        <span class="circle"></span>
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>


