<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function followingIndex()
    {
        $followingIds = Follow::select('following_id')->where('follower_id', Auth::user()->id)->get();
        $userInfos = UserInfo::wherein('user_id',$followingIds)->get();
        $followingCount = count(Follow::where('follower_id', Auth::user()->id)->get());
        $followerCount = count(Follow::where('following_id', Auth::user()->id)->get());
        return view('layouts.include.profile.following', ['userInfos'=> $userInfos, 'followingCount' => $followingCount, 'followerCount' => $followerCount]);
    }
}
