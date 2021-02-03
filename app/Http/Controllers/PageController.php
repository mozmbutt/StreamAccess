<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function return_page(){
        if(Auth::check()){
             return view('index');
        }else{
            return view('forum');
        }        
    }
}
