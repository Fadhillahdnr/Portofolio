<section
    id="skills"
    class="scroll-mt-28 py-28
           bg-gradient-to-b from-white via-indigo-50 to-white">

    <div class="max-w-6xl mx-auto px-6">

        {{-- ================= HEADING ================= --}}
        <div class="text-center max-w-2xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900">
                Tech Stack
            </h2>

            <p class="mt-4 text-gray-600 leading-relaxed">
                Teknologi yang sering saya gunakan untuk membangun aplikasi
                web, mobile, dan sistem IoT yang scalable.
            </p>
        </div>

        {{-- ================= SKILLS GRID ================= --}}
        <div class="mt-16 grid gap-8 md:grid-cols-2">

            {{-- ===== FRONTEND ===== --}}
            <div
                class="relative rounded-3xl p-8
                       bg-white/70 backdrop-blur-xl
                       border border-indigo-200
                       shadow-lg">

                <h3 class="text-xl font-semibold text-center mb-8">
                    Frontend
                </h3>

                <div class="flex flex-wrap justify-center gap-4">
                    @foreach ([
                        'HTML', 'CSS', 'JavaScript',
                        'React JS', 'Bootstrap', 'Material UI', 'Flutter',
                        'Tailwind CSS', 'Alpine.js', 'Vue.js'
                    ] as $skill)
                        <span
                            class="px-5 py-2 rounded-xl
                                   bg-white/80
                                   border border-indigo-100
                                   text-sm font-medium text-gray-800
                                   shadow-sm
                                   hover:border-indigo-400
                                   hover:shadow-md
                                   transition">
                            {{ $skill }}
                        </span>
                    @endforeach
                </div>
            </div>

            {{-- ===== BACKEND ===== --}}
            <div
                class="relative rounded-3xl p-8
                       bg-white/70 backdrop-blur-xl
                       border border-indigo-200
                       shadow-lg">

                <h3 class="text-xl font-semibold text-center mb-8">
                    Backend
                </h3>

                <div class="flex flex-wrap justify-center gap-4">
                    @foreach ([
                        'PHP', 'Laravel', 'REST API', 
                        'Go', 'Dart', 'Python'
                    ] as $skill)
                        <span
                            class="px-5 py-2 rounded-xl
                                   bg-white/80
                                   border border-indigo-100
                                   text-sm font-medium text-gray-800
                                   shadow-sm
                                   hover:border-indigo-400
                                   hover:shadow-md
                                   transition">
                            {{ $skill }}
                        </span>
                    @endforeach
                </div>
            </div>

            {{-- ===== DATABASE ===== --}}
            <div
                class="relative rounded-3xl p-8
                       bg-white/70 backdrop-blur-xl
                       border border-indigo-200
                       shadow-lg">

                <h3 class="text-xl font-semibold text-center mb-8">
                    Database
                </h3>

                <div class="flex flex-wrap justify-center gap-4">
                    @foreach ([
                        'MySQL', 'PostgreSQL', 'firebase', 'SQLite',
                    ] as $skill)
                        <span
                            class="px-5 py-2 rounded-xl
                                   bg-white/80
                                   border border-indigo-100
                                   text-sm font-medium text-gray-800
                                   shadow-sm
                                   hover:border-indigo-400
                                   hover:shadow-md
                                   transition">
                            {{ $skill }}
                        </span>
                    @endforeach
                </div>
            </div>

            {{-- ================= OTHERS ================= --}}
            <div class="mt-1">
                <div
                    class="max-w-3xl mx-auto
                        rounded-3xl p-8
                        bg-white/70 backdrop-blur-xl
                        border border-indigo-200
                        shadow-lg">

                    <h3 class="text-xl font-semibold text-center mb-8">
                        Other / IT Support Skills
                    </h3>

                    <div class="flex flex-wrap justify-center gap-4">
                        @foreach ([
                            'ESP32', 'C / C++', 'Arduino',
                            'Git', 'Windows installation & reinstallation', 'Driver installation & configuration', 'System re-image / OS deployment', 'Basic troubleshooting hardware & software'
                        ] as $skill)
                            <span
                                class="px-5 py-2 rounded-xl
                                    bg-white/80
                                    border border-indigo-100
                                    text-sm font-medium text-gray-800
                                    shadow-sm
                                    hover:border-indigo-400
                                    hover:shadow-md
                                    transition">
                                {{ $skill }}
                            </span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
