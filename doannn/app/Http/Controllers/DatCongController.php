<?php

namespace App\Http\Controllers;
use  App\Models\CanBo;
use  App\Models\DatCong;
use  App\Models\chitietdatcong;
use  App\Models\lichsu;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
class DatCongController extends Controller

{
  public function add_datcong(Request $request){
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $date=date("Y-m-d H:i:s",time());
    $maxa=$request->maxa;
    $soto=$request->soto;

    $sothua=$request->sothua;
    $dc=DB::table('thuadat_phumy')->where('maxa','=',$maxa)->where('sohieutobando','=',$soto)->where('sothututhua','=',$sothua)->get();

    $gid= $dc[0]->gid;
    $datcong=DatCong::find($gid);
    $datcong->trangthai=1;
    $datcong->save();
    $insert=new chitietdatcong();
    $insert->makhudat=$gid;
    $insert->tenkhudat=$request->tenkhudat;
    $insert->macb=$request->macb;
    $insert->maphuong=$request->maxa;
    $insert->mamd=$request->mamd;
    $insert->ngayquanly=$date;
    $insert->ngaycapnhat=$date;
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
 public function lay_makhudat(Request $request){
  $makhudat=$request->makhudat;
  $db=DB::table('chitietdatcong')->where('makhudat','=',$makhudat)->orderBy('makhudat', 'DESC')->limit(1)->get();

            return response()->json(['dat1'=>$db],200);//dat1tudat
          }
          public function lay_mamucdich(Request $request){
            $mamucdich=$request->mamucdich;
            $macanbo=$request->macanbo;

            $db=DB::table('mucdich')->where('mamd','=',$mamucdich)->get();
            $db2=DB::table('canbo')->where('macb','=',$macanbo)->get();

            return response()->json(['mucdich1'=>$db,'canbo1'=>$db2],200);//dat1tudat




          }
          public function kiemtra_datcong(Request $request){
            $status=0;
            $makhudat=$request->makhudat;
            $db=DB::table('thuadat_phumy')->join('chitietdatcong', 'thuadat_phumy.gid', '=', 'chitietdatcong.makhudat')->where('chitietdatcong.makhudat','=',$makhudat)->get();
            if($db->count()>0){
              $status=1;
            }else{
              $status=0;
            }

            return response()->json(['kiemtra'=>$status],200);//dat1tudat



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
           $dc=DB::table('thuadat_phumy')->where('maxa','=',$maxa)->where('sohieutobando','=',$soto)->where('sothututhua','=',$sothua)->get();

           $gid= $dc[0]->gid;
           $insert=new chitietdatcong();
           $insert->makhudat=$gid;
           $insert->tenkhudat=$request->tenkhudated;
           $insert->macb=$request->macbed;
           $insert->maphuong=$request->maxaed;
           $insert->mamd=$request->mamded;
           $insert->ngayquanly=$date;
           $insert->ngaycapnhat=$date;
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

           $db=DB::table('chitietdatcong')->where('makhudat','=',$makhudat)->get();
           foreach ($db as $key){
             $lichsu=new lichsu();
             $lichsu->makhudat=$key->makhudat;
             $lichsu->macb=$key->macb;
             $lichsu->mamd=$key->mamd;
             $lichsu->ngayquanly=$key->ngayquanly;
             $lichsu->hientrang=$key->hientrang;
             $lichsu->maphuong=$key->maphuong;
             $lichsu->diachi=$key->diachi;
             $lichsu->tenkhudat=$key->tenkhudat;
             $lichsu->ngaycapnhat=$key->ngaycapnhat;
             $lichsu->save();

           }
           $xoa=DB::table('chitietdatcong')->where('makhudat','=',$makhudat)->delete();
           if($xoa){
            $hientrang=DatCong::find($makhudat);
            $hientrang->trangthai=0;
            $hientrang->save();
            return redirect()->back();
          }else
          {
           echo'xoa that bai r nha';
         }
         

       }


     }
