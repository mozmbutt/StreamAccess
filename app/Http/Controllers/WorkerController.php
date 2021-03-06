<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workers = Worker::all();
        return view('Admin.Read.worker' , ['workers'=> $workers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Create.worker');
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
            'firstname' => 'required|string|max:255',
            'phone_no' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'skill' => 'required|string|max:255',
        ]);
        $worker = new Worker();
        $worker->first_name = $request->firstname;
        $worker->second_name = $request->secondname;
        $worker->phone_no = $request->phone_no;
        $worker->cnic_no = $request->cnic_no;
        $worker->gender = $request->gender;
        $worker->skill = $request->skill;
        $worker->address = $request->address;
        $worker->save();
            
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function show(Worker $worker)
    {
        //
    }

    public function allWorkers()
    {
        $workers = Worker::all();
        return view('layouts.workers' , ['workers' => $workers]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function edit(Worker $worker)
    {
        $worker_to_update = Worker::where('id' , $worker->id)->first();
        return view('Admin.Update.worker' , ['worker'=> $worker_to_update]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Worker $worker)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'phone_no' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'skill' => 'required|string|max:255',
        ]);
        
        $worker->first_name = $request->firstname;
        $worker->second_name = $request->secondname;
        $worker->phone_no = $request->phone_no;
        $worker->cnic_no = $request->cnic_no;
        $worker->gender = $request->gender;
        $worker->skill = $request->skill;
        $worker->address = $request->address;

        $worker->update();
        return redirect("worker");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function destroy($worker)
    {
        //  
    }
    public function delete($id)
    {
        $worker = Worker::findOrFail($id);
        $worker->delete();
        return redirect("worker");
    }
}
