<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
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
            $projects = $user->Charity->projects;
        } elseif ($user->can('admin')) {
            $projects = Project::all();
        } else {
            return back();
        }

        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('projects.crup');
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
        $data = $request->except(['image']); // ما بخزن الصور متل ما هنن
        if (request()->hasfile('image')) {
            $imagefilepath = public_path(config('path.pro_img'));
            $imagefile = request()->file('image'); //بتعطي الصورة كفايل
            $imagename = time() . "_image." . $request->image->extension();
            $imagefile->move($imagefilepath, $imagename);
            $data = array_merge($data, ["image" => $imagename]);
        }

        $data = array_merge(['charity_id' => Auth::user()->charity->user_id], $data);
        Project::create($data);
        // Auth::user()->charity->projects()->create($request->all());
        return redirect(route('projects.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
        $projects = Project::latest()->paginate(7);
        return view('projects.show', compact('project','projects'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('projects.crup', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->except(['image']); // ما بخزن الصور متل ما هنن
        if (request()->hasfile('image')) {
            $imagefilepath = public_path(config('path.pro_img'));
            if ($project->image != null) {
                if (file_exists($imagefilepath . $project->image)) {
                    File::delete($imagefilepath . $project->image);
                }
            }

            $imagefile = request()->file('image');
            $imagename = time() . "_ar." . $request->image->extension();
            $imagefile->move($imagefilepath, $imagename);
            $data = array_merge($data, ["image" => $imagename]);
        }

        $project->update($data);
        return redirect(route('projects.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
        if ($project->image != null) {
            $imagefilepath = public_path(config('path.pro_img'));
            if (file_exists($imagefilepath . $project->image)) {
                File::delete($imagefilepath . $project->image);}
        }
        $project->delete();
        return redirect(route('projects.index'));
    }

    public function close(Project $project)
    {
        //
        // $project=$projReq->project;
        $project->state = "closed";
        $project->save();
        return back();

    }
}
