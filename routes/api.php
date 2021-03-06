<?php

use App\Models\Job;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("job/filter", function( Request $request ) {
    $skill = $request->skill ?? '';
    $jobType = $request->jobType ?? '';
    $experience = $request->experience ?? '';
    $category = $request->category ?? '';
    $logged_in_user_id = $request->loggedInUserId;

    $data = [
        'title' => $skill,
        'jobType' => $jobType,
        'experience' => $experience,
        'category' => $category
    ];

    $whereQuery = "";
    foreach( $data as $column => $value ) {
        if($value) {
            $whereQuery .= " `$column` LIKE '%{$value}%' ";
        }
        if( !empty($whereQuery) && $value && array_key_last($data) !== $column ) {
            $whereQuery .= " and ";
        }
    }
    if(stripos($whereQuery, ' and ', -5) !== false) {
        $whereQuery = substr( $whereQuery, 0, stripos($whereQuery, ' and ', -5) );
    }

    $jobs = DB::select( "select * from jobs where ($whereQuery)" );

    if($jobs) {
        foreach($jobs as &$job) {
            $job->display_picture = "storage/" . UserInfo::where('id' , $job->user_id)->first()->display_picture;
            
            $job->user_name = User::where('id' , $job->user_id)->first()->name;
            
            if ($logged_in_user_id == $job->user_id) {
                $job->logged_in_user = true;
                $job->edit_url = url('job/edit', ['id' => $job->id]);
                $job->delete_url = url('job/delete', ['id' => $job->id]);
            }
            
        }
        return $jobs;
    }

    // $jobs = "select * from jobs where ($whereQuery)";
    return $jobs;

});
