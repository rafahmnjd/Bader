<?php

namespace App\Http\Controllers;

use App\Models\Charity;
use App\Models\CharityJob;
use App\Models\Project;
use App\Models\Shortage;
use App\Models\User;
use App\Models\View;

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

        $counts = [
            "ch" => Charity::count(),
            "proj" => Project::count(),
            "job" => CharityJob::count(),
            "benef" => User::where('role', 'benef')->count(),
            "volun" => User::where('role', 'volunteer')->count(),
            "short" => Shortage::where('type', 'min')->count(),
            "surp" => Shortage::where('type', 'plus')->count(),
        ];

        $completed = [
            "proj" => Project::where('state', 'closed')->count(),
            "short" => Shortage::where('type', 'min')->where('state', 'closed')->count(),
            "surp" => Shortage::where('type', 'plus')->where('state', 'closed')->count(),
        ];

        if ($counts["proj"] == 0) {$projsPercent = 0;}
        else{$projsPercent = round($completed["proj"] / $counts["proj"]);}
        if ($counts["short"] == 0) { $shortPercent = 0;} 
        else { $shortPercent = round($completed["short"] / $counts["short"]);}
        if ($counts["surp"] == 0) { $surpPercent = 0;} 
        else{$surpPercent =round($completed["surp"] / $counts["surp"]);}


        $percents = [
            "proj" => $projsPercent,
            "short" => $shortPercent,
            "surp" => $surpPercent,
        ];

        return view('welcome', compact('charities', 'projects', 'jobs', 'counts', 'percents','completed'));
    }
}
