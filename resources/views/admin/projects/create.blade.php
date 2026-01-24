@extends('admin.layouts.app')

@section('title','Tambah Project')

@section('content')
<div class="p-6 max-w-3xl">

    <h2 class="text-2xl font-bold mb-6">Tambah Project</h2>

    <form action="{{ route('admin.projects.store') }}"
          method="POST"
          enctype="multipart/form-data"
          class="space-y-5">

        @csrf
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div>
            <label class="block mb-1 font-medium">Judul Project</label>
            <input type="text" name="title"
                   class="w-full border rounded-lg p-2"
                   required>
        </div>

        <div>
            <label class="block mb-1 font-medium">Kategori</label>
            <select name="category" class="w-full border rounded-lg p-2">
                <option>Web Development</option>
                <option>Mobile Development</option>
                <option>Internet Of Things</option>
            </select>
        </div>

        <div>
            <label class="block mb-1 font-medium">Deskripsi</label>
            <textarea name="description"
                      rows="5"
                      class="w-full border rounded-lg p-2"
                      required></textarea>
        </div>

        <div>
            <label class="block mb-1 font-medium">Thumbnail</label>
            <input type="file" name="thumbnail" required>
        </div>

        <div>
            <label class="block mb-1 font-medium">
                Gallery Images (boleh banyak)
            </label>
            <input type="file" name="images[]" multiple>
        </div>

        <div class="flex gap-3">
            <button class="bg-indigo-600 text-white px-6 py-2 rounded-lg">
                Simpan
            </button>

            <a href="{{ route('admin.projects.index') }}"
               class="border px-6 py-2 rounded-lg">
                Batal
            </a>
        </div>

    </form>
</div>
@endsection
