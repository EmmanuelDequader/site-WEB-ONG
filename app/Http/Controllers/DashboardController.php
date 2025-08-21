<?php

// app/Http/Controllers/DashboardController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use App\Models\Content;
use App\Models\Alert;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all();
        $projects = Project::all();
        $contents = Content::all();
        $alerts = Alert::all();
        return view('dashboard', compact('users', 'projects', 'contents', 'alerts'));
    }
}