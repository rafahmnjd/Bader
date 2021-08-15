<?php

namespace App\Http\Controllers;

use App\Models\Fill;
use App\Models\Shortage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Shortage $shortage)
    {
        
        $fills = $shortage->fills()->latest()->paginate(5);
        return view('fills.index', compact('fills', 'shortage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Shortage $shortage)
    {
        //
        return view('fills.crup', compact('shortage'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Shortage $shortage)
    {
        $data = ['user_id' => Auth::user()->id, 'shortage_id' => $shortage->id, 'type' => "shortage", 'state' => "waiting", 'quantity' => $request->quantity];
        $fill = Fill::create($data);
        return redirect(route('fills.index', $shortage));

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
        $maessages = $fill->messages()->latest()->paginate(30);
        return view('fills.show', compact('fill', 'messages'));

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
        if ($fill->state == 'completed') {
            return back()->with(['msg' => __('not avilable')]);
        }

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
        if ($fill->state == 'completed') {
            return back()->with(['msg' => __('not avilable')]);
        }

        $fill->update($request->all());
        return redirect(route('fills.index', $fill->shortage_id));

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
        if ($fill->state == 'completed') {
            return back()->with(['msg' => __('not avilable')]);
        }

        $fill->delete();
        return back();

    }
    public function close(Fill $fill)
    {
        # code...
        $fill->state = "completed";
        $fill->save();
        if( $fill->quantity==$fill->shortage->rest())
            $fill->shortage->state="closed";
            $fill->shortage->save();
        return redirect(route('fills.index', $fill->shortage_id));
    }
}
