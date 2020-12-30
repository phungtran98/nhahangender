@extends('layout')
@section('monan')

<!--== 13. Menu List ==-->
<section id="menu-list" class="menu-list">
    <div class="container">
        <div class="row menu">
            <div class="col-md-10 col-md-offset-1 col-sm-9 col-sm-offset-2 col-xs-12">
                @foreach ($monan as $item)
                <div class="row">


                    <div class="menu-item">
                        <h3 class="menu-title">{{$item->TenMon}}</h3>
                        {{-- <p class="menu-about">{{$item->}}</p> --}}

                        <div class="menu-system">

                            <div class="half">
                                <p class="price">{{$item->DonGia}} ₫</p>
                            </div>
                        </div>
                    </div>

                </div>
                @endforeach
            </div>
        </div>

                <div id="moreMenuContent"></div>
                <div class="text-center">
                    <a id="loadMenuContent" class="btn btn-middle hidden-sm hidden-xs">Xem thêm <span class="caret"></span></a>
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

@endsection
