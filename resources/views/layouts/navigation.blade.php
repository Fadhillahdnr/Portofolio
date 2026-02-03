<nav
    x-data="{ open: false }"
    class="fixed top-0 inset-x-0 z-50
           backdrop-blur-xl
           border-b border-indigo-200/30
           transition-all duration-300"
    style="background: linear-gradient(
        to bottom,
        rgba(255,255,255,0.85),
        rgba(255,255,255,0.65)
    );">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">

            <!-- LOGO -->
            <a href="#home" class="flex items-center gap-3">
                <img
                    src="{{ asset('images/logo2.png') }}"
                    alt="MFD Logo"
                    class="h-10 md:h-12 w-auto object-contain
                           transition-transform duration-300 hover:scale-105"
                />

                <span class="hidden sm:block font-extrabold text-lg
                             text-transparent bg-clip-text
                             bg-gradient-to-r from-indigo-600 to-purple-600">
                    Fadhillah
                </span>
            </a>

            <!-- DESKTOP MENU -->
            <div class="hidden md:flex items-center gap-8 text-sm font-medium">
                <a href="#home" class="text-gray-700 hover:text-indigo-600 transition">
                    Home
                </a>
                <a href="#about" class="text-gray-700 hover:text-indigo-600 transition">
                    About
                </a>
                <a href="#services" class="text-gray-700 hover:text-indigo-600 transition">
                    Services
                </a>
                <a href="#projects" class="text-gray-700 hover:text-indigo-600 transition">
                    Projects
                </a>
                <a href="#contact" class="text-gray-700 hover:text-indigo-600 transition">
                    Contact
                </a>
            </div>

            <!-- CTA -->
            <div class="hidden md:flex">
                <a href="#contact"
                   class="px-5 py-2 rounded-xl text-white text-sm font-semibold
                          bg-gradient-to-r from-indigo-600 to-purple-600
                          hover:opacity-90 transition shadow-lg">
                    Hire Me
                </a>
            </div>

            <!-- MOBILE BUTTON -->
            <div class="md:hidden">
                <button
                    @click="open = !open"
                    x-bind:aria-expanded="open"
                    aria-controls="mobile-menu"
                    aria-label="Toggle navigation"
                    class="p-2 rounded-lg text-gray-700
                           hover:bg-indigo-100/50 transition focus:outline-none focus:ring-2 focus:ring-indigo-500">

                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path
                            x-cloak
                            x-show="!open"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path
                            x-cloak
                            x-show="open"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- MOBILE MENU -->
    <div
        id="mobile-menu"
        x-cloak
        x-show="open"
        x-transition.opacity.duration.200
        @click.outside="open = false"
        class="md:hidden backdrop-blur-xl border-t border-indigo-200/30"
        style="background: linear-gradient(
            to bottom,
            rgba(255,255,255,0.95),
            rgba(255,255,255,0.85)
        );"
        role="menu">

        <div class="px-6 py-6 space-y-4 text-sm font-medium">
            <a href="#home" @click="open=false" role="menuitem" tabindex="0" class="block text-gray-700 hover:text-indigo-600">
                Home
            </a>
            <a href="#about" @click="open=false" role="menuitem" tabindex="0" class="block text-gray-700 hover:text-indigo-600">
                About
            </a>
            <a href="#services" @click="open=false" role="menuitem" tabindex="0" class="block text-gray-700 hover:text-indigo-600">
                Services
            </a>
            <a href="#projects" @click="open=false" role="menuitem" tabindex="0" class="block text-gray-700 hover:text-indigo-600">
                Projects
            </a>
            <a href="#contact" @click="open=false" role="menuitem" tabindex="0" class="block font-semibold text-indigo-600">
                Contact
            </a>

            <a href="#contact"
               @click="open=false"
               role="menuitem"
               aria-label="Hire Me"
               class="mt-4 block w-full text-center
                      px-5 py-3 rounded-xl text-white
                      bg-gradient-to-r from-indigo-600 to-purple-600
                      shadow-lg">
                Hire Me
            </a>
        </div>
    </div> 
</nav>
