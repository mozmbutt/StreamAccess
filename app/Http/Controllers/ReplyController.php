<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use App\Models\ReplyLike;
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
    // public function replies(Request $request)
    // {
    //     $thread_id = $request->thread_id;
    //     $thread = Thread::find($thread_id);
    //     $replies = Reply::where('thread_id', $thread_id)->get();
    //     foreach ($replies as $reply) {
    //         $reply->likes = unserialize($reply->reacts);
    //     }
    //     return view('Reply.replies', compact('thread', 'replies'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($thread_id)
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
        $request->validate([
            'reply' => 'required|string|max:255',
        ]);
        $reply = new Reply();
        $reply->user_id = Auth::user()->id;
        $reply->thread_id = $request->thread_id;
        $reply->body = $request->reply;
        $reply->save();

        $thread = Thread::find($request->thread_id);
        $replyies_count = $thread->reply_count;
        $replyies_count++;
        $thread->replies_count = $replyies_count;
        $thread->save();
        return response()->json([
            'reply' => $reply->body,
            'user' => Auth::user()->name,
            'auth_user_id' => Auth::user()->id,
            'reply_user_id' => $reply->user_id,
            'timestamp' => date_format($reply->created_at,'d-m-Y')
        ],200);
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
        // return view('Reply.edit', compact('reply'));
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
        // $reply->body = $request->body;
        // $reply->save();
        // $thread_id = $reply->thread_id;
        // $thread = Thread::find($thread_id);
        // $replies = Reply::where('thread_id', $thread_id)->get();
        // return view('Reply.reply', compact('thread', 'replies'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reply $reply)
    {
        // $reply->delete();
        // $thread_id = $reply->thread_id;
        // $thread = Thread::find($thread_id);
        // $replies = Reply::where('thread_id', $thread_id)->get();
        // return view('Reply.reply', compact('thread', 'replies'));
    }
    public function delete($id){
        $reply = Reply::find($id);
        $thread = Thread::find($reply->thread->id);
        $replyies_count = $thread->reply_count;
        $replyies_count--;
        $thread->replies_count = $replyies_count;
        $thread->save();
        $reply->delete();
        return redirect('/forum');
    }
    public function likes($user_id, $reply_id)
    {
        $replyLike = ReplyLike::where('user_id', $user_id)->where('reply_id', $reply_id)->first();
        if ($replyLike) {
            $replyLike->delete();
            return response()->json(['msg' => ' Like'], 200);
        } else {
            $replyLike = new ReplyLike();
            $replyLike->user_id = Auth::user()->id;
            $replyLike->reply_id = $reply_id;
            $replyLike->save();
            return response()->json(['msg' => ' Liked'], 200);
        }
    }

    // public function like($reply_id)
    // {
    //     $reply = Reply::where("id", (int) $reply_id)->first();
    //     $status = (bool) request()->status;
    //     $reacts = unserialize($reply->reacts);

    //     if (!$status) {
    //         // Like
    //         $reacts[$reply_id][] = Auth::user()->id;
    //         $reply->reacts = serialize($reacts);
    //         $reply->save();
    //     } else {
    //         // Unlike
    //         unset($reacts[$reply->id][array_search(Auth::user()->id, $reacts[$reply->id])]);
    //         $reply->reacts = serialize($reacts);
    //         $reply->save();
    //     }
    //     echo json_encode($reply);
    // }
}
