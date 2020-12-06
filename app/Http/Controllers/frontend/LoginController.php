<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\SiteIdentity;
use App\SocialLink;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'users/profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->data['site'] = SiteIdentity::get()->first();
        $this->data['link'] = SocialLink::get()->first();
    }

    public function showLoginForm(){
        return view('frontend.user.login',$this->data);
    }
    protected function guard()
    {
        return Auth::guard('user');
    }
    public function logout(Request $request)
    {
        Auth::guard('user')->logout();
        return redirect()->route('users.login');
    }
}
