<?php

namespace App\Http\Controllers;

use App\Models\Shortage;
use App\Models\Item;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShortageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $shortages = Auth::user()->charity->shortages;
        $surpluses = Auth::user()->charity->surpluses;
        return view('shortages.index', compact('shortages', 'surpluses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $items=Item::all();
        return view('shortages.crup',compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //TODO accsess To Charity Only
        $data = array_merge($request->all(), ['charity_id' => Auth::user()->id]);
        $shortage = Shortage::create($data);
        return redirect(route('shortages.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shortage  $shortage
     * @return \Illuminate\Http\Response
     */
    public function show(Shortage $shortage)
    {
        //
        return view('shortages.show', compact('shortage'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shortage  $shortage
     * @return \Illuminate\Http\Response
     */
    public function edit(Shortage $shortage)
    {
        //
        $items = Item::all();
        return view('shortages.crup', compact('shortage','items'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shortage  $shortage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shortage $shortage)
    {
        //
        $shortage->update($request->all());
        return redirect(route('shortages.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shortage  $shortage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shortage $shortage)
    {
        //
        $shortage->delete();
        return back();

    }

    public function close(Shortage $shortage)
    {
        # code...
        $shortage->state='closed';
        $shortage->save();
        return redirect(route('shortages.index'));
    }
}
