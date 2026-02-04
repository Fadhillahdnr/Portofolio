<nav x-data="{ open: false }"
     class="bg-white border-b border-gray-200 sticky top-0 z-50">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            {{-- Left --}}
            <div class="flex items-center gap-10">

                {{-- Logo --}}
                <a href="{{ route('admin.dashboard') }}"
                   class="flex items-center gap-2 font-bold text-lg text-indigo-600">
                    <x-application-logo class="h-8 w-auto" />
                    <span>Admin</span>
                </a>

                {{-- Menu --}}
                <div class="hidden sm:flex items-center gap-6">
                    <a href="{{ route('admin.dashboard') }}"
                       class="text-sm font-medium
                       {{ request()->routeIs('admin.dashboard')
                           ? 'text-indigo-600'
                           : 'text-gray-600 hover:text-indigo-600' }}">
                        Dashboard
                    </a>

                    <a href="{{ route('admin.projects.index') }}"
                       class="text-sm font-medium text-gray-600 hover:text-indigo-600">
                        Projects
                    </a>
                </div>
            </div>

            {{-- Right --}}
            <div class="hidden sm:flex items-center gap-4">

                {{-- User Dropdown --}}
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="flex items-center gap-2
                                   bg-gray-100 hover:bg-gray-200
                                   px-3 py-2 rounded-xl transition text-sm">
                            <span class="font-medium text-gray-700">
                                {{ Auth::user()->name }}
                            </span>

                            <svg class="w-4 h-4 text-gray-500"
                                 fill="none" stroke="currentColor"
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

            {{-- Mobile Button --}}
            <div class="flex items-center sm:hidden">
                <button @click="open = !open"
                        class="p-2 rounded-lg text-gray-600 hover:bg-gray-100">
                    <svg class="w-6 h-6" fill="none"
                         stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div x-show="open" class="sm:hidden border-t border-gray-200">
        <div class="px-4 py-3 space-y-2">
            <a href="{{ route('admin.dashboard') }}"
               class="block text-sm text-gray-700 hover:text-indigo-600">
                Dashboard
            </a>

            <a href="{{ route('admin.projects.index') }}"
               class="block text-sm text-gray-700 hover:text-indigo-600">
                Projects
            </a>
        </div>
    </div>
</nav>
