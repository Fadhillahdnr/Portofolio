<nav
    x-data="{
        open: false,
        scrolled: false,
        active: 'home'
    }"
    x-init="
        window.addEventListener('scroll', () => {
            scrolled = window.scrollY > 20
        })
    "
    :class="scrolled
        ? 'bg-white/90 shadow-lg border-indigo-200/40'
        : 'bg-white/70 border-indigo-100/30'"
    class="fixed top-0 inset-x-0 z-50
           backdrop-blur-xl
           border-b
           transition-all duration-300"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center relative">

            {{-- ================= LEFT (LOGO) ================= --}}
            <a href="#home"
               @click="active='home'"
               class="flex items-center gap-3 group z-10">

                <img
                    src="{{ asset('images/logo2.png') }}"
                    alt="Logo"
                    :class="scrolled ? 'h-9' : 'h-11'"
                    class="w-auto object-contain
                           transition-all duration-300
                           group-hover:scale-105"
                />

                <span
                    class="hidden sm:block font-extrabold tracking-wide
                           text-transparent bg-clip-text
                           bg-gradient-to-r from-indigo-600 to-purple-600
                           transition-all duration-300"
                    :class="scrolled ? 'text-base' : 'text-lg'"
                >
                </span>
            </a>

            {{-- ================= CENTER MENU ================= --}}
            <div class="hidden md:flex absolute left-1/2 -translate-x-1/2
                        items-center gap-8 text-sm font-medium">

                <template x-for="item in [
                    {id:'home', label:'Home'},
                    {id:'about', label:'About'},
                    {id:'services', label:'Services'},
                    {id:'projects', label:'Projects'},
                    {id:'contact', label:'Contact'}
                ]">
                    <a
                        :href="'#' + item.id"
                        @click="active = item.id"
                        class="relative text-gray-700 hover:text-indigo-600 transition"
                    >
                        <span x-text="item.label"></span>

                        {{-- underline --}}
                        <span
                            class="absolute -bottom-1 left-0 h-[2px]
                                   bg-gradient-to-r from-indigo-600 to-purple-600
                                   rounded-full transition-all duration-300"
                            :class="active === item.id
                                ? 'w-full opacity-100'
                                : 'w-0 opacity-0'"
                        ></span>
                    </a>
                </template>
            </div>

            {{-- ================= RIGHT CTA ================= --}}
            <div class="ml-auto hidden md:flex z-10">
                <a href="#contact"
                   @click="active='contact'"
                   class="px-5 py-2 rounded-xl text-white text-sm font-semibold
                          bg-gradient-to-r from-indigo-600 to-purple-600
                          hover:opacity-90 transition shadow-md">
                    Hire Me
                </a>
            </div>

            {{-- ================= MOBILE BUTTON ================= --}}
            <button
                @click="open = !open"
                class="md:hidden ml-auto p-2 rounded-lg
                       text-gray-700 hover:bg-indigo-100/50 transition"
            >
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path
                        x-show="!open"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16" />
                    <path
                        x-show="open"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    {{-- ================= MOBILE MENU ================= --}}
    <div
        x-show="open"
        x-transition
        @click.outside="open = false"
        class="md:hidden bg-white/95 backdrop-blur-xl
               border-t border-indigo-100"
    >
        <div class="px-6 py-6 space-y-4 text-sm font-medium">
            <template x-for="item in [
                {id:'home', label:'Home'},
                {id:'about', label:'About'},
                {id:'services', label:'Services'},
                {id:'projects', label:'Projects'},
                {id:'contact', label:'Contact'}
            ]">
                <a
                    :href="'#' + item.id"
                    @click="open=false; active=item.id"
                    class="block text-gray-700 hover:text-indigo-600 transition"
                    :class="active === item.id ? 'font-semibold text-indigo-600' : ''"
                    x-text="item.label"
                ></a>
            </template>

            <a href="#contact"
               @click="open=false; active='contact'"
               class="mt-4 block w-full text-center
                      px-5 py-3 rounded-xl text-white
                      bg-gradient-to-r from-indigo-600 to-purple-600
                      shadow-md">
                Hire Me
            </a>
        </div>
    </div>
</nav>
