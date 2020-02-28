<?php

namespace App\Http\Controllers;


use App\Mail\AdminForgotPassword;
use App\Model\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class loginController extends Controller
{
    public function loginPage()
    {
        return view('Backend.login.loginPage');
    }

    public function loginPageAction(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        $username = $request->username;
        $password = $request->password;
        $rememberMe = isset($request->remember_me);
        if (Auth::guard('admin')->attempt(['username' => $username, 'password' => $password, 'status' => 1], $rememberMe)) {
            return redirect()->intended(route('dashboard'));
        }
        return redirect()->back()->with('fail', 'Invalid Credentials');

    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect(route('loginPage'))->with('logout-msg', 'Successfully Logged Out');
    }

    public function forgotPassword()
    {
        return view('Backend.login.forgotPassword');
    }

    public function forgotPasswordAction(Request $request)
    {
        $request->validate([
            'email' => 'required'
        ]);
        $email = $request->email;
        $data = Admin::where('email', $email)->first();
        if ($data) {
            Mail::to($request->email)->send(new AdminForgotPassword($email));
            return view('Backend.login.resetLinkSent');
        } else {
            return redirect()->back()->with('fail', 'Wrong Email Address');
        }
    }

    public function resetPassword($token = null)
    {
        if ($admin = Admin::where(['reset_token' => $token])) {
            return view('Backend.login.resetPassword', compact('token'));
        } else {
            return view('Backend.login.loginPage');
        }
    }

    public function resetPasswordAction(Request $request, $token = null)
    {
        if($token){
            $request->validate([
                'password'=>'required|min:4|confirmed',
            ]);
            $password=bcrypt($request->password);
            Admin::where(['reset_token'=>$token])->update(['password'=>$password]);
            return redirect(route('loginPage'))->with('success','Password Reset Success');
        }

    }


}
