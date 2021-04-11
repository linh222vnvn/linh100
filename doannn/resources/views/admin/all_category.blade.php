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
      <div class="col-sm-5 m-b-xs">
        <div class="input-group">
         <input type="number" id="txSoto"  placeholder="Số tờ..." value="811" />
         <input type="number" id="txtSothua" placeholder="Số thửa..." value="2779" />
         <button id="btnTimthua" class='btn btn-sm btn-default'>Tìm thửa</button>
       </div>              
     </div>
     <div class="col-sm-4">
      <h3 align="center">Total Data: <span
        id="total_records"></span></h3>
      </div>
      <div class="col-sm-3">
      </div>
    </div>
    <div class="table-responsive" id="load">
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
            <th>Mục Đích </th>
            <th>Cán Bô</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>


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