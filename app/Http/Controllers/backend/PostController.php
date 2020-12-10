<?php

namespace App\Http\Controllers\backend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostCreateRequest;
use App\Post;
use App\Tag;
use function count;
use function dd;
use function explode;
use function GuzzleHttp\Psr7\str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use function implode;
use function json_decode;
use const POLL_ERR;
use function redirect;
use function sizeof;
use function strtoupper;
use function ucwords;
use function unlink;
use function var_dump;
use function var_export;
use function view;
use App\Contact;
use Intervention\Image\ImageManagerStatic as Image;

class PostController extends Controller
{
    public function __construct()
    {
        $this->data['main_menu'] = 'Post';
        $this->data['sub_menu'] = 'Post';
        $this->data['notify'] = Contact::where('status',0)->count();
    }

    public function index(){
        $this->data['posts'] = Post::with('category','tags','admin')->orderBy('id','desc')->get();
        return view('backend.post.index',$this->data);
    }

    public function create(){
        $this->data['categories'] = Category::latest()->get();
        return view('backend.post.create',$this->data);
    }
    public function store(PostCreateRequest $request){
        $main_image = $request->file('main_image');
        $view_image = $request->file('view_image');
        $m_ext = $main_image->extension();
        $v_ext = $view_image->extension();
        $name_main =  hexdec(uniqid()) . '.' .$m_ext;
        $view_main =  hexdec(uniqid()) . '.' .$v_ext;
        $last_main_image = 'uploads/post/'.$name_main;
        $last_view_image = 'uploads/post/'.$view_main;
        $post = new Post();
        $post->title = ucwords($request->title);
        $post->slug = Str::slug($request->title,'-');
        $post->category_id = $request->cat_id;
        $post->admin_id = Auth::user()->id;
        $post->short_des = $request->short_des;
        $post->long_des = $request->long_des;
        $post->count = 0;
        $post->status = 0;
        $post->image = $last_main_image;
        $post->view_image = $last_view_image;
        $tags = $request->tags;
        $Tags =  explode(" ",$tags);
        if($post->save()){
            Image::make($main_image)->resize(640,420)->save($last_main_image);
            Image::make($view_image)->resize(640,420)->save($last_view_image);
            foreach ($Tags as $t){
                $tag = new Tag();
                $tag->post_id = $post->id;
                $tag->tag = strtoupper($t);
                $tag->save();
            }
            //$this->setSuccessMessage('Post added successfully!');
            return redirect()->back()->with('success','Post added successfully!');
        }
    }

    public function inactivePost($id){
        $up = Post::findorFail($id)->update([
            'status' => 0
        ]);
       // $this->setSuccessMessage('Post Inactive Successfully!');
        return redirect()->back()->with('success','Post Inactive successfully!');
    }
    public function ActivePost($id){
        $up = Post::findorFail($id)->update([
            'status' => 1
        ]);
        //$this->setSuccessMessage('Post Active Successfully!');
        return redirect()->back()->with('success','Post Active successfully!');
    }

    public function show($id){
        $this->data['post'] = Post::with('tags','category')->findorFail($id);
        return view('backend.post.show',$this->data);
    }

    public function edit($id){
        $this->data['categories'] = Category::latest()->get();
        $this->data['post'] = Post::findorFail($id);
        $Tags =  Tag::where('post_id',$id)->pluck('tag');
        $A =[];
        $i =0;
        foreach ($Tags as $tag){
            $A[$i] = $tag;
            $i++;
        }
        $this->data['tags'] = implode(" ",$A);
        return view('backend.post.edit',$this->data);
    }

