<x-guest-layout>
    {{-- HERO --}}
    <section id="home" class="scroll-mt-24 relative min-h-screen pt-24 md:pt-28 flex items-center  bg-gradient-to-br from-indigo-50 via-white to-purple-50">
        <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">
            <!-- LEFT CONTENT -->
            <div>
                <span
                    class="inline-block mb-4 px-4 py-1 text-sm font-medium rounded-full        bg-indigo-100 text-indigo-700">
                    👋 Available for freelance & full-time
                </span>

                <h1 class="text-4xl md:text-6xl font-extrabold leading-tight">
                    Hi, Saya
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">
                        Fadhillah
                    </span>
                    <br>
                    Web & Mobile Developer
                </h1>

                <p class="mt-6 text-gray-600 leading-relaxed max-w-xl">
                    Membangun aplikasi web, mobile, dan sistem IoT menggunakan Laravel,
                    Flutter, dan ESP32. Fokus pada solusi nyata dan scalable.
                </p>

                <!-- SOCIAL ICONS -->
                <div class="mt-8">
                    @include('partials.social-icons')
                </div>


                <!-- CTA -->
                <div class="mt-10 flex gap-4 flex-wrap">
                    <a href="#projects"
                    class="px-8 py-4 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl shadow-lg transition">
                        Lihat Project
                    </a>

                    <a href="#contact" class="px-8 py-4 border border-gray-300 rounded-xl hover:bg-gray-100 transition">
                        Kontak Saya
                    </a>
                </div>
            </div>

            <!-- RIGHT IMAGE -->
            <div class="flex justify-center relative">
                <div
                    class="absolute -inset-6
                        bg-gradient-to-r from-indigo-500/20 to-purple-500/20
                        blur-3xl rounded-full">
                </div>

                <img src="/images/profile.png"
                    class="relative w-72 md:w-80
                            rounded-3xl shadow-2xl"
                    alt="Profile">
            </div>
        </div>
    </section>



    {{-- ABOUT --}}
    <section id="about" class="scroll-mt-24 py-28 bg-gradient-to-b from-gray-50 via-white to-gray-50">
        <div class="max-w-6xl mx-auto px-6">

            {{-- HEADER --}}
            <div class="text-center max-w-3xl mx-auto">
                <span class="inline-block mb-4 px-4 py-1 text-sm font-semibold rounded-full
                            bg-indigo-100 text-indigo-600">
                    About Me
                </span>

                <h2 class="text-4xl md:text-5xl font-extrabold text-gray-800 tracking-tight">
                    Tentang Saya
                </h2>

                <p class="mt-6 text-gray-600 leading-relaxed text-lg">
                    Halo, saya
                    <span class="font-semibold text-gray-800">Muhamad Fadhillah Dinurahman</span>,
                    lulusan <span class="font-semibold">S1 Teknik Informatika</span>
                    dari <span class="font-semibold">Universitas Muhammadiyah Sukabumi</span>.
                    Saya adalah <span class="font-semibold">Full Stack Developer</span> dengan fokus pada
                    Web, Mobile, dan IoT Development, terbiasa mengerjakan project end-to-end
                    dari backend hingga user interface.
                </p>
            </div>

            {{-- EXPERIENCE --}}
            <div class="mt-20">
                <h3 class="text-2xl md:text-3xl font-bold text-gray-800 text-center mb-12">
                    Experience
                </h3>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

                    {{-- IT SUPPORT JNT --}}
                    <div class="group relative p-7 bg-white rounded-2xl
                                shadow-[0_20px_40px_-20px_rgba(0,0,0,0.25)]
                                hover:-translate-y-2 transition-all duration-300">

                        <div class="absolute inset-0 rounded-2xl bg-gradient-to-br
                                    from-indigo-500/10 to-transparent opacity-0
                                    group-hover:opacity-100 transition"></div>

                        <div class="relative">
                            <div class="w-14 h-14 flex items-center justify-center
                                        rounded-xl bg-indigo-100 text-indigo-600 text-2xl mb-5">
                                🖥️
                            </div>

                            <h4 class="font-bold text-lg text-gray-800">
                                IT Support – JNT Express
                            </h4>

                            <p class="mt-4 text-sm text-gray-600 leading-relaxed">
                                Menangani troubleshooting perangkat komputer, jaringan,
                                serta sistem operasional kantor untuk memastikan kelancaran
                                aktivitas harian perusahaan dengan solusi cepat dan tepat.
                            </p>
                        </div>
                    </div>

                    {{-- IT SUPPORT GRAHA KARYA --}}
                    <div class="group relative p-7 bg-white rounded-2xl
                                shadow-[0_20px_40px_-20px_rgba(0,0,0,0.25)]
                                hover:-translate-y-2 transition-all duration-300">

                        <div class="absolute inset-0 rounded-2xl bg-gradient-to-br
                                    from-emerald-500/10 to-transparent opacity-0
                                    group-hover:opacity-100 transition"></div>

                        <div class="relative">
                            <div class="w-14 h-14 flex items-center justify-center
                                        rounded-xl bg-emerald-100 text-emerald-600 text-2xl mb-5">
                                🏢
                            </div>

                            <h4 class="font-bold text-lg text-gray-800">
                                IT Support Freelance – PT Graha Karya
                            </h4>

                            <p class="mt-4 text-sm text-gray-600 leading-relaxed">
                                Mewakili PT Graha Karya sebagai IT Support dalam kerja sama
                                upgrade perangkat dengan BPJS Sukabumi, meliputi instalasi,
                                konfigurasi, serta pemeliharaan sistem IT.
                            </p>
                        </div>
                    </div>

                    {{-- WEB DEV --}}
                    <div class="group relative p-7 bg-white rounded-2xl
                                shadow-[0_20px_40px_-20px_rgba(0,0,0,0.25)]
                                hover:-translate-y-2 transition-all duration-300">

                        <div class="absolute inset-0 rounded-2xl bg-gradient-to-br
                                    from-sky-500/10 to-transparent opacity-0
                                    group-hover:opacity-100 transition"></div>

                        <div class="relative">
                            <div class="w-14 h-14 flex items-center justify-center
                                        rounded-xl bg-sky-100 text-sky-600 text-2xl mb-5">
                                🌐
                            </div>

                            <h4 class="font-bold text-lg text-gray-800">
                                Web Developer Freelance
                            </h4>

                            <p class="mt-4 text-sm text-gray-600 leading-relaxed">
                                Mengembangkan website E-Commerce dan UMKM menggunakan Laravel
                                dan Laravel Breeze untuk autentikasi, serta Bootstrap,
                                Tailwind, dan CSS untuk UI yang modern dan responsif.
                            </p>
                        </div>
                    </div>

                    {{-- MOBILE DEV --}}
                    <div class="group relative p-7 bg-white rounded-2xl
                                shadow-[0_20px_40px_-20px_rgba(0,0,0,0.25)]
                                hover:-translate-y-2 transition-all duration-300">

                        <div class="absolute inset-0 rounded-2xl bg-gradient-to-br
                                    from-fuchsia-500/10 to-transparent opacity-0
                                    group-hover:opacity-100 transition"></div>

                        <div class="relative">
                            <div class="w-14 h-14 flex items-center justify-center
                                        rounded-xl bg-fuchsia-100 text-fuchsia-600 text-2xl mb-5">
                                📱
                            </div>

                            <h4 class="font-bold text-lg text-gray-800">
                                Mobile Developer – Flutter
                            </h4>

                            <p class="mt-4 text-sm text-gray-600 leading-relaxed">
                                Membangun aplikasi Android E-Commerce / UMKM menggunakan
                                Flutter dengan fokus pada performa aplikasi, UI/UX,
                                dan integrasi API.
                            </p>
                        </div>
                    </div>

                    {{-- IOT --}}
                    <div class="group relative p-7 bg-white rounded-2xl
                                shadow-[0_20px_40px_-20px_rgba(0,0,0,0.25)]
                                hover:-translate-y-2 transition-all duration-300
                                md:col-span-2 lg:col-span-1">

                        <div class="absolute inset-0 rounded-2xl bg-gradient-to-br
                                    from-orange-500/10 to-transparent opacity-0
                                    group-hover:opacity-100 transition"></div>

                        <div class="relative">
                            <div class="w-14 h-14 flex items-center justify-center
                                        rounded-xl bg-orange-100 text-orange-600 text-2xl mb-5">
                                📡
                            </div>

                            <h4 class="font-bold text-lg text-gray-800">
                                IoT Engineer Freelance
                            </h4>

                            <p class="mt-4 text-sm text-gray-600 leading-relaxed">
                                Mengembangkan sistem tracking kendaraan berbasis ESP32,
                                SIM800L, dan GPS Neo-6M dengan visualisasi real-time di
                                website Laravel serta fitur rute terdekat menggunakan
                                Algoritma Dijkstra.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    {{-- SERVICES --}}
   <section id="services" class="scroll-mt-24 py-24 bg-gradient-to-b from-indigo-50 to-white">
        <div class="max-w-6xl mx-auto px-6">
            <!-- Heading -->
            <div class="text-center max-w-2xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-bold">
                    Services
                </h2>
                <p class="mt-4 text-gray-600">
                    Layanan yang saya tawarkan untuk membantu bisnis dan produk
                    berkembang melalui solusi digital yang tepat.
                </p>
            </div>
            <!-- Services Grid -->
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Mobile Development -->
                <div
                    class="group relative p-8 rounded-3xl
                        bg-white border border-indigo-100
                        shadow-sm
                        hover:-translate-y-3 hover:shadow-2xl
                        transition-all duration-300">

                    <!-- Gradient hover -->
                    <div
                        class="absolute inset-0 rounded-3xl opacity-0
                            group-hover:opacity-100
                            bg-gradient-to-br from-indigo-500/10 to-purple-500/10
                            transition">
                    </div>

                    <div class="relative text-center">
                        <div
                            class="mx-auto flex items-center justify-center
                                w-16 h-16 rounded-2xl
                                bg-gradient-to-br from-indigo-600 to-purple-600
                                text-white text-3xl shadow-lg">
                            <i class="bi bi-phone"></i>
                        </div>

                        <h5 class="mt-6 text-xl font-semibold">
                            Mobile Development
                        </h5>

                        <p class="mt-3 text-gray-600 leading-relaxed">
                            Pengembangan aplikasi mobile yang responsif, cepat,
                            dan optimal menggunakan Flutter untuk berbagai platform.
                        </p>
                    </div>
                </div>

                <!-- Web Development -->
                <div
                    class="group relative p-8 rounded-3xl
                        bg-white border border-indigo-100
                        shadow-sm
                        hover:-translate-y-3 hover:shadow-2xl
                        transition-all duration-300">

                    <div
                        class="absolute inset-0 rounded-3xl opacity-0
                            group-hover:opacity-100
                            bg-gradient-to-br from-indigo-500/10 to-purple-500/10
                            transition">
                    </div>

                    <div class="relative text-center">
                        <div
                            class="mx-auto flex items-center justify-center
                                w-16 h-16 rounded-2xl
                                bg-gradient-to-br from-indigo-600 to-purple-600
                                text-white text-3xl shadow-lg">
                            <i class="bi bi-code-slash"></i>
                        </div>

                        <h5 class="mt-6 text-xl font-semibold">
                            Web Development
                        </h5>

                        <p class="mt-3 text-gray-600 leading-relaxed">
                            Pembuatan website modern, scalable, dan aman
                            menggunakan Laravel, Livewire, dan REST API.
                        </p>
                    </div>
                </div>

                <!-- Internet of Things -->
                <div
                    class="group relative p-8 rounded-3xl
                        bg-white border border-indigo-100
                        shadow-sm
                        hover:-translate-y-3 hover:shadow-2xl
                        transition-all duration-300">

                    <div
                        class="absolute inset-0 rounded-3xl opacity-0
                            group-hover:opacity-100
                            bg-gradient-to-br from-indigo-500/10 to-purple-500/10
                            transition">
                    </div>

                    <div class="relative text-center">
                        <div
                            class="mx-auto flex items-center justify-center
                                w-16 h-16 rounded-2xl
                                bg-gradient-to-br from-indigo-600 to-purple-600
                                text-white text-3xl shadow-lg">
                            <i class="bi bi-cpu"></i>
                        </div>

                        <h5 class="mt-6 text-xl font-semibold">
                            Internet of Things
                        </h5>

                        <p class="mt-3 text-gray-600 leading-relaxed">
                            Integrasi perangkat IoT (ESP32) dengan backend
                            untuk monitoring, automasi, dan data real-time.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>


    {{-- SKILLS --}}
    <section id="skills" class="scroll-mt-24 py-24 bg-gradient-to-b from-white to-indigo-50">
        <div class="max-w-6xl mx-auto px-6">
            <!-- Heading -->
            <div class="text-center max-w-2xl mx-auto">
                <h2 class="text-3xl md:text-4xl font-bold">
                    Tech Stack
                </h2>
                <p class="mt-4 text-gray-600">
                    Teknologi yang sering saya gunakan untuk membangun aplikasi web,
                    mobile, dan sistem IoT yang scalable.
                </p>
            </div>

            <!-- Skills Grid -->
            <div class="mt-14 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6">
                @foreach ([
                    'HTML', 'CSS', 'JavaScript', 'PHP',
                    'Laravel', 'REST API', 'MySQL',
                    'Flutter', 'Dart',
                    'C / C++', 'ESP32',
                    'Go'
                ] as $skill)

                    <div
                        class="group relative p-5 rounded-2xl
                            bg-white border border-indigo-100
                            shadow-sm
                            hover:-translate-y-2 hover:shadow-xl
                            transition-all duration-300">

                        <!-- Gradient glow -->
                        <div
                            class="absolute inset-0 rounded-2xl opacity-0
                                group-hover:opacity-100
                                bg-gradient-to-r from-indigo-500/10 to-purple-500/10
                                transition">
                        </div>

                        <div class="relative flex flex-col items-center gap-2">
                            <span class="text-sm font-semibold tracking-wide
                                        text-gray-800 group-hover:text-indigo-600 transition">
                                {{ $skill }}
                            </span>

                            <span class="h-1 w-8 rounded-full bg-indigo-500 opacity-0
                                        group-hover:opacity-100 transition">
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    {{-- PROJECTS --}}
    <section id="projects" class="scroll-mt-24 py-20 bg-gray-50">
        <div class="max-w-6xl mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12">
                My Projects
            </h2>

            <div class="grid md:grid-cols-3 gap-8">
                @foreach ($projects as $project)
                    <a href="{{ route('projects.show', $project->slug) }}"
                    class="group block bg-white rounded-2xl shadow overflow-hidden">

                        <img src="{{ asset('storage/' . $project->thumbnail) }}"
                            class="h-52 w-full object-cover group-hover:scale-105 transition">

                        <div class="p-4">
                            <h3 class="font-semibold text-lg">
                                {{ $project->title }}
                            </h3>

                            <span class="text-sm text-indigo-600">
                                {{ $project->category }}
                            </span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>


    {{-- CONTACT --}}
    <section id="contact" class="scroll-mt-24 py-24 text-center bg-gradient-to-r from-indigo-600 to-purple-600 text-white">
        <h2 class="text-3xl font-bold">Tertarik Bekerja Sama?</h2>
        <p class="mt-4 opacity-90">
            Saya terbuka untuk freelance, kontrak, maupun full-time.
        </p>

        <a href="mailto:m.fadhillah1218@gmail.com"
        class="inline-block mt-8 px-8 py-4 bg-white text-indigo-600 font-semibold rounded-xl shadow-lg hover:scale-105 transition">
            Hubungi Saya
        </a>
        <!-- SOCIAL ICONS -->
        <div class="mt-8 flex justify-center space-x-4">
            @include('partials.social-icons')
        </div>
    </section>


</x-guest-layout>
