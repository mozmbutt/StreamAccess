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
        $followingCount = count(Follow::where('follower_id', Auth::user()->id)->get());
        $followerCount = count(Follow::where('following_id', Auth::user()->id)->get());
        $userIds = UserInfo::select('user_id')
            ->where('profession', Auth::user()->userInfo->profession)
            ->get();
        $users = UserInfo::wherein('user_id', $userIds)->take(5)->get();
        return view('layouts.include.profile.following', ['userInfos' => $this->getInfo(), 'followingCount' => $followingCount, 'followerCount' => $followerCount, 'userInfo' => null, 'users' => $users]);
    }
    public function getInfo()
    {
        $followingIds = Follow::select('following_id')->where('follower_id', Auth::user()->id)->get();
        return UserInfo::wherein('user_id', $followingIds)->get();
    }
    public function settingFollowings()
    {

        return view('layouts.AccountSettings.profile-account-setting', ['followers' => $this->getInfo()]);
    }
}
