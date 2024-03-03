<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Group;
use Illuminate\Support\Facades\Cache;
class GroupController extends Controller
{
    public function group_list(){
        $group = Cache::remember('group', 15, function (){
            return Group::get();
        });
        //$group=Group::get();
        return view('backend.group.group_list',compact('group'));
    }

    public function group_add(){
        return view('backend.group.group_add');
    }

    public function store(Request $request){
        $request->validate([
            'group_name'=>'required|unique:groups'
        ]);
        $group = new Group();
        $group->group_name = $request->group_name;
        //dd($group);
        $group->save();
        $msg=array('message'=>'Group Name Created Successfully', 'alert-type'=>'success');
        return redirect()->route('group.list')->with($msg);
    }

    public function group_edit($id){
        $group = Group::findOrFail($id);
        return view('backend.group.group_edit',compact('group'));
    }

    public function group_update(Request $request){
        $request->validate([
            'group_name'=>'required|max:55'
        ]);
        // dd($request);
        $group = Group::find($request->id);
        $group->group_name=$request->group_name;
        $group->save();
        $msg=array('message'=>'Group Updated Successfully', 'alert-type'=>'success');
        return redirect()->route('group.list')->with($msg);
    }

    public function destroy_group($id){
        Group::findOrFail($id)->delete();
        $msg=array('message'=>'Group Deleted Successfully', 'alert-type'=>'success');
        return redirect()->back()->with($msg);
    }
}
