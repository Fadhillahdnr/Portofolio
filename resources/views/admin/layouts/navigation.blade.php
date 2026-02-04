<nav x-data="{ open: false }"
     class="sticky top-0 z-40
            bg-white/90 backdrop-blur
            border-b border-gray-200">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center">

            {{-- ================= LEFT ================= --}}
            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center gap-3 font-bold">

                <x-application-logo class="h-9 w-auto" />

                <span
                    class="font-extrabold tracking-wide
                           text-transparent bg-clip-text
                           bg-gradient-to-r from-indigo-600 to-purple-600">
                    Admin Panel
                </span>
            </a>

            {{-- ================= MENU ================= --}}
            <div class="hidden sm:flex items-center gap-6 ml-10">
                <a href="{{ route('admin.dashboard') }}"
                   class="text-sm font-medium
                   {{ request()->routeIs('admin.dashboard')
                       ? 'text-indigo-600'
                       : 'text-gray-600 hover:text-indigo-600' }}">
                    Dashboard
                </a>

                <a href="{{ route('admin.projects.index') }}"
                   class="text-sm font-medium
                   {{ request()->routeIs('admin.projects.*')
                       ? 'text-indigo-600'
                       : 'text-gray-600 hover:text-indigo-600' }}">
                    Projects
                </a>
            </div>

            {{-- ================= RIGHT ================= --}}
            <div class="ml-auto hidden sm:flex items-center">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="flex items-center gap-2
                                   bg-gray-100 hover:bg-gray-200
                                   px-3 py-2 rounded-xl transition text-sm">
                            {{ Auth::user()->name }}
                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            Profile
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link
                                :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                Logout
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            {{-- ================= MOBILE BUTTON ================= --}}
            <button @click="open = !open"
                    class="ml-auto sm:hidden p-2 rounded-lg
                           text-gray-600 hover:bg-gray-100">
                <svg class="w-6 h-6" fill="none" stroke="currentColor"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
    </div>
</nav>
