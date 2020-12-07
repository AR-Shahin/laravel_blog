<?php

namespace App\Http\Controllers\backend;

use App\Admin;
use App\Category;
use App\Contact;
use App\Http\Controllers\Controller;
use App\Post;
use App\Slider;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->data['main_menu'] = 'Dashboard';
        $this->data['sub_menu'] = '';
        $this->middleware('auth');
    }
    public function index(){

        $this->data['sliders'] = Slider::all()->count();
        $this->data['cats'] = Category::all()->count();
        $this->data['posts'] = Post::all()->count();
        $this->data['users'] = Admin::all()->count();
        $this->data['contacts'] = Contact::all()->count();
        $this->data['notify'] = Contact::where('status',0)->count();
        return view('backend.dashboard',$this->data);
    }
}
