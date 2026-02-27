@extends('admin.layouts.app')

@section('title','Detail Project')

@section('content')
<div class="p-6 max-w-5xl mx-auto">

    {{-- HEADER --}}
    <div class="mb-8">
        <h2 class="text-3xl font-extrabold text-gray-800">
            Detail Project
        </h2>
        <p class="text-gray-500 mt-1">
            Pastikan semua data & file terupload dengan benar
        </p>
    </div>

    <div class="bg-white rounded-2xl shadow-xl p-8 space-y-10">

        {{-- ================= THUMBNAIL ================= --}}
        <div>
            <h3 class="font-bold text-gray-700 mb-3">Thumbnail</h3>

            @if($project->thumbnail)
                <img src="{{ $project->thumbnail }}"
                     class="w-full max-h-96 object-cover rounded-xl shadow">
            @else
                <p class="text-red-500">Thumbnail tidak tersedia</p>
            @endif

            <div class="mt-3 text-sm text-gray-500 break-all">
                <p><strong>Thumbnail URL:</strong> {{ $project->thumbnail }}</p>
                <p><strong>Thumbnail Public ID:</strong> {{ $project->thumbnail_id }}</p>
            </div>
        </div>

        {{-- ================= INFO ================= --}}
        <div class="grid md:grid-cols-2 gap-6">

            <div>
                <h3 class="font-bold text-gray-700 mb-2">Judul</h3>
                <p>{{ $project->title }}</p>
            </div>

            <div>
                <h3 class="font-bold text-gray-700 mb-2">Kategori</h3>
                <p>{{ $project->category }}</p>
            </div>

            <div class="md:col-span-2">
                <h3 class="font-bold text-gray-700 mb-2">Deskripsi</h3>
                <p class="text-gray-600">{{ $project->description }}</p>
            </div>

            <div>
                <h3 class="font-bold text-gray-700 mb-2">Demo Link</h3>
                @if($project->demo_url)
                    <a href="{{ $project->demo_url }}" target="_blank"
                       class="text-indigo-600 hover:underline">
                        {{ $project->demo_url }}
                    </a>
                @else
                    <p class="text-gray-400">Tidak ada</p>
                @endif
            </div>

            <div>
                <h3 class="font-bold text-gray-700 mb-2">Github Link</h3>
                @if($project->github_url)
                    <a href="{{ $project->github_url }}" target="_blank"
                       class="text-indigo-600 hover:underline">
                        {{ $project->github_url }}
                    </a>
                @else
                    <p class="text-gray-400">Tidak ada</p>
                @endif
            </div>

        </div>

        {{-- ================= GALLERY ================= --}}
        <div>
            <h3 class="font-bold text-gray-700 mb-4">Gallery Images</h3>

            @if($project->images->count())
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    @foreach($project->images as $image)
                        <div>
                            <img src="{{ $image->image }}"
                                 class="rounded-xl shadow-md">

                            <div class="text-xs mt-2 text-gray-500 break-all">
                                <p><strong>URL:</strong> {{ $image->image }}</p>
                                <p><strong>Public ID:</strong> {{ $image->public_id }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-red-500">Belum ada gallery image</p>
            @endif
        </div>

        {{-- ================= README ================= --}}
        <div>
            <h3 class="font-bold text-gray-700 mb-4">README Documentation</h3>

            @if($readmeExists)

                {{-- FILE INFO --}}
                <div class="mb-4 text-sm text-gray-500 break-all">
                    <p><strong>Path:</strong> {{ $project->readme_path }}</p>

                    <a href="{{ asset('storage/'.$project->readme_path) }}"
                       target="_blank"
                       class="text-indigo-600 hover:underline">
                        Download README.md
                    </a>
                </div>

                {{-- RENDERED MARKDOWN --}}
                <div class="prose max-w-none bg-gray-50 p-6 rounded-2xl border">
                    {!! $readmeHtml !!}
                </div>

            @else
                <p class="text-red-500">
                    README.md belum diupload atau file tidak ditemukan
                </p>
            @endif
        </div>

        {{-- ================= FOOTER ================= --}}
        <div class="flex justify-between pt-6 border-t">
            <a href="{{ route('admin.projects.index') }}"
               class="px-5 py-2 bg-gray-200 rounded-xl hover:bg-gray-300 transition">
                Kembali
            </a>

            <a href="{{ route('admin.projects.edit', $project->id) }}"
               class="px-5 py-2 bg-indigo-600 text-white rounded-xl hover:bg-indigo-700 transition">
                Edit Project
            </a>
        </div>

    </div>
</div>
@endsection