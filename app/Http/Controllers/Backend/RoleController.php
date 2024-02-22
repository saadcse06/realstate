<?php

namespace App\Http\Controllers\Backend;

use App\Exports\PermissionExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use Spatie\Permission\Models\Permission;
Use Spatie\Permission\Models\Role;
Use App\Models\Group;
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

    public function permission_export(){
        return Excel::download(new PermissionExport, 'permission.xlsx');
    }

}
