<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class AdminController extends Controller
{
    
    PUBLIC function index(){
    	return view('admin_login');
    }
    public function showdashboard(){
        $data=['title'=>'Binh Duong'];
    	return view ('admin.dashboard');
    }
    public function dashboard(Request $request){
    	$taikhoan=$request->taikhoan;
    	$matkhau=$request->matkhau;
    	$result=DB::table('canbo')->where ('taikhoan',$taikhoan)->where ('matkhau',$matkhau)->first();
    	if($result){
    		Session::put('ten',$result->ten);
    		Session::put('macb',$result->macb);
    		return Redirect::to('/dashboard');
    	}else{
    		Session::put('message','Mật khẩu ngoặc tài khoản bị sai');
    		return Redirect::to('/admin');

    	}
    	
    }
     public function logout(){
    			
     		Session::put('ten',null);
    		Session::put('macb',null);
    		return Redirect::to('/admin');

    	
    }
}
