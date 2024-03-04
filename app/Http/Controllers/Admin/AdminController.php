<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Amenities;
use App\Models\PropertyType;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Hash;
use Mockery\Matcher\Type;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{
    public function admin_dashboard(){

        $user = Cache::remember('user', 15, function (){
            return User::get()->count();
        });
        $type = Cache::remember('type', 15, function (){
            return PropertyType::get()->count();
        });

        $aminity = Cache::remember('type', 15, function (){
            return Amenities::get()->count();
        });
        //$allType = PropertyType::get();
        $allTypes = PropertyType::select(
            //'created_at', DB::raw('count(*) as type'),
            DB::raw('count(*) as total'),
            DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as created_date'),
            DB::raw('DAYNAME(created_at) as day')
        )
            ->groupBy('created_at')
            ->get();
        $data = array();
        foreach ( $allTypes as $key => $row ) {
             if($row->created_date == $allTypes[$key+1-1]->created_date){
                 $data[$row->created_date][] = $row;
             }else{
                 $data[$key] = $row;
             }
        }
        $finalData=array();
        foreach ($data as $key=>$val){
            $finalData[$key]=count($val);
        }
        //return response()->json($finalData);

        return view('admin.index', compact('user','type', 'aminity', 'finalData'));
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
        if($request->file('photo')){
                $uploadImg=$request->file('photo');
                if(!empty($data->photo)){
                    @unlink(public_path($data->photo));
                }
                $imgName=hexdec(uniqid()).'.'.$uploadImg->getClientOriginalExtension();
                $manager = new ImageManager(new Driver());
                $img = $manager->read($uploadImg);
                $img=$img->resize(300,300);
                $img->toJpeg(80)->save(base_path('public/upload/admin_img/'.$imgName));
                $imgUrl='/upload/admin_img/'.$imgName;
                $data->photo=$imgUrl;
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

    //Admin Use Method

    public function admin_user_list(){
      $allAdmin = User::where('role','admin')->get();
      //dd($allAdmin);
      return view('backend.adminuser.admin_list',compact('allAdmin'));
    }

    public function admin_user_add(){
        $role = Role::all();
        return view('backend.adminuser.admin_add',compact('role'));
    }
    public function admin_user_store(Request $request){
        $request->validate([
            'username'=>'required|unique:users',
            'name'=>'required',
            'email'=>'required|unique:users',
            'phone'=>'required',
            'password'=>'required',
        ]);
        $user = new User();
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->role = 'admin';
        $user->status = 'active';
        $user->save();
        $data[] = $request->roles;
        $roles = Role::whereIn('id', $data)->get();
        //print_r($roles);die;
        if($roles){
            $user->assignRole($roles);
        }
        $msg=array('message'=>'New Admin User Create Successfully', 'alert-type'=>'success');
        return redirect()->route('admin.admin_list')->with($msg);
    }

    public function admin_user_edit($id){
        $user = User::findOrFail($id);
        $role = Role::all();
        return view('backend.adminuser.admin_user_edit',compact('user','role'));
    }

    public function admin_user_update(Request $request){
        $request->validate([
            'username'=>'required',
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            //'password'=>'required',
        ]);
        $user = User::findOrFail($request->id);
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->role = 'admin';
        $user->status = ($request->input('status')) ? 'active' : 'inactive';
        $user->save();
        $data[] = $request->roles;
        $roles = Role::whereIn('id', $data)->get();
        $user->roles()->detach();
        if($roles){
            $user->assignRole($roles);
        }
        //return response()->json($user);
        $msg=array('message'=>'Admin User Updated Successfully', 'alert-type'=>'success');
        return redirect()->route('admin.admin_list')->with($msg);

    }

    public function admin_user_destroy($id){
        $user = User::findOrFail($id);
        if(!is_null($user)){
            $user->delete();
        }
        $msg=array('message'=>'Admin User Deleted Successfully', 'alert-type'=>'success');
        return redirect()->back()->with($msg);
    }
}
