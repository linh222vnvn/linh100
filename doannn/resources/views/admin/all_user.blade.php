@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Quản Lý Cán Bộ
    </div>
    <div class="row w3-res-tb">
     <?php
     $message=Session::get('message');
     if($message){
      echo '<span class="text-alert">'.$message.' </span>';
      Session::put('message',null);
    }
    ?>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <button type="button" class="btn btn-primary" id ="testButton" data-toggle="modal" data-target="#exampleModal">
         Thêm
       </button>    
       
     </div>
     <div class="col-sm-4">
     </div>
     <div class="col-sm-3">
      <div class="input-group">
        <input type="text" class="input-sm form-control" placeholder="Search">
        <span class="input-group-btn">
          <button class="btn btn-sm btn-default" type="button">Go!</button>
        </span>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <!-- Button trigger modal -->
  
  <!-- Modal Them-->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form name='searchdata' id="search_form" action="{{URL::to('/add-user')}}" method="POST">
          {{csrf_field()}}
          <div class="modal-body">

            <div class="form-group">
              <label>Tên</label>
              <input type="text" class="form-control" name='ten' placeholder="Enter email">
            </div>
            <div class="form-group">
              <label>Họ</label>
              <input type="text" class="form-control" name='ho' placeholder="Enter email">
            </div>
            <div class="form-group">
              <label>CMND</label>
              <input type="text" class="form-control" name='cmnd' placeholder="Enter email">
            </div>
            <div class="form-group">
              <label>Địa Chỉ</label>
              <input type="text" class="form-control" name='diachi' placeholder="Enter email">
            </div>
            <div class="form-group">
              <label>SDT</label>
              <input type="text" class="form-control" name='sdt' placeholder="Enter email">
            </div>
            <div class="form-group">
              <label>Ngày Sinh</label>
              <input type="date" class="form-control" name='ngaysinh' placeholder="Enter email">
            </div>
            <div class="form-group">
               <label for="gioitinh">Phường:</label>
                <select id="gioitinh" name="gioitinh">
                 
                 <option value="Nam"> Nam</option>
                 <option value="Nữ"> Nữ</option>
               </select>
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="text" class="form-control" name='email' placeholder="Enter email">
            </div>
            <div class="form-group">
              <label>Tài Khoản</label>
              <input type="text" class="form-control" name='taikhoan' placeholder="Enter email">
            </div>
            <div class="form-group">
              <label>Mật Khẩu</label>
              <input type="text" class="form-control" name='matkhau' placeholder="Enter email">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" onclick="form_submit()" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- EndModal -->

  
</div>
<div class="table-responsive">
  <table class="table table-bordered table-striped b-t b-light">
    <thead>
      <tr>

       <th scope="col">STT</th>
       <th scope="col">Tên</th>
       <th scope="col">Họ </th>
       <th scope="col">CMND</th>
       <th scope="col">Địa Chỉ </th>
       <th scope="col">SĐT </th>
       <th scope="col">Ngày sinh </th>
       <th scope="col">Giới tính </th>
       <th scope="col">Email </th>

       <th scope="col">Công Cụ</th>
     </tr>
   </thead>
   <tbody>
    <?php $no = 1 ?>
    @foreach($user as $key=>$cate_pro)
    <?php
    $sua=$cate_pro->macb.'sua';
    ?>
    <!--  Editmodal-->
    <div class="modal fade" id="{{$sua}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="{{route('edit-user')}}" method="POST">
            {{csrf_field()}}

            <div class="modal-body">
              <input type="hidden" value="{{$cate_pro->macb}}" name="macb" >
              <div class="form-group">
                <label>Tên</label>
                <input type="text" class="form-control" id='ten'name='ten' value="{{$cate_pro->ten}}" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label>Họ</label>
                <input type="text" class="form-control"  id='ho' name='ho' value="{{$cate_pro->ho}}" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label>CMND</label>
                <input type="text" class="form-control"  id='cmnd' name='cmnd' value="{{$cate_pro->cmnd}}" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label>Địa Chỉ</label>
                <input type="text" class="form-control"  id='diachi' name='diachi' value="{{$cate_pro->diachi}}" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label>SDT</label>
                <input type="text" class="form-control"  id='sdt' name='sdt' value="{{$cate_pro->sdt}}" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label>Ngày Sinh</label>
                <input type="date" class="form-control"  id='ngaysinh' value="{{$cate_pro->ngaysinh}}" name='ngaysinh' placeholder="Enter email">
              </div>
              <div class="form-group">
                  <label for="gioitinh">Phường:</label>
                <select id="gioitinh" name="gioitinh">
                 
                 <option value="Nam" @if ($cate_pro->gioitinh=="Nam") selected  @endif > Nam</option>
                 <option value="Nữ" @if ($cate_pro->gioitinh=="Nữ") selected  @endif> Nữ</option>
                 
               </select>
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control"  id='email' value="{{$cate_pro->email}}" name='email' placeholder="Enter email">
              </div>
              <div class="form-group">
                <label>Tài Khoản</label>
                <input type="text" class="form-control"  id='taikhoan' value="{{$cate_pro->taikhoan}}" name='taikhoan' placeholder="Enter email">
              </div>
              <div class="form-group">
                <label>Mật Khẩu</label>
                <input type="password" class="form-control" id='matkhau'value="{{$cate_pro->matkhau}}" name='matkhau' placeholder="Enter email">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit"  class="btn btn-primary" >Save changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- endmodal -->
    <tr>

      <td>{{$no++}}</td>
      <td>{{$cate_pro->ten}}</td>
      <td>{{$cate_pro->ho}}</td>
      <td>{{$cate_pro->cmnd}}</td>
      <td>{{$cate_pro->diachi}}</td>
      <td>{{$cate_pro->sdt}}</td>
      <td>{{$cate_pro->ngaysinh}}</td>
      <td>{{$cate_pro->gioitinh}}</td>
      <td>{{$cate_pro->email}}</td>


      <td>
       <a href="" class="btn btn-primary">Detail</a> 
       <a href="" data-toggle="modal" data-target="#{{$sua}}" class="btn btn-success ">Edit</a> 
       <a onclick="return confirm('Are you sure delete?')" href="{{URL::to('/delete-user/'.$cate_pro->macb)}}" class="btn btn-danger">Delete</a> 
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