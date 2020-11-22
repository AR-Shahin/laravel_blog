<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use function view;
use App\Post;
use App\Slider;
use App\aboutUs;
use App\SiteIdentity;
use App\SocialLink;

class HomeController extends Controller
{
    public function index(){
        $this->data['sliders'] = Slider::where('status',1)->latest()->get();
        $this->data['about'] = aboutUs::get()->first();
        $this->data['site'] = SiteIdentity::get()->first();
        $this->data['link'] = SocialLink::get()->first();
        $this->data['posts'] = Post::with('category','tags','admin')
            ->inRandomOrder()
            ->take(3)
            ->latest()
            ->get();
        $this->data['Lposts'] = Post::with('category','tags','admin')
            ->take(3)
            ->latest()
            ->get();
        return view('frontend.home',$this->data);
    }
}


