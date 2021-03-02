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
        $by = isset($_GET['by']) ? $_GET['by'] : null;
        $popular = isset($_GET['popular']) ? $_GET['popular'] : null;
        $unanswered = isset($_GET['unanswered']) ? $_GET['unanswered'] : null;

        if (isset($by)) {
            $threads = Thread::where('user_id', auth()->id())->get();
        } elseif (isset($popular)) {
            $threads = Thread::all()->sortByDesc('replies_count');
        } elseif ($unanswered) {
            $threads = Thread::where('replies_count', 0)->get();
        }
        return view('forum', ['threads' => $threads]);
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
            return view('ask', ['channels' => $channels]);
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
        $thread_data = $request->all();
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        $thread = new Thread();
        $thread->user_id = Auth::user()->id;
        $thread->channel_id = Arr::get($thread_data, 'channel_id');
        $thread->title = Arr::get($thread_data, 'title');
        $thread->body = Arr::get($thread_data, 'body');
        $thread->save();
        $threads = Thread::where('user_id', Auth::user()->id)->get();
        return view('forum', ['threads' => $threads]);
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
        return view('Thread.thread', ['threads' => $threads]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thread $thread)
    {
        $thread->forceDelete();
        $threads = Thread::where('user_id', Auth::user()->id)->get();
        return view('Thread.thread', ['threads' => $threads]);
    }
}
