<?php

namespace App\Http\Controllers;

use App\Models\CharityJob;
use App\Models\VolunteerRequest;
use Illuminate\Http\Request;
use Auth;
class VolunteerRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CharityJob $job)
    {

        $jobReqs = $job->jobRequests;
        return view('volreqs.index', compact('jobReqs', 'job'));
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CharityJob $job, Request $request)
    {
        //
        $input=['charity_job_id'=>$job->id,'volunteer_id'=>Auth::user()->id,'state'=>"waiting"];
        if (request()->hasfile('cv')) {
            $cvfilepath = public_path(config('path.cvs'));
            $cvfile = request()->file('cv');
            $cvname = time() . "_cov." . $request->cv->extension();
            $cvfile->move($cvfilepath, $cvname);
            $input = array_merge($input, ["cv" => $cvname]);
        }

        $volReq = VolunteerRequest::create($input);
        return redirect(route('user.jobReqs'));

    }

/**
 * update the specified resource from storage.
 *
 * @param  \App\Models\VolunteerRequest  $jobReqs
 * @return \Illuminate\Http\Response
 */

    public function update(Request $request, VolunteerRequest $jobReq)
    {
        # code...
        $jobReq->state= $request->state;
        $jobReq->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VolunteerRequest  $jobReq
     * @return \Illuminate\Http\Response
     */
    public function destroy(VolunteerRequest $jobReq)
    {
        //

    }

    public function myJobRequests()
    {
        # code...
        $jobReqs=Auth::user()->Volunteer->jobRequests;
        return view('volreqs.index',compact('jobReqs'));
    }
}
