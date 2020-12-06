<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use function redirect;

class CommentController extends Controller
{
    public function commentStore(Request $request){
        if(!Auth::guard('user')->check()) return redirect()->route('users.login');
        $formData = $request->all();
        $formData['user_id'] = Auth::guard('user')->user()->id;
        if(Comment::create($formData)){
            $this->setSuccessMessageFront('Comment Added Successfully!');
            return redirect()->back();
        }
    }
}
