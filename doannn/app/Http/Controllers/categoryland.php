<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use  App\Models\DatCong;
use  App\Models\mucdich;
use  App\Models\chitietdatcong;

use  App\Models\CanBo;
use  App\Models\huyen;


use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class categoryland extends Controller
{
	public function Authlogin()
	{
		$macb=Session::get('macb');
		if($macb){
			return Redirect::to('dashboard');
		}else {
			return Redirect::to('admin')->send();
		}
	}
  public function add_categoryland(){

    $user=CanBo::all();
    $huyen=huyen::all();
    $mucdich=mucdich::all();
    return view('admin.add_category',['canbo'=>$user,'huyen'=>$huyen,'mucdich'=>$mucdich]);

  }
  public function all_categoryland(){


   $db=DB::table('thuadat_phumy')->join('chitietdatcong', 'thuadat_phumy.gid', '=', 'chitietdatcong.makhudat')->join('canbo', 'canbo.macb', '=', 'chitietdatcong.macb')->select('tenkhudat','chitietdatcong.diachi','sohieutobando','sothututhua')->get();
   
    		// $all_category=DB::table('datday')->get();
   return view('admin.all_category');


 }	
 public function all_category(){

   $db=DB::table('thuadat_phumy')->join('chitietdatcong', 'thuadat_phumy.gid', '=', 'chitietdatcong.makhudat')->join('canbo', 'canbo.macb', '=', 'chitietdatcong.macb')->join('mucdich','mucdich.mamd','=','chitietdatcong.mamd')->select('tenkhudat','chitietdatcong.diachi','sohieutobando','sothututhua','canbo.ho','canbo.ten','mucdich.tenmd')->get();
   
        // $all_category=DB::table('datday')->get();
     //return view('admin.all_category',['all_category'=>$db]);
   return response()->json(['all_category'=>$db],200);

 } 
 public function save_category(Request $request){
   $this->Authlogin();
   $data=$request->all();
   $category=new DatCong();
   $category->tenkhudat=$data['tenkhudat'];
   $category->diachi=$data['diachi'];
   $category->dientich=$data['dientich'];
   $category->save();
    	// $data=array();
    	// $data['tenkhudat']=$request->tenkhudat;
    	// $data['diachi']=$request->diachi;	
    	// $data['dientich']=$request->dientich;

    	// 		DB::table('datday')->insert($data);
   Session::put('message','Them R do');
   return Redirect::to('add-category');


 }
 public function edit_categoryland($makhudat){
   $this->Authlogin();

   $edit_category= DatCong::where('makhudat',$makhudat)->get();
   $manager=view('admin.edit_category')->with('edit_category',$edit_category );
   return view('admin_layout')->with('admin.edit_category',$manager);

 }
 public function update_category(Request $request ,$makhudat){
   $this->Authlogin();
   $data=$request->all();
   $category=DatCong::find($makhudat);
   $category->tenkhudat=$data['tenkhudat'];
   $category->diachi =$data['diachi'];
   $category->dientich=$data['dientich'];
   $category->save();
    	// $data=array();
    	// $data['tenkhudat']=$request->tenkhudat;
    	// $data['diachi']=$request->diachi;	
    	// $data['dientich']=$request->dientich;
    	// DB::table('datday')->where ('makhudat',$makhudat)->update($data);
   Session::put('message','Cập nhật thành công');
   return Redirect::to('all-category');

 }
 public function delete_categoryland($makhudat){
   $this->Authlogin();
   $category=DatCong::destroy($makhudat);
   Session::put('message','Xóa rồi đó');
   return Redirect::to('all-category');
 }
 public function hello_category(Request $request){
  $data=$request->all();
  $category=new CanBo();
  $category->ten=$data['ten'];
  $category->ho=$data['ho'];
  $category->cmnd=$data['cmnd'];
  $category->diachi=$data['diachi'];
  $category->sdt=$data['sdt'];
  $category->ngaysinh=$data['ngaysinh'];
  $category->gioitinh=$data['gioitinh'];
  $category->email=$data['email'];
  $category->taikhoan=$data['taikhoan'];
  $category->matkhau=$data['matkhau'];

  $category->save();

  return Redirect::to('all-category');


}
public function search_category(){
}

}
