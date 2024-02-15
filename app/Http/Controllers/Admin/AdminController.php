<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class AdminController extends Controller
{
    public function admin_dashboard(){
        return view('Admin.index');
    }

    public function admin_profile(){
        $id = Auth::user()->id;
        $profileData=User::find($id);
        return view('Admin.admin_profile_view',compact('profileData'));
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
        $msg=array('message'=>'Admin Profile Updated Sucessfully', 'alert-type'=>'success');
        return redirect()->back()->with($msg);
        //return redirect()->back();
    }

    public function admin_login(){
        return view('Admin.admin_login');
    }

    public function admin_logout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
}
