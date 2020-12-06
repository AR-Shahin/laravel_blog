<?php

namespace App\Http\Controllers\backend;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use function redirect;
use function view;
use App\Http\Requests\AddAdminRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Http\Requests\ChangePassword;
class AdminController extends Controller
{
    public function index(){
        if(Auth::user()->status == 0) return redirect()->back();
        $this->data['admins'] = Admin::where('status', '!=' ,4)->latest()->get();
        return view('backend.admin.index',$this->data);
    }
    public function addNewAdmin(){
        if(Auth::user()->status == 1) {
            $this->data['sub_menu'] = 'Admins';
            return view('backend.admin.register', $this->data);
        }else{
            return redirect()->route('dashboard');
        }
    }
    public function storeNewAdmin(AddAdminRequest $request){
        $image = $request->file('image');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($image->getClientOriginalExtension());
        $img_name = $name_gen . '.' . $img_ext;
        $upload = 'uploads/admin/';
        $last_image = $upload . $img_name;
        $formData =  $request->all();
        $password = $request->password;
        $formData['image'] = $last_image;
        $formData['password'] = Hash::make($password);
        $formData['added_by'] = Auth::user()->name;

        $create = Admin::create($formData);
        if($create){
            $image->move($upload,$img_name);
            $this->setSuccessMessage('New Admin Added Successfully');
            return redirect()->route('admin.index');
        }else{
            $this->setErrorMessage('Something Error!!');
            return redirect()->back();
        }
    }


    //--------------------
    public function promoteAdmin($id){
        $update = Admin::findorFail($id)->update([
            'status' => 1
        ]);
        if($update){
            $this->setSuccessMessage('Promote Admin.');
            return redirect()->back();
        }
    }
    public function demoteAdmin($id){
        $update = Admin::findorFail($id)->update([
            'status' => 0
        ]);
        if($update){
            $this->setSuccessMessage('Demote Admin.');
            return redirect()->back();
        }
    }

    public function blockAdmin($id){
        $update = Admin::findorFail($id)->update([
            'status' => 3
        ]);
        if($update){
            $this->setSuccessMessage('Blocked Admin.');
            return redirect()->back();
        }
    }
    public function unblockAdmin($id){
        $update = Admin::findorFail($id)->update([
            'status' => 0
        ]);
        if($update){
            $this->setSuccessMessage('Unblocked Admin.');
            return redirect()->back();
        }
    }

    public function deleteAdmin($id){
        $ob = Admin::findorFail($id);
        $img = $ob->image;
        $update = Admin::findorFail($id)->update([
            'status' => 4,
            'email' => ''
        ]);
        if($update){
            unlink($img);
            $this->setSuccessMessage('Deleted Admin.');
            return redirect()->back();
        }
    }

    public function editEmail(Request $request,$id){
        $request->validate([
            'email' =>'unique:admins'
        ]);
        $update = Admin::findorFail($id)->update([
            'email' => $request->email
        ]);
        if($update){
            $this->setSuccessMessage('Edited Email');
            return redirect()->back();
        }
    }

    //profile

    public function profile(){
        $this->data['admin'] = Admin::find(Auth::user()->id);
        return view('backend.admin.profile',$this->data);
    }
    public function update(){
        $this->data['sub_menu'] = 'Update';
        $this->data['admin'] = Admin::find(Auth::user()->id);
        return view('backend.admin.update',$this->data);
    }

    public function updateProfile(Request $request){

        $image = $request->file('image');
        if ($image) {
            $old_image = $request->old_image;
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($image->getClientOriginalExtension());
            $img_name = $name_gen . '.' . $img_ext;
            $upload = 'uploads/admin/';
            $last_image = $upload . $img_name;

            $update = Admin::findorFail(Auth::user()->id)->update([
                'name' => ucwords($request->name),
                'address' => ucwords($request->address),
                'image' => $last_image,
                'updated_at' => Carbon::now()
            ]);
            if($update){
                $image->move($upload,$img_name);
                unlink($old_image);
                $this->setSuccessMessage('Product Updated Successfully!');
            }
        }else{
            $update = Admin::findorFail(Auth::user()->id)->update([
                'name' => ucwords($request->name),
                'address' => ucwords($request->address),
                'updated_at' => Carbon::now()
            ]);
            if($update){
                $this->setSuccessMessage('Profile Updated Successfully!');
            }
        }
        return redirect()->route('admin.profile');
    }

    public function changePassword(ChangePassword $request){
        $db_pass = Auth::user()->getAuthPassword();
        $new_pass = $request->password;
        $old_pass = $request->old_pass;
        if(Hash::check($old_pass,$db_pass)){
            $update = Admin::find(Auth::user()->id)->update([
                'password'=>Hash::make($new_pass),
                'updated_at' => Carbon::now()
            ]);
            if($update)
            {
                Auth::logout();
                $this->setSuccessMessageFront("Password has Changed! You have to login now!!");
                return Redirect()->route('login');
            }
        }else{
            $this->setErrorMessage('Invalid old Password : )');
            return redirect()->back();
        }
    }
}
