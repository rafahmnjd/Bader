<?php

namespace App\Http\Controllers;

use App\Models\Volunteer;
use Illuminate\Support\Facades\Auth;

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
        $input = $request->except(['profile']); // ما بخزن الصور متل ما هنن
        if (request()->hasfile('profile')) {
            $profilefilepath = public_path(config('path.vprofile'));
            $profilefile = request()->file('profile'); //بتعطي الصورة كفايل
            $profilename = time() . "_." . $request->profile->extension();
            $profilefile->move($profilefilepath, $profilename);
            $input = array_merge($input, ["profile" => $profilename]);
        }

        $input = array_merge($input, ["user_id" => Auth::user()->id]);
        $volunteer = Volunteer::create($input);
            return redirect(route('volunteers.show', $volunteer));

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
        $input = $request->except(['profile']);
        if (request()->hasfile('profile')) {
            $profilefilepath = public_path(config('path.vprofile'));
            if ($volunteer->profile != null) {
                if (Storage::exists($profilefilepath . $volunteer->profile)) {
                    File::delete($profilefilepath . $volunteer->profile);
                }
            }

            $profilefile = request()->file('profile');
            $profilename = time() . "_." . $request->profile->extension();
            $profilefile->move($profilefilepath, $profilename);
            $input = array_merge($input, ["profile" => $profilename]);
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
