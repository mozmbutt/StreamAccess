<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Thread;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function return_page()
    {
        if (Auth::check()) {
            $tags = Tag::all();
            $userIds = UserInfo::select('user_id')
                ->where('profession', Auth::user()->userInfo->profession)
                ->get();
            $posts = Post::wherein('user_id', $userIds)->orderByDesc('created_at')->get();
            return view('index', ['tags' => $tags, 'posts' => $posts]);
        } else {
            $threads = Thread::all();
            return view('forum',['threads' => $threads]);
        }
    }

}
