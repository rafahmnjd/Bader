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

        $volReqs = $job->volReqs;
        return view('volreqs.index', compact('volReqs', 'job'));
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
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VolunteerRequest  $volunteerRequest
     * @return \Illuminate\Http\Response
     */
    public function show(VolunteerRequest $volunteerRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VolunteerRequest  $volunteerRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(VolunteerRequest $volunteerRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VolunteerRequest  $volunteerRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VolunteerRequest $volunteerRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VolunteerRequest  $volunteerRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(VolunteerRequest $volunteerRequest)
    {
        //
    }
}
