<?php

namespace App\Http\Controllers\backend;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use function redirect;
use function ucwords;
use function view;
use App\Contact;
class CategoryController extends Controller
{
    public function __construct()
    {
        $this->data['main_menu'] = 'Post';
        $this->data['sub_menu'] = 'Cat';
        $this->data['notify'] = Contact::where('status',0)->count();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['categories'] = Category::latest()->get();
        return view('backend.category.index',$this->data);
    }


    public function store(Request $request)
    {
        $request->validate(['title' => ['required','unique:categories']]);

        $cat = new Category();
        $cat->title = ucwords($request->title);
        $cat->slug = Str::slug($request->title,'-');
        if($cat->save()){
            $this->setSuccessMessage('Category Added Successfully!');
            return redirect()->back();
        }
    }
    public function show($id)
    {

        $del = Category::findorFail($id)->delete();
        if($del){
            return redirect()->back();
        }
    }
    public function update(Request $request, $id)
    {
        $request->validate(['title' => ['required']]);
        $update =  Category::find($id)->update([
            'title' => ucwords($request->title),
            'slug' => Str::slug($request->title,'-')
        ]);
        if($update){
            $this->setSuccessMessage('Category Updated Successfully!');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $id;
    }
}
