@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật khách hàng
            </header>

            <div class="panel-body">
                @foreach ($sua_khachhang as $key => $sua)

                <div class="position-center">
                    <form role="form" action="{{URL::to('/capnhat-khachhang/'.$sua->IdKH)}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID khách hàng</label>
                            <input type="number"value="{{$sua->IdKH}}" name="IdKH" class="form-control" id="id_KH" disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên khách hàng</label>
                            <input type="text" value="{{$sua->TenKH}}" name="TenKH" class="form-control" id="ten_KH">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Giới tính</label>
                            <input type="text" value="{{$sua->GioiTinhKH}}" name="GioiTinhKH" class="form-control" id="gioitinh_KH">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Số điện thoại</label>
                            <input type="text" value="{{$sua->SdtKH}}" name="SdtKH" class="form-control" id="sdt_KH">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Địa chỉ</label>
                            <input type="text" value="{{$sua->DiaChiKH}}" name="DiaChiKH" class="form-control" id="diachi_KH">
                        </div>

                        <button type="submit" name="capnhat_khachhang" class="btn btn-info">Cập nhật khách hàng</button>
                    </form>
                </div>

                @endforeach
            </div>
        </section>
    </div>
</div>
@endsection
