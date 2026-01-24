<x-guest-layout>

    <section class="py-20">
        <div class="max-w-4xl mx-auto px-6">

            <h1 class="text-4xl font-bold">
                {{ $project->title }}
            </h1>

            <p class="mt-4 text-gray-600">
                {{ $project->description }}
            </p>

            {{-- GALLERY --}}
            <div class="mt-10 grid md:grid-cols-2 gap-6">
                @foreach ($project->images as $image)
                    <img src="{{ asset('storage/' . $image->image) }}"
                         class="rounded-xl shadow">
                @endforeach
            </div>

            <a href="/" class="inline-block mt-10 text-indigo-600">
                ← Kembali ke Home
            </a>
        </div>
    </section>

</x-guest-layout>
