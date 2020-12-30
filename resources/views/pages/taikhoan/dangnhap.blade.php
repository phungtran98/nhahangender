<!DOCTYPE html>
<html>
<head>
	<title>Đăng nhập</title>
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
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/dangnhap.css') }}">
</head>
<body>


<div class="container">
    <div class="d-flex justify-content-center h-100">

        <form action="{{URL::to('/postdangnhap')}}" method="post">
            {{ csrf_field() }}
            <div class="card">
                <div class="card-header">
                    <h3>Đăng nhập</h3>
                    <div class="d-flex justify-content-end social_icon">
                        <span><i class="fab fa-facebook-square"></i></span>
                        <span><i class="fab fa-google-plus-square"></i></span>
                        <span><i class="fab fa-twitter-square"></i></span>
                    </div>
                </div>

                <?php
                    $message = Session::get('message');
                    if($message){
                        echo '<span class="text-alert" style="color:red">'.$message.'</span>';
                        Session::put('message',null);
                    }
                ?>

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
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" name="MatKhau" placeholder="Mật khẩu">
                        </div>
                        <div class="row align-items-center remember">
                            <input type="checkbox">Nhớ tài khoản
                        </div>
                        <div class="form-group">
                            <input type="submit"  name="login" value="Đăng Nhập" class="btn float-right login_btn">
                        </div>
                    </form>
                </div>

                <div class="card-footer">
                    <div class="d-flex justify-content-center links">
                        Bạn chưa có tài khoản?<a href="{{URL::to('/dangky')}}">Đăng ký ngay</a>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="#">Quên mật khẩu?</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>
