<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use  App\Models\CanBo;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class UserController extends Controller
{
		public function index(){
			return view('user_layout');
		}
  	public function all_user(){
  		$user=CanBo::all();
  		$user=CanBo::orderby('macb','DESC')->take(10)->get();
  		$manager=view('admin.all_user')->with('user',$user);
  		return view('admin_layout')->with('admin.all_user',$manager);
  	}
  	 public function add_user(Request $request){
        $data=$request->all();
       $user=new CanBo();
       $user->ten=$data['ten'];
       $user->ho=$data['ho'];
       $user->cmnd=$data['cmnd'];
       $user->diachi=$data['diachi'];
       $user->sdt=$data['sdt'];
       $user->ngaysinh=$data['ngaysinh'];
       $user->gioitinh=$data['gioitinh'];
       $user->email=$data['email'];
       $user->taikhoan=$data['taikhoan'];
       $user->matkhau=$data['matkhau'];

       $user->save();
       	Session::put('message','Thêm Thành Công');
         return Redirect::to('all-user');


}
	public function delete_user($macb)
	{
		$user=CanBo::destroy($macb);
    			return Redirect::to('all-user');
	}
	 public function update_user(Request $request ,$macb){
            $data=$request->all();
            $update=alo::find($macb);
           $update->ten=$data['ten'];
           $update->ho=$data['ho'];
           $update->cmnd=$data['cmnd'];
           $update->sdt=$data['sdt'];
           $update->ngaysinh=$data['ngaysinh'];
           $update->gioitinh=$data['gioitinh'];
           $update->email=$data['email'];
           $update->taikhoan=$data['taikhoan'];
           $update->matkhau=$data['matkhau'];
         

           $update->save();
           return Redirect::to('all-category');

    }
  	

  	
  	
}
