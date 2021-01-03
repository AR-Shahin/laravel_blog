<?php

namespace App\Http\Controllers\frontend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use App\SiteIdentity;
use App\SocialLink;
use Illuminate\Support\Facades\DB;
use const PHP_OS_FAMILY;
use function view;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->data['main_menu'] = 'Blog';
        $this->data['site'] = SiteIdentity::get()->first();
        $this->data['link'] = SocialLink::get()->first();
        $max = $this->data['max'] = Post::max('count');
        $low = $max -5;
        $this->data['top_posts'] = Post::whereBetween('count', [$low, $max])
            //->max('count')
            ->where('status',1)
            ->take(3)
            ->inRandomOrder()
            ->get();
    }
    public function index(){
        $this->data['posts'] = Post::with('category','admin','tags')
            ->where('status',1)
            ->latest()->paginate(4);
        $this->data['Lposts'] = Post::with('category','tags','admin','comments')
            ->where('status',1)
            ->take(3)
            ->latest()
            ->get();
        $this->data['categories'] = Category::has('countTotalPost')->with('countTotalPost')->latest()->get();
        $this->data['tags'] = Tag::all()->unique('tag');
        return view('frontend.blog',$this->data);
    }

    public function singlePost($slug){
        Post::where('slug',$slug)->increment('count');
        $this->data['categories'] = Category::with('countTotalPost')->latest()->get();
        $this->data['tags'] = Tag::all()->unique('tag');
        $this->data['post'] = Post::with('category','admin','tags','comments')->where('slug',$slug)
            ->where('status',1)->first();

        $this->data['Rposts'] = Post::where('category_id',$this->data['post']->category_id)
            ->where('id' ,'!=',$this->data['post']->id)
            ->take(3)
            ->where('status',1)
            ->inRandomOrder()
            ->get();

        return view('frontend.single_post',$this->data);
    }

    public function categoryWisePost($cat_name){
        $id = Category::where('title',$cat_name)->pluck('id');
        $this->data['posts'] = Post::with('category','admin','tags')
            ->where('status',1)
            ->where('category_id',$id)
            ->latest()->paginate(6);
        return view('frontend.cat_wise_post',$this->data);
    }

    public function fetchPostForAjax(Request $request){
        if($request->ajax()) {
            $posts = Post::where('title', 'LIKE', '%'.$request->name.'%')
                ->get();
            $output = '';
            if (count($posts)>0) {
                $output = '<ul class="list-group" style="display: block; position: relative; z-index: 1">';
                foreach ($posts as $post){

                    $output .= '<li class="list-group-item">'.$post->slug.'</li>';
                }
                $output .= '</ul>';
            }
            else {
                $output .= '<li class="list-group-item">'.'No results'.'</li>';
            }
            return $output;
        }
    }


    public function searchPostForAjax(Request $request){
        $this->data['post'] = Post::with('category','admin','tags','comments')->where('slug',$request->slug)
            ->where('status',1)->first();

        if($this->data['post'] == ''){
            $this->data['error'] = $request->slug;
            return view('frontend.404',$this->data);
        }
        Post::where('slug',$request->slug)->increment('count');
        $this->data['categories'] = Category::with('countTotalPost')->latest()->get();
        $this->data['tags'] = Tag::all()->unique('tag');
        $this->data['post'] = Post::with('category','admin','tags','comments')->where('slug',$request->slug)
            ->where('status',1)->first();

        $this->data['Rposts'] = Post::where('category_id',$this->data['post']->category_id)
            ->where('id' ,'!=',$this->data['post']->id)
            ->take(3)
            ->where('status',1)
            ->inRandomOrder()
            ->get();

        return view('frontend.single_post',$this->data);
    }



    public function tagWisePost($tag){
    
        return redirect()->back();
    }
}
