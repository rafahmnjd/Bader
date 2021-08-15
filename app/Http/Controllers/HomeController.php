<?php

namespace App\Http\Controllers;

use App\Models\Charity;
use App\Models\CharityJob;
use App\Models\Project;
use App\Models\Shortage;
use App\Models\View;
use App\Models\User;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = View::all();
        return view('home', compact('data'));
    }

    public function base()
    {
        $charities = Charity::latest()->take(6)->get();
        $projects = Project::latest()->take(3)->get();
        $jobs = CharityJob::latest()->take(3)->get();


        $chCount = Charity::count();
        $projCount = Project::count();
        $jobCount = CharityJob::count();


        $benefCount = User::where('role', 'benef')->count();
        $volunCount = User::where('role', 'volunteer')->count();

        $compProjCount=Project::where('state','closed')->count();


        $compShort = Shortage::where('type', 'min')->count();
        $compShort2 = Shortage::where('type', 'min')->where('state', 'closed')->count();

        return view('welcome', compact('charities', 'projects', 'jobs', 'chCount', 'projCount', 'jobCount', 'compShort', 'compShort2','benefCount','volunCount','compProjCount'));
    }
}
