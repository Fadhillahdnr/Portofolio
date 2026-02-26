@extends('admin.layouts.app')

@section('title','Edit Project')

@section('content')
<div class="p-6 max-w-4xl mx-auto">

    {{-- HEADER --}}
    <div class="mb-8">
        <h2 class="text-3xl font-extrabold text-gray-800">
            Edit Project
        </h2>
        <p class="text-gray-500 mt-1">
            Perbarui informasi project portfolio Anda
        </p>
    </div>

    {{-- CARD --}}
    <div class="bg-white rounded-2xl shadow-[0_20px_40px_-20px_rgba(0,0,0,0.25)] p-8">

        <form action="{{ route('admin.projects.update', $project->id) }}"
              method="POST"
              enctype="multipart/form-data"
              class="space-y-8">

            @csrf
            @method('PUT')

            {{-- ERROR --}}
            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 p-4 rounded-xl">
                    <ul class="list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- ================= BASIC INFO ================= --}}
            <div class="grid md:grid-cols-2 gap-6">

                {{-- JUDUL --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        Judul Project
                    </label>
                    <input type="text"
                           name="title"
                           value="{{ old('title', $project->title) }}"
                           class="w-full rounded-xl border-gray-300 focus:border-indigo-500
                                  focus:ring focus:ring-indigo-200 transition"
                           required>
                </div>

                {{-- KATEGORI --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        Kategori
                    </label>
                    <select name="category"
                            class="w-full rounded-xl border-gray-300 focus:border-indigo-500
                                   focus:ring focus:ring-indigo-200 transition">
                        <option value="Web Development"
                            {{ $project->category == 'Web Development' ? 'selected' : '' }}>
                            Web Development
                        </option>
                        <option value="Mobile Development"
                            {{ $project->category == 'Mobile Development' ? 'selected' : '' }}>
                            Mobile Development
                        </option>
                        <option value="Internet Of Things"
                            {{ $project->category == 'Internet Of Things' ? 'selected' : '' }}>
                            Internet Of Things
                        </option>
                    </select>
                </div>

            </div>

            {{-- DESKRIPSI --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Deskripsi Project
                </label>
                <textarea name="description"
                          rows="5"
                          class="w-full rounded-xl border-gray-300 focus:border-indigo-500
                                 focus:ring focus:ring-indigo-200 transition"
                          required>{{ old('description', $project->description) }}</textarea>
            </div>

            {{-- ================= LINKS (NEW) ================= --}}
            <div class="grid md:grid-cols-2 gap-6">

                {{-- LIVE DEMO --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        🚀 Live Demo URL
                    </label>
                    <input type="url"
                           name="demo_url"
                           value="{{ old('demo_url', $project->demo_url) }}"
                           placeholder="https://demo-project.com"
                           class="w-full rounded-xl border-gray-300 focus:border-indigo-500
                                  focus:ring focus:ring-indigo-200 transition">
                </div>

                {{-- GITHUB --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        💻 GitHub Repository
                    </label>
                    <input type="url"
                           name="github_url"
                           value="{{ old('github_url', $project->github_url) }}"
                           placeholder="https://github.com/username/project"
                           class="w-full rounded-xl border-gray-300 focus:border-indigo-500
                                  focus:ring focus:ring-indigo-200 transition">
                </div>

            </div>

            {{-- ================= THUMBNAIL ================= --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Thumbnail Project
                </label>

                @if($project->thumbnail)
                    <img src="{{ $project->thumbnail }}" alt="{{ $project->title }}"
                         class="w-48 rounded-xl mb-3 shadow">
                @endif

                <label class="flex items-center gap-4 px-4 py-3 border-2 border-dashed
                              rounded-xl cursor-pointer hover:border-indigo-400 transition">
                    <span class="text-xl">🖼️</span>
                    <span class="text-sm text-gray-600">
                        Ganti thumbnail (opsional)
                    </span>
                    <input type="file" name="thumbnail" class="hidden">
                </label>
            </div>

            {{-- ================= GALLERY ================= --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Gallery Images
                </label>

                <label class="flex items-center gap-4 px-4 py-3 border-2 border-dashed
                              rounded-xl cursor-pointer hover:border-indigo-400 transition">
                    <span class="text-xl">📸</span>
                    <span class="text-sm text-gray-600">
                        Tambah / ganti gallery images
                    </span>
                    <input type="file" name="images[]" multiple class="hidden">
                </label>
            </div>

            {{-- ================= README ================= --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    README Project (.md)
                </label>

                @if($project->readme_path)
                    <p class="text-sm text-gray-500 mb-2">
                        📄 File saat ini:
                        <span class="font-medium">
                            {{ basename($project->readme_path) }}
                        </span>
                    </p>
                @endif

                <input type="file"
                       name="readme"
                       accept=".md"
                       class="w-full rounded-xl border-gray-300 focus:border-indigo-500
                              focus:ring focus:ring-indigo-200 transition">

                <p class="text-xs text-gray-500 mt-1">
                    Upload ulang jika ingin mengganti README
                </p>
            </div>

            {{-- ================= ACTION ================= --}}
            <div class="flex items-center gap-4 pt-4">
                <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white
                               px-6 py-2.5 rounded-xl font-semibold
                               shadow-md hover:shadow-lg transition">
                    💾 Update Project
                </button>

                <a href="{{ route('admin.projects.index') }}"
                   class="px-6 py-2.5 rounded-xl border border-gray-300
                          text-gray-700 hover:bg-gray-100 transition">
                    Batal
                </a>
            </div>

        </form>
    </div>
</div>
@endsection