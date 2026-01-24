<x-guest-layout>
    <h2 class="text-2xl font-bold mb-4">Project Saya</h2>

    @foreach ($projects ?? [] as $project)
        <div class="border p-4 mb-3">
            <h3 class="font-semibold">{{ $project->title }}</h3>
            <p>{{ $project->description }}</p>
        </div>
    @endforeach
</x-guest-layout>
