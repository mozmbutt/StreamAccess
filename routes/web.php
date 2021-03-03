<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\CommentController;
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
Route::get('/profile-account-setting', function () {
    return view('layouts.AccountSettings.profile-account-setting');
});
Route::get('/profile-setting', function () {
    return view('Admin.Update.profile-account-setting');
});
Route::get('/professional-profile-setting/{id}', [RegisteredUserController::class, 'pofessionalProfileSetting']);

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

Route::resource('comment', CommentController::class);
//saving firebase token
Route::prefix('api')->group(function () {
    Route::post('/save-user-token', [RegisteredUserController::class, 'saveUserFirebaseToken']);
    Route::get('/get-all-users', [RegisteredUserController::class, 'getAllUsers']);
});

Route::get('/addChannel', function () {
    return view('Channel.create');
});

Route::get('/allChannel',  [ChannelController::class, 'index']);
Route::get('/manageChannels', [ChannelController::class, 'manage']);
Route::resource('/channel', ChannelController::class);

Route::get('/ask', [ThreadController::class, 'create']);

Route::post('/channelAdded', [ThreadController::class, 'store']);
Route::post('/threadAdded', [ThreadController::class, 'store']);

Route::get('/forum', [ThreadController::class, 'index']);
Route::get('/profile/{id}', [ProfileController::class, 'index']);

Route::get('/replies', [ReplyController::class, 'replies']);
Route::get('/follow/{id}', [ProfileController::class, 'follow']);

