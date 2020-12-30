@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm khách hàng
            </header>

            <?php
                    $message = Session::get('message');
                    if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                    }
                ?>

            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="{{URL::to('/luu-khachhang')}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID khách hàng</label>
                            <input type="number" name="IdKH" class="form-control" id="id_KH">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên khách hàng</label>
                            <input type="text" name="TenKH" class="form-control" id="ten_KH">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Giới tính</label>
                            <input type="text" name="GioiTinhKH" class="form-control" id="gioitinh_KH">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Số điện thoại</label>
                            <input type="text" name="SdtKH" class="form-control" id="sdt_KH">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Địa chỉ</label>
                            <input type="text" name="DiaChiKH" class="form-control" id="diachi_KH">
                        </div>

                        <button type="submit" class="btn btn-info">Thêm khách hàng</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
