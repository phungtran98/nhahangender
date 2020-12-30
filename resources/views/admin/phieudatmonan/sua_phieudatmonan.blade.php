@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật phiếu đặt món ăn
            </header>

            <div class="panel-body">
                @foreach ($sua_phieudatmonan as $key => $sua)

                <div class="position-center">
                    <form role="form" action="{{URL::to('/capnhat-phieudatmonan/'.$sua->IdDatMon)}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID phiếu đặt món ăn</label>
                            <input type="number" value="{{$sua->IdDatMon}}" name="IdDatMon" class="form-control" id="id_phieudatmonan">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID bàn</label>
                            <input type="number" value="{{$sua->IdBan}}" name="IdBan" class="form-control" id="id_ban">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên món đặt</label>
                            <input type="text" value="{{$sua->TenMonDat}}" name="TenMonDat" class="form-control" id="tenmondat">
                        </div>

                        <button type="submit" name="capnhat_phieudatmonan" class="btn btn-info">Cập nhật phiếu đặt món ăn</button>
                    </form>
                </div>

                @endforeach
            </div>
        </section>
    </div>
</div>
@endsection
