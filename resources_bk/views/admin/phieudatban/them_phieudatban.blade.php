@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm phiếu đặt bàn
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
                    <form role="form" action="{{URL::to('/luu-phieudatban')}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID phiếu đặt bàn</label>
                            <input type="number" name="IdDatBan" class="form-control" id="id_phieudatban">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID khách hàng</label>
                            <input type="number" name="IdKH" class="form-control" id="id_KH">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Thời gian</label>
                            <input type="datetime-local" name="ThoiGian" class="form-control" id="thoigian">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Số Lượng Bàn</label>
                            <input type="number" name="SoLuongBan" class="form-control" id="soluongban">
                        </div>

                        <button type="submit" class="btn btn-info">Thêm phiếu đặt bàn</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
