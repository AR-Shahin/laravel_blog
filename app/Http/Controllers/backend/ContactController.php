<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contact;
use function redirect;
use function view;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->data['main_menu'] = 'Contact';
        $this->data['sub_menu'] = 'Contact';
        $this->data['notify'] = Contact::where('status',0)->count();
    }

    public function index(){
        $this->data['contacts'] = Contact::latest()->get();
        return view('backend.contact.index',$this->data);
    }
    public function seenMail($id){

        if(Contact::find($id)->update([
            'status' => 1
        ])){
            $this->setSuccessMessage('Seen Mail.');
            return redirect()->back();
        }
        return $id;
    }
}
