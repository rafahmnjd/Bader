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
    public function index(int $type = 0)
    {
        //

        if ($type == 0) {
            $fills = Auth::user()->fills;
            // $fill = $fills->first();
            return view('fills.msg.all', compact('fills', 'type'));

        } elseif ($type == 1) {
            $fills = Auth::user()->charity->fills();
            // $fill = $fills[0] ?? null;
            return view('fills.msg.all', compact('fills', 'type'));

        }
        // return view('fills.msg.all', compact('fills', 'fill','type'));
    }

    public function show(Fill $fill, int $type = 0)
    {

        if ($type == 0) {
            $fills = Auth::user()->fills;
            $messages = $fill->messages()->latest()->paginate(10);

            return view('fills.msg.all', compact('fills', 'fill', 'messages', 'type'));

        } elseif ($type == 1) {
            $fills = Auth::user()->charity->fills();
            $messages = $fill->messages()->latest()->paginate(10);

            return view('fills.msg.all', compact('fills', 'fill', 'messages', 'type'));

        }

        # code...
    }
    /**
     * Send a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function send(Request $request, Fill $fill,int $type)
    {
        //
        $data = $request->all();
        $data = array_merge($data, ['fill_id' => $fill->id, 'user_id' => Auth::user()->id]);
        Message::create($data);
        return redirect(route('fill.messages', ['fill'=>$fill,'type'=>$type]));
    }

}
