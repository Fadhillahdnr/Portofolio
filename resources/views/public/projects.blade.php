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