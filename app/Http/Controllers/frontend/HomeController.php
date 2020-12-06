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
        $this->data['main_menu'] = 'Home';
        $this->data['sliders'] = Slider::where('status',1)->latest()->get();
        $this->data['about'] = aboutUs::get()->first();
        $this->data['site'] = SiteIdentity::get()->first();
        $this->data['link'] = SocialLink::get()->first();
        $this->data['posts'] = Post::with('category','tags','admin')
            ->where('status',1)
            ->inRandomOrder()
            ->take(3)
            ->latest()
            ->get();
        $this->data['Lposts'] = Post::with('category','tags','admin')
            ->where('status',1)
            ->take(3)
            ->latest()
            ->get();

        $max = $this->data['max'] = Post::max('count');
        $low = $max -3;
        $this->data['top_posts'] = Post::whereBetween('count', [$low, $max])
            //->max('count')
            ->where('status',1)
            ->take(3)
            ->inRandomOrder()
            ->get();
       // return $this->data;
        return view('frontend.home',$this->data);
    }
}


