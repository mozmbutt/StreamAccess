<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RequestController;
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

require __DIR__.'/auth.php';

Route::get('/', [PageController::class , 'return_page'])->middleware(['lastUserActivity']);;

Route::get('/forum', function () {
    return view('forum');
});
Route::get('/admin', function () {
    return view('Admin.index');
})->middleware(['role:admin']);

Route::get('/404', function(){
    return view('layouts.errors.404');
});
Route::get('/jobs', function(){
    return view('jobs');
});
Route::get('/addUser', function () {
    return view('Admin.Create.user');
});
Route::get('/addWorker', function () {
    return view('Admin.Create.worker');
});
Route::get('/viewAdmin', function () {
    return view('Admin.Read.admin');
});
Route::get('/viewProfessional', function () {
    return view('Admin.Read.professional');
});
Route::get('/viewClient', function () {
    return view('Admin.Read.client');
});
Route::get('/profile-account-setting', function () {
    return view('layouts.AccountSettings.profile-account-setting');
});
Route::get('/viewPendingAccounts', [RequestController::class , 'index']);

Route::get('/viewWorker', function () {
    return view('Admin.Read.worker');
});

Route::get('/professionalApprove/{id}', [RequestController::class , 'approve']);
Route::get('/professionalDecline/{id}', [RequestController::class , 'decline']);
Route::post('/saveAccountSetting', [RegisteredUserController::class , 'update']);
Route::post('/changePassword', [RegisteredUserController::class , 'updatePassword']);

Route::resource('post', PostController::class);
