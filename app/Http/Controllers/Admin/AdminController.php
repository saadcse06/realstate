<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    public function admin_dashboard(){
        return view('admin.index');
    }

    public function admin_profile(){
        $id = Auth::user()->id;
        $profileData=User::find($id);
        return view('admin.admin_profile_view',compact('profileData'));
    }
    public function admin_profile_store(Request $request){
        $id = Auth::user()->id;
        $data=User::find($id);
        $data->name=$request->name;
        $data->username=$request->username;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->address=$request->address;
        if(!empty($data->photo)){
            if($request->file('photo')){
                $uploadImg=$request->file('photo');
                @unlink(public_path($data->photo));
                $imgName=hexdec(uniqid()).'.'.$uploadImg->getClientOriginalExtension();
                $manager = new ImageManager(new Driver());
                $img = $manager->read($uploadImg);
                $img=$img->resize(300,300);
                $img->toJpeg(80)->save(base_path('public/upload/admin_img/'.$imgName));
                $imgUrl='/upload/admin_img/'.$imgName;
                $data->photo=$imgUrl;
            }
        }
        $data->save();
        $msg=array('message'=>'admin Profile Updated Sucessfully', 'alert-type'=>'success');
        return redirect()->back()->with($msg);
        //return redirect()->back();
    }

    public function admin_login(){
        return view('admin.admin_login');
    }

    public function admin_change_password(){
        $id = Auth::user()->id;
        $profileData=User::find($id);
        return view('admin.admin_change_password',compact('profileData'));
    }

    public function admin_update_password(Request $request){
        $request->validate([
                'old_password'=>'required',
                'new_password'=>'required|confirmed',
        ]);
        //match old password
        if(!hash::check($request->old_password, Auth::user()->password)){
            $msg=array('message'=>'Old Password does not Match!', 'alert-type'=>'error');
            return back()->with($msg);
        }
        ///Update the new password
        User::whereId(Auth::user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        $msg=array('message'=>'Password Changed Successfully', 'alert-type'=>'success');
        return back()->with($msg);
    }

    public function admin_logout(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $msg=array('message'=>'User Logout Successfully', 'alert-type'=>'success');
        return redirect('/admin/login')->with($msg);
    }
}
