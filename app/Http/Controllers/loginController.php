<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class loginController extends Controller
{
    public function loginPage(){
        return view('Backend.login.loginPage');
    }

    public function loginPageAction(Request $request){
        return $request->all();
    }
}
