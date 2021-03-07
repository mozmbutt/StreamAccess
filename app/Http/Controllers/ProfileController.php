<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Thread;
use App\Models\UserInfo;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index($user_id)
    {
        if (Auth::check()) {
            $user = User::find($user_id);
            $userInfo = UserInfo::where('user_id', $user->id)->first();
            $tags = Tag::all();
            $posts = Post::where('user_id', $user_id)->orderByDesc('created_at')->get();
            $followingCount = count(Follow::where('follower_id', $user->id)->get());
            $followerCount = count(Follow::where('following_id', $user->id)->get());
            if (Follow::where('following_id', $user_id)->where('follower_id', Auth::user()->id)->first()) {
                $text = "Following";
            } else {
                $text = "Follow";
            }
            return view('profile', ['user' => $user, 'userInfo' => $userInfo, 'tags' => $tags, 'posts' => $posts, 'text' => $text, 'followingCount' => $followingCount, 'followerCount' => $followerCount]);
        }
        else{
            return redirect('login');
        }
    }

    public function follow($following_id)
    {
        $follow = Follow::where('follower_id', Auth::user()->id)->where('following_id', $following_id)->first();
        if ($follow) {
            $follow->delete();
            return response()->json(['msg' => 'Follow'], 200);
        } else {
            $follow = new Follow();
            $follow->follower_id = Auth::user()->id;
            $follow->following_id = $following_id;
            $follow->save();
            return response()->json(['msg' => 'Following'], 200);
        }
    }
    public function gopro(){
        return view('layouts.include.gopro');
    }

    public function professionsProfile($profession){
        $professionals = UserInfo::where('profession' , $profession)->get();
        return view('layouts.include.profile.profiles' , ['professionals' => $professionals , 'profession' => $profession]);
        
    }

    public function allProfessionals(){
        $professionals = User::where('role' , 'professional')
        ->join('user_infos', 'user_infos.user_id', '=', 'users.id')
        ->get();
        return view('layouts.professionals' , ['professionals' => $professionals]);
        
    }
}
