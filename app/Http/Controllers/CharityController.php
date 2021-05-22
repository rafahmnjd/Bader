<?php

namespace App\Http\Controllers;

use App\Models\Charity;
use Auth;
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
        // $this->middleware('can:admin')->only('destroy');
        // $this->middleware('can::charity')->except('destroy','show');

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
        return view('Charity.index', ['charities' => $charities]);
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
        return view('Charity.crup');

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
        // echo "store function";
        $input = $request->except(['logo_ar', 'logo_en', 'cover']); // ما بخزن الصور متل ما هنن
        if (request()->hasfile('logo_ar')) {
            $logo_arfilepath = public_path(config('path.ch_logo'));
            $logo_arfile = request()->file('logo_ar');//بتعطي الصورة كفايل
            $logo_arname = time() . "_ar." . $request->logo_ar->extension();
            $logo_arfile->move($logo_arfilepath, $logo_arname);
            $input = array_merge($input, ["logo_ar" => $logo_arname]);
        }

        if (request()->hasfile('logo_en')) {
            $logo_enfilepath = public_path(config('path.ch_logo'));
            $logo_enfile = request()->file('logo_en');
            $logo_enname = time() . "_en." . $request->logo_en->extension();
            $logo_enfile->move($logo_enfilepath, $logo_enname);
            $input = array_merge($input, ["logo_en" => $logo_enname]);
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
        return redirect(route('charities.index'));
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
        return view('Charity.show');
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
        return view('Charity.crup', compact('charity'));
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
        $input = $request->except(['logo_ar', 'logo_en', 'cover']);
        if (request()->hasfile('logo_ar')) {
            $logo_arfilepath = public_path(config('path.ch_logo'));
            if ($charity->logo_ar != null) {
                if (Storage::exists($logo_arfilepath . $charity->logo_ar)) {
                    File::delete($logo_arfilepath . $charity->logo_ar);}
            }

            $logo_arfile = request()->file('logo_ar');
            $logo_arname = time() . "_ar." . $request->logo_ar->extension();
            $logo_arfile->move($logo_arfilepath, $logo_arname);
            $input = array_merge($input, ["logo_ar" => $logo_arname]);
        }

        if (request()->hasfile('logo_en')) {
            $logo_enfilepath = public_path(config('path.ch_logo'));
            if ($charity->logo_en != null) {
                if (Storage::exists($logo_enfilepath . $charity->logo_en)) {
                    File::delete($logo_enfilepath . $charity->logo_en);}
            }

            $logo_enfile = request()->file('logo_en');
            $logo_enname = time() . "_en." . $request->logo_en->extension();
            $logo_enfile->move($logo_enfilepath, $logo_enname);
            $input = array_merge($input, ["logo_en" => $logo_enname]);
        }

        if (request()->hasfile('cover')) {
            $coverfilepath = public_path(config('path.covers'));
            if ($charity->cover != null) {
                if (Storage::exists($coverfilepath . $charity->cover)) {
                    File::delete($coverfilepath . $charity->cover);}
            }

            $coverfile = request()->file('cover');
            $covername = time() . "_cov." . $request->cover->extension();
            $coverfile->move($coverfilepath, $covername);
            $input = array_merge($input, ["cover" => $covername]);
        }

        $charity->update($input);
        if ($charity->user_id == Auth::user()->id) {
            return redirect(route('charities.show',$charity));
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
        if ($charity->logo_ar != null) {
            $logo_arfilepath = public_path(config('path.ch_logo'));
            if (Storage::exists($logo_arfilepath . $charity->logo_ar)) {
                File::delete($logo_arfilepath . $charity->logo_ar);}
        }

        if ($charity->logo_en != null) {
            $logo_enfilepath = public_path(config('path.ch_logo'));
            if (Storage::exists($logo_enfilepath . $charity->logo_en)) {
                File::delete($logo_enfilepath . $charity->logo_en);}
        }
        if ($charity->cover != null) {
            $coverfilepath = public_path(config('path.ch_logo'));
            if (Storage::exists($coverfilepath . $charity->cover)) {
                File::delete($coverfilepath . $charity->cover);}
        }

        $charity->delete();
        return redirect(route('charities.index'));

    }
}
