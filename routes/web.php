<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\UserController;
use App\Models\User;
use App\Models\Worker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::get('/', [PageController::class, 'return_page'])->middleware(['lastUserActivity']);;


Route::get('/admin', function () {
    return view('Admin.index');
})->middleware(['role:admin']);

Route::get('/404', function () {
    return view('layouts.errors.404');
});
Route::get('/jobs', function () {
    return view('jobs');
});
Route::get('/addUser', function () {
    return view('Admin.Create.user');
});

Route::get('/professionals', [UserController::class, 'viewProfessional']);
Route::get('/clients', [UserController::class, 'viewClient']);
Route::get('/admins', [UserController::class, 'viewAdmin']);

Route::get('/deleteAdmin/{id}', [UserController::class, 'deleteAdmin']);

Route::get('/viewClient', function () {
    return view('Admin.Read.client');
});
Route::get('/profile-account-setting', [FollowController::class, 'settingFollowings']);
Route::get('/profile-setting', function () {
    return view('Admin.Update.profile-account-setting');
});
Route::get('/professional-profile-setting/{id}', [RegisteredUserController::class, 'pofessionalProfileSetting']);
Route::get('/profile/{id}', [ProfileController::class, 'index']);

Route::get('/viewPendingAccounts', [RequestController::class, 'index']);

Route::get('/professionalApprove/{id}', [RequestController::class, 'approve']);
Route::get('/professionalDecline/{id}', [RequestController::class, 'decline']);
Route::post('/saveAccountSetting', [RegisteredUserController::class, 'update']);
Route::post('/changePassword', [RegisteredUserController::class, 'updatePassword']);
Route::get('post/destroy/{id}', [PostController::class, 'destroy']);

//Route::resource('post', PostController::class,  ['except' => 'show']);
Route::resource('post', PostController::class);
Route::resource('worker', WorkerController::class);
Route::get('workerDelete/{id}', [WorkerController::class, 'delete']);
Route::get('all-workers', [WorkerController::class, 'allWorkers']);

Route::get('professionls/{profession}', [ProfileController::class, 'professionsProfile']);
Route::get('/all-professionls', [ProfileController::class, 'allProfessionals']);


Route::resource('comment', CommentController::class);
//saving firebase token
Route::prefix('api')->group(function () {
    Route::post('/save-user-token', [RegisteredUserController::class, 'saveUserFirebaseToken']);
    Route::get('/get-all-users', [RegisteredUserController::class, 'getAllUsers']);
});

//following followers
Route::get('/follow/{id}', [ProfileController::class, 'follow']);
Route::get('/postlike/{user_id}/{post_id}', [PostController::class, 'likes']);
Route::get('/replylike/{user_id}/{reply_id}', [ReplyController::class, 'likes']);

//forum
Route::get('/forum', [ThreadController::class, 'index']);

//channel routes
// Route::get('/addChannel', function () {
//     return view('Admin.Create.channel');
// });
Route::resource('/channel', ChannelController::class);
Route::get('channelDelete/{id}', [ChannelController::class, 'delete']);

// Route::get('/allChannel',  [ChannelController::class, 'index']);
// Route::get('/manageChannels', [ChannelController::class, 'manage']);

Route::get('/ask', [ThreadController::class, 'create']);

// Route::post('/channelAdded', [ChannelController::class, 'store']);


// Route::resource('reply', [ReplyController::class]);
Route::get('/replies', [ReplyController::class, 'replies']);

Route::get('/forum/{id}',[ThreadController::class,'filter']);

Route::resource('thread', ThreadController::class);
Route::post('/reply/store', [ReplyController::class, 'store']);
Route::post('/reply/delete/{id}', [ReplyController::class, 'delete']);
Route::get('gopro',[ProfileController::class,'gopro']);

//job controlling routes
Route::resource('job', JobController::class);
Route::get('job/edit/{id}', [JobController::class, 'edit_job']);
Route::post('job/update/{id}', [JobController::class, 'update_job']);
Route::get('job/delete/{id}', [JobController::class, 'delete_job']);
// Route::post('job/filter', [JobController::class, 'filter_job']);

//Search
Route::post('/search/{url}',[PageController::class,'search']);

Route::get('/followings', [FollowController::class, 'followingIndex']);
Route::get('/followers', [FollowController::class, 'followersIndex']);


