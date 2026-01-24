<x-guest-layout>

    {{-- HERO --}}
    <section class="min-h-screen flex items-center">
        <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-10 items-center">
            <div>
                <h1 class="text-4xl md:text-5xl font-bold leading-tight">
                    Hi, Saya <span class="text-indigo-600">Fadhillah</span><br>
                    Web & Mobile Developer
                </h1>

                <p class="mt-6 text-gray-600">
                    Membangun aplikasi web, mobile, dan sistem IoT menggunakan Laravel, Flutter, dan ESP32. Berpengalaman mengembangkan solusi nyata seperti website UMKM, sistem absensi, live chat berbasis AI, dan GPS tracking kendaraan.
                </p>

                <div class="flex gap-4 mt-6 text-2xl">
                    <a href="https://wa.me/6285353663307" target="_blank"
                    class="hover:text-green-500 transition"
                    title="WhatsApp">
                        <i class="bi bi-whatsapp"></i>
                    </a>

                    <a href="https://www.instagram.com/fadhillahdnrr" target="_blank"
                    class="hover:text-pink-500 transition"
                    title="Instagram">
                        <i class="bi bi-instagram"></i>
                    </a>

                    <a href="https://github.com/Fadhillahdnr" target="_blank"
                    class="hover:text-gray-800 transition"
                    title="GitHub">
                        <i class="bi bi-github"></i>
                    </a>

                    <a href="https://www.linkedin.com/in/muhamad-fadhillah-dinurahman-s-kom-a50b441ab"
                    target="_blank"
                    class="hover:text-blue-600 transition"
                    title="LinkedIn">
                        <i class="bi bi-linkedin"></i>
                    </a>
                </div>

                <div class="mt-8 flex gap-4">
                    <a href="#projects"
                        class="px-6 py-3 bg-indigo-600 text-white rounded-lg">
                        Lihat Project
                    </a>

                    <a href="#contact"
                        class="px-6 py-3 border rounded-lg">
                        Kontak Saya
                    </a>
                </div>
            </div>

            <div class="flex justify-center">
                <img src="/images/profile.png"
                     class="w-72 rounded-2xl shadow-lg"
                     alt="Profile">
            </div>
        </div>
    </section>

    {{-- ABOUT --}}
    <section class="py-20 bg-gray-50">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold">Tentang Saya</h2>
            <p class="mt-6 text-gray-600">
                Saya adalah Full Stack Web Developer dengan minat kuat pada pengembangan web, mobile, dan Internet of Things (IoT). Berpengalaman membangun aplikasi end-to-end menggunakan Laravel, JavaScript modern, Flutter, dan ESP32, mulai dari perancangan backend, API, hingga antarmuka pengguna yang responsif.<br>
                <br>
                Saya terbiasa mengerjakan project nyata seperti website UMKM, aplikasi ecommers, sistem absensi berbasis web, live chat terintegrasi AI, sistem koreksi bacaan berbasi IoT serta sistem tracking GPS berbasis IoT. Memiliki pemahaman yang baik tentang RESTful API, autentikasi dan Role-Based Access Control (RBAC), serta perancangan database relasional. Saya senang mempelajari teknologi baru dan mengubah ide menjadi solusi digital yang bermanfaat.
            </p>
        </div>
    </section>

    <section id="services" class="py-20">
        <div class="max-w-6xl mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12">
                Services
            </h2>

            <div class="grid md:grid-cols-3 gap-8 hover:-translate-y-1 transition-transform">

                {{-- Mobile Development --}}
                <div class="p-8 border rounded-2xl text-center hover:shadow-lg transition">
                    <i class="bi bi-phone text-4xl text-indigo-600 text-transparent bg-clip-text bg-gradient-to-r from-indigo-500 to-purple-500"></i>
                    <h5 class="mt-4 text-xl font-semibold">
                        Mobile Development
                    </h5>
                    <p class="mt-3 text-gray-600">
                        Pengembangan aplikasi mobile yang responsif dan optimal
                        untuk berbagai perangkat.
                    </p>
                </div>

                {{-- Web Development --}}
                <div class="p-8 border rounded-2xl text-center hover:shadow-lg transition">
                    <i class="bi bi-code-slash text-4xl text-indigo-600 text-transparent bg-clip-text bg-gradient-to-r from-indigo-500 to-purple-500"></i>
                    <h5 class="mt-4 text-xl font-semibold">
                        Web Development
                    </h5>
                    <p class="mt-3 text-gray-600">
                        Pembuatan website modern menggunakan Laravel, Livewire,
                        dan teknologi web terkini.
                    </p>
                </div>

                {{-- Internet Of Things --}}
                <div class="p-8 border rounded-2xl text-center hover:shadow-lg transition">
                    <i class="bi bi-cpu text-4xl text-indigo-600 text-transparent bg-clip-text bg-gradient-to-r from-indigo-500 to-purple-500"></i>
                    <h5 class="mt-4 text-xl font-semibold">
                        Internet Of Things
                    </h5>
                    <p class="mt-3 text-gray-600">
                        Integrasi perangkat IoT dengan sistem backend
                        untuk monitoring dan automasi.
                    </p>
                </div>

            </div>
        </div>
    </section>

    {{-- SKILLS --}}
    <section class="py-20">
        <div class="max-w-6xl mx-auto px-6">
            <h2 class="text-3xl font-bold text-center">Tech Stack</h2>

            <div class="mt-10 grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                @foreach (['HTML', 'CSS', 'C/C++', 'PHP','JavaScript', 'dart', 'Go','Laravel', 'Flutter', 'MySQL', 'REST API', 'ESP32'] as $skill)
                    <div class="p-6 border rounded-xl hover:shadow">
                        {{ $skill }}
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- PROJECTS --}}
    <section id="projects" class="py-20 bg-gray-50">
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
    <section id="contact" class="py-20 text-center">
        <h2 class="text-3xl font-bold">Tertarik Bekerja Sama?</h2>
        <p class="mt-4 text-gray-600">
            Hubungi saya untuk project atau kerja sama.
        </p>

        <a href="mailto:m.fadhillah1218@gmail.com"
           class="inline-block mt-6 px-6 py-3 bg-indigo-600 text-white rounded-lg">
            Email Saya
        </a>
    </section>

</x-guest-layout>
