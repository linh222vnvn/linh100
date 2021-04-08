@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Thống Kê Đất Công
    </div>
    <?php
    $message=Session::get('message');
    if($message){
      echo '<span class="text-alert">'.$message.' </span>';
      Session::put('message',null);
    }
    ?>
    <div class="row w3-res-tb">
      <div class="col-sm-3 m-b-xs">
        
       <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
             
      </div>
      <div class="col-sm-4">
      </div>
      
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>STT</th>
            <th>Tên Đất</th>
            <th>Diện Tích </th>
            <th>Số tờ </th>
            <th> Số thửa </th>
            <th>Địa chỉ</th>
            <th>Cán Bô</th>

            <th>Công Cụ</th>

            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          <?php $no=1?>
          @foreach($all_category as $key=>$cate_pro)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$no++}}</td>
            <td>{{$cate_pro->tenkhudat}}</td>
            <td>{{$cate_pro->dientich}}</td>
            <td>{{$cate_pro->sohieutobando}}</td>
            <td>{{$cate_pro->sothututhua}}</td>
           <td>{{$cate_pro->diachi}}</td>
            <td>{{$cate_pro->cat->ten}}</td>

          
             <td>
               <a href="" class="btn btn-primary">Detail</a> 
               <a href="" data-toggle="modal" data-target="" class="btn btn-success ">Update</a> 
               <a onclick="return confirm('Are you sure delete?')" href="" class="btn btn-danger">Delete</a> 
             </td>
           
         </tr>
         @endforeach
       </tbody>
     </table>
   </div>
   <footer class="panel-footer">
    <div class="row">

      <div class="col-sm-5 text-center">
        <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
      </div>
      <div class="col-sm-7 text-right text-center-xs">                
        <ul class="pagination pagination-sm m-t-none m-b-none">
          <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
          <li><a href="">1</a></li>
          <li><a href="">2</a></li>
          <li><a href="">3</a></li>
          <li><a href="">4</a></li>
          <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
        </ul>
      </div>
    </div>
  </footer>
</div>
</div>
@endsection