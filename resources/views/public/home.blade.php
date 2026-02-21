<x-guest-layout>
    {{-- HERO --}}
    <section
        id="home"
        class="relative scroll-mt-24
               min-h-screen
               flex items-center
               bg-gradient-to-br from-indigo-50 via-white to-purple-50
               py-20 overflow-hidden">

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

                    <div class="h-5 md:h-6">
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
            <div class="relative flex justify-center items-center min-h-[420px] w-full">

                <svg
                    class="absolute inset-0 w-full h-full z-0 pointer-events-none"
                    viewBox="0 0 600 600"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true"
                >

                    <defs>
                        <filter id="glow">
                            <feGaussianBlur stdDeviation="2.5" result="blur"/>
                            <feMerge>
                                <feMergeNode in="blur"/>
                                <feMergeNode in="SourceGraphic"/>
                            </feMerge>
                        </filter>
                    </defs>

                    <!-- RANDOM CIRCUIT PATHS -->
                    <g
                        stroke="rgba(59,130,246,0.35)"
                        stroke-width="1.3"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >

                        <path id="r1" d="M40 80 V200 L120 260 V380 L90 450" />
                        <path id="r2" d="M140 60 V140 L220 180 V300 L180 420" />
                        <path id="r3" d="M260 40 V160 L320 220 V360 L290 500" />
                        <path id="r4" d="M360 90 V210 L440 250 V390 L410 520" />
                        <path id="r5" d="M480 70 V150 L540 230 V340 L500 470" />

                        <!-- Small branches -->
                        <path d="M120 260 H170" />
                        <path d="M320 220 H370" />
                        <path d="M440 250 H500" />
                        <path d="M220 180 H260" />

                    </g>

                    <!-- RANDOM NODES -->
                    <g fill="rgba(99,102,241,0.5)">
                        <circle cx="120" cy="260" r="3"/>
                        <circle cx="320" cy="220" r="3"/>
                        <circle cx="440" cy="250" r="3"/>
                        <circle cx="220" cy="180" r="3"/>
                        <circle cx="180" cy="420" r="3"/>
                        <circle cx="290" cy="500" r="3"/>
                    </g>

                    <!-- MULTI COLOR DATA FLOW -->
                    <g filter="url(#glow)">

                        <circle r="3" fill="#3B82F6">
                            <animateMotion dur="4s" repeatCount="indefinite"
                                path="M40 80 V200 L120 260 V380 L90 450"/>
                        </circle>

                        <circle r="3" fill="#22D3EE">
                            <animateMotion dur="5s" repeatCount="indefinite" begin="1s"
                                path="M140 60 V140 L220 180 V300 L180 420"/>
                        </circle>

                        <circle r="3" fill="#A855F7">
                            <animateMotion dur="4.5s" repeatCount="indefinite" begin="0.5s"
                                path="M260 40 V160 L320 220 V360 L290 500"/>
                        </circle>

                        <circle r="3" fill="#10B981">
                            <animateMotion dur="5.5s" repeatCount="indefinite" begin="1.5s"
                                path="M360 90 V210 L440 250 V390 L410 520"/>
                        </circle>

                        <circle r="3" fill="#F59E0B">
                            <animateMotion dur="4.2s" repeatCount="indefinite" begin="2s"
                                path="M480 70 V150 L540 230 V340 L500 470"/>
                        </circle>

                    </g>

                </svg>

                {{-- IMAGE DEPTH SYSTEM --}}
                <div class="relative z-10 flex flex-col items-center">

                    <!-- Foto -->
                    <img
                        src="/images/profile.png"
                        alt="Profile"
                        class="w-72 md:w-80 xl:w-[360px]
                            drop-shadow-[0_50px_80px_rgba(0,0,0,0.35)]
                            select-none transition duration-500 hover:scale-105">

                    <!-- Ground Shadow -->
                    <div class="absolute -bottom-6
                                w-56 h-6
                                bg-black/30
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
