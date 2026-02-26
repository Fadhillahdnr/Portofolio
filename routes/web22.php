<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

Route::get('/test-cloudinary', function () {

    $path = Storage::disk('cloudinary')->putFile(
        'uploads', // ← WAJIB isi folder
        new File(public_path('test.jpg'))
    );

    return [
        'message' => 'Upload success!',
        'path' => $path,
        'url' => Storage::disk('cloudinary')->url($path),
    ];
});