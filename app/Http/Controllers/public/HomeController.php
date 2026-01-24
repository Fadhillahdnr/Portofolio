<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Project;

class HomeController extends Controller
{
    public function index()
    {
        return view('public.home', [
            'projects' => Project::published()->latest()->get()
        ]);
    }
}
