<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Shortage;
use App\Models\Item;

use Illuminate\Http\Request;

class ProjectRequirementController extends Controller
{

        /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct() //صلاحيات

    {
        $this->middleware('can:charity')->except(['show']);
        $this->middleware('can:proj_access,project')->only(['index','create','store']);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project)
    {
        //
        $projReqs = $project->requirments;
        $type ="proj";
        return view('projReqs.index', compact('projReqs', 'project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project)
    {
        //
        $items = Item::all();
        return view('projReqs.crup', compact('project','items'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Project $project, Request $request)
    {
        //
        $data = $request->all();
        $project->requirments()->create($data);
        return redirect(route('projReqs.index', $project));
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Models\Shortage  $projReq
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(Shortage $projectR)
    // {
    //     return view('projReqs.show', compact('project'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shortage  $projReq
     * @return \Illuminate\Http\Response
     */
    public function edit(Shortage $projReq)
    {
        //
        $items = Item::all();
        return view('projReqs.crup', ['project' => $projReq->project, 'projReq' => $projReq,'items'=>$items]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shortage  $projReq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shortage $projReq)
    {
        //route('projReqs.index',$project)
        $projReq->update($request->all());
        return redirect(route('projReqs.index', $projReq->project));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shortage  $projReq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shortage $projReq)
    {
        //
        // $project=$projReq->project;
        $projReq->delete();
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shortage  $projReq
     * @return \Illuminate\Http\Response
     */
    public function close(Shortage $projReq)
    {
        $projReq->state = "closed";
        $projReq->save();
        return back();
    }
}
