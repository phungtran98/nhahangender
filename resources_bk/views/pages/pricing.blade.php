@extends('layout')
@section('pricing')

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
                                </ul><!-- @end #filter-list -->
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
                        <li class="item dinner">

                            <a href="#">
                                <img src="{{ asset('public/frontend/images/food1.jpg') }}" class="img-responsive" alt="Food" >
                                <div class="menu-desc text-center">
                                    <span>
                                        <h3>Cà Chua</h3>
                                        Rau củ luôn tốt cho sức khoẻ
                                    </span>
                                </div>
                            </a>

                            <h2 class="white">20,000 ₫</h2>
                        </li>

                        <li class="item breakfast">

                            <a href="#">
                                <img src="{{ asset('public/frontend/images/food2.jpg') }}" class="img-responsive" alt="Food" >
                                <div class="menu-desc">
                                    <span>
                                        <h3>Món Tôm</h3>
                                        Tôm xào chua ngọt
                                    </span>
                                </div>
                            </a>

                            <h2 class="white">120,000 ₫</h2>
                        </li>
                        <li class="item desert">

                            <a href="#">
                                <img src="{{ asset('public/frontend/images/food3.jpg') }}" class="img-responsive" alt="Food" >
                                <div class="menu-desc">
                                    <span>
                                        <h3>Món Salad</h3>
                                        Rau củ luôn tốt cho sức khoẻ
                                    </span>
                                </div>
                            </a>

                            <h2 class="white">30,000 ₫</h2>
                        </li>
                        <li class="item breakfast special">

                            <a href="#">
                                <img src="{{ asset('public/frontend/images/food4.jpg') }}" class="img-responsive" alt="Food" >
                                <div class="menu-desc">
                                    <span>
                                        <h3>Món Tôm</h3>
                                        Gỏi tôm
                                    </span>
                                </div>
                            </a>

                            <h2 class="white">100,000 ₫</h2>
                        </li>
                        <li class="item breakfast">

                            <a href="#">
                                <img src="{{ asset('public/frontend/images/food5.jpg') }}" class="img-responsive" alt="Food" >
                                <div class="menu-desc">
                                    <span>
                                        <h3>Món Rau</h3>
                                        Rau củ luôn tốt cho sức khoẻ
                                    </span>
                                </div>
                            </a>

                            <h2 class="white">35.000 ₫</h2>
                        </li>
                        <li class="item dinner special">

                            <a href="#">
                                <img src="{{ asset('public/frontend/images/food6.jpg') }}" class="img-responsive" alt="Food" >
                                <div class="menu-desc">
                                    <span>
                                        <h3>Món Gà</h3>
                                        Gà chiên nước mắm
                                    </span>
                                </div>
                            </a>

                            <h2 class="white">130,000 ₫</h2>
                        </li>
                        <li class="item desert">

                            <a href="#">
                                <img src="{{ asset('public/frontend/images/food7.jpg') }}" class="img-responsive" alt="Food" >
                                <div class="menu-desc">
                                    <span>
                                        <h3>Món Bò</h3>
                                        Nui xào bò
                                    </span>
                                </div>
                            </a>

                            <h2 class="white">50,000 ₫</h2>
                        </li>
                        <li class="item dinner">

                            <a href="#">
                                <img src="{{ asset('public/frontend/images/food8.jpg') }}" class="img-responsive" alt="Food" >
                                <div class="menu-desc">
                                    <span>
                                        <h3>Salad Đặc Biệt</h3>
                                        Rau củ luôn tốt cho sức khoẻ
                                    </span>
                                </div>
                            </a>

                            <h2 class="white">50,000 ₫</h2>
                        </li>
                        <li class="item desert special">

                            <a href="#">
                                <img src="{{ asset('public/frontend/images/food9.jpg') }}" class="img-responsive" alt="Food" >
                                <div class="menu-desc">
                                    <span>
                                        <h3>Kem</h3>
                                        Món tráng miệng tuyệt vời
                                    </span>
                                </div>
                            </a>

                            <h2 class="white">10,000 ₫</h2>
                        </li>
                    </ul>

                    <!-- <div class="text-center">
                            <a id="loadPricingContent" class="btn btn-middle hidden-sm hidden-xs">Load More <span class="caret"></span></a>
                    </div> -->

                </div>
            </div>
        </div>

    </div>
</section>

@endsection
