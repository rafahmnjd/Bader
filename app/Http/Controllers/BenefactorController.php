<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;
class BenefactorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users=User::where('role','benef')->get();
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $benefactor
     * @return \Illuminate\Http\Response
     */
    public function show(User $benefactor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $benefactor
     * @return \Illuminate\Http\Response
     */
    public function edit(User $benefactor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $benefactor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $benefactor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $benefactor
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $benefactor)
    {
        //
    }

    public function MyFills()
    {
        # code...
        $fills= Auth::user()->fills;
        return view('Benefactors.fills',compact('fills'));
    }
}
