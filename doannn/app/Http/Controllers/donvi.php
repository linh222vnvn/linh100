<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use  App\Models\dvct;
use Session;
use  App\Models\phuong;
use Illuminate\Support\Facades\Redirect;

class donvi extends Controller
{
	public function all_dv(){
		$donvi=dvct::all();
		$phuong=phuong::all();
    	$donvi=dvct::orderby('madvct','DESC')->get();
    	
    	  return view('admin.all_dv',['donvi'=>$donvi,'phuong'=>$phuong]);
    		
	}
	public function add_dv(Request $request){

    	$data=$request->all();
    	$donvi=new dvct();
    	$donvi->tendvct=$data['tendvct'];
    	$donvi->tenpb=$data['tenpb'];
    	$donvi->maphuongxa=$data['maphuong'];
    	$donvi->save();
    	Session::put('message','Thêm Thành Công');
         return Redirect::to('mucdich');

    
	}
 }
