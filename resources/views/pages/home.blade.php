
@extends('layout')
@section('content')
<style>
    form {
    display: inline;
}
</style>
@if (Session::has('alert-order'))
    <div class="alert alert-warning alert-dismissible show" role="alert">
        <strong>Thông báo !</strong> {{ Session::get('alert-order') }}.
    </div>
@endif
 <!--== 5. Header ==-->
 <section id="header-slider" class="owl-carousel" style="margin-top: 0">
    <div class="item">
        <div class="container">
            <div class="header-content">
                <h1 class="header-title">BEST FOOD</h1>
                <p class="header-sub-title">Chào mừng đến với nhà hàng Ender</p>
            </div> <!-- /.header-content -->
        </div>
    </div>
    <div class="item">
        <div class="container">
            <div class="header-content">
                <h1 class="header-title">BEST SNACKS</h1>
                <p class="header-sub-title">Chào mừng đến với nhà hàng Ender</p>
            </div> <!-- /.header-content -->
        </div>
    </div>
    <div class="item">
        <div class="container">
            <div class="header-content text-right pull-right">
                <h1 class="header-title">BEST DRINKS</h1>
                <p class="header-sub-title">Chào mừng đến với nhà hàng Ender</p>
            </div> <!-- /.header-content -->
        </div>
    </div>
</section>

<!--== 6. About us ==-->
<section id="about" class="about">
    <img src="{{ asset('public/frontend/images/icons/about_color.png') }}" class="img-responsive section-icon hidden-sm hidden-xs">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row dis-table">
                <div class="hidden-xs col-sm-6 section-bg about-bg dis-table-cell">

                </div>
                <div class="col-xs-12 col-sm-6 dis-table-cell">
                    <div class="section-content">
                        <h2 class="section-content-title">Về chúng tôi</h2>
                        <p class="section-content-para">
                            Nhà hàng độc lập lâu đời nhất tại Cần Thơ. Địa điểm được người dân địa phương yêu thích suốt hơn 20 năm. Nổi bật với những món ăn đậm chất Việt Nam. Thực đơn quán đầy và nhiều lựa chọn phù hợp cho tất cả mọi người.
                        </p>
                        <p class="section-content-para">
                            Phục vụ suốt cả ngày từ 6h00 - 22h00 mỗi ngày. Nhà hàng có quầy bar đầy đủ các món rượu bia với chương trình giải trí vào cuối tuần. Nằm ở vị trí thuận tiện trên Đại lộ Hoà Bình, đối diện Bảo tàng QK9.
                    </div> <!-- /.section-content -->
                </div>
            </div> <!-- /.row -->
        </div> <!-- /.container-fluid -->
    </div> <!-- /.wrapper -->
</section> <!-- /#about -->





<!--==  7. Afordable Pricing  ==-->
<section id="pricing" class="pricing">
    <div id="w">
        <div class="pricing-filter">
            <div class="pricing-filter-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="section-header">
                                <h2 class="pricing-title">Giá cả phải chăng</h2>
                                <ul id="filter-list" class="clearfix">
                                    <li class="filter" data-filter="all">Tất cả</li>
                                    <li class="filter" data-filter=".breakfast">Bữa sáng</li>
                                    <li class="filter" data-filter=".special">Đặc biệt</li>
                                    <li class="filter" data-filter=".desert">Tráng miệng</li>
                                    <li class="filter" data-filter=".dinner">Bữa tối</li>
                                </ul><!-- end #filter-list -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <ul id="menu-pricing" class="menu-price">
                        @foreach ($lietke_monan as $key => $item)
                                <li class="item">
                                    <a href="#">
                                        <img src="{{URL::to('public/upload/monan/'. $item->HinhAnh)}}" class="img-responsive" alt="Food" >
                                        <div class="menu-desc text-center">
                                            <span>
                                                <h3>{{$item->TenMon}}</h3>
                                                Bấm vào giá để thêm vào giỏ hàng
                                            </span>
                                        </div>
                                    </a>
                                    <a href="{{route('xulydatmon',$item->IdMonAn)}}" style="background: none;">
                                        <h2 class="white">
                                            <button class="click-order" type="submit" id="order" name="submit">
                                                {{number_format($item->DonGia)}} ₫
                                            </button>
                                        </h2>
                                    </a>
                                </li>

                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

    </div>
</section>

