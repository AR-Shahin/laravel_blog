<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use function auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function redirect;
use function view;

class LoginController extends Controller
{
    public function index(){
        if(auth()->user()) return redirect()->route('dashboard');
        return view('backend.admin.login');
    }

    public function LoginProcess(Request $request){
        $request->validate([
            'email' =>['required','exists:admins'],
            'password'=>'required'
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->intended('dashboard');
        }else{
            $this->setErrorMessageFront('Password Error!');
            return redirect()->back();
        }
    }

    public function Logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
