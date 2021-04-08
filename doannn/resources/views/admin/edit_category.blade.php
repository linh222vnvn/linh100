@extends('admin_layout')
@section('admin_content')
 <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập Nhật
                        </header>

                        <div class="panel-body">
                            @foreach($edit_category as $key =>$edit_value)
                  
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-category/'.$edit_value->makhudat)}}" method="POST">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                    <label for="exampleInputPassword1">Tên Đất</label>
                                    <input type="text" value="{{$edit_value->tenkhudat}}" name ="tenkhudat"class="form-control" id="exampleInputPassword1" placeholder="Password">
                                </div>
                                   <div class="form-group">
                                    <label for="exampleInputEmail1">Địa Chỉ</label>
                                    <input type="text" value="{{$edit_value->diachi}}" name="diachi" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                                
                                   <div class="form-group">
                                    <label for="exampleInputEmail1">Diện tích</label>
                                    <input type="text" value="{{$edit_value->dientich}}" name="dientich" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                              
                                <button type="submit" class="update_categoryland">Submit</button>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
    </div>
@endsection