<!--== 8. Great Place to enjoy ==-->
<section id="great-place-to-enjoy" class="great-place-to-enjoy">
    <img class="img-responsive section-icon hidden-sm hidden-xs" src="{{ asset('public/frontend/images/icons/beer_black.png') }}">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row dis-table">
                <div class="col-xs-6 col-sm-6 dis-table-cell color-bg">
                    <h2 class="section-title">Nơi tuyệt vời để thưởng thức</h2>
                </div>
                <div class="col-xs-6 col-sm-6 dis-table-cell section-bg">

                </div>
            </div> <!-- /.dis-table -->
        </div> <!-- /.row -->
    </div> <!-- /.wrapper -->
</section> <!-- /#great-place-to-enjoy -->



<!--==  9. Our Beer  ==-->
<section id="beer" class="beer">
    <img class="img-responsive section-icon hidden-sm hidden-xs" src="{{ asset('public/frontend/images/icons/beer_color.png') }}">
    <div class="container-fluid">
        <div class="row dis-table">
            <div class="hidden-xs col-sm-6 dis-table-cell section-bg">

            </div>

            <div class="col-xs-12 col-sm-6 dis-table-cell">
                <div class="section-content">
                    <h2 class="section-content-title">Đồ uống của chúng tôi</h2>
                    <div class="section-description">
                        <p class="section-content-para">
                            Astronomy compels the soul to look upward, and leads us from this world to another.  Curious that we spend more time congratulating people who have succeeded than encouraging people who have not. As we got further and further away, it [the Earth] diminished in size.
                        </p>
                        <p class="section-content-para">
                            beautiful, warm, living object looked so fragile, so delicate, that if you touched it with a finger it would crumble and fall apart. Seeing this has to change a man.  Where ignorance lurks, so too do the frontiers of discovery and imagination.Astronomy compels the soul to look upward, and leads us from this world to another.  Curious that we spend more time congratulating people who have succeeded than encouraging people who have not. As we got further and further away, it [the Earth] diminished in size.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!--== 10. Our Breakfast Menu ==-->
<section id="breakfast" class="breakfast">
    <img class="img-responsive section-icon hidden-sm hidden-xs" src="{{ asset('public/frontend/images/icons/bread_black.png') }}">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row dis-table">
                <div class="col-xs-6 col-sm-6 dis-table-cell color-bg">
                    <h2 class="section-title">Điểm tâm của chúng tôi</h2>
                </div>
                <div class="col-xs-6 col-sm-6 dis-table-cell section-bg">

                </div>
            </div> <!-- /.dis-table -->
        </div> <!-- /.row -->
    </div> <!-- /.wrapper -->
</section> <!-- /#breakfast -->



<!--== 11. Our Bread ==-->
<section id="bread" class="bread">
    <img class="img-responsive section-icon hidden-sm hidden-xs" src="{{ asset('public/frontend/images/icons/bread_color.png') }}">
    <div class="container-fluid">
        <div class="row dis-table">
            <div class="hidden-xs col-sm-6 dis-table-cell section-bg">

            </div>
            <div class="col-xs-12 col-sm-6 dis-table-cell">
                <div class="section-content">
                    <h2 class="section-content-title">
                        Bánh mì của chúng tôi
                    </h2>
                    <div class="section-description">
                        <p class="section-content-para">
                            Astronomy compels the soul to look upward, and leads us from this world to another.  Curious that we spend more time congratulating people who have succeeded than encouraging people who have not. As we got further and further away, it [the Earth] diminished in size.
                        </p>
                        <p class="section-content-para">
                            beautiful, warm, living object looked so fragile, so delicate, that if you touched it with a finger it would crumble and fall apart. Seeing this has to change a man.  Where ignorance lurks, so too do the frontiers of discovery and imagination.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!--== 14. Have a look to our dishes ==-->

