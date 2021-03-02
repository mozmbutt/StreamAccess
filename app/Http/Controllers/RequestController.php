<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\PendingRequest;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendingRequest = PendingRequest::select('user_id')->get();
        $userInfo = UserInfo::whereIn('user_id' , $pendingRequest->pluck('user_id')->all())->get();
        return view('Admin.Read.pending' , ['infos'=> $userInfo]);
    }
    
    public function approve($id){
        PendingRequest::where('user_id' , $id)->delete();
        User::find($id)->update(array('role' => 'professional'));
        return redirect('/viewPendingAccounts');
    }
    public function decline($id){
        PendingRequest::where('user_id' , $id)->delete();
        $userToDecline=UserInfo::where('user_id' , $id)->first();
        Education::where('user_info_id' , $userToDecline->id)->delete();
        return redirect('/viewPendingAccounts');
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
    public function update(Request $request, $id)
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
