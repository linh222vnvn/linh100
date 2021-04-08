@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Quản Lý Mục Đích
    </div>
    <?php
    $message=Session::get('message');
    if($message){
      echo '<span class="text-alert">'.$message.' </span>';
      Session::put('message',null);
    }
    ?>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
       <button type="button" class="btn btn-primary" id ="#" data-toggle="modal" data-target="#themModal">
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
  <!-- Modal Them-->
  <div class="modal fade" id="themModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('add-mucdich')}}" method="POST">
          {{csrf_field()}}
          <div class="modal-body">

            <div class="form-group">
              <label>Tên Mục Đích</label>
              <input type="text" class="form-control" name='tenmd' id='tenmd' placeholder="Enter email">
            </div>
            <div class="form-group">
              <label>Quy Định</label>
              <input type="text" class="form-control" name='quydinh' id='tenmd' placeholder="Enter email">
            </div>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit"  class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- EndModal -->

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
          <th>Tên Mục Đích</th>
          <th>Quy Định </th>
          <th>Công Cụ</th>

          <th style="width:30px;"></th>
        </tr>
      </thead>
      <tbody>
        <?php $no=1 ?>
        @foreach($mucdich as $key)
        <td><span class="text-ellipsis">
         <th>{{$no++}}</th>
         <th>{{$key->tenmucdich}}</th>
         <th>{{$key->quydinh}}</th>



         <td>
           <a href="" data-toggle="modal" data-target="" class="btn btn-success ">Edit</a> 
           <a onclick="return confirm('Are you sure delete?')" href="#" class="btn btn-danger">Delete</a> 
         </td>

       </td>
     </tr>

   </tbody>
   @endforeach
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