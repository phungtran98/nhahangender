<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class KhachHangController extends Controller
{
    // Hàm kiểm tra có admin id không (đã đăng nhập)
    public function authlogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('admin.dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    // Thêm khách hàng
    public function them_khachhang(){
        $this->authlogin();
        return view('admin.khachhang.them_khachhang');
    }

    // Xem khách hàng
    public function lietke_khachhang(){
        $this->authlogin();
        $lietke_khachhang = DB::table('khachhang')->get();
        $quanly_khachhang = view('admin.khachhang.lietke_khachhang')->with('lietke_khachhang',$lietke_khachhang);

        return view('admin_layout')->with('admin.khachhang.lietke_khachhang',$quanly_khachhang);
    }
    

    // Lưu khách hàng
    public function luu_khachhang(Request $request){
        $data = array();
        $data['IdKH'] = $request->IdKH;
        $data['TenKH'] = $request->TenKH;
        $data['GioiTinhKH'] = $request->GioiTinhKH;
        $data['SdtKH'] = $request->SdtKH;
        $data['DiaChiKH'] = $request->DiaChiKH;

        DB::table('khachhang')->insert($data);
        Session::put('message','Thêm khách hàng thành công');
        return Redirect::to('them-khachhang');
    }

    // Sửa khách hàng
    public function sua_khachhang($IdKH){
        $this->authlogin();
        $sua_khachhang = DB::table('khachhang')->where('IdKH',$IdKH)->get();
        $quanly_khachhang = view('admin.khachhang.sua_khachhang')->with('sua_khachhang',$sua_khachhang);

        return view('admin_layout')->with('admin.khachhang.sua_khachhang',$quanly_khachhang);
    }

    public function capnhat_khachhang(Request $request, $IdKH){
        $data = array();
        $data['IdKH'] = $request->IdKH;
        $data['TenKH'] = $request->TenKH;
        $data['GioiTinhKH'] = $request->GioiTinhKH;
        $data['SdtKH'] = $request->SdtKH;
        $data['DiaChiKH'] = $request->DiaChiKH;

        DB::table('khachhang')->where('IdKH',$IdKH)->update($data);
        Session::put('message','Cập nhật khách hàng thành công');
        return Redirect::to('lietke-khachhang');
    }


    public function xoa_khachhang($IdKH){
        $this->authlogin();
        DB::table('khachhang')->where('IdKH',$IdKH)->delete();
        Session::put('message','Xoá khách hàng thành công');
        return Redirect::to('lietke-khachhang');
    }
}
