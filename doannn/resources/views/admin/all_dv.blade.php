@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Quản Lý Đơn Vị
    </div>
    <div class="row w3-res-tb">
     <?php
     $message=Session::get('message');
     if($message){
      echo '<span class="text-alert">'.$message.' </span>';
      Session::put('message',null);
    }
    ?>
    <!-- Modal -->
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" id ="testButton" data-toggle="modal" data-target="#themModal">
      Thêm
    </button>
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
          <form action="{{route('add-dv')}}" method="POST">
            {{csrf_field()}}
            <div class="modal-body">

              <div class="form-group">
                <label>Tên Đơn Vị</label>
                <input type="text" class="form-control" name='tendvct' id='tendvct' placeholder="Enter email">
              </div>
              <div class="form-group">
                <label>Tên Phòng Ban</label>
                <input type="text" class="form-control" name='tenpb' id='tenpb' placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="maphuong">Phường:</label>
                <select id="maphuong" name="maphuong">
                 @foreach($phuong as $key)
                 <option value="{{$key->maphuongxa}}"> {{$key->tenxa}}</option>
                 @endforeach

               </select>
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


</div>
<div class="table-responsive">
  <table class="table table-bordered table-striped b-t b-light">
    <thead>
      <tr>

       <th scope="col">STT</th>
       <th scope="col">Tên Đơn Vị</th>
       <th scope="col">Tên Phòng Ban </th>
       <th scope="col">Phường </th>

       <th scope="col">Công Cụ </th>



     </tr>
   </thead>
   <tbody>
    <?php $no=1 ?>
    @foreach($donvi as $key)

    <td>{{$no++}}</td>
    <td>{{$key->tendvct}}</td>
    <td>{{$key->tenpb}}</td>
    <td></td>
    <td>

     <a href="" data-toggle="modal" data-target="" class="btn btn-success ">Edit</a> 
     <a onclick="return confirm('Are you sure delete?')" href="#" class="btn btn-danger">Delete</a> 
   </td>


 </tr>

</tbody>
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