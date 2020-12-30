<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// front-end
Route::get('/','HomeController@index');

Route::get('/home','HomeController@index');

Route::get('/monan','HomeController@monan');

// Đặt bàn
    Route::get('/datban','HomeController@datban');

    Route::post('/xulydatban','HomeController@xulydatban');

// Đặt món

    Route::get('/datmon','HomeController@datmon')->name('datmon');

    Route::get('/giohang', 'HomeController@showdatmon')->name('showdatmon');

    Route::get('/xoa-item/{IdMonAn}', 'HomeController@xoa_item')->name('xoa_item');

    Route::get('/soluong', 'HomeController@soluong')->name('soluong');

    Route::get('tonggiatien', 'HomeController@tonggiatien')->name('tonggiatien');

    Route::post('/order', 'HomeController@order')->name('order');

    Route::get('/xulydatmon/{id}','HomeController@xulydatmon')->name('xulydatmon');

    Route::post('mgg','HomeController@mgg')->name('mgg');

// Khách hàng

    //Tài khoản
        Route::get('/dangky','TaiKhoanController@getdangky')->name('dangky');

        Route::post('/luu-dangky','TaiKhoanController@postdangky')->name('postdangky');

        Route::get('/dangnhap','TaiKhoanController@getlogin')->name('getdangnhap');

        Route::post('/postdangnhap','TaiKhoanController@postlogin');

            Route::get('/dangxuat','TaiKhoanController@dangxuat');


// show
Route::post('/luu-phieudatmonan','PhieuDatMonAnController@luu_phieudatmonan');

Route::post('/capnhat-phieudatmonan/{IdDatMon}','PhieuDatMonAnController@capnhat_phieudatmonan');


//Route::get('/thong-tin-chi-tiet', 'ThongTinChiTietController@index');


// Profile
Route::get('/sua-thongtin/{IdKH}', 'TaiKhoanController@sua_thongtin')->name('sua_thongtin');


//back-end
Route::get('/admin','AdminController@index');

Route::get('/dashboard','AdminController@show_dashboard')->name('dashboard');

Route::get('/logout','AdminController@logout');

Route::post('/admin-dashboard','AdminController@dashboard');



// Danh mục món ăn
    Route::get('/them-danhmuc','DanhMucMonAnController@them_danhmuc');

    Route::get('/lietke-danhmuc','DanhMucMonAnController@lietke_danhmuc');


    // show
    Route::post('/luu-danhmuc','DanhMucMonAnController@luu_danhmuc');


//Món ăn
    Route::get('/them-monan','MonAnController@them_monan');

    Route::get('/sua-monan/{IdMonAn}','MonAnController@sua_monan');

    Route::get('/xoa-monan/{IdMonAn}','MonAnController@xoa_monan');

    Route::get('/lietke-monan','MonAnController@lietke_monan');

    //Route::get('/monan','MonAnController@monan');

    // show
    Route::post('/luu-monan','MonAnController@luu_monan');

    Route::post('/capnhat-monan/{IdMonAn}','MonAnController@capnhat_monan');


//Sảnh
    Route::get('/them-sanh','SanhController@them_sanh');

    Route::get('/lietke-sanh','SanhController@lietke_sanh');


    // show
    Route::post('/luu-sanh','SanhController@luu_sanh');


// Loại bàn
    Route::get('/them-loaiban','LoaiBanController@them_loaiban');

    Route::get('/lietke-loaiban','LoaiBanController@lietke_loaiban');


    // show
    Route::post('/luu-loaiban','LoaiBanController@luu_loaiban');


// Bàn
    Route::get('/them-ban','BanController@them_ban');

    Route::get('/lietke-ban','BanController@lietke_ban');


    // show
    Route::post('/luu-ban','BanController@luu_ban');


// Lương
    Route::get('/them-luong','LuongController@them_luong');

    Route::get('/lietke-luong','LuongController@lietke_luong');


    // show
    Route::post('/luu-luong','LuongController@luu_luong');


// Chức vụ
    Route::get('/them-chucvu','ChucVuController@them_chucvu');

    Route::get('/lietke-chucvu','ChucVuController@lietke_chucvu');


    // show
    Route::post('/luu-chucvu','ChucVuController@luu_chucvu');


// Nhân viên
    Route::get('/them-nhanvien','NhanVienController@them_nhanvien');

    Route::get('/sua-nhanvien/{IdNhanVien}','NhanVienController@sua_nhanvien');

    Route::get('/xoa-nhanvien/{IdNhanVien}','NhanVienController@xoa_nhanvien');

    Route::get('/lietke-nhanvien','NhanVienController@lietke_nhanvien');


    // show
    Route::post('/luu-nhanvien','NhanVienController@luu_nhanvien');

    Route::post('/capnhat-nhanvien/{IdNhanVien}','NhanVienController@capnhat_nhanvien');


// Khách hàng
    Route::get('/them-khachhang','KhachHangController@them_khachhang');

    Route::get('/sua-khachhang/{IdKH}','KhachHangController@sua_khachhang');

    Route::get('/xoa-khachhang/{IdKH}','KhachHangController@xoa_khachhang');

    Route::get('/lietke-khachhang','KhachHangController@lietke_khachhang');


    // show
    Route::post('/luu-khachhang','KhachHangController@luu_khachhang');

    Route::post('/capnhat-khachhang/{IdKH}','KhachHangController@capnhat_khachhang');


// Phiếu đặt bàn
    Route::get('/them-phieudatban','PhieuDatBanController@them_phieudatban');

    Route::get('/sua-phieudatban/{IdDatBan}','PhieuDatBanController@sua_phieudatban');

    Route::get('/xoa-phieudatban/{IdDatBan}','PhieuDatBanController@xoa_phieudatban');

    Route::get('/lietke-phieudatban','PhieuDatBanController@lietke_phieudatban');


    // show
    Route::post('/luu-phieudatban','PhieuDatBanController@luu_phieudatban');

    Route::post('/capnhat-phieudatban/{IdDatBan}','PhieuDatBanController@capnhat_phieudatban');


// Phiếu đặt món ăn
    Route::get('/them-phieudatmonan','PhieuDatMonAnController@them_phieudatmonan');

    Route::get('/sua-phieudatmonan/{IdDatMon}','PhieuDatMonAnController@sua_phieudatmonan');

    Route::get('/xoa-phieudatmonan/{IdDatMon}','PhieuDatMonAnController@xoa_phieudatmonan');

    Route::get('/lietke-phieudatmonan','PhieuDatMonAnController@lietke_phieudatmonan');
