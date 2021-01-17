<?php

use Illuminate\Support\Facades\Auth;

function role($role){
        if(Auth::check()){
            return Auth::user()->role == $role;
        }
        return false;
    }
?>