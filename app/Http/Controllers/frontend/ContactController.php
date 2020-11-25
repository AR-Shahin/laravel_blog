<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SiteIdentity;
use App\SocialLink;
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
}
