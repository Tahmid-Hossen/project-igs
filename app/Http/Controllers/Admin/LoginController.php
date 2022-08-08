<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm(){
        if(Auth::check()){
            return redirect()->back();
        }else{
           return view('admin.auth.login');
        }
    }

    public function login(Request $request){
        $validatedData = $request->validate([
            'email' => 'required|email|max:55',
            'password' => 'required|max:12',
        ]);

        if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)){
            return redirect()->intended(route('admin.dashboard'));
        } 
        return redirect()->back()->withInput($request->only('email','remember'))->with('failed','the credential dont matched our own records!');
    }

    protected function guard(){
        return Auth::guard();
    }
}
