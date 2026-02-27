@extends('admin.layouts.app')

@section('title','Daftar Project')

@section('content')
<div class="p-6 max-w-7xl mx-auto">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
        <div>
            <h2 class="text-3xl font-extrabold text-gray-800">
                Daftar Project
            </h2>
            <p class="text-gray-500 mt-1">
                Kelola semua project portfolio yang telah diupload
            </p>
        </div>

        <a href="{{ route('admin.projects.create') }}"
           class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700
                  text-white px-5 py-2.5 rounded-xl font-semibold
                  shadow-md hover:shadow-lg transition">
            ➕ Tambah Project
        </a>
    </div>

    {{-- FLASH MESSAGE --}}
    @if(session('success'))
        <div class="mb-6 bg-green-50 border border-green-200 text-green-700
                    px-4 py-3 rounded-xl">
            {{ session('success') }}
        </div>
    @endif

    {{-- SEARCH & FILTER --}}
    <form method="GET"
        class="mb-8 bg-white p-4 rounded-2xl
                shadow-[0_10px_30px_-20px_rgba(0,0,0,0.25)]">

        <div class="flex flex-col md:flex-row gap-4">

            {{-- SEARCH --}}
            <div class="flex-1">
                <input type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="🔍 Cari judul project..."
                    class="w-full rounded-xl border-gray-300
                            focus:border-indigo-500 focus:ring
                            focus:ring-indigo-200 transition">
            </div>

            {{-- FILTER --}}
            <div class="w-full md:w-64">
                <select name="category"
                        class="w-full rounded-xl border-gray-300
                            focus:border-indigo-500 focus:ring
                            focus:ring-indigo-200 transition">
                    <option value="">📂 Semua Kategori</option>
                    <option value="Web Development"
                        {{ request('category') == 'Web Development' ? 'selected' : '' }}>
                        Web Development
                    </option>
                    <option value="Mobile Development"
                        {{ request('category') == 'Mobile Development' ? 'selected' : '' }}>
                        Mobile Development
                    </option>
                    <option value="Internet Of Things"
                        {{ request('category') == 'Internet Of Things' ? 'selected' : '' }}>
                        Internet Of Things
                    </option>
                </select>
            </div>

            {{-- BUTTON --}}
            <div class="flex gap-2">
                <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white
                            px-6 py-2.5 rounded-xl font-semibold transition">
                    Terapkan
                </button>

                <a href="{{ route('admin.projects.index') }}"
                class="px-5 py-2.5 rounded-xl border border-gray-300
                        hover:bg-gray-100 transition">
                    Reset
                </a>
            </div>

        </div>
    </form>


    {{-- CONTENT --}}
    @if($projects->count())
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">

            @foreach($projects as $project)
                <div class="group bg-white rounded-2xl overflow-hidden
                            shadow-[0_20px_40px_-20px_rgba(0,0,0,0.25)]
                            hover:-translate-y-1 transition-all duration-300">

                    {{-- THUMBNAIL --}}
                    <div class="h-44 bg-gray-100 overflow-hidden">
                        @if($project->thumbnail)
                            <img src="{{ $project->thumbnail }}" alt="{{ $project->title }}" 
                                 class="w-full h-full object-cover
                                        group-hover:scale-105 transition duration-300">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-400">
                                No Image
                            </div>
                        @endif
                    </div>

                    {{-- BODY --}}
                    <div class="p-6">
                        {{-- CATEGORY --}}
                        <span class="inline-block mb-3 px-3 py-1 text-xs font-semibold rounded-full
                                     bg-indigo-100 text-indigo-600">
                            {{ $project->category }}
                        </span>

                        {{-- TITLE --}}
                        <h3 class="text-lg font-bold text-gray-800 line-clamp-1">
                            {{ $project->title }}
                        </h3>

                        {{-- DESC --}}
                        <p class="mt-2 text-sm text-gray-600 line-clamp-3">
                            {{ $project->description }}
                        </p>

                        {{-- FOOTER --}}
                        <div class="flex items-center justify-between mt-6">
                            <span class="text-xs text-gray-400">
                                {{ $project->created_at->format('d M Y') }}
                            </span>

                            <div class="flex gap-3 text-sm font-medium">
                                <a href="{{ route('admin.projects.show', $project->id) }}" class="text-green-600 hover:underline">
                                    Detail
                                </a>

                                <a href="{{ route('admin.projects.edit', $project->id) }}"
                                   class="text-indigo-600 hover:underline">
                                    Edit
                                </a>

                                <form action="{{ route('admin.projects.destroy', $project->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus project ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="text-red-600 hover:underline">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    @else
        {{-- EMPTY STATE --}}
        <div class="bg-white rounded-2xl p-12 text-center
                    shadow-[0_20px_40px_-20px_rgba(0,0,0,0.25)]">
            <div class="text-5xl mb-4">📂</div>
            <h3 class="text-xl font-bold text-gray-800">
                Belum Ada Project
            </h3>
            <p class="text-gray-500 mt-2">
                Silakan tambahkan project pertama Anda
            </p>

            <a href="{{ route('admin.projects.create') }}"
               class="inline-block mt-6 bg-indigo-600 hover:bg-indigo-700
                      text-white px-6 py-2.5 rounded-xl font-semibold transition">
                ➕ Tambah Project
            </a>
        </div>
    @endif
</div>
@endsection
