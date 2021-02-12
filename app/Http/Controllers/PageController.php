<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function return_page(){
        if(Auth::check()){
            $tags = Tag::all();
             return view('index' , ['tags' => $tags]);
        }else{
            return view('forum');
        }        
    }
}
