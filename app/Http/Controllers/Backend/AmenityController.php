<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Amenities;
use Illuminate\Support\Facades\Cache;

class AmenityController extends Controller
{
    public function amentiy_list(){
        $data = Cache::remember('amenity-data', 15, function (){
            return Amenities::get();
        });
        //$data=Amenities::get();
        return view('backend.amenity.amenity_list',compact('data'));
    }
    public function add_amentiy(){
        //return 'saad';
        return view('backend.amenity.add_amenity');
    }
    public function store_amenity(Request $request){
        $request->validate([
            'amenitis_name'=>'required|max:55|unique:amenities'
        ]);
        $amenities = new Amenities();
        $amenities->amenitis_name = $request->amenitis_name;
        $amenities->save();
        $msg=array('message'=>'Amenity Name Created Successfully', 'alert-type'=>'success');
        return redirect()->route('amenity.amenity_list')->with($msg);
    }

    public function edit_amenity($id){
        $data = Amenities::findOrFail($id);
        return view('backend.amenity.edit_amenity',compact('data'));
    }
    public function update_amentiy(Request $request){
        $request->validate([
            'amenitis_name'=>'required|max:55'
        ]);
       // dd($request);
        $amenity = Amenities::find($request->id);
        $amenity->amenitis_name=$request->amenitis_name;
        $amenity->save();
        $msg=array('message'=>'Amenity Updated Successfully', 'alert-type'=>'success');
        return redirect()->route('amenity.amenity_list')->with($msg);
    }
    public function destroy_amentiy($id){
        Amenities::findOrFail($id)->delete();
        $msg=array('message'=>'Amenity Deleted Successfully', 'alert-type'=>'success');
        return redirect()->back()->with($msg);
    }
}
