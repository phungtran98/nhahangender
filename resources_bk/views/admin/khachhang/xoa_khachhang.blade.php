@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Xoá khách hàng
            </header>

            <?php
                    $message = Session::get('message');
                    if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                    }
                ?>

            <div class="panel-body">
                @foreach ($xoa_khachhang as $key => $xoa)

                <div class="position-center">
                    <form role="form" action="{{URL::to('/xoa-khachhang/'.$xoa->IdKH)}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID khách hàng</label>
                            <input type="number" value="{{$xoa->IdKH}}" name="IdKH" class="form-control" id="id_KH">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên khách hàng</label>
                            <input type="text" value="{{$xoa->TenMon}}" name="TenMon" class="form-control" id="ten_mon" placeholder="Thêm tên khách hàng">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Giới tính</label>
                            <input type="text" value="{{$xoa->GioiTinhKH}}" name="GioiTinhKH" class="form-control" id="gioitinh_KH">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Số điện thoại</label>
                            <input type="text" value="{{$xoa->SdtKH}}" name="SdtKH" class="form-control" id="sdt_KH">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Địa chỉ</label>
                            <input type="text" value="{{$xoa->DiaChiKH}}" name="DiaChiKH" class="form-control" id="diachi_KH">
                        </div>

                        <button type="submit" name="xoa_khachhang" class="btn btn-info">Xoá khách hàng</button>
                    </form>
                </div>

                @endforeach
            </div>
        </section>
    </div>
</div>
@endsection
