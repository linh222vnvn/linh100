<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use  App\Models\mucdich;
use Session;
use Illuminate\Support\Facades\Redirect;

class mucdichController extends Controller
{
     public function all_md(Request $request){
    	$mucdich=mucdich::all();
    	$mucdich=mucdich::orderby('mamd','DESC')->get();
    	
    	$manager=view('admin.all_md')->with('mucdich',$mucdich);
  		return view('admin_layout')->with('admin.all_md',$manager);
    }
    public function add_md(Request $request){
    	$data=$request->all();
    	$mucdich=new mucdich();
    	$mucdich->tenmucdich=$data['tenmd'];
    	$mucdich->quydinh=$data['quydinh'];
    	$mucdich->save();
    	Session::put('message','Thêm Thành Công');
         return Redirect::to('mucdich');

    }
    public function delete_user($mamd)
	{
		$mucdich=mucdich::destroy($mamd);
    			return Redirect::to('mucdich');
	}
}
