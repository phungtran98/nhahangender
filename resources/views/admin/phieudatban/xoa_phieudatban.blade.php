@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Xoá phiếu đặt bàn
            </header>

            <?php
                    $message = Session::get('message');
                    if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                    }
                ?>

            <div class="panel-body">
                @foreach ($xoa_phieudatban as $key => $xoa)

                <div class="position-center">
                    <form role="form" action="{{URL::to('/xoa-phieudatban/'.$xoa->IdDatBan)}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID phiếu đặt bàn</label>
                            <input type="number" value="{{$xoa->IdDatBan}}" name="IdDatBan" class="form-control" id="id_datban">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID khách hàng</label>
                            <input type="number" value="{{$xoa->IdKH}}" name="IdKH" class="form-control" id="id_KH">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Thời gian</label>
                            <input type="datetime-local" value="{{$xoa->ThoiGian}}" name="ThoiGian" class="form-control" id="thoigian">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Số lượng bàn</label>
                            <input type="number" value="{{$xoa->SoLuongBan}}" name="SoLuongBan" class="form-control" id="soluongban">
                        </div>

                        <button type="submit" name="xoa_phieudatban" class="btn btn-info">Xoá phiếu đặt bàn</button>
                    </form>
                </div>

                @endforeach
            </div>
        </section>
    </div>
</div>
@endsection
