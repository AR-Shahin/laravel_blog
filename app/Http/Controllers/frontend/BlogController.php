<?php

namespace App\Http\Controllers\frontend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use App\SiteIdentity;
use App\SocialLink;
use const PHP_OS_FAMILY;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->data['site'] = SiteIdentity::get()->first();
        $this->data['link'] = SocialLink::get()->first();
    }
    public function index(){
        $this->data['posts'] = Post::with('category','admin','tags')
            ->where('status',1)
            ->latest()->paginate(4);
        $this->data['Lposts'] = Post::with('category','tags','admin')
            ->where('status',1)
            ->take(3)
            ->latest()
            ->get();
        $this->data['categories'] = Category::with('countTotalPost')->latest()->get();
        $this->data['tags'] = Tag::all()->unique('tag');
        return view('frontend.blog',$this->data);
    }

    public function singlePost($slug){
        $this->data['categories'] = Category::with('countTotalPost')->latest()->get();
        $this->data['tags'] = Tag::all()->unique('tag');
        $this->data['post'] = Post::with('category','admin','tags')->where('slug',$slug)
            ->where('status',1)->first();

         $this->data['Rposts'] = Post::where('category_id',$this->data['post']->category_id)
            ->where('id' ,'!=',$this->data['post']->id)
            ->take(3)
             ->where('status',1)
            ->inRandomOrder()
            ->get();

        return view('frontend.single_post',$this->data);
    }
}
