@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật phiếu đặt bàn
            </header>

            <div class="panel-body">
                @foreach ($sua_phieudatban as $key => $sua)

                <div class="position-center">
                    <form role="form" action="{{URL::to('/capnhat-phieudatban/'.$sua->IdDatBan)}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID phiếu đặt bàn</label>
                            <input type="number" value="{{$sua->IdDatBan}}" name="IdDatBan" class="form-control" id="id_datban" disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID khách hàng</label>
                            <input type="number" value="{{$sua->IdKH}}" name="IdKH" class="form-control" id="id_KH">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Thời gian</label>
                            <input type="datetime-local" value="{{$sua->ThoiGian}}" name="ThoiGian" class="form-control" id="thoigian">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Số lượng bàn</label>
                            <input type="number" value="{{$sua->SoLuongBan}}" name="SoLuongBan" class="form-control" id="soluongban">
                        </div>

                        <button type="submit" name="capnhat_phieudatban" class="btn btn-info">Cập nhật phiếu đặt bàn</button>
                    </form>
                </div>

                @endforeach
            </div>
        </section>
    </div>
</div>
@endsection
