@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm phiếu đặt món ăn
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
                    <form role="form" action="{{URL::to('/luu-phieudatmonan')}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID phiếu đặt món ăn</label>
                            <input type="number" name="IdDatMon" class="form-control" id="id_phieudatmonan">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID bàn</label>
                            <input type="number" name="IdBan" class="form-control" id="id_ban">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên món đặt</label>
                            <input type="text" name="TenMonDat" class="form-control" id="tenmondat">
                        </div>

                        <button type="submit" class="btn btn-info">Thêm phiếu đặt món ăn</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
