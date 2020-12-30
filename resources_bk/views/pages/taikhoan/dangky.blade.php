<!DOCTYPE html>
<html>
<head>
	<title>Đăng ký tài khoản</title>
   <!--Made with love by Mutiullah Samim -->

	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="{{ asset('public/frontend/css/bootstrap.min.css') }}">
    <!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="{{ asset('https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css') }}">

    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="{{ asset('https://use.fontawesome.com/releases/v5.3.1/css/all.css') }}">


    <script src="{{ asset('public/frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{asset('public/frontend/js/jquery-1.11.2.min.js')}}"></script>

	<!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/dangky.css') }}">
</head>
<body>

<div class="container">
	<div class="d-flex justify-content-center h-100">

        <form action="{{URL::to('/luu-dangky')}}" method="post">
            {{ csrf_field() }}
            <div class="card">
                <div class="card-header">
                    <h3>Đăng ký</h3>
                    <div class="d-flex justify-content-end social_icon">
                        <span><i class="fab fa-facebook-square"></i></span>
                        <span><i class="fab fa-google-plus-square"></i></span>
                        <span><i class="fab fa-twitter-square"></i></span>
                    </div>
                </div>
                @if(count($errors)>0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            {{$error}}
                        @endforeach
                    </div>
                @endif

                @if (Session::has('message'))
                    <div class="alert alert-success">{{Session::get('message')}}</div>
                @endif
                <div class="card-body">
                    <form>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" name="TenTaiKhoan" placeholder="Tài khoản">
                        </div>

                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" name="TenHienThi" placeholder="Tên Hiển Thị">
                        </div>

                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" name="MatKhau" placeholder="Mật khẩu">
                        </div>

                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" name="NhapLaiMatKhau" placeholder="Nhập Lại Mật khẩu">
                        </div>

                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" name="TenKH" placeholder="Họ Và Tên">
                        </div>

                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" name="SdtKH" placeholder="Số Điện Thoại">
                        </div>

                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" name="DiaChiKH" placeholder="Địa chỉ">
                        </div>

                        <div class="input-group form-group">
                            <div class="form-check-inline">
                                <label class="form-check-label" style="color:white;">
                                <input type="radio" class="form-check-input" name="GioiTinhKH" value="Nam">Nam
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label" style="color:white;">
                                <input type="radio" class="form-check-input" name="GioiTinhKH" value="Nữ">Nữ
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="submit"  name="dangky" value="Đăng ký" class="btn float-right login_btn">
                        </div>
                    </form>
                </div>
            </div>
        </form>
	</div>
</div>
</body>
</html>
