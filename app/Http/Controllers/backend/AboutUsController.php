<?php

namespace App\Http\Controllers\backend;

use App\aboutUs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use function redirect;
use function view;
use App\Contact;

class AboutUsController extends Controller
{
    public function __construct()
    {
        $this->data['main_menu'] = 'About';
        $this->data['sub_menu'] = '';
        $this->data['notify'] = Contact::where('status',0)->count();
    }
    public function index(){
        $this->data['count'] = aboutUs::count();
        $this->data['about'] = aboutUs::get();
        return view('backend.about.index',$this->data);
    }

    public function store(Request $request){
        $request->validate([
            'text' => 'required'
        ]);
        $abt = new aboutUs();
        $abt->text = $request->text;
        if($abt->save()){
            $this->setSuccessMessage('Text added Successfully');
            return redirect()->back();
        }
    }
    public function update(Request $request,$id){
        $request->validate([
            'text' => 'required'
        ]);
        $abt = aboutUs::find($id);
        $abt->text = $request->text;
        if($abt->save()){
            $this->setSuccessMessage('Text Updated Successfully');
            return redirect()->back();
        }
    }
    public function destroy($id){
        $del = aboutUs::find($id)->delete();
        if($del){
            return redirect()->back();
        }
    }
}
