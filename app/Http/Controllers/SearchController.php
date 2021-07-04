<?php

namespace App\Http\Controllers;
use App\Models\{
    CharityJob,
    Charity,
    Project,
    Shortage,
    Item
};

use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function jobs()
    {
        # code...
        $jobs = CharityJob::latest()->paginate(10);
        return view('search.jobs',compact('jobs'));
    }

        /**
     * Undocumented function
     *
     * @return void
     */
    public function charities()
    {
        # code...
        $charities = Charity::latest()->paginate(10);
        return view('search.charities',compact('charities'));
    }
        /**
     * Undocumented function
     *
     * @return void
     */
    public function projects()
    {
        # code...
        $projects = Project::latest()->paginate(10);
        return view('search.projects',compact('projects'));
    }
        /**
     * Undocumented function
     *
     * @return void
     */
    public function shortages()
    {
        # code...
        $shortages = Shortage::where('type','min')->latest()->paginate(10);
        return view('search.shortages',compact('shortages'));
    }
        /**
     * Undocumented function
     *
     * @return void
     */
    public function surpluses()
    {
        # code...
        $shortages = Shortage::where('type','plus')->latest()->paginate(10);
        return view('search.shortages',compact('shortages'));
    }


    public function getJobs($data)
    {
        # code...
        $jobs=CharityJob::where('');
    }


    public function show()
    {
        return view('search.show');
    }

}
