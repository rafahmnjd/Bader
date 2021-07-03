<?php

namespace App\Http\Controllers;

use App\Models\Charity;
use App\Models\CharityJob;
use App\Models\Project;

class SearchController extends Controller
{

    public function index()
    {
        # code...
    }

    public function show()
    {
        return view('search.show');
    }

    public function show_charities()
    {
        $charities = Charity::orderBy('created_at', 'DESC')->first();
        return view('search.charities', compact('charities'));
    }

    public function show_projects()
    {
        $projects = Project::orderBy('created_at', 'DESC')->first();
        return view('search.projects', compact('projects'));
    }

    public function show_jobs()
    {
        $jobs = CharityJob::orderBy('created_at', 'DESC')->first();
        return view('search.jobs', compact('jobs'));
    }
}
