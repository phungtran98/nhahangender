@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Xoá món ăn
            </header>

            <?php
                    $message = Session::get('message');
                    if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                    }
                ?>

            <div class="panel-body">
                @foreach ($xoa_monan as $key => $xoa)

                <div class="position-center">
                    <form role="form" action="{{URL::to('/xoa-monan/'.$xoa->IdMonAn)}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID món ăn</label>
                            <input type="number" value="{{$xoa->IdMonAn}}" name="IdMonAn" class="form-control" id="id_monan">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID danh mục</label>
                            <input type="number" value="{{$xoa->IdLoai}}" name="IdLoai" class="form-control" id="id_loaimonan">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên món ăn</label>
                            <input type="text" value="{{$xoa->TenMon}}" name="TenMon" class="form-control" id="ten_mon" placeholder="Thêm tên món ăn">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Đơn giá</label>
                            <input type="number" value="{{$xoa->DonGia}}" name="DonGia" class="form-control" id="don_gia" placeholder="VNĐ">
                        </div>

                        <button type="submit" name="xoa_monan" class="btn btn-info">Xoá món ăn</button>
                    </form>
                </div>

                @endforeach
            </div>
        </section>
    </div>
</div>
@endsection
