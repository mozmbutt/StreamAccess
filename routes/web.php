<?php

use App\Http\Controllers\PageController;
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

Route::get('/', [PageController::class , 'return_page']);


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
Route::get('/viewPendingAccounts', [RequestController::class , 'index']);

Route::get('/viewWorker', function () {
    return view('Admin.Read.worker');
});

Route::get('/addChannel', function () {
    return view('Channel.create');
});

Route::get('/allChannel', 'App\Http\Controllers\ChannelController@index');
Route::get('/manageChannels', 'App\Http\Controllers\ChannelController@manage');
Route::resource('/channel', 'App\Http\Controllers\ChannelController');

Route::get('/ask', 'App\Http\Controllers\ThreadController@create');

Route::post('/channelAdded', 'App\Http\Controllers\ThreadController@store');
Route::post('/threadAdded', 'App\Http\Controllers\ThreadController@store');

Route::get('/forum', 'App\Http\Controllers\ThreadController@index');

Route::get('/replies', 'App\Http\Controllers\ReplyController@replies');