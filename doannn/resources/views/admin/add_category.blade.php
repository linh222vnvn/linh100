@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <h1 class='panel-title'>
                    <input type="checkbox" id="chkThuaDat" checked /><label for="chkThuaDat">Thửa đất</label>
                    <input type="checkbox" id="chkHCHuyen" checked /><label for="chkHCHuyen">Hành chính huyện</label>

                    <input type="checkbox" id="chkHCXa" checked /><label for="chkHCXa">Hành chính xã</label>
                    <select id="area"></select>
                    <select id="wards"></select>

                    <input type="number" id="txSoto" placeholder="Số tờ..." value="811" />
                    <input type="number" id="txtSothua" placeholder="Số thửa..." value="2779" />
                    <button id="btnTimthua" class='btnTim'>Tìm thửa</button>
                </h1>

                <!-- <img class="legendCk" src="http://localhost:8080/geoserver/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image/png&LAYER=QHBD:thuadat_phumy" /> -->

                <!-- <img class="legendCk" src="http://localhost:8080/geoserver/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image/png&LAYER=QHBD:hanhchinh_xa" /> -->
            </header>

            <div class="panel-body">
                <div id="map" class="map"></div>
                <div id="popup" class="ol-popup">
                    <a href="#" id="popup-closer" class="ol-popup-closer"></a>
                    <div id="popup-content"></div>
                </div>

            </div>
            <!-- Modal Update-->
            <div class="modal fade" id="themModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action="{{route('add-datcong')}}" method="POST">
                {{csrf_field()}}
                <div class="modal-body">
                    <input type='hidden' name="maxa" id="maxa">    
                    <div class="form-group">
                        <label>Mã Khu Đất</label>
                        <input type="text" class="form-control" name="makhudat" id ="makhudat"placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label>Tên Đất</label>
                        <input type="text" class="form-control" name="tenkhudat" id="tenkhudat" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label>Địa Chỉ</label>
                        <input type="text" class="form-control" name="diachi"id="diachi" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label>Diện tích</label>
                        <input type="text" class="form-control" name="dientich"id="dientich" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="macb">Show Cán Bộ:</label>
                        <select id="macb" name="macb">

                           @foreach($canbo as $key)
                           <option value="{{$key->macb}}">Mã Cán Bộ: {{$key->macb}}- Tên Cán Bộ: {{$key->ho}} {{$key->ten}}</option>
                           @endforeach
                       </select>
                   </div>
                   <<!-- div class="form-group">
                    <label for="huyen">Huyện:</label>
                    <select id="huyen" name="huyen">
                        <option value="null">-------Chọn Huyện-------</option>
                        @foreach($huyen as $key)
                        <option value="{{$key->mahuyentp}}">{{$key->tenhuyen}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="xa">Phường:</label>
                    <select id="xa" name="xa" required>
                    </select>
                </div> -->
                <div class="form-group">
                    <label for="mamd">Mục Đích:</label>
                    <select id="mamd" name="mamd">

                       @foreach($mucdich as $key)
                       <option value="{{$key->mamd}}">{{$key->mamd}}- {{$key->tenmucdich}}-{{$key->kyhieumucdich}}-{{$key->quydinh}}---</option>
                       @endforeach
                   </select>
               </div>

               <div class="form-group">
                <label>Hiện Trạng</label>
                <input type="text" class="form-control" name="hientrang" id="hientrang" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label>Ký Hiệu Mục Đích</label>
                <input type="text" class="form-control"  name="kyhieu" id="kyhieu" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label>Số Tờ</label>
                <input type="text" class="form-control"  name="soto" id="soto" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label>Số Thửa</label>
                <input type="text" class="form-control" name="sothua" id="sothua" placeholder="Enter email">
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
<!-- Modal Edit-->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sửa Thông</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <form action="{{route('editdatcong')}}" method="POST">
    {{csrf_field()}}
    <div class="modal-body">
        <input type='hidden' name="maxaed" id="maxaed">    
        <div class="form-group">
            <label>Mã Khu Đất</label>
            <input type="text" class="form-control" name="makhudated" id ="makhudated"placeholder="Enter email">
        </div>
        <div class="form-group">
            <label>Tên Đất</label>
            <input type="text" class="form-control" name="tenkhudated" id="tenkhudated" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label>Địa Chỉ</label>
            <input type="text" class="form-control" name="diachied"id="diachied" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label>Diện tích</label>
            <input type="text" class="form-control" name="dientiched"id="dientiched" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="macbed">Show Cán Bộ:</label>
            <select id="macbed" name="macbed">

               @foreach($canbo as $key)
               <option value="{{$key->macb}}">Mã Cán Bộ: {{$key->macb}}- Tên Cán Bộ: {{$key->ho}} {{$key->ten}}</option>
               @endforeach
           </select>
       </div>
       <!-- <div class="form-group">
        <label for="huyened">Huyện:</label>
        <select id="huyened" name="huyened">
            <option value="null">-------Chọn Huyện-------</option>
            @foreach($huyen as $key)
            <option value="{{$key->mahuyentp}}">{{$key->tenhuyen}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="xaed">Phường:</label>
        <select id="xaed" name="xaed" required>
        </select>
    </div> -->
    <div class="form-group">
        <label for="mamded">Mục Đích:</label>
        <select id="mamded" name="mamded">

           @foreach($mucdich as $key)
           <option value="{{$key->mamd}}">{{$key->mamd}}- {{$key->tenmucdich}}-{{$key->kyhieumucdich}}-{{$key->quydinh}}---</option>
           @endforeach
       </select>
   </div>

   <div class="form-group">
    <label>Hiện Trạng</label>
    <input type="text" class="form-control" name="hientranged" id="hientranged" placeholder="Enter email">
</div>
<div class="form-group">
    <label>Ký Hiệu Mục Đích</label>
    <input type="text" class="form-control"  name="kyhieued" id="kyhieued" placeholder="Enter email">
</div>
<div class="form-group">
    <label>Số Tờ</label>
    <input type="text" class="form-control"  name="sotoed" id="sotoed" placeholder="Enter email">
</div>
<div class="form-group">
    <label>Số Thửa</label>
    <input type="text" class="form-control" name="sothuaed" id="sothuaed" placeholder="Enter email">
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

<!-- Modal Delete-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Xác nhận xóa thông tin đất công</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <form action="{{route('deletedatcong')}}" method="POST">
    {{csrf_field()}}
    <div class="modal-body">
        <input type="hidden" id="xoamakhudat" name="xoamakhudat">
      <h3 id="noidungxoa">Bạn muốn xóa thông tin </h3>  
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

</section>

</div>
</div>
@endsection