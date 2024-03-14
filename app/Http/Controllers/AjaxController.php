<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
  public function add_mode(request $request){
    //return response()->json($request->mode_val);
    $request->session()->put('mode', $request->mode_val);
  }
}
