@extends('admin.layouts.app')

@section('title','Admin Dashboard')

@section('content')
<div class="p-6 space-y-6">

    {{-- Header --}}
    <div>
        <h2 class="text-3xl font-bold text-gray-800">
            Dashboard Admin
        </h2>
        <p class="text-gray-500 mt-1">
            Kelola project portfolio kamu dari sini
        </p>
    </div>

    {{-- Statistik --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        {{-- Total Project --}}
        <div class="bg-white rounded-2xl shadow-sm border p-6">
            <p class="text-sm text-gray-500">Total Project</p>
            <p class="text-4xl font-bold text-indigo-600 mt-2">
                {{ $totalProjects }}
            </p>
        </div>

        {{-- Status --}}
        <div class="bg-white rounded-2xl shadow-sm border p-6">
            <p class="text-sm text-gray-500">Status Website</p>
            <div class="flex items-center gap-2 mt-3">
                <span class="h-3 w-3 bg-green-500 rounded-full"></span>
                <span class="font-semibold text-green-600">
                    Online
                </span>
            </div>
        </div>

        {{-- Quick Action --}}
        <div class="bg-gradient-to-br from-indigo-600 to-purple-600
                    rounded-2xl shadow text-white p-6">
            <p class="text-sm opacity-80">Quick Action</p>

            <a href="{{ route('admin.projects.create') }}"
               class="inline-block mt-4 bg-white/20 hover:bg-white/30
                      px-4 py-2 rounded-xl font-medium transition">
                + Tambah Project
            </a>
        </div>

    </div>

    {{-- Project Terbaru --}}
    <div class="bg-white rounded-2xl shadow-sm border p-6">
        <h3 class="font-semibold text-lg mb-4">
            Project Terbaru
        </h3>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b text-left text-gray-500">
                        <th class="pb-3">Judul</th>
                        <th class="pb-3">Kategori</th>
                        <th class="pb-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($latestProjects as $project)
                        <tr class="border-b last:border-0">
                            <td class="py-3 font-medium">
                                {{ $project->title }}
                            </td>
                            <td class="py-3">
                                {{ $project->category }}
                            </td>
                            <td class="py-3">
                                <a href="{{ route('admin.projects.edit', $project->id) }}"
                                   class="text-indigo-600 hover:underline">
                                    Edit
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3"
                                class="py-6 text-center text-gray-400">
                                Belum ada project
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Logout --}}
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button
            class="bg-red-500 hover:bg-red-600
                   text-white px-5 py-2 rounded-xl transition">
            Logout
        </button>
    </form>

</div>
@endsection
