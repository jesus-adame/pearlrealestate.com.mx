<!-- This example requires Tailwind CSS v2.0+ -->
<nav class="z-20 absolute w-full"
    :class="{'bg-white': route != 'home.index'}"
    x-data="{
        profileOptions: true,
        route: '{{request()->route()->getName()}}',
        shownavbar: false,
    }">
    <div class="container mx-auto">
        <div class="relative flex items-center justify-between h-16 md:h-24">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Mobile menu button-->
                <button type="button"
                    class="inline-flex items-center justify-center
                    p-2 rounded-md hover:text-white hover:bg-gray-700
                    focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                    aria-controls="mobile-menu"
                    @click="shownavbar = ! shownavbar"
                    aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <!--
                    Icon when menu is closed.
        
                    Heroicon name: outline/menu
                    Menu open: "hidden", Menu closed: "block"
                    -->
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!--
                    Icon when menu is open.
        
                    Heroicon name: outline/x
                    Menu open: "block", Menu closed: "hidden"
                    -->
                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex-1 flex items-center justify-center sm:justify-start">
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home.index') }}" class="bg-white py-1 px-2 inline-block h-14 md:h-24" :class="{ 'opacity-90': route == 'home.index' }">
                        <img class="block lg:block h-full w-auto" src="/images/logo_pearl_2.png" alt="Pearl Real Estate Logo">
                    </a>
                    {{-- <img class="block lg:hidden h-8 w-auto"
                        src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg" alt="Workflow">
                    <img class="hidden lg:block h-8 w-auto"
                        src="https://tailwindui.com/img/logos/workflow-logo-indigo-500-mark-white-text.svg"
                        alt="Workflow"> --}}
                </div>
                <div class="hidden sm:block sm:ml-auto">
                    <div class="flex space-x-4 uppercase">
                        <a href="{{ route('home.index') }}"
                            :class="{
                                'text-theme': route == 'home.index',
                                'bg-theme': route == 'home.index',
                                'hover:bg-theme': route != 'home.index',
                                'hover:text-theme': route != 'home.index',
                            }"
                            class="px-3 py-3 font-semibold rounded-sm transition duration-300 text-sm"
                            aria-current="page">Inicio</a>

                        <a href="{{ route('properties.index') }}"
                            :class="{
                                'bg-theme': route == 'properties.index',
                                'hover:bg-theme': route != 'properties.index',
                                'hover:text-theme': route != 'properties.index',
                                'text-theme': route == 'home.index' || route == 'properties.index',
                            }"
                            class="px-3 py-3 font-semibold rounded-sm transition duration-300 text-sm">Propiedades</a>

                        <a href="{{ route('contact.index') }}"
                            :class="{
                                'bg-theme': route == 'contact.index',
                                'hover:bg-theme': route != 'contact.index',
                                'hover:text-theme': route != 'contact.index',
                                'text-theme': route == 'home.index' || route == 'contact.index',
                            }"
                            class="px-3 py-3 font-semibold rounded-sm transition duration-300 text-sm">Contacto</a>

                        <a href="{{ route('login') }}"
                            :class="{
                                'bg-theme': route == 'login',
                                'hover:bg-theme': route != 'login',
                                'hover:text-theme': route != 'login',
                                'text-theme': route == 'home.index' || route == 'login',
                            }"
                            class="px-3 py-1 font-semibold rounded-sm transition duration-300 text-sm flex items-center">
                            <div class="w-5 mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sign-in-alt" class="svg-inline--fa fa-sign-in-alt fa-w-16" role="img" viewBox="0 0 512 512">
                                    <path fill="currentColor" d="M416 448h-84c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h84c17.7 0 32-14.3 32-32V160c0-17.7-14.3-32-32-32h-84c-6.6 0-12-5.4-12-12V76c0-6.6 5.4-12 12-12h84c53 0 96 43 96 96v192c0 53-43 96-96 96zm-47-201L201 79c-15-15-41-4.5-41 17v96H24c-13.3 0-24 10.7-24 24v96c0 13.3 10.7 24 24 24h136v96c0 21.5 26 32 41 17l168-168c9.3-9.4 9.3-24.6 0-34z"/>
                                </svg>
                            </div>
                            Entrar
                        </a>
                    </div>
                </div>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                {{-- <button
                    class="bg-gray-800 p-1 rounded-full hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                    <span class="sr-only">View notifications</span>
                    <!-- Heroicon name: outline/bell -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                </button> --}}

                <!-- Profile dropdown -->
                {{-- <div class="ml-3 relative">
                    <div>
                        <button type="button"
                            @click="profileOptions = ! profileOptions"
                            class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                            id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                            <span class="sr-only">Open user menu</span>
                            <img class="h-8 w-8 rounded-full"
                                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                alt="">
                        </button>
                    </div>
                    <!-- Dropdown menu, show/hide based on menu state. -->
                    <div
                        :class="{ hidden: profileOptions }"
                        class="origin-top-right z-10 absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                        role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                        <!-- Active: "bg-gray-100", Not Active: "" -->
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                            id="user-menu-item-0">Your Profile</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                            id="user-menu-item-1">Settings</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                            id="user-menu-item-2">Sign out</a>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div x-show="shownavbar" class="sm:hidden bg-gray-100" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="{{ route('home.index') }}"
                :class="{
                    'bg-yellow-400': route == 'home.index',
                    'hover:bg-yellow-300': route != 'home.index',
                    'text-gray-700': route == 'home.index',
                    'hover:text-gray-700': route != 'home.index',
                    'text-gray-700': route != 'home.index'
                }"
                class="block px-3 py-2 rounded-md text-base font-medium">Inicio</a>

            <a href="{{ route('properties.index') }}"
                :class="{
                    'bg-yellow-400': route == 'properties.index',
                    'hover:bg-yellow-300': route != 'properties.index',
                    'text-gray-700': route == 'properties.index',
                    'hover:text-gray-700': route != 'properties.index',
                    'text-gray-700': route != 'properties.index'
                }"
                class="block px-3 py-2 rounded-md text-base font-medium">Propiedades</a>

            <a href="{{ route('contact.index') }}"
                :class="{
                    'bg-yellow-400': route == 'contact.index',
                    'hover:bg-yellow-300': route != 'contact.index',
                    'text-gray-700': route == 'contact.index',
                    'hover:text-gray-700': route != 'contact.index',
                    'text-gray-700': route != 'contact.index'
                }"
                class="block px-3 py-2 rounded-md text-base font-medium">Contacto</a>
            <a href="{{ route('login') }}"
                :class="{
                    'bg-yellow-400': route == 'login',
                    'hover:bg-yellow-300': route != 'login',
                    'text-gray-700': route == 'login',
                    'hover:text-gray-700': route != 'login',
                    'text-gray-700': route != 'login'
                }"
                class="flex items-center px-3 py-2 rounded-md text-base font-medium">
                <div class="w-5 mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sign-in-alt" class="svg-inline--fa fa-sign-in-alt fa-w-16" role="img" viewBox="0 0 512 512">
                        <path fill="currentColor" d="M416 448h-84c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h84c17.7 0 32-14.3 32-32V160c0-17.7-14.3-32-32-32h-84c-6.6 0-12-5.4-12-12V76c0-6.6 5.4-12 12-12h84c53 0 96 43 96 96v192c0 53-43 96-96 96zm-47-201L201 79c-15-15-41-4.5-41 17v96H24c-13.3 0-24 10.7-24 24v96c0 13.3 10.7 24 24 24h136v96c0 21.5 26 32 41 17l168-168c9.3-9.4 9.3-24.6 0-34z"/>
                    </svg>
                </div>
                Entrar
            </a>
        </div>
    </div>
</nav>
