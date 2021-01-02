@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm nhà hàng
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
                    <form role="form" action="{{ route('nha-hang.handle-add') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên nhà hàng</label>
                            <input type="text" name="tenNhaHang" class="form-control" id="id_monan">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Địa chỉ</label>
                            <input type="text" name="diaChi" class="form-control" id="ten_mon" placeholder="Thêm tên món ăn">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Thành phố</label>
                            <input type="text" name="thanhPho" class="form-control" id="don_gia" placeholder="VNĐ">
                        </div>

                        <button type="submit" class="btn btn-info">Xác nhận</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
