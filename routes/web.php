<?php

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

Route::get('/', function () {
    return view('forum');
});
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