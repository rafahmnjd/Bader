<?php

namespace App\Http\Controllers;

use App\Models\Fill;
use Illuminate\Http\Request;

class FillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fills = Fill::all();
        return view('fills.index', compact('fills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('fills.crup');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = array_merge($request->all(), ['created_by' => Auth::user()->id]);
        $fill = Fill::create($data);
        return redirect(route('fills.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fill  $fill
     * @return \Illuminate\Http\Response
     */
    public function show(Fill $fill)
    {
        //
        return view('fills.show', compact('fill'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fill  $fill
     * @return \Illuminate\Http\Response
     */
    public function edit(Fill $fill)
    {
        //
        return view('fills.crup', compact('fill'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fill  $fill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fill $fill)
    {
        //
        $fill->update($request->all());
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fill  $fill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fill $fill)
    {
        //
        $fill->delete();
        return back();

    }
}
