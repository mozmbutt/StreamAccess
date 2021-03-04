<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Reply;
use App\Models\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $threads = Thread::all();
        // $by = isset($_GET['by']) ? $_GET['by'] : null;
        $popular = isset($_GET['popular']) ? $_GET['popular'] : null;
        $unanswered = isset($_GET['unanswered']) ? $_GET['unanswered'] : null;

        if (isset($popular)) {
            $threads = Thread::all()->sortByDesc('replies_count');
        } elseif ($unanswered) {
            $threads = Thread::where('replies_count', 0)->get();
        }
        $channels = Channel::all();
        
        return view('forum', ['threads' => $threads , 'channels' => $channels]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $channels = Channel::all();
        if (Auth::user()) {
            return view('Thread.ask', ['channels' => $channels]);
        } else {
            return view('auth.login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        $thread = new Thread();
        $thread->user_id = Auth::user()->id;
        $thread->channel_id = $request->channel_id;
        $thread->title = $request->title;
        $thread->body =$request->body;
        $thread->save();

        $threads = Thread::where('user_id', Auth::user()->id)->get();
        return view('thread.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function show(Thread $thread)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function edit(Thread $thread)
    {
        return view('Thread.update', ['thread' => $thread]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thread $thread)
    {
        $thread->title = Arr::get($request, 'title');
        $thread->body = Arr::get($request, 'body');
        $thread->save();
        $threads = Thread::where('user_id', Auth::user()->id)->get();
        return view('forum', ['threads' => $threads]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thread $thread)
    {
        $thread->delete();
        $threads = Thread::where('user_id', Auth::user()->id)->get();
        return view('forum', ['threads' => $threads]);
    }
}
