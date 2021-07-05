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
        $messages = $fill->messages()->latest()->paginate(30);
        return view('fills.show', compact('fill', 'messages'));
    }

    /**
     * Send a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function send(Request $request)
    {
        //
        $data = $request->all();
        $data = array_merge($data, ['fill_id' => $fill, 'user_id' => Auth::user()->id]);
    }

}
