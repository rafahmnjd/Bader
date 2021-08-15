<?php

namespace App\Http\Controllers;

// use APP\Models\Charity;
use App\Models\CharityJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CharityJobController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct() //صلاحيات

    {
        // $this->middleware('can:ch_access,charity');
        $this->middleware('can:charity');
        // $this->middleware('can:admin')->only('destroy','index');
        // $this->middleware('can:ch_access,charity')->only(['edit','update']);
        // $this->middleware('can:charity')->only(['index','create','store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user();
        if ($user->can('charity')) {
            $jobs = $user->Charity->jobs;
        } elseif ($user->can('admin')) {
            $jobs = CharityJob::all();
        } else {
            return back();
        }

        return view('jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('jobs.crup');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        $data = array_merge(['charity_id' => Auth::user()->charity->user_id], $data);
        CharityJob::create($data);
        // Auth::user()->charity->jobs()->create($request->all());
        return redirect(route('jobs.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CharityJob  $job
     * @return \Illuminate\Http\Response
     */
    public function show(CharityJob $job)
    {
        //
        return view('jobs.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CharityJob  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(CharityJob $job)
    {
        return view('jobs.crup', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CharityJob  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CharityJob $job)
    {
        $job->update($request->all());
        return redirect(route('jobs.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CharityJob  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(CharityJob $job)
    {
        //
        $job->delete();
        return redirect(route('jobs.index'));
    }

    public function close(CharityJob $job)
    {
        //
        $job->state = 'closed';
        $job->save();
        return redirect(route('jobs.index'));
    }
}
