<x-guest-layout>
    {{-- HERO --}}
    <section
        id="home"
        class="scroll-mt-24
               min-h-screen
               flex items-center
               bg-gradient-to-br from-indigo-50 via-white to-purple-50
               py-20">

        <div class="max-w-6xl mx-auto px-6
                    grid md:grid-cols-2 gap-20 items-center">

            {{-- LEFT --}}
            <div class="space-y-10">

                <span
                    class="inline-flex items-center gap-2
                           px-5 py-2
                           text-sm font-medium rounded-full
                           bg-indigo-100 text-indigo-700">
                    <span class="w-2 h-2 bg-indigo-500 rounded-full"></span>
                    Available for freelance & full-time
                </span>

                <div class="space-y-5">
                    <h1 class="text-4xl md:text-5xl xl:text-6xl
                               font-extrabold
                               leading-[1.15] text-gray-900">
                        Hi, Saya
                        <span
                            class="block text-transparent bg-clip-text
                                   bg-gradient-to-r from-indigo-600 to-purple-600">
                            Fadhillah
                        </span>
                    </h1>

                    <div class="h-10 md:h-12">
                        <span
                            id="typing-text"
                            class="text-xl md:text-2xl font-semibold text-gray-700"
                            data-text='["Full Stack Web Developer","Mobile Developer","IoT Engineer","IT Support Specialist"]'>
                        </span>
                        <span
                            class="inline-block w-[2px] h-6 md:h-8
                                   bg-indigo-600 ml-1
                                   animate-pulse align-middle">
                        </span>
                    </div>
                </div>

                <p class="text-gray-600 leading-relaxed max-w-xl text-base md:text-lg">
                    Mengembangkan aplikasi web, mobile, dan sistem IoT menggunakan
                    <strong>Laravel</strong>, <strong>Flutter</strong>, dan <strong>ESP32</strong>.
                    Berpengalaman sebagai IT Support dan fokus pada solusi nyata,
                    scalable, dan siap industri.
                </p>

                <div>
                    @include('partials.social-icons')
                </div>

                <div class="flex gap-4 flex-wrap pt-4">
                    <a href="/#projects"
                       class="px-8 py-4 rounded-xl
                              bg-gradient-to-r from-indigo-600 to-purple-600
                              text-white font-semibold
                              shadow-lg shadow-indigo-500/30
                              hover:opacity-90 transition">
                        Lihat Project
                    </a>

                    <a href="/#contact"
                       class="px-8 py-4 rounded-xl
                              border border-gray-300
                              text-gray-700
                              hover:bg-gray-100 transition">
                        Kontak Saya
                    </a>
                </div>
            </div>

            {{-- ================= RIGHT ================= --}}
            <div class="relative flex justify-center items-center min-h-[420px]">

                {{-- SVG SIGNAL FLOW BACKGROUND --}}
                <svg
                    class="absolute inset-0 w-full h-full -z-10"
                    viewBox="0 0 600 600"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true"
                >

                    <!-- STATIC CIRCUIT PATHS -->
                    <g
                        stroke="rgba(99,102,241,0.22)"
                        stroke-width="1.2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >
                        <path id="path1" d="M80 120 C180 40, 320 40, 420 120" />
                        <path id="path2" d="M100 300 C220 220, 380 220, 500 300" />
                        <path id="path3" d="M150 480 L450 180" />
                        <path id="path4" d="M60 200 C120 260, 240 260, 320 200" />
                    </g>

                    <!-- MOVING SIGNALS -->
                    <g fill="rgba(99,102,241,0.9)">

                        <!-- SIGNAL 1 -->
                        <circle r="2.5">
                            <animateMotion
                                dur="3.5s"
                                repeatCount="indefinite"
                                path="M80 120 C180 40, 320 40, 420 120"
                            />
                        </circle>

                        <!-- SIGNAL 2 -->
                        <circle r="2.5">
                            <animateMotion
                                dur="4s"
                                repeatCount="indefinite"
                                begin="1s"
                                path="M100 300 C220 220, 380 220, 500 300"
                            />
                        </circle>

                        <!-- SIGNAL 3 -->
                        <circle r="2">
                            <animateMotion
                                dur="3s"
                                repeatCount="indefinite"
                                begin="0.5s"
                                path="M150 480 L450 180"
                            />
                        </circle>

                        <!-- SIGNAL 4 -->
                        <circle r="2">
                            <animateMotion
                                dur="4.5s"
                                repeatCount="indefinite"
                                begin="2s"
                                path="M60 200 C120 260, 240 260, 320 200"
                            />
                        </circle>

                    </g>

                </svg>


                {{-- IMAGE DEPTH SYSTEM --}}
                <div class="relative z-10 flex flex-col items-center">

                    {{-- AMBIENT GLOW (MENYATUKAN FOTO & BACKGROUND) --}}
                    <div
                        class="absolute inset-0 -z-10
                            rounded-3xl
                            bg-indigo-400/20
                            blur-3xl">
                    </div>

                    {{-- PHOTO --}}
                    <img
                        src="/images/profile.png"
                        alt="Profile"
                        class="w-72 md:w-80 xl:w-[360px]
                            rounded-3xl
                            shadow-[0_40px_80px_-30px_rgba(0,0,0,0.35)]
                            select-none"
                    >

                    {{-- GROUND SHADOW (BIAR NAPAK / TIDAK NGAMBANG) --}}
                    <div
                        class="absolute -bottom-6
                            w-56 h-6
                            bg-black/25
                            blur-2xl
                            rounded-full">
                    </div>
                </div>
            </div>


        </div>
    </section>

    @extends('public.contact')
    @extends('public.projects')
    @extends('public.skills')
    @extends('public.services')
    @extends('public.about')

    {{-- TYPING SCRIPT --}}
    <script>
        const el = document.getElementById('typing-text');
        const texts = JSON.parse(el.dataset.text);

        let textIndex = 0;
        let charIndex = 0;
        let isDeleting = false;

        function typeEffect() {
            const current = texts[textIndex];

            if (!isDeleting) {
                el.textContent = current.slice(0, ++charIndex);
                if (charIndex === current.length) {
                    setTimeout(() => isDeleting = true, 1200);
                }
            } else {
                el.textContent = current.slice(0, --charIndex);
                if (charIndex === 0) {
                    isDeleting = false;
                    textIndex = (textIndex + 1) % texts.length;
                }
            }

            setTimeout(typeEffect, isDeleting ? 60 : 90);
        }

        typeEffect();
    </script>
    <script>
    document.addEventListener('mousemove', (e) => {
        document.querySelectorAll('.blob').forEach(blob => {
            const speed = blob.classList.contains('blob-2') ? 0.02 : 0.01
            blob.style.transform =
            `translate(${e.clientX * speed}px, ${e.clientY * speed}px)`
        })
    })
    </script>

</x-guest-layout>
