<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userinfo_controller extends Controller
{
    #user info form shown here...
    function create(){
        return view('userinfo_form');
    }


}
