<x-app-layout>
    <div x-data="{ open: false }">
        <button @click="open = true" class="bg-blue-600 text-white px-4 py-2">
            Tambah Project
        </button>

        <div x-show="open" class="mt-4 border p-4">
            <form method="POST" action="/admin/projects">
                @csrf
                <input name="title" class="border p-2 w-full" placeholder="Judul">
                <textarea name="description" class="border p-2 w-full mt-2"></textarea>
                <button class="bg-green-600 text-white px-3 py-2 mt-2">
                    Simpan
                </button>
            </form>
        </div>

        <div class="mt-6">
            @foreach ($projects as $project)
                <div class="border p-3 mb-2">
                    <b>{{ $project->title }}</b>
                    <p>{{ $project->description }}</p>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
