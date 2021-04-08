<?php

namespace App\Http\Controllers;
use  App\Models\CanBo;
use  App\Models\DatCong;
use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
class DatCongController extends Controller
{
    public function add_datcong(Request $request){
    		date_default_timezone_set('Asia/Ho_Chi_Minh');
    		$date=date("Y-m-d H:i:s",time());
    		$data=$request->all();
    		$maxa=$request->maxa;
    		$soto=$request->soto;
    		$sothua=$request->sothua;
    		$dc=DB::table('data_12062019 thuadat_phumy')->where('maxa','=',$maxa)->where('sohieutobando','=',$soto)->where('sothututhua','=',$sothua)->get();

    		$gid= $dc[0]->gid;
    		$insert=DatCong::find($gid);
    		$insert->makhudat=$request->makhudat;
    		$insert->tenkhudat=$request->tenkhudat;
    		$insert->macb=$request->macb;
    		$insert->maphuong=$request->maxa;
    		$insert->mamd=$request->mamd;
    		$insert->ngayquanly=$date;
    		$insert->diachi =$request->diachi;
    		$insert->hientrang=$request->hientrang;
    		$insert->save();
    		// return Redirect::to('all-category');	
    		if($insert){
    				return redirect()->back();

    		}else{
    			echo'that bai r nha';
    		}
    }
    public function lay_phuongxa(Request $request){
    	$maphuongxa=$request->mahuyenxa;
    	$db=DB::table('data_12062019 hanhchinh_xa')->where('mahuyentp','=',$maphuongxa)->get();

    		return response()->json(['xa1'=>$db],200);




    }
    public function lay_mahuyen(Request $request){
    	$maphuongxa=$request->maphuongxa;
    	$db=DB::table('data_12062019 hanhchinh_huyen')->where('map','=',$maphuongxa)->get();

    		return response()->json(['xa1'=>$db],200);




    }
    public function edit_datcong(Request $request){
    	date_default_timezone_set('Asia/Ho_Chi_Minh');
    		$date=date("Y-m-d H:i:s",time());
    		$maxa=$request->maxaed;
    		$soto=$request->sotoed;
    		$sothua=$request->sothuaed;
    		$dc=DB::table('data_12062019 thuadat_phumy')->where('maxa','=',$maxa)->where('sohieutobando','=',$soto)->where('sothututhua','=',$sothua)->get();

    		$gid= $dc[0]->gid;
    		$insert=DatCong::find($gid);
    		$insert->makhudat=$request->makhudated;
    		$insert->tenkhudat=$request->tenkhudated;
    		$insert->macb=$request->macbed;
    		$insert->maphuong=$request->maxaed;
    		$insert->mamd=$request->mamded;
    		$insert->ngayquanly=$date;
    		$insert->diachi =$request->diachied;
    		$insert->hientrang=$request->hientranged;
    		$insert->save();
    		// return Redirect::to('all-category');	
    		if($insert){
    			return redirect()->back();

    		}else{
    			echo'that bai r nha';
    		}

    }
    public function deletedatcong(Request $request){
    	$makhudat=$request->xoamakhudat;
    	$delete=DatCong::find($makhudat);
    	$delete->makhudat=null;
    	$delete->tenkhudat=null;
    	$delete->macb=null;
    	$delete->maphuong=null;
    	$delete->mamd=null;
    	$delete->diachi=null;
    	$delete->hientrang=null;
    	$delete->save();
    	if($delete){
    				return redirect()->back();

    		}else{
    			echo'that bai r nha';
    		}

    }

   
}
