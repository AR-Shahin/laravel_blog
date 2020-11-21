<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\SocialLink;
use Illuminate\Http\Request;
use function redirect;
use function view;

class SocialLinksController extends Controller
{
    public function index(){
        $this->data['count'] = SocialLink::count();
        $this->data['links'] = SocialLink::get();
        $this->data['link'] = SocialLink::get()->first();
        return view('backend.site.socialLinks',$this->data);
    }
    public function store(Request $request){
        $request->validate([
            'text' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'fb' => 'required',
            'tw' => 'required',
            'insta' => 'required',
            'linke' => 'required',
            'pin' => 'required'
        ]);

        $formData =  $request->all();
         if(SocialLink::create($formData)){
             $this->setSuccessMessage('Added Successfully!');
             return redirect()->back();
         }
    }

    public function update(Request $request){
        $up = SocialLink::find($request->id)->update($request->all());
        if($up){
            $this->setSuccessMessage('Updated Successfully!');
            return redirect()->back();
        }
    }
}
