<?php

namespace App\Http\Controllers;

use App\Models\Charity;
use App\Models\CharityJob;
use Illuminate\Support\Facades\Auth;
;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CharityController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct() //صلاحيات
    {
        $this->middleware('can:admin')->only('destroy','index');
        $this->middleware('can:ch_access,charity')->only(['edit','update']);
        $this->middleware('can:charity')->only(['create','store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //للادمن فقط
    {
        //
        $charities = Charity::all();
        return view('charities.index', ['charities' => $charities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->charity != null) {
            return redirect(route('charities.edit', Auth::user()->charity));
        }
        return view('charities.crup');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)// حفظ من الكرييت
    {
        //
        $input = $request->except(['logo','cover']); // ما بخزن الصور متل ما هنن
        if (request()->hasfile('logo')) {
            $logofilepath = public_path(config('path.ch_logo'));
            $logofile = request()->file('logo');//بتعطي الصورة كفايل
            $logoname = time() . "_logo." . $request->logo->extension();
            $logofile->move($logofilepath, $logoname);
            $input = array_merge($input, ["logo" => $logoname]);
        }

        if (request()->hasfile('cover')) {
            $coverfilepath = public_path(config('path.covers'));
            $coverfile = request()->file('cover');
            $covername = time() . "_cov." . $request->cover->extension();
            $coverfile->move($coverfilepath, $covername);
            $input = array_merge($input, ["cover" => $covername]);
        }

        $input = array_merge($input, ["user_id" => Auth::user()->id]);
        $charity = Charity::create($input);
        if ($charity->user_id == Auth::user()->id) {
            return redirect(route('charities.show', $charity));
        } else if(Auth::user()->role=="admin") {
            return redirect(route('charities.index'));
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Charity  $charity
     * @return \Illuminate\Http\Response
     */
    public function show(Charity $charity)
    {
        //
        return view('charities.show', compact('charity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Charity  $charity
     * @return \Illuminate\Http\Response
     */
    public function edit(Charity $charity)
    {
        //
        return view('charities.crup', compact('charity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Charity  $charity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Charity $charity)
    {
        //
        // return "update function";
        $input = $request->except(['logo', 'cover']);
        if (request()->hasfile('logo')) {
            $logofilepath = public_path(config('path.ch_logo'));
            if ($charity->logo != null) {
                if (file_exists($logofilepath . $charity->logo)) {
                    File::delete($logofilepath . $charity->logo);
                }
            }

            $logofile = request()->file('logo');
            $logoname = time() . "_ar." . $request->logo->extension();
            $logofile->move($logofilepath, $logoname);
            $input = array_merge($input, ["logo" => $logoname]);
        }



        if (request()->hasfile('cover')) {
            $coverfilepath = public_path(config('path.covers'));
            if ($charity->cover != null) {
                if (file_exists($coverfilepath . $charity->cover)) {
                    File::delete($coverfilepath . $charity->cover);}
            }

            $coverfile = request()->file('cover');
            $covername = time() . "_cov." . $request->cover->extension();
            $coverfile->move($coverfilepath, $covername);
            $input = array_merge($input, ["cover" => $covername]);
        }

        $charity->update($input);
        if ($charity->user_id == Auth::user()->id) {
            return redirect(route('charities.show', $charity));
        } else {
            return redirect(route('charities.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Charity  $charity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Charity $charity)
    {
        //
        if ($charity->logo != null) {
            $logofilepath = public_path(config('path.ch_logo'));
            if (file_exists($logofilepath . $charity->logo)) {
                File::delete($logofilepath . $charity->logo);}
        }

        if ($charity->cover != null) {
            $coverfilepath = public_path(config('path.covers'));
            if (file_exists($coverfilepath . $charity->cover)) {
                File::delete($coverfilepath . $charity->cover);}
        }

        $charity->delete();
        return redirect(route('charities.index'));

    }

    public function projects(Charity $charity)
    {
        $projects=$charity->projects;
        return view('charities.projects.project_sh',compact('projects','charity'));
    }

    public function shortages(Charity $charity)
    {
        $shortages = $charity->shortages()->where('type', 'min');
        return view('charities.shortages', compact('shortages','charity'));
    }

    public function surpluses(Charity $charity)
    {
        $surpluses = $charity->shortages()->where('type', 'plus');
        return view('charities.surpluses', compact('surpluses', 'charity'));
    }
}