<section id="have-a-look" class="have-a-look hidden-xs">
    <img class="img-responsive section-icon hidden-sm hidden-xs" src="{{ asset('public/frontend/images/icons/food_color.png') }}">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">

                <div class="menu-gallery" style="width: 50%; float:left;">
                    <div class="flexslider-container">
                        <div class="flexslider">
                            <ul class="slides">
                                <li>
                                    <img src="{{ asset('public/frontend/images/menu-gallery/menu1.png') }}" />
                                </li>
                                <li>
                                    <img src="{{ asset('public/frontend/images/menu-gallery/menu2.jpg') }}" />
                                </li>
                                <li>
                                    <img src="{{ asset('public/frontend/images/menu-gallery/menu3.png') }}" />
                                </li>
                                <li>
                                    <img src="{{ asset('public/frontend/images/menu-gallery/menu4.jpg') }}" />
                                </li>
                                <li>
                                    <img src="{{ asset('public/frontend/images/menu-gallery/menu5.jpg') }}" />
                                </li>
                                <li>
                                    <img src="{{ asset('public/frontend/images/menu-gallery/menu6.jpg') }}" />
                                </li>
                                <li>
                                    <img src="{{ asset('public/frontend/images/menu-gallery/menu7.jpg') }}" />
                                </li>
                                <li>
                                    <img src="{{ asset('public/frontend/images/menu-gallery/menu8.jpg') }}" />
                                </li>
                                <li>
                                    <img src="{{ asset('public/frontend/images/menu-gallery/menu9.jpg') }}" />
                                </li>
                                <li>
                                    <img src="{{ asset('public/frontend/images/menu-gallery/menu10.jpg') }}" />
                                </li>
                                <li>
                                    <img src="{{ asset('public/frontend/images/menu-gallery/menu11.jpg') }}" />
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="gallery-heading hidden-xs color-bg" style="width: 50%; float:right;">
                    <h2 class="section-title">Những món ăn của chúng tôi</h2>
                </div>


            </div> <!-- /.row -->
        </div> <!-- /.container-fluid -->
    </div> <!-- /.wrapper -->
</section>




<!--== 15. Reserve A Table! ==-->
<section id="reserve" class="reserve">
    <img class="img-responsive section-icon hidden-sm hidden-xs" src="{{ asset('public/frontend/images/icons/reserve_black.png') }}">
    <div class="wrapper" >
        <div class="container-fluid">
            <div class="row dis-table" >
                <div class="col-xs-6 col-sm-6 dis-table-cell color-bg">
                    <h2 class="section-title">Đặt Bàn Ngay Nhé </h2>
                </div>
                <div class="col-xs-6 col-sm-6 dis-table-cell section-bg">

                </div>
            </div> <!-- /.dis-table -->
        </div> <!-- /.row -->
    </div> <!-- /.wrapper -->
</section> <!-- /#reserve -->



