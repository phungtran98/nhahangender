@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm món ăn
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
                    <form role="form" action="{{URL::to('/luu-monan')}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID món ăn</label>
                            <input type="number" name="IdMonAn" class="form-control" id="id_monan">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Loại món ăn</label>
                            <select name="IdLoai" class="form-control input-md m-bot15">
                                @foreach($loaimonan as $key => $loai)
                                    <option value={{($loai->IdLoai)}}> {{($loai->TenLoai)}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên món ăn</label>
                            <input type="text" name="TenMon" class="form-control" id="ten_mon" placeholder="Thêm tên món ăn">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Đơn giá</label>
                            <input type="number" name="DonGia" class="form-control" id="don_gia" placeholder="VNĐ">
                        </div>

                        <button type="submit" class="btn btn-info">Xác nhận</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
