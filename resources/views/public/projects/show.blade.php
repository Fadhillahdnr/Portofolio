<x-guest-layout>

    {{-- ===== PAGE BACKGROUND ===== --}}
    <section class="min-h-screen pt-28 pb-24
                    bg-gradient-to-br from-indigo-50 via-white to-purple-50">

        <div class="max-w-6xl mx-auto px-6">

            {{-- ===== HEADER ===== --}}
            <div class="max-w-3xl">
                <span class="inline-block mb-4 px-4 py-1 text-sm font-medium rounded-full
                             bg-indigo-100 text-indigo-700">
                    {{ $project->category }}
                </span>

                <h1 class="text-4xl md:text-5xl font-extrabold leading-tight">
                    {{ $project->title }}
                </h1>

                <p class="mt-6 text-gray-600 leading-relaxed">
                    {{ $project->description }}
                </p>
            </div>

            {{-- ===== GALLERY SLIDER ===== --}}
            @if ($project->images->count())
                <div class="mt-14">

                    <div class="swiper projectSwiper rounded-3xl overflow-hidden shadow-xl">
                        <div class="swiper-wrapper">

                            @foreach ($project->images as $image)
                                <div class="swiper-slide">
                                    <img
                                        src="{{ asset('storage/' . $image->image) }}"
                                        alt="Project image"
                                        class="w-full h-[420px] object-cover cursor-zoom-in"
                                        onclick="openLightbox(this.src)"
                                    >
                                </div>
                            @endforeach

                        </div>

                        {{-- navigation --}}
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination"></div>
                    </div>

                </div>
            @endif

            {{-- ===== BACK BUTTON ===== --}}
            <div class="mt-14">
                <a href="/"
                   class="inline-flex items-center gap-2 text-indigo-600 font-medium
                          hover:gap-3 transition-all">
                    <span>←</span>
                    Kembali ke Home
                </a>
            </div>

        </div>
    </section>

    {{-- ===== LIGHTBOX ===== --}}
    <div id="lightbox"
         class="fixed inset-0 bg-black/80 backdrop-blur-sm hidden
                items-center justify-center z-[999]"
         onclick="closeLightbox()">

        <img id="lightboxImage"
             class="max-w-[90%] max-h-[90%] rounded-2xl shadow-2xl">
    </div>

    {{-- ===== SWIPER CDN ===== --}}
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        new Swiper(".projectSwiper", {
            loop: true,
            spaceBetween: 20,
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
            document.getElementById('lightbox').classList.remove('hidden');
            document.getElementById('lightbox').classList.add('flex');
            document.getElementById('lightboxImage').src = src;
        }

        function closeLightbox() {
            document.getElementById('lightbox').classList.add('hidden');
            document.getElementById('lightbox').classList.remove('flex');
        }
    </script>

</x-guest-layout>
