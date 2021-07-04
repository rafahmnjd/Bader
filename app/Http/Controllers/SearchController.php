<?php

namespace App\Http\Controllers;

use App\Models\Charity;
use App\Models\CharityJob;
use App\Models\Project;
use App\Models\Shortage;

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
        return view('search.jobs', compact('jobs'));
    }
    public function jobsTitleAtoZ($lang)
    {
        # code...
        if ($lang == 'ar') {
            $jobs = CharityJob::orderBy('job_title_ar')->paginate(10);
        } else {
            $jobs = CharityJob::orderBy('job_title_en')->paginate(10);
        }

        return view('search.jobs', compact('jobs'));
    }
    public function getJobs($data)
    {
        # code...
        $jobs = CharityJob::where('job_title_ar', 'like', '%' . $data . '%')
            ->orWhere('job_title_en', 'like', '%' . $data . '%')
            ->orWhere('job_details_ar', 'like', '%' . $data . '%')
            ->orWhere('job_details_en', 'like', '%' . $data . '%')
            ->orWhere('location_ar', 'like', '%' . $data . '%')
            ->orWhere('location_en', 'like', '%' . $data . '%')
        // ->orWhere('tag', 'like', '%' . $data . '%')
            ->paginate(10);
        return view('search.jobs', compact('jobs'));
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
        return view('search.charities', compact('charities'));
    }
    public function charitiesNameAtoZ($lang)
    {
        # code...
        if ($lang == 'ar') {
            $charities = Charity::orderBy('name_ar')->paginate(10);
        } else {
            $charities = Charity::orderBy('name_en')->paginate(10);
        }
        return view('search.charities', compact('charities'));
    }
    public function charitiesAddressAtoZ($lang)
    {
        # code...
        if ($lang == 'ar') {
            $charities = Charity::orderBy('address_ar')->paginate(10);
        } else {
            $charities = Charity::orderBy('address_en')->paginate(10);
        }
        return view('search.charities', compact('charities'));
    }
    public function getCharities($data)
    {
        # code...
        $charities = Charity::where('job_title_ar', 'like', '%' . $data . '%')
            ->orWhere('name_en', 'like', '%' . $data . '%')
            ->orWhere('name_ar', 'like', '%' . $data . '%')
            ->orWhere('address_ar', 'like', '%' . $data . '%')
            ->orWhere('address_en', 'like', '%' . $data . '%')
            ->orWhere('info_ar', 'like', '%' . $data . '%')
            ->orWhere('info_en', 'like', '%' . $data . '%')
            ->paginate(10);

        return view('search.charities', compact('charities'));

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
        return view('search.projects', compact('projects'));
    }
        public function projectsNameAtoZ($lang)
    {
        # code...
        if ($lang == 'ar') {
             $projects = Project::orderBy('title_ar')->paginate(10);
        } else {
             $projects = Project::orderBy('title_en')->paginate(10);
        }
        return view('search.projects', compact('projects'));
    }
    public function getProjects($data)
    {

        # code...
        $projects = Project::where('job_title_ar', 'like', '%' . $data . '%')
            ->orWhere('title_en', 'like', '%' . $data . '%')
            ->orWhere('title_ar', 'like', '%' . $data . '%')
            ->orWhere('text_ar', 'like', '%' . $data . '%')
            ->orWhere('text_en', 'like', '%' . $data . '%')
            ->paginate(10);
        return view('search.projects', compact('projects'));

    }
    /**
     * Undocumented function
     *
     * @return void
     */
    public function shortages()
    {
        # code...
        $shortages = Shortage::where('type', 'min')->latest()->paginate(10);
        return view('search.shortages', compact('shortages'));
    }
    public function shortagesNameAtoZ($lang)
    {
        # code...
        if ($lang == 'ar') {
             $shortages = Shortage::orderBy('title_ar')->paginate(10);
        } else {
             $shortages = Shortage::orderBy('title_en')->paginate(10);
        }
        return view('search.shortages', compact('shortages'));
    }
    
    public function getShortages($data)
    {
        # code...
        $shortages = Shortage::with('Item')->where('type','min')->wherehas('Item', function($q)use($data){
            $q->where('name_en', 'like', '%' . $data . '%')
            ->orWhere('name_ar', 'like', '%' . $data . '%');
        })
        ->paginate(10);
        return view('search.shortages', compact('shortages'));

    }
    /**
     * Undocumented function
     *
     * @return void
     */
    public function surpluses()
    {
        # code...
        $shortages = Shortage::where('type', 'plus')->latest()->paginate(10);
        return view('search.shortages', compact('shortages'));
    }

    public function show()
    {
        return view('search.show');
    }

}
