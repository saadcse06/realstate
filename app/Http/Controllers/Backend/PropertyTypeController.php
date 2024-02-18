<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PropertyType;
use Illuminate\Support\Facades\Auth;

class PropertyTypeController extends Controller
{
    public function type_list(){
      $data=PropertyType::latest()->get();
      return view('backend.type.type_list',compact('data'));
    }
    public function add_type(){
        return view('backend.type.add_type');
    }
    public function store_type(Request $request){
        $request->validate([
            'type_name'=>'required|max:55|unique:property_types',
            'type_icon'=>'required',
        ]);
        $PropertyType = new PropertyType();
        $PropertyType->type_name = $request->type_name;
        $PropertyType->type_icon = $request->type_icon;
        $PropertyType->save();
        $msg=array('message'=>'Property Type Created Successfully', 'alert-type'=>'success');
        return redirect()->route('type.list')->with($msg);
    }

    public function edit_type($id){
      $types = PropertyType::findOrFail($id);
        return view('backend.type.edit_type',compact('types'));
    }
    public function update_type(Request $request){
        $request->validate([
            'type_name'=>'required|max:55',
            'type_icon'=>'required',
        ]);
       // dd($request);
        $propertyType = PropertyType::find($request->id);
        $propertyType->type_name=$request->type_name;
        $propertyType->type_icon=$request->type_icon;
        $propertyType->save();
        $msg=array('message'=>'Property Type Updated Successfully', 'alert-type'=>'success');
        return redirect()->route('type.list')->with($msg);
    }
    public function destroy_type($id){

        PropertyType::findOrFail($id)->delete();
        $msg=array('message'=>'Property Type Deleted Successfully', 'alert-type'=>'success');
        return redirect()->back()->with($msg);
    }
}
