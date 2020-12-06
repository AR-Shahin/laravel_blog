<?php

namespace App\Http\Controllers\frontend;

use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SiteIdentity;
use App\SocialLink;
use Illuminate\Support\Facades\Mail;
use function redirect;
use function view;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->data['site'] = SiteIdentity::get()->first();
        $this->data['link'] = SocialLink::get()->first();
    }

    public function index(){
        return view('frontend.contact',$this->data);
    }

    public function storeMailFromUsers(Request $request){
        $request->validate([
            'name' =>'required',
            'email' =>'required',
            'text' =>'required',
            'subject' =>'required'
        ]);

        $formData = $request->all();

        $Ema = array(
            'name' =>$request->name,
            'email' =>$request->email,
            'text' =>$request->text
        );
        if(Contact::create($formData)){
            Mail::send('frontend.email.template',$Ema, function($mail) use($Ema){
                $mail->from('devshahin1075@gmail.com','AR Shahin');
                $mail->to($Ema['email']);
                $mail->subject('Thanks for contact us');
            });

            $this->setSuccessMessageFront('Your mail has been sent!');
            return redirect()->back();
        }

        return $request->all();
    }

}
