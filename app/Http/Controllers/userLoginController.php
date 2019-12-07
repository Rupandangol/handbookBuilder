<?php

namespace App\Http\Controllers;

use App\Model\Frontend\UserList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userLoginController extends Controller
{
    public function userLogin()
    {
        return view('Frontend.userLogin.userLogin');
    }

    public function userLoginAction(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        $username = $request->username;
        $password = $request->password;
        $rememberMe = isset($request->remember_me);

        if (Auth::guard('userList')->attempt(['username' => $username, 'password' => $password, 'status' => 1], $rememberMe)) {
            return redirect()->intended(route('frontend-dashboard'));
        }
        return redirect()->back()->with('fail','Failed to logIn');
    }

    public function userRegister()
    {
        return view('Frontend.userLogin.userRegister');
    }

    public function userRegisterAction(Request $request)
    {

        $request->validate([
            'username' => 'required|min:3|unique:user_lists,username',
            'email' => 'required|unique:user_lists,email',
            'password' => 'required|min:5|confirmed',
        ]);
        $data['username'] = $request->username;
        $data['email'] = $request->email;
        $data['password'] = bcrypt($request->password);
        $data['status'] = 1;
        if (UserList::create($data)) {
            return redirect(route('loginUser'));
        }
        return redirect(route('loginUser'))->with('fail','Error');

    }
    public function userLogout(){
        Auth::guard('userList')->logout();
        return redirect(route('loginUser'))->with('success','Successfully Logged Out');
    }
}
