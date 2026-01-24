@extends('admin.layouts.app')

@section('title','Admin Dashboard')

@section('content')
<div class="p-6">

    {{-- Header --}}
    <div class="mb-6">
        <h2 class="text-2xl font-bold">Dashboard Admin</h2>
        <p class="text-gray-500">
            Kelola project portfolio kamu dari sini
        </p>
    </div>

    {{-- Statistik --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">

        <div class="bg-white rounded-xl shadow p-4">
            <p class="text-sm text-gray-500">Total Project</p>
            <p class="text-3xl font-bold">{{ $totalProjects }}</p>
        </div>

        <div class="bg-white rounded-xl shadow p-4">
            <p class="text-sm text-gray-500">Status Website</p>
            <p class="text-lg font-semibold text-green-600">Online</p>
        </div>

        <div class="bg-white rounded-xl shadow p-4">
            <p class="text-sm text-gray-500">Quick Action</p>
            <a href="{{ route('admin.projects.create') }}"
               class="inline-block mt-2 bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
                + Tambah Project
            </a>
        </div>

    </div>

    {{-- Project Terbaru --}}
    <div class="bg-white rounded-xl shadow p-4 mb-6">
        <h3 class="font-semibold mb-4">Project Terbaru</h3>

        <table class="w-full text-sm">
            <thead>
                <tr class="border-b text-left">
                    <th class="pb-2">Judul</th>
                    <th class="pb-2">Kategori</th>
                    <th class="pb-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($latestProjects as $project)
                    <tr class="border-b">
                        <td class="py-2">{{ $project->title }}</td>
                        <td class="py-2">{{ $project->category }}</td>
                        <td class="py-2">
                            <a href="{{ route('admin.projects.edit', $project->id) }}"
                               class="text-indigo-600 hover:underline">
                                Edit
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="py-4 text-center text-gray-500">
                            Belum ada project
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Logout --}}
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700">
            Logout
        </button>
    </form>

</div>
@endsection
