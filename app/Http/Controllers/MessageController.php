<?php

namespace App\Http\Controllers;

use App\Models\Fill;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Fill $fill)
    {
        //
        $messages = $fill->messages()->latest()->take(30)->get();
        Message::where('user_id', '<>', Auth::user()->id)->where('read', 0)->update(['read' => 1]);

        return view('fills.show', compact('fill', 'messages'));
    }

    /**
     * Send a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function send(Request $request,Fill $fill)
    {
        //
        $data = $request->all();
        $data = array_merge($data, ['fill_id' => $fill->id, 'user_id' => Auth::user()->id]);
        Message::create($data);
        return redirect(route('messages.index',$fill));
    }

}