    public function update(Request $request,$id){
        $main_image = $request->file('main_image');
        $view_image = $request->file('view_image');

        if($main_image && $view_image){
            $m_ext = $main_image->extension();
            $v_ext = $view_image->extension();
            $name_main =  hexdec(uniqid()) . '.' .$m_ext;
            $view_main =  hexdec(uniqid()) . '.' .$v_ext;
            $last_main_image = 'uploads/post/'.$name_main;
            $last_view_image = 'uploads/post/'.$view_main;

            $post = Post::find($id);
            $post->title = ucwords($request->title);
            $post->slug = Str::slug($request->title,'-');
            $post->category_id = $request->cat_id;
            $post->short_des = $request->short_des;
            $post->long_des = $request->long_des;
            $post->image = $last_main_image;
            $post->view_image = $last_view_image;
            $tags = $request->tags;
            $Tags =  explode(" ",$tags);
            if($post->save()){
                Image::make($main_image)->resize(640,420)->save($last_main_image);
                Image::make($view_image)->resize(640,420)->save($last_view_image);
                $oldTags = Tag::where('post_id',$id)->get();
                foreach ($oldTags as $oldTag){
                    Tag::where('post_id',$id)->delete();
                }

                foreach ($Tags as $t){
                    $tag = new Tag();
                    $tag->post_id = $id;
                    $tag->tag = strtoupper($t);
                    $tag->save();
                }
                unlink($request->old_main_image);
                unlink($request->old_view_image);
                $this->setSuccessMessage('Post Updated successfully!');
                return redirect()->route('post.index');
            }
        }else if($main_image){
            $m_ext = $main_image->extension();
            $name_main =  hexdec(uniqid()) . '.' .$m_ext;
            $last_main_image = 'uploads/post/'.$name_main;

            $post = Post::find($id);
            $post->title = ucwords($request->title);
            $post->slug = Str::slug($request->title,'-');
            $post->category_id = $request->cat_id;
            $post->short_des = $request->short_des;
            $post->long_des = $request->long_des;
            $post->image = $last_main_image;
            $tags = $request->tags;
            $Tags =  explode(" ",$tags);
            if($post->save()){
                Image::make($main_image)->resize(640,420)->save($last_main_image);
                $oldTags = Tag::where('post_id',$id)->get();
                foreach ($oldTags as $oldTag){
                    Tag::where('post_id',$id)->delete();
                }

                foreach ($Tags as $t){
                    $tag = new Tag();
                    $tag->post_id = $id;
                    $tag->tag = strtoupper($t);
                    $tag->save();
                }
                unlink($request->old_main_image);
                $this->setSuccessMessage('Post Updated successfully!');
                return redirect()->route('post.index');
            }
        }else if($view_image){
            $v_ext = $view_image->extension();
            $view_main =  hexdec(uniqid()) . '.' .$v_ext;
            $last_view_image = 'uploads/post/'.$view_main;

            $post = Post::find($id);
            $post->title = ucwords($request->title);
            $post->slug = Str::slug($request->title,'-');
            $post->category_id = $request->cat_id;
            $post->short_des = $request->short_des;
            $post->long_des = $request->long_des;
            $post->view_image = $last_view_image;
            $tags = $request->tags;
            $Tags =  explode(" ",$tags);
            if($post->save()){
                Image::make($view_image)->resize(640,420)->save($last_view_image);
                $oldTags = Tag::where('post_id',$id)->get();
                foreach ($oldTags as $oldTag){
                    Tag::where('post_id',$id)->delete();
                }

                foreach ($Tags as $t){
                    $tag = new Tag();
                    $tag->post_id = $id;
                    $tag->tag = strtoupper($t);
                    $tag->save();
                }
                unlink($request->old_view_image);
                $this->setSuccessMessage('Post Updated successfully!');
                return redirect()->route('post.index');
            }
        }else{
            $post = Post::find($id);
            $post->title = ucwords($request->title);
            $post->slug = Str::slug($request->title,'-');
            $post->category_id = $request->cat_id;
            $post->short_des = $request->short_des;
            $post->long_des = $request->long_des;
            $tags = $request->tags;
            $Tags =  explode(" ",$tags);
            if($post->save()){
                $oldTags = Tag::where('post_id',$id)->get();
                foreach ($oldTags as $oldTag){
                    Tag::where('post_id',$id)->delete();
                }
                foreach ($Tags as $t){
                    $tag = new Tag();
                    $tag->post_id = $id;
                    $tag->tag = strtoupper($t);
                    $tag->save();
                }
                $this->setSuccessMessage('Post Updated successfully!');
                return redirect()->route('post.index');
            }
        }
    }//function

    public function destroy($id){
        $del = Post::find($id);
        $main_img = $del->image;
        $view_img = $del->view_image;
        $oldTags = Tag::where('post_id',$id)->get();
        foreach ($oldTags as $oldTag){
            Tag::where('post_id',$id)->delete();
        }
        if($del->delete()){
            unlink($main_img);
            unlink($view_img);
            return redirect()->back();
        }
    }
}