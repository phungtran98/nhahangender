@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Liệt kê phiếu đặt bàn
        </div>
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">

                {{-- Thông báo --}}
                <?php
                    $message = Session::get('message');
                    if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                    }
                ?>

                <thead>
                    <tr>
                    <th>STT</th>
                    <th>Tên khách hàng</th>
                    <th>Số điện thoại</th>
                    <th>Thời gian</th>
                    <th>Số lượng bàn</th>
                    <th>Trạng thái</th>
                    <th style="width:30px;"></th>
                    </tr>
                </thead>

                @foreach ($lietke_phieudatban as $key => $phieudatban)

                <tbody>
                    <tr>
                    <td>{{$phieudatban->IdDatBan}} </td>
                    <td>{{$phieudatban->TenKH}} </td>
                    <td>{{$phieudatban->SdtKH}} </td>
                    <td>{{$phieudatban->ThoiGian}} </td>
                    <td>{{$phieudatban->SoLuongBan}} </td>
                    <td>{{ $phieudatban->TinhTrang == 0 ? 'Chưa duyệt' : 'Đã duyệt' }}</td>
                    <td>
                        <a href="{{URL::to('/sua-phieudatban/'.$phieudatban->IdDatBan)}}" class="active styling-edit" ui-toggle-class="">
                            <i class="fa fa-pencil-square-o text-success text-active"></i>
                        </a>
                        <a onclick="return confirm('Bạn có chắc chắn xoá không?')" href="{{URL::to('/xoa-phieudatban/'.$phieudatban->IdDatBan)}}" class="active styling-delete" ui-toggle-class="">
                            <i class="fa fa-times text-danger text"></i>
                        </a>
                        @if ($phieudatban->TinhTrang == 0)
                            <a href="{{ route('phieu-dat.duyet-ban', ['idPhieu'=>$phieudatban->IdDatBan]) }}" class="btn btn-success">
                                Duyệt
                            </a>
                        @else
                        @endif
                    </td>
                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>

        <footer class="panel-footer">
            <div class="row">

            <div class="col-sm-5 text-center">
                <small class="text-muted inline m-t-sm m-b-sm">Hiển thị 5 phiếu đặt</small>
            </div>
            <div class="col-sm-7 text-right text-center-xs">
                {{ $lietke_phieudatban->links() }}
            </div>
            </div>
        </footer>
    </div>
</div>

@endsection
