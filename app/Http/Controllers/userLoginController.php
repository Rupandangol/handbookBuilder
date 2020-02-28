<?php

namespace App\Http\Controllers;

use App\Mail\UserForgotPassword;
use App\Model\Admin;
use App\Model\Frontend\UserList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
        return redirect()->back()->with('fail', 'Failed to logIn');
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
        return redirect(route('loginUser'))->with('fail', 'Error');

    }

    public function userLogout()
    {
        Auth::guard('userList')->logout();
        return redirect(route('mainPage'))->with('success', 'Successfully Logged Out');
    }

    public function userForgotPassword()
    {
        return view('Frontend.userLogin.userForgotPassword');
    }

    public function userForgotPasswordAction(Request $request)
    {
        $request->validate([
            'email' => 'required'
        ]);
        if ($admin = Admin::where('email', $request->email)->first()) {
            $email = $request->email;
            Mail::to($email)->send(new UserForgotPassword($email));
            return view('Frontend.userLogin.userResetLinkSent');
        } else {
            return redirect()->back()->with('fail', 'Invalid Email');
        }
    }

    public function userReset($token = null)
    {
        if (UserList::where('reset_token', $token)) {
            return view('Frontend.userLogin.userResetPassword',compact('token'));
        }
        return view('Frontend.userLogin.userLogin')->with('fail', 'Failed');
    }

    public function userResetAction(Request $request, $token = null)
    {
        if($token){
            $request->validate([
                'password'=>'required|min:5|confirmed'
            ]);
            $password=bcrypt($request->password);
            if(UserList::where(['reset_token'=>$token])->update(['password'=>$password])){
                return redirect(route('loginUser'))->with('success','Password Reset Success');
            }
            return redirect(route('loginUser'))->with('fail','Failed');
        }

    }


}
