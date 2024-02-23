<?php

namespace App\Http\Controllers\Backend;

use App\Exports\PermissionExport;
use App\Imports\PermissionImport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use Spatie\Permission\Models\Permission;
Use Spatie\Permission\Models\Role;
use App\Models\User;
Use App\Models\Group;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;


class RoleController extends Controller
{
    public function permission_list(){
      $permision= Permission::all();
      return view('backend.permission.permission_list',compact('permision'));
    }

    public function permission_add(){
        $group= Group::get();
        return view('backend.permission.permission_add',compact('group'));
    }

    public function permission_store(Request $request){
        $request->validate([
            'group_name'=>'required',
            'name'=>'required'
        ]);
        $permission = new Permission();
        $permission->group_name = $request->group_name;
        $permission->name = $request->name;
        $permission->save();
        $msg=array('message'=>'Permission Created Successfully', 'alert-type'=>'success');
        return redirect()->route('permission.list')->with($msg);
    }

    public function permission_edit($id){
        $group= Group::get();
        $data = Permission::findOrFail($id);
        //dd($data);
        return view('backend.permission.permission_edit',compact('data','group'));
    }
    public function permission_update(Request $request){
        $request->validate([
            'group_name'=>'required',
            'name'=>'required'
        ]);
        // dd($request);
        $permission = Permission::find($request->id);
        $permission->group_name = $request->group_name;
        $permission->name = $request->name;
        $permission->save();
        $msg=array('message'=>'Permission Updated Successfully', 'alert-type'=>'success');
        return redirect()->route('permission.list')->with($msg);
    }
    public function destroy_permission($id){
        Permission::findOrFail($id)->delete();
        $msg=array('message'=>'Permission Deleted Successfully', 'alert-type'=>'success');
        return redirect()->back()->with($msg);
    }

    public function permission_import(){
        return view('backend.permission.permission_import');
    }
    public function store_import_data(Request $request){
//        if($request->hasFile('import_file')){
//            print_r($request->file('import_file')); die;
//        }
        Excel::import(new PermissionImport, $request->file('import_file'));
        $msg=array('message'=>'Permission Imported Successfully', 'alert-type'=>'success');
        return redirect()->back()->with($msg);
    }

    public function permission_export(){
        return Excel::download(new PermissionExport, 'permission.xlsx');
    }

    //role Crud Start Here

    public function role_list(){
        $role= Role::all();
        return view('backend.role.role_list',compact('role'));
    }

    public function role_add(){
        return view('backend.role.role_add');
    }

    public function role_store(Request $request){
        $request->validate([
            'name'=>'required',
        ]);
        $role = new Role();
        $role->name = $request->name;
        $role->save();
        $msg=array('message'=>'Role Created Successfully', 'alert-type'=>'success');
        return redirect()->route('role.list')->with($msg);
    }

    public function role_edit($id){
        $data = Role::findOrFail($id);
        //dd($data);
        return view('backend.role.role_edit',compact('data'));
    }
    public function role_update(Request $request){
        $request->validate([
            'name'=>'required'
        ]);
        // dd($request);
        $role = Role::find($request->id);
        $role->name = $request->name;
        $role->save();
        $msg=array('message'=>'Role Updated Successfully', 'alert-type'=>'success');
        return redirect()->route('role.list')->with($msg);
    }
    public function destroy_role($id){
        Role::findOrFail($id)->delete();
        $msg=array('message'=>'Role Deleted Successfully', 'alert-type'=>'success');
        return redirect()->back()->with($msg);
    }

    //__add role Permission__

    public function add_role_permission(){
        $roles = Role::all();
        $permissions= Permission::all();
        $permission_group = User::get_permission_group();
        return view('backend.role.add_role_permission',compact('roles','permissions', 'permission_group'));
    }

    public function role_permission_store(Request $request){
        $data=array();
        $permissions = $request->permission;
        foreach ($permissions as $key=>$item){
            $data['role_id'] = $request->role_id;
            $data['permission_id'] = $item;
            DB::table('role_has_permissions')->insert($data);
        }
        $msg=array('message'=>'Role Permission Added Successfully', 'alert-type'=>'success');
        return redirect()->back()->with($msg);
    }

}
