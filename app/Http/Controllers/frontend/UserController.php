<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use App\SiteIdentity;
use App\SocialLink;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use function redirect;
use function route;

class UserController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth:user')->except('logout');
        $this->data['site'] = SiteIdentity::get()->first();
        $this->data['link'] = SocialLink::get()->first();
    }
    public function index(){
        return view('frontend.user.index',$this->data);
    }
    public function registration(){
        return view('frontend.user.register',$this->data);
    }

    public function store(Request $request){
        $request->validate([
            'name' =>['required'],
            'email' =>['required','unique:users'],
            'password' =>['required'],
            'image' =>['required','mimes:jpg,jpeg,png']
        ]);
        $image = $request->file('image');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($image->getClientOriginalExtension());
        $img_name = $name_gen . '.' . $img_ext;
        $upload = 'uploads/user/';
        $last_image = $upload . $img_name;
        $formData =  $request->all();
        $password = $request->password;
        $formData['image'] = $last_image;
        $formData['password'] = Hash::make($password);
        $create = User::create($formData);
        if($create){
            $image->move($upload,$img_name);
            $this->setSuccessMessageFront('Registration  Successfully! please log in.');
            return redirect()->route('users.login');
        }else{
            $this->setErrorMessageFront('Something Error!!');
            return redirect()->back();
        }
    }




//    public function loginProcess(Request $request){
//        $request->validate(
//            [
//                'email' =>['required'],
//                'password' =>'required'
//            ]
//        );
//
//        if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password])) {
//              return redirect()->route('users.profile');
//        }
//        $this->setErrorMessageFront('Error password');
//        return redirect()->route('users.login');
//    }
//    public function logout(){
//        Auth::guard('guest:user')->logout();
//        return route('/');
//    }
}