<section class="reservation">
    <img class="img-responsive section-icon hidden-sm hidden-xs" src="{{ asset('public/frontend/images/icons/reserve_color.png') }}">
    <div class="wrapper">
        <div class="container-fluid">

                <div class=" section-content">
                <h2 style="color:#5c9233;">Thông tin đặt bàn </h2><br>
                    <div class="row">
                        <div class="col-md-5 col-sm-6">

                        @if($khachhang->count() != 0)
                            @foreach ($khachhang as $kh)
                            <form class="reservation-form" id="datban" method="POST" action="{{URL::to('/xulydatban')}}">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control reserve-form empty iconified" name="TenKH" id="name" value="{{$kh->TenKH}}" disabled placeholder="  &#xf007;  Tên">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="SoLuongBan" class="form-control reserve-form empty iconified" id="soluongban" required="required" placeholder="  &#xf1d8;  Số lượng bàn">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="tel" class="form-control reserve-form empty iconified" name="SdtKH" id="phone" value="{{$kh->SdtKH}}" placeholder="  &#xf095;  Số điện thoại">
                                        </div>
                                        <div class="form-group">
                                            <input type="datetime-local" class="form-control reserve-form empty iconified" name="ThoiGian" id="datepicker" required="required" placeholder="&#xf017;  Thời gian">
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <select name="IdNhaHang" id="" class="form-control">
                                                {{
                                                    $nhaHang = DB::table('nhahang')->get()
                                                }}
                                                @foreach ($nhaHang as $item)
                                                    <option value="{{ $item->IdNhaHang }}">{{ $item->TenNhaHang }} - {{ $item->DiaChi }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <button type="submit" id="submit" name="submit" class="btn btn-reservation">
                                            <span><i class="fa fa-check-circle-o"></i></span>
                                            Đặt Bàn
                                        </button>
                                    </div>

                                </div>
                            </form>
                            @endforeach
                        @else
                            <form class="reservation-form" action="{{URL::to('/dangnhap')}}">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control reserve-form empty iconified" name="TenKH" id="name" placeholder="  &#xf007;  Tên">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="SoLuongBan" class="form-control reserve-form empty iconified" id="soluongban" required="required" placeholder="  &#xf1d8;  Số lượng bàn">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="tel" class="form-control reserve-form empty iconified" name="SdtKH" id="phone" placeholder="  &#xf095;  Số điện thoại">
                                        </div>
                                        <div class="form-group">
                                            <input type="datetime-local" class="form-control reserve-form empty iconified" name="ThoiGian" id="datepicker" required="required" placeholder="&#xf017;  Thời gian">
                                        </div>
                                    </div>

                                    {{-- <div class="col-md-12 col-sm-12">
                                        <textarea type="text" name="message" class="form-control reserve-form empty iconified" id="message" rows="3" required="required" placeholder="  &#xf086;  We're listening"></textarea>
                                    </div> --}}

                                    <div class="col-md-12 col-sm-12">
                                        <button type="submit" id="submit" name="submit" class="btn btn-reservation">
                                            <span><i class="fa fa-check-circle-o"></i></span>
                                            Đặt Bàn
                                        </button>
                                    </div>
                                </div>
                            </form>

                        @endif
                        </div>

                        <div class="col-md-2 hidden-sm hidden-xs"></div>

                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="opening-time">
                                <h3 class="opening-time-title">Hours</h3>
                                <p>Mon to Fri: 7:30 AM - 11:30 AM</p>
                                <p>Sat & Sun: 8:00 AM - 9:00 AM</p>

                                <div class="launch">
                                    <h4>Lunch</h4>
                                    <p>Mon to Fri: 12:00 PM - 5:00 PM</p>
                                </div>

                                <div class="dinner">
                                    <h4>Dinner</h4>
                                    <p>Mon to Sat: 6:00 PM - 1:00 AM</p>
                                    <p>Sun: 5:30 PM - 12:00 AM</p>
                                </div>
                            </div>
                        </div>

                        {{-- Thông tin đặt bàn --}}
                        <div class="col-md-6 col-sm-8 col-xs-12 hidden">
                            <br><br><br><br>
                            <div class="opening-time thongtinchitiet">
                                <h3 class="opening-time-title">Thông tin đặt bàn</h3>
                                <div>Tên khách hàng: <p class="tenkhachhang"></p></div>
                                {{-- <div>Số điện thoại: <p class="sodienthoai"></p></div> --}}
                                <div>Số lượng bàn: <p class="soluongban"></p></div>
                                <div>Thời gian: <p class="thoigian"></p></div>
                                <div>Quý khách vui lòng chờ nhân viên gọi điện thoại xác nhận nhé !</div>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
    </div>
</section>

<section id="contact" class="contact">
    <div class="container-fluid color-bg">
        <div class="row dis-table">
            <div class="hidden-xs col-sm-6 dis-table-cell">
                <h2 class="section-title">Liên hệ với chúng tôi</h2>
            </div>
            <div class="col-xs-6 col-sm-6 dis-table-cell">
                <div class="section-content">
                    <p>1 Hoà Bình, Quận Ninh Kiều, Cần Thơ</p>
                    <p>+84 886999999</p>
                    <p>enderit1102@gmail.com </p>
                </div>
            </div>
        </div>
        <div class="social-media">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <ul class="center-block">
                        <li><a href="#" class="fb"></a></li>
                        <li><a href="#" class="twit"></a></li>
                        <li><a href="#" class="g-plus"></a></li>
                        <li><a href="#" class="link"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- <div class="container-fluid">
    <div class="row">
        <div id="map-canvas"></div>
    </div>
</div> --}}

<section class="contact-form">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
                <div class="row">
                     <form class="contact-form" method="post" action="contact.php">
                        <br><br>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <input  name="name" type="text" class="form-control" id="name" required="required" placeholder="  Name">
                            </div>
                            <div class="form-group">
                                <input name="email" type="email" class="form-control" id="email" required="required" placeholder="  Email">
                            </div>
                            <div class="form-group">
                                <input name="subject" type="text" class="form-control" id="subject" required="required" placeholder="  Subject">
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6">
                            <textarea name="message" type="text" class="form-control" id="message" rows="7" required="required" placeholder="  Message"></textarea>
                        </div>

                        <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                            <div class="text-center">
                                <button type="submit" id="submit" name="submit" class="btn btn-send">Gửi </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

