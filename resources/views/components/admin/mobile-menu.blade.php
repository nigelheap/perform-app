<div class="relative z-20 md:hidden" role="dialog" aria-modal="true" v-cloak>
    <!--  Mobile menu -->
    <!--
      Off-canvas menu backdrop, show/hide based on off-canvas menu state.

      Entering: "transition-opacity ease-linear duration-300"
        From: "opacity-0"
        To: "opacity-100"
      Leaving: "transition-opacity ease-linear duration-300"
        From: "opacity-100"
        To: "opacity-0"
    -->
    <transition enter-active-class="transition-opacity ease-linear duration-300"
                enter-from-class="opacity-0"
                enter-to-class="opacity-100"
                leave-active-class="transition-opacity ease-linear duration-300"
                leave-from-class="opacity-100"
                leave-to-class="opacity-0">
        <div class="fixed inset-0 bg-gray-600 bg-opacity-75" v-if="mobileMenu"></div>
    </transition>
    <transition enter-active-class="transition ease-in-out duration-300 transform"
                enter-from-class="-translate-x-full"
                enter-to-class="translate-x-0"
                leave-active-class="transition ease-in-out duration-300 transform"
                leave-from-class="translate-x-0"
                leave-to-class="-translate-x-full">
        <div class="fixed inset-0 z-40 flex" v-if="mobileMenu">
            <!--
              Off-canvas menu, show/hide based on off-canvas menu state.

              Entering: "transition ease-in-out duration-300 transform"
                From: "-translate-x-full"
                To: "translate-x-0"
              Leaving: "transition ease-in-out duration-300 transform"
                From: "translate-x-0"
                To: "-translate-x-full"
            -->

                <div class="relative flex w-full max-w-xs flex-1 flex-col bg-region-night pt-5 pb-4">

                    <transition enter-active-class="ease-in-out duration-300"
                                enter-from-class="opacity-0"
                                enter-to-class="opacity-100"
                                leave-active-class="ease-in-out duration-300"
                                leave-from-class="opacity-100"
                                leave-to-class="opacity-0">
                        <div class="absolute top-1 right-0 -mr-14 p-1" v-if="mobileMenu">
                            <button type="button"
                                    @click.prevent="mobileMenu = false"
                                    class="flex h-12 w-12 items-center justify-center rounded-full focus:outline-none focus:ring-2 focus:ring-white">
                                <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                <span class="sr-only">Close sidebar</span>
                            </button>
                        </div>
                    </transition>

                    <div class="flex flex-shrink-0 items-center px-4">
                        <img class="h-8 w-auto" src="/images/logo.svg" alt="Your Company">
                    </div>
                    <div class="mt-5 h-0 flex-1 overflow-y-auto px-2">
                        <nav class="flex h-full flex-col">
                            <div class="space-y-1">
                                <x-admin.menu :stacked="false"></x-admin.menu>
                            </div>
                        </nav>
                    </div>
                </div>


            <div class="w-14 flex-shrink-0" aria-hidden="true"  v-if="mobileMenu">
                <!-- Dummy element to force sidebar to shrink to fit close icon -->
            </div>
        </div>
    </transition>
</div>
