<?php

namespace App\Http\Controllers;

use App\Models\Charity;
use App\Models\CharityJob;
use App\Models\Project;
use App\Models\Shortage;
use App\Models\User;
use App\Models\Item;
use App\Models\EnView;
use App\Models\ArView;
use App\Models\View;


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
        $data = ArView::all();
        // dd($data);
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

        if ($counts["proj"] == 0) {$projsPercent = 0;} else { $projsPercent = round($completed["proj"] * 100 / $counts["proj"]);}
        if ($counts["short"] == 0) {$shortPercent = 0;} else { $shortPercent = round($completed["short"] * 100 / $counts["short"]);}
        if ($counts["surp"] == 0) {$surpPercent = 0;} else { $surpPercent = round($completed["surp"] * 100 / $counts["surp"]);}

        $percents = [
            "proj" => $projsPercent,
            "short" => $shortPercent,
            "surp" => $surpPercent,
        ];

        // $charity_Chart[
        //     // "labels"=>
        // ];

        $ch_gov_Chart = DB::table('governorates')
            ->leftJoin('cities', 'governorates.id', '=', 'cities.governorate_id')
            ->Leftjoin('charities', 'cities.id', '=', 'charities.city_id')
            ->select('governorates.name_ar', DB::raw('count(charities.user_id) as val'))
            ->groupBy('governorates.name_ar')->orderBy('governorates.id')->get();


        $a=Item::select('items.name_ar')->join('shortages','shortages.item_id','items.id')->where('shortages.type','min')
         ->groupBy('items.name_ar')->orderBy(DB::raw('sum(quantity)'),'DESC')->take(5)->pluck('name_ar')->toArray();
        $item_gov_chart = View::select('item_name','gov_id',DB::raw('sum(quantity) as val'))
        ->whereIn('item_name' ,$a)->groupBy('gov_id','item_name')->get();
        // dd( $item_gov_chart);
        return view('welcome', compact('charities', 'projects', 'jobs', 'counts', 'percents', 'completed', 'ch_gov_Chart','item_gov_chart'));
    }
}
