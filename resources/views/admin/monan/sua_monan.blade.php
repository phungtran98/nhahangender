@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật món ăn
            </header>

            <div class="panel-body">
                @foreach ($sua_monan as $key => $sua)

                <div class="position-center">
                    <form role="form" action="{{URL::to('/capnhat-monan/'.$sua->IdMonAn)}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID món ăn</label>
                            <input type="number" value="{{$sua->IdMonAn}}" name="IdMonAn" class="form-control" id="id_monan" disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Loại món ăn</label>
                            <select name="IdLoai" class="form-control input-md m-bot15">
                                {{-- Lấy dữ liệu từ bảng loaimonan theo IdLoai để chỉnh sửa --}}
                                @foreach($loaimonan as $key => $loai)

                                    @if($loai->IdLoai==$sua->IdLoai)
                                        <option selected value={{($loai->IdLoai)}}> {{($loai->TenLoai)}}</option>
                                    @else
                                        <option value={{($loai->IdLoai)}}> {{($loai->TenLoai)}}</option>
                                    @endif

                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên món ăn</label>
                            <input type="text" value="{{$sua->TenMon}}" name="TenMon" class="form-control" id="ten_mon" placeholder="Thêm tên món ăn">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Đơn giá</label>
                            <input type="number" value="{{$sua->DonGia}}" name="DonGia" class="form-control" id="don_gia" placeholder="VNĐ">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh</label>
                            <input type="file" name="HinhAnh" class="form-control" id="exampleInputEmail1" >
                            <img src="{{URL::to('public/upload/monan/'.$sua->HinhAnh)}}" height="100" width="100">
                        </div>

                        <button type="submit" name="capnhat_monan" class="btn btn-info">Cập nhật món ăn</button>
                    </form>
                </div>

                @endforeach
            </div>
        </section>
    </div>
</div>
@endsection
