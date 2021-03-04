<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\Post;
use App\Models\Postlike;
use App\Models\PostTag;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\Environment\Console;

class PostController extends Controller
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
        $post = new Post();
        $post->user_id = Auth::user()->id;
        $post->title = $request->title;
        $post->body = $request->body;
        if ($request->hasFile('attachment')) {
            $post->attachment = Storage::putFile('attachments', $request->file('attachment'));
        }
        $post->save();
        foreach ($request->tags as $tag) {
            $postTag = new PostTag();
            $postTag->post_id = $post->id;
            //checking if tag exist already
            if (!Tag::find($tag)) {
                //creating new tags if not there already
                $newTag = new Tag();
                $newTag->name = $tag;
                $newTag->save();
                //saving post_tag table values
                $postTag->tag_id = $newTag->id;
            } else {
                $postTag->tag_id = $tag;
            }
            $postTag->save();
        }

        //dd($existing_tags);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        dd('in show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $postTags = PostTag::select('tag_id')->where('post_id', $post->id)->get();
        $tags = Tag::find($postTags);

        $followingCount = count(Follow::where('follower_id', Auth::user()->id)->get());
        $followerCount = count(Follow::where('following_id', Auth::user()->id)->get());


        return view('layouts.include.edit-post', ['post' => $post, 'tags' => $tags, 'followingCount' => $followingCount, 'followerCount' => $followerCount]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->title = $request->title;
        $post->body = $request->body;
        $post->updated_at = Carbon::now();
        if ($request->hasFile('attachment')) {
            $post->attachment = Storage::putFile('attachments', $request->file('attachment'));
        }
        $post->save();
        postTag::where('post_id', $post->id)->delete();
        foreach ($request->tags as $tag) {
            $postTag = new PostTag();
            $postTag->post_id = $post->id;
            //checking if tag exist already
            if (!Tag::find($tag)) {
                //creating new tags if not there already
                $newTag = new Tag();
                $newTag->name = $tag;
                $newTag->save();
                //saving post_tag table values
                $postTag->tag_id = $newTag->id;
            } else {
                $postTag->tag_id = $tag;
            }
            $postTag->save();
        }
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($post_id)
    {
        PostTag::where('post_id', $post_id)->delete();
        Post::find($post_id)->delete();

        return redirect('/');
    }
    public function likes($user_id, $post_id)
    {
        $postLike = Postlike::where('user_id', $user_id)->where('post_id', $post_id)->first();
        if ($postLike) {
            $postLike->delete();
            return response()->json(['msg' => ' Like'], 200);
        } else {
            $postLike = new Postlike();
            $postLike->user_id = Auth::user()->id;
            $postLike->post_id = $post_id;
            $postLike->save();
            return response()->json(['msg' => ' Liked'], 200);
        }
    }
}
