<header class="w-full">
    <div class="relative z-10 flex h-16 flex-shrink-0 border-b border-gray-200 bg-white shadow-sm">
        <button type="button"
                @click.prevent="mobileMenu = !mobileMenu"
                class="border-r border-gray-200 px-4 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 md:hidden">
            <span class="sr-only">Open sidebar</span>
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
            </svg>
        </button>
        <div class="flex flex-1 justify-between px-4 sm:px-6">
            <div class="flex flex-1">
                @if(false)
                    <form class="flex w-full md:ml-0" action="#" method="GET">
                        <label for="search-field" class="sr-only">Search all files</label>
                        <div class="relative w-full text-gray-400 focus-within:text-gray-600">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center">
                                <svg class="h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input name="search-field" id="search-field" class="h-full w-full border-0 py-2 pl-8 pr-3 text-gray-900 focus:outline-none focus:ring-0 focus:placeholder:text-gray-400 sm:text-sm" placeholder="Search" type="search">
                        </div>
                    </form>
                @endif
            </div>
            <div class="ml-2 flex items-center space-x-4 sm:ml-6 sm:space-x-6">
                <!-- Profile dropdown -->
                <div class="relative flex-shrink-0" v-click-outside="() => { userMenu = false} ">
                    <div>
                        <button type="button"
                                @click.prevent="userMenu = !userMenu"
                                class="flex rounded-full bg-white text-sm focus:outline-none focus:ring-2 focus:ring-region-forest focus:ring-offset-2"
                                id="user-menu-button"
                                aria-expanded="false"
                                aria-haspopup="true">
                            <span class="sr-only">Open user menu</span>
                            <span class="h-8 w-8 rounded-full bg-region-night font-bold text-white flex items-center justify-center">
                                {{ $auth->initials }}
                            </span>
                        </button>
                    </div>

                    <transition enter-active-class="transition ease-out duration-100"
                                enter-from-class="transform opacity-0 scale-95"
                                enter-to-class="transform opacity-100 scale-100"
                                leave-active-class="transition ease-in duration-75"
                                leave-from-class="transform opacity-100 scale-100"
                                leave-to-class="transform opacity-0 scale-95">
                        <div class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                             role="menu"
                             aria-orientation="vertical"
                             aria-labelledby="user-menu-button"
                             v-cloak
                             v-if="userMenu"
                             :class="{'bg-gray-100' : userMenu }"
                             tabindex="-1">

                            <a href="{{ route('account.edit') }}"
                               class="block px-4 py-2 text-sm text-gray-700"
                               role="menuitem"
                               tabindex="-1"
                               id="user-menu-item-0">Your Profile</a>

                            @impersonating($guard = null)
                            <a href="{{ route('impersonation.leave') }}"
                               class="block px-4 py-2 text-sm text-gray-700"
                               role="menuitem"
                               tabindex="-1"
                               id="user-menu-item-1">Leave impersonation</a>
                            @endImpersonating


                            <a href="{{ route('admin.tools.clear-cache') }}"
                               class="block px-4 py-2 text-sm text-gray-700"
                               role="menuitem"
                               tabindex="-1"
                               id="user-menu-item-2">Clear cache</a>


                            <a href="{{ route('logout') }}"
                               class="block px-4 py-2 text-sm text-gray-700"
                               role="menuitem"
                               tabindex="-1" id="user-menu-item-3">Sign out</a>
                        </div>
                    </transition>
                </div>
            </div>
        </div>
    </div>
</header>
