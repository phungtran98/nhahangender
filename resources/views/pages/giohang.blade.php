@extends('layout')
@section('content')



<section id="pricing" class="pricing">
    <div id="w">
        <div class="pricing-filter">
            <div class="pricing-filter-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="section-header">
                                <h2 class="pricing-title">Đặt món ăn</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@if($message = Session::get('success'))
<div class="alert alert-success" role="alert" style="text-align: center">
    <p>{{$message}}</p>
    <p class="mb-0"></p>
</div>
@endif

@if($message = Session::get('error'))
<div class="alert alert-danger" role="alert" style="text-align: center>
    <p>{{$message}}</p>
    <p class="mb-0"></p>
</div>
@endif

<div class="container">
    <table class="table">
        <tr>
            <th ></th>
            <th style="color:#5c9233;">
                Món ăn
            </th>
            <th style="color:#5c9233;">
                Đơn giá
            </th>
            <th style="color:#5c9233;">
                Số lượng
            </th>
            <th class="text-right" style="color:#5c9233;">
                Tổng tiền
            </th>
            <th></th>
        </tr>

        <tr>
            @if(session()->exists('giohang'))
            @foreach (session()->get('giohang') as $key=>$giohang)
            <td>
                <img src="{{asset('public/upload/monan/' . $giohang['options']['HinhAnh']) }}" alt="" width="50px" height="50px">
            </td>
            <td>
                <p> {{$giohang['TenMon']}} </p>
            </td>
            <td>
                <p> {{number_format($giohang['DonGia']).' '.'$'}} </p>
            </td>
            <td>
                <div class="cart_quantity_buntton">
                    <input class="cart_quantity_input quantity" type="number" name="SoLuongMon"
                        value="{{$giohang['SoLuongMon']}}" min="1" autocomplete="off" size="2" data-id="{{$key}}"
                        data-price="{{$giohang['DonGia']}}"
                        onKeyUp="if(this.value>100){this.value='100';}else if(this.value<1){this.value='1';}" />
                </div>
            </td>
            <td class="text-right">
                <p class="cart_total_price" id="subtotal{{$key}}">
                    <?php
                        $subtotal = $giohang['DonGia'] * intval($giohang['SoLuongMon']);
                        echo number_format($subtotal).' '.'₫';
                    ?>
                </p>
            </td>
            <td class="text-right">
                <a href="{{url('xoa-item',$key)}}">
                    <i class="fa fa-trash-o" style="font-size: 20px"></i>
                </a>
            </td>
        </tr>
            @endforeach
        @endif

        <tr>
            <td>Mã giảm giá</td>
            <td>
                <form action="{{route('mgg')}}" method="post">
                @csrf
                <input type="text" name="MGG" id=""

                @if (session()->exists('mgg'))
                    value='{{session()->get('mgg')[0]['Ma']}}'
                @endif>

                <button type="submit">Đồng ý</button>
                </form>
            </td>
            <td colspan="4"></td>
        </tr>
        <tr>
            <td>
                <h4 style="color:#5c9233;">Tổng tiền</h4>
            </td>
            <td colspan="3"></td>
            <td class="text-right" id="total_price">
                {{$TongGiaTien}} ₫

        </tr>
        <tr>
            <td>
                <h4 style="color:#5c9233;">Tổng tiền (Đã Giảm Giá)</h4>
            </td>
            <td colspan="3"></td>
            <td class="text-right" id="sau_giam">{{$SauGiam}} ₫</td>
        </tr>
        <tr>
            <td>
                <u><a href="{{url('/home#pricing')}}">Đặt thêm món</a></u>
            </td>
        </tr>
    </table>
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">

        </div>
    </div>
</div>
<hr>

{{-- Thông tin Khách hàng --}}
<h2 style="color: #5c9233; text-align:center"> Thông tin thanh toán</h2><br>
<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <form action="{{url('order')}}" method="POST">
            @csrf
            <input class="form-control" type="text" name="TenKH" value="{{$KH->TenKH}}" required>

            <input class="form-control" type="text" name="SdtKH" value="{{$KH->SdtKH}}" required>
            <textarea class="form-control" name="DiaChiKH" rows="5" required>{{$KH->DiaChiKH}}</textarea>

            <label class="radio-inline">
                <input type="radio" value="0" name="PhuongThucThanhToan" checked>Tiền mặt
            </label>
            <label class="radio-inline">
                <input type="radio" value="1" name="PhuongThucThanhToan">Thẻ ATM
            </label>

            <div align="center">
                <button type="submit" class="btn">Đặt món</button>
            </div>
        </form>
    </div>
</div>
<br><br>


<script>
    $(document).ready(function () {
        $('.quantity').on('keyup change click', function(){ //bắt sự kiện keyup khi người dùng gõ từ khóa tim kiếm
            var id = $(this).attr("data-id");
            var value= $(this).val();
            var price= $(this).attr("data-price");
            document.getElementById('subtotal'+id).innerHTML=price*value+' $';

            $.ajax({
                url:"{{ route('soluong') }}", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
                type: "get", // phương thức gửi dữ liệu.
                dataType: "JSON",
                data:{id:id,value:value},
                success:function(response){ //dữ liệu nhận về
                    location.reload();//nhận dữ liệu dạng html và gán vào cặp thẻ có id là countryList
                }
            });
            $.ajax({
                url:"{{ route('tonggiatien') }}", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
                type: "get", // phương thức gửi dữ liệu.
                dataType: "JSON",
                // data:{id:id,value:value},
                success:function(response){ //dữ liệu nhận về
                // alert(response);
                    document.getElementById('total_price').innerHTML=response.TongGiaTien+' $';//nhận dữ liệu dạng html và gán vào cặp thẻ có id là countryList
                    document.getElementById('sau_giam').innerHTML=response.SauGiam+' $';//nhận dữ liệu dạng html và gán vào cặp thẻ có id là countryList
                }
            });

        });
    });
</script>
@endsection
