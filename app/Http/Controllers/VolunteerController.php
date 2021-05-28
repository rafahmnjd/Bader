<?php

namespace App\Http\Controllers;

use App\Models\Volunteer;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class VolunteerController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('can:admin')->only('destroy','index');
        // $this->middleware('can:v_access,volunteer')->only(['edit','update']);
        // $this->middleware('can:volunteer')->except('index','destroy','show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $volunteers = Volunteer::all();
        return view('volunteers.index', ['volunteers' => $volunteers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        if (Auth::user()->volunteer != null) {
            return redirect(route('volunteers.edit', Auth::user()->volunteer));
        }
        return view('volunteers.crup');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->except(['profile_ar', 'profile_en']); // ما بخزن الصور متل ما هنن
        if (request()->hasfile('profile_ar')) {
            $profile_arfilepath = public_path(config('path.vprofile'));
            $profile_arfile = request()->file('profile_ar');//بتعطي الصورة كفايل
            $profile_arname = time() . "_ar." . $request->profile_ar->extension();
            $profile_arfile->move($profile_arfilepath, $profile_arname);
            $input = array_merge($input, ["profile_ar" => $profile_arname]);
        }

        if (request()->hasfile('profile_en')) {
            $profile_enfilepath = public_path(config('path.vprofile'));
            $profile_enfile = request()->file('profile_en');
            $profile_enname = time() . "_en." . $request->profile_en->extension();
            $profile_enfile->move($profile_enfilepath, $profile_enname);
            $input = array_merge($input, ["profile_en" => $profile_enname]);
        }

        $input = array_merge($input, ["user_id" => Auth::user()->id]);
        $volunteer = Volunteer::create($input);
        if ($volunteer->user_id == Auth::user()->id) {
            return redirect(route('volunteers.show', $volunteer));
        } else {
            return redirect(route('volunteers.index'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function show(Volunteer $volunteer)
    {
        //
        return view('volunteers.show', compact('volunteer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function edit(Volunteer $volunteer)
    {
        return view('volunteers.crup', compact('volunteer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Volunteer $volunteer)
    {
        //
        $input = $request->except(['profile_ar', 'profile_en', 'cover']);
        if (request()->hasfile('profile_ar')) {
            $profile_arfilepath = public_path(config('path.vprofile'));
            if ($volunteer->profile_ar != null) {
                if (Storage::exists($profile_arfilepath . $volunteer->profile_ar)) {
                    File::delete($profile_arfilepath . $volunteer->profile_ar);
                }
            }

            $profile_arfile = request()->file('profile_ar');
            $profile_arname = time() . "_ar." . $request->profile_ar->extension();
            $profile_arfile->move($profile_arfilepath, $profile_arname);
            $input = array_merge($input, ["profile_ar" => $profile_arname]);
        }

        if (request()->hasfile('profile_en')) {
            $profile_enfilepath = public_path(config('path.vprofile'));
            if ($volunteer->profile_en != null) {
                if (Storage::exists($profile_enfilepath . $volunteer->profile_en)) {
                    File::delete($profile_enfilepath . $volunteer->profile_en);}
            }

            $profile_enfile = request()->file('profile_en');
            $profile_enname = time() . "_en." . $request->profile_en->extension();
            $profile_enfile->move($profile_enfilepath, $profile_enname);
            $input = array_merge($input, ["profile_en" => $profile_enname]);
        }

        $volunteer->update($input);
        if ($volunteer->user_id == Auth::user()->id) {
            return redirect(route('volunteers.show', $volunteer));
        } else {
            return redirect(route('volunteers.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Volunteer $volunteer)
    {
        //
        $volunteer->delete();
        return redirect(route('volunteers.index'));
    }
}
