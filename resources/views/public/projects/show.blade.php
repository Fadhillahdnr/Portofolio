<x-guest-layout>

    {{-- ================= PAGE WRAPPER ================= --}}
    <section class="min-h-screen pt-28 md:pt-32 lg:pt-36 pb-24 scroll-mt-24 bg-gradient-to-br from-indigo-50 via-white to-purple-50">

        <div class="max-w-5xl mx-auto px-6">

            {{-- ================= PROJECT HEADER ================= --}}
            <header class="mb-20">

                {{-- CATEGORY --}}
                <span
                    class="inline-flex items-center gap-2
                           mb-6 px-4 py-1.5
                           rounded-full text-sm font-medium
                           bg-indigo-100 text-indigo-700">
                    {{ $project->category }}
                </span>

                {{-- TITLE --}}
                <h1
                    class="text-4xl md:text-5xl
                           font-extrabold tracking-tight
                           text-gray-900">
                    {{ $project->title }}
                </h1>

                {{-- DESCRIPTION --}}
                <p
                    class="mt-6 max-w-3xl
                           text-lg leading-relaxed
                           text-gray-600">
                    {{ $project->description }}
                </p>

                @if ($project->demo_url || $project->github_url)
                <div class="mt-8 flex flex-wrap gap-4">

                    {{-- Live Demo --}}
                    @if ($project->demo_url)
                        <a href="{{ $project->demo_url }}"
                        target="_blank"
                        class="inline-flex items-center gap-3
                                px-6 py-3
                                rounded-2xl
                                bg-gradient-to-r from-indigo-600 to-purple-600
                                text-white font-semibold
                                shadow-lg
                                transition-all duration-300
                                hover:shadow-xl hover:-translate-y-1">
                            🚀 Live Demo
                        </a>
                    @endif

                    {{-- GitHub --}}
                    @if ($project->github_url)
                        <a href="{{ $project->github_url }}"
                        target="_blank"
                        class="px-6 py-3 rounded-2xl border border-gray-300
                                text-gray-700 font-semibold
                                hover:border-indigo-500 hover:text-indigo-600
                                transition">
                            💻 View Code
                        </a>
                    @endif

                </div>
            @endif

            </header>

            {{-- ================= IMAGE GALLERY ================= --}}
            @if ($project->images->count())
            <section class="mb-28">

                <div class="swiper projectSwiper
                            rounded-3xl overflow-hidden
                            shadow-[0_30px_80px_-30px_rgba(0,0,0,0.25)]">

                    <div class="swiper-wrapper">
                        @foreach ($project->images as $image)
                            <div class="swiper-slide">
                                <img
                                    src="{{ $image->image }}"
                                    alt="Project image"
                                    class="w-full h-[460px] object-cover cursor-zoom-in"
                                    onclick="openLightbox(this.src)">
                            </div>
                        @endforeach
                    </div>

                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>

                </div>

            </section>
            @endif

            {{-- ================= README / DOCUMENTATION ================= --}}
            @if ($readmeHtml)
                <section class="mb-28">

                    {{-- SECTION TITLE --}}
                    <div class="flex items-center gap-4 mb-8">
                        <div
                            class="w-11 h-11 rounded-2xl
                                   bg-gradient-to-r from-indigo-600 to-purple-600
                                   flex items-center justify-center
                                   text-white text-lg">
                            📘
                        </div>

                        <h2 class="text-2xl font-bold text-gray-900">
                            Project Documentation
                        </h2>
                    </div>

                    {{-- README CARD --}}
                    <div
                        class="bg-white
                               rounded-3xl
                               border border-gray-200
                               shadow-[0_30px_80px_-40px_rgba(0,0,0,0.3)]
                               overflow-hidden">

                        {{-- GITHUB STYLE HEADER --}}
                        <div
                            class="flex items-center gap-3
                                   px-6 py-4
                                   bg-gray-50 border-b">

                            <i class="bi bi-markdown-fill text-gray-500"></i>

                            <span class="text-sm font-semibold text-gray-700">
                                README.md
                            </span>

                            <span class="text-xs text-gray-400">
                                rendered as GitHub Markdown
                            </span>
                        </div>

                        {{-- README CONTENT --}}
                        <article
                            class="prose prose-github max-w-none
                                   px-8 py-10
                                   prose-headings:scroll-mt-32
                                   prose-img:rounded-xl
                                   prose-pre:rounded-xl
                                   prose-pre:shadow-inner
                                   prose-hr:my-12">
                            {!! $readmeHtml !!}
                        </article>

                    </div>

                </section>
            @endif

            {{-- ================= BACK LINK ================= --}}
            <footer class="mt-20 flex justify-center">
                <a
                    href="/"
                    class="group inline-flex items-center gap-4
                        px-6 py-3
                        rounded-2xl
                        bg-white
                        border border-gray-200
                        shadow-sm
                        text-gray-700 font-semibold
                        transition-all duration-300
                        hover:shadow-xl
                        hover:-translate-y-0.5
                        hover:border-indigo-300
                        hover:text-indigo-600">

                    {{-- Icon --}}
                    <span
                        class="flex items-center justify-center
                            w-10 h-10 rounded-xl
                            bg-indigo-50 text-indigo-600
                            transition-all duration-300
                            group-hover:bg-indigo-600
                            group-hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M15 19l-7-7 7-7" />
                        </svg>
                    </span>

                    {{-- Text --}}
                    <div class="text-left leading-tight">
                        <p class="text-xs text-gray-400 group-hover:text-indigo-400 transition">
                            Back to
                        </p>
                        <p class="text-sm font-bold">
                            Home
                        </p>
                    </div>
                </a>
            </footer>


        </div>
    </section>

    {{-- ================= LIGHTBOX ================= --}}
    <div
        id="lightbox"
        class="fixed inset-0 z-[999]
               hidden items-center justify-center
               bg-black/80 backdrop-blur-sm"
        onclick="closeLightbox()">

        <img
            id="lightboxImage"
            class="max-w-[90%] max-h-[90%]
                   rounded-2xl shadow-2xl">
    </div>

    {{-- ================= SWIPER ================= --}}
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        new Swiper(".projectSwiper", {
            loop: true,
            spaceBetween: 24,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });

        function openLightbox(src) {
            const lb = document.getElementById('lightbox');
            lb.classList.remove('hidden');
            lb.classList.add('flex');
            document.getElementById('lightboxImage').src = src;
        }

        function closeLightbox() {
            const lb = document.getElementById('lightbox');
            lb.classList.add('hidden');
            lb.classList.remove('flex');
        }
    </script>

</x-guest-layout>
