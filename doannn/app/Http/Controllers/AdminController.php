<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Hash;
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
    	


    	$result=DB::table('canbo')->where ('taikhoan',$taikhoan)->first();
    	if($result){
            if(Hash::check($request->matkhau,$result->matkhau))
                {
                    return Redirect::to('/dashboard');
                }
                else
                {
                   return Redirect::to('/admin');
                }
    		
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
