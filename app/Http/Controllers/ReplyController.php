<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use App\Models\Thread;
use COM;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function replies(Request $request)
    {
        $thread_id = Arr::get($request , 'thread_id');
        $thread = Thread::find($thread_id);
        $replies = Reply::where('thread_id' , $thread_id)->get();
        foreach($replies as $reply) {
            $reply->likes = unserialize($reply->reacts);
        }
        return view('Reply.replies' , compact('thread' , 'replies'));
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
        $reply = new Reply();
        $reply->user_id = Auth::user()->id;
        $reply->thread_id = Arr::get($request , 'thread_id');
        $reply->body = Arr::get($request , 'body');
        $reply->save();
        $thread = Thread::find(Arr::get($request , 'thread_id'));
        $replies_count = Reply::where('thread_id' , $thread->id)->count();
        $thread->replies_count = $replies_count;
        $thread->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function show(Reply $reply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function edit(Reply $reply)
    {
        return view('Reply.edit', compact('reply'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reply $reply)
    {
        $reply->body = Arr::get($request , 'body');
        $reply->save();
        $thread_id = $reply->thread_id;
        $thread = Thread::find($thread_id);
        $replies = Reply::where('thread_id' , $thread_id)->get();
        return view('Reply.reply' , compact('thread' , 'replies'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reply $reply)
    {
        $reply->forceDelete();
        $thread_id = $reply->thread_id;
        $thread = Thread::find($thread_id);
        $replies = Reply::where('thread_id' , $thread_id)->get();
        return view('Reply.reply' , compact('thread' , 'replies'));
    }

    public function like($reply_id)
    {
        $reply = Reply::where("id", (int) $reply_id)->first();
        $status = (bool) request()->status;
        $reacts = unserialize($reply->reacts);

        if(!$status) {
            // Like
            $reacts[$reply_id][] = Auth::user()->id;
            $reply->reacts = serialize($reacts);
            $reply->save();
        } else {
            // Unlike
            unset($reacts[$reply->id][array_search(Auth::user()->id, $reacts[$reply->id])]);
            $reply->reacts = serialize($reacts);
            $reply->save();
        }
        echo json_encode($reply);
    }
}
