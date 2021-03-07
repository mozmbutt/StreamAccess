<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Comment;
use App\Models\Follow;
use App\Models\Post;
use App\Models\Postlike;
use App\Models\Tag;
use App\Models\Thread;
use App\Models\UserInfo;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PageController extends Controller
{
    public function return_page()
    {
        if (Auth::check()) {
            $tags = Tag::all();
            $userIds = UserInfo::select('user_id')
                ->where('profession', Auth::user()->userInfo->profession)
                ->get();
            $users = UserInfo::wherein('user_id', $userIds)->take(5)->get();
            $posts = Post::wherein('user_id', $userIds)->orderByDesc('created_at')->get();

            $followingCount = count(Follow::where('follower_id', Auth::user()->id)->get());
            $followerCount = count(Follow::where('following_id', Auth::user()->id)->get());
            return view('index', ['tags' => $tags, 'posts' => $posts, 'followingCount' => $followingCount, 'followerCount' => $followerCount, 'users' => $users]);
        } else {
            return redirect('forum');
        }
    }
    public function search($url, Request $request)
    {
        if ($url == 'profile') {
            if ($request->search != '') {
                if (Auth::check()) {
                    $tags = Tag::all();
                    $userIds = UserInfo::select('user_id')
                        ->where('first_name', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('last_name', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('profession', 'LIKE', '%' . $request->search . '%')
                        ->get();
                    $posts = Post::wherein('user_id', $userIds)->orderByDesc('created_at')->get();
                    $followingCount = count(Follow::where('follower_id', Auth::user()->id)->get());
                    $followerCount = count(Follow::where('following_id', Auth::user()->id)->get());
                    return view('index', ['tags' => $tags, 'posts' => $posts, 'followingCount' => $followingCount, 'followerCount' => $followerCount]);
                } else {
                    return redirect('forum');
                }
            }
        }
    }
}
