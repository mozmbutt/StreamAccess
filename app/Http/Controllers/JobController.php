<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::all();
        return view('jobs' , compact('jobs'));
    }

    public function filter_job(Request $request)
    {
        dd($request);
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
        // dd('here');
        $job = new Job();
        $request->validate([
            'title' => 'required|max:255',
            'category' => 'required|max:255',
            'description' => 'required',
        ]);
        
        $job->user_id = Auth::user()->id;
        $job->title = $request->title;
        $job->category = $request->category;
        $job->experience = $request->experience;
        $job->budget = $request->budget;
        $job->jobType = $request->jobType;
        $job->description = $request->description;
        $job->save();
        return redirect('job');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        //
    }

    public function edit_job($id)
    {
        $job = Job::where('id' , $id)->first();
        return view('edit-job', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        //
    }
    public function update_job(Request $request , $id)
    {
        $job = Job::where('id' , $id)->first();
        $job->user_id = Auth::user()->id;
        $job->title = $request->title;
        $job->category = $request->category;
        $job->experience = $request->experience;
        $job->budget = $request->budget;
        $job->jobType = $request->jobType;
        $job->description = $request->description;
        $job->update();
        return redirect('job');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        //
    }

    public function delete_job($id)
    {
        $job = Job::findOrFail($id);
        $job->delete();
        return redirect("job");
    }
}
