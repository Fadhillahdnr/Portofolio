<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalProjects' => Project::count(),
            'latestProjects' => Project::latest()->take(5)->get(),
        ]);
    }
}
