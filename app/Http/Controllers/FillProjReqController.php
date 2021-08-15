<?php

namespace App\Http\Controllers;

use App\Models\Fill;
use App\Models\ProjectRequirement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FillProjReqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProjectRequirement $projReq)
    {
        $fills = $projReq->fills()->latest()->paginate(5);
        return view('projReqs.fills.index', compact('fills', 'projReq'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(int $projReq)
    {
        //
        return view('projReqs.fills.crup', compact('projReq'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, int $projReq)
    {
        $data = ['user_id' => Auth::user()->id, 'shortage_id' => $projReq, 'type' => "projReq", 'state' => "waiting", 'quantity' => $request->quantity];
        $fill = Fill::create($data);
        return redirect(route('projReqs.fills.index', $projReq));

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
        return view('projReqs.fills.show', compact('fill', 'messages'));

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

        return view('projReqs.fills.crup', compact('fill'));
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
        return redirect(route('projReqs.fills.index', $fill->shortage_id));

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
        return redirect(route('projReqs.fills.index', $fill->shortage_id));
    }
}
