<?php

namespace App\Http\Controllers;

use App\Models\ProjectRequirement;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectRequirementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project)
    {
        //
        $projReqs=$project->requirments;
        return view('projReqs.index',compact('projReqs','project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project)
    {
        //
        // dd($project);
        return view('projReqs.crup', compact('project'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Project $project,Request $request)
    {
        //
        $data=$request->all();
        return redirect(route('projReqs.index',$project));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectRequirement  $projReq
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectRequirement $projReq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectRequirement  $projReq
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectRequirement $projReq)
    {
        //
        return view('projReqs.crup', ['project' => $projReq->project, 'projReq' => $projReq]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjectRequirement  $projReq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectRequirement $projReq)
    {
        //route('projReqs.index',$project)
        $projReq->update($request->all());
        return redirect(route('projReqs.index',$project));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectRequirement  $projReq
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectRequirement $projReq)
    {
        //
        // $project=$projReq->project;
        $projReq->delete();
        return back();

    }
}
