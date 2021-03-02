<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Experience;
use App\Models\PendingRequest;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Skill;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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
    public function viewProfessional()
    {
        $professionals = User::all()->where('role', 'professional');
        return view('Admin.Read.professional', ['professionals' => $professionals]);
    }
    public function viewClient()
    {
        $clients = User::all()->where('role', 'customer');
        return view('Admin.Read.client', ['clients' => $clients]);
    }
    public function viewAdmin()
    {

        $admins = User::all()->where('role', 'admin');
        return view('Admin.Read.admin', ['admins' => $admins]);
    }

    public function deleteAdmin($id)
    {
        if ($id != Auth::user()->id) {
            PendingRequest::where('user_id', $id)->delete();
            $user = User::find($id);
            $userInfo = UserInfo::where('user_id', $id)->first();
            //dd($userInfo->id);
            Education::where('user_info_id', $userInfo->id)->delete();
            Experience::where('user_info_id', $userInfo->id)->delete();
            Skill::where('user_info_id', $userInfo->id)->delete();
            $userInfo->delete();
            $posts = Post::where('user_id', $id)->get();
            foreach ($posts as $post) {
                $postIds[] = $post->id;
            }
            if ($user->posts) {
                if ($user->posts->postTag) {
                    PostTag::whereIn('post_id', $postIds)->delete();
                }
                $posts->delete();
            }
            $user->delete();
            return redirect('admins');
        } else {
            return redirect('admins')->with('error', 'cant delete active user!');
        }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
