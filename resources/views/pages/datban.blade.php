@extends('layout')
@section('content')

<section class="reservation">
    <img class="img-responsive section-icon hidden-sm hidden-xs" src="{{ asset('public/frontend/images/icons/reserve_color.png') }}">
    <div class="wrapper">
        <div class="container-fluid">
            @foreach ($khachhang as $key => $khachhang)
            <form action="{{URL::to('/luu-datban')}}" method="POST">
                {{csrf_field()}}
                <div class=" section-content">
                    <div class="row">
                        <div class="col-md-5 col-sm-6">
                            <form class="reservation-form" method="post" action="reserve.php">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control reserve-form empty iconified" name="TenKH" id="name" value="{{$khachhang->TenKH}}" readonly placeholder="  &#xf007;  Tên">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="SoLuongBan" class="form-control reserve-form empty iconified" id="email" required="required" placeholder="  &#xf1d8;  Số lượng bàn">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="tel" class="form-control reserve-form empty iconified" name="SdtKH" id="phone" value="{{$khachhang->SdtKH}}" placeholder="  &#xf095;  Số điện thoại">
                                        </div>
                                        <div class="form-group">
                                            <input type="datetime-local" class="form-control reserve-form empty iconified" name="ThoiGian" id="datepicker" required="required" placeholder="&#xf017;  Thời gian">
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-sm-12">
                                        <textarea type="text" name="GhiChu" class="form-control reserve-form empty iconified" id="message" rows="3" required="required" placeholder="  &#xf086;  Ghi chú"></textarea>
                                    </div>

                                    <div class="col-md-12 col-sm-12">
                                        <button type="submit" id="submit" name="submit" class="btn btn-reservation">
                                            <span><i class="fa fa-check-circle-o"></i></span>
                                            Đặt Bàn
                                        </button>
                                    </div>

                                </div>
                            </form>
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
                    </div>
                </div>
            </form>
            @endforeach
        </div>
    </div>
</section>


@endsection
