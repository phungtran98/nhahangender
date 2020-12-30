@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Xoá nhân viên
            </header>

            <?php
                    $message = Session::get('message');
                    if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                    }
                ?>

            <div class="panel-body">
                @foreach ($xoa_nhanvien as $key => $xoa)

                <div class="position-center">
                    <form role="form" action="{{URL::to('/xoa-nhanvien/'.$xoa->IdNV)}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID nhân viên</label>
                            <input type="number" value="{{$xoa->IdNV}}" name="IdNV" class="form-control" id="id_nhanvien">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID chức vụ</label>
                            <input type="number" value="{{$xoa->IdCV}}" name="IdCV" class="form-control" id="id_cv">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên nhân viên</label>
                            <input type="text" value="{{$xoa->TenMon}}" name="TenMon" class="form-control" id="ten_mon" placeholder="Thêm tên nhân viên">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Giới tính</label>
                            <input type="text" value="{{$xoa->GioiTinhNV}}" name="GioiTinhNV" class="form-control" id="gioitinh_nv">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Số điện thoại</label>
                            <input type="text" value="{{$xoa->SdtNV}}" name="SdtNV" class="form-control" id="sdt_nv">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Địa chỉ</label>
                            <input type="text" value="{{$xoa->DiaChiNV}}" name="DiaChiNV" class="form-control" id="diachi_nv">
                        </div>

                        <button type="submit" name="xoa_nhanvien" class="btn btn-info">Xoá nhân viên</button>
                    </form>
                </div>

                @endforeach
            </div>
        </section>
    </div>
</div>
@endsection
