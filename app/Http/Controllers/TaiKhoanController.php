<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\KhachHang;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class TaiKhoanController extends Controller
{

    public function getdangky()
    {
        return view('pages.taikhoan.dangky');
    }

    public function postdangky(Request $request)
    {
    	$this->validate($request,[
            'TenKH' =>'required|min:2|max:32',
            'GioiTinhKH' =>'required',
            'SdtKH' =>'required|min:2|max:32',
            'DiaChiKH' =>'required',

            'TenTaiKhoan' =>'required|min:6|max:32|unique:khachhang,TenTaiKhoan',
            'MatKhau' => 'required|min:3|max:50',
            'NhapLaiMatKhau' => 'required|same:MatKhau',
            'TenHienThi' =>'required',
        ],[
            'TenKH.required' => 'Bạn chưa nhập họ tên !',
            'TenKH.min' => 'Họ tên tối thiếu 2 ký tự !',
            'TenKH.max' => 'Họ tên tối đa 32 ký tự !',

            'GioiTinhKH.required' =>'Bạn chưa nhập giới tính !',

            'SdtKH.required' => 'Bạn chưa nhập số điện thoại !',
            'SdtKH.min' => 'Số điện thoại phải 10 số !',
            'SdtKH.max' => 'Số điện thoại không được hơn 10 số !',

            'DiaChiKH.required' => 'Bạn chưa nhập địa chỉ !',

            'TenTaiKhoan.required' => 'Bạn chưa nhập tên tài khoản !',
            'TenTaiKhoan.min' => 'Tên tài khoản tối thiểu 6 ký tự trở lên !',
            'TenTaiKhoan.max' => 'Tên tài khoản không được quá 32 ký tự !',
            'TenTaiKhoan.unique' => 'Tên tài khoản đã tồn tại !',
            'TenHienThi.required' => 'Bạn chưa nhập tên hiển thị !',

            'MatKhau.required' => 'Bạn chưa nhập mật khẩu !',
            'MatKhau.min' => 'Mật khẩu phải có it nhât 6 ký tự !',
            'MatKhau.max' => 'Mật khẩu chỉ được tối đa 32 ký tự !',
            'NhapLaiMatKhau.required' => 'Bạn chưa nhập lại mật khẩu !',
            'NhapLaiMatKhau.same' => 'Nhập lại mật khẩu không trùng khớp !'
        ]);


        $khachhang = new KhachHang;
        $khachhang->TenKH = $request->TenKH;
        $khachhang->GioiTinhKH = $request->GioiTinhKH;
        $khachhang->SdtKH = $request->SdtKH;
        $khachhang->DiaChiKH = $request->DiaChiKH;
        $khachhang->TenTaiKhoan = $request->TenTaiKhoan;
        $khachhang->MatKhau = md5($request->MatKhau);
        $khachhang->TenHienThi = $request->TenHienThi;

        $khachhang->save();

        return redirect('/dangnhap')->with('message','Chúc mừng bạn đã đăng ký thành công !');
    }


    public function getlogin(){
        return view('pages.taikhoan.dangnhap');
    }

    public function postlogin(Request $request){

        $TenTaiKhoan = $request->TenTaiKhoan;
        $MatKhau = md5($request->MatKhau);
        // dd($MatKhau);

        $result = DB::table('khachhang')
        ->where('TenTaiKhoan',$TenTaiKhoan)
        ->where('MatKhau',$MatKhau)
        ->first();
        //$kh = DB::table('taikhoan')->where('LoaiTaiKhoan',0);
        //$tenKH = DB::table('khachhang')->where('IdKH',$result->IdKH)->first();

        if($result){
            Session::put('IdKH',$result->IdKH);
            Session::put('TenKH',$result->TenKH);
            Session::put('TenTaiKhoan',$result->TenTaiKhoan);
            Session::put('TenHienThi',$result->TenHienThi);
            return Redirect::to('/home');
        }
        else{
            Session::put('message','Tài khoản hoặc mật khẩu không đúng !');
            return Redirect::to('/dangnhap');
        }
    }

    public function dangxuat(){

        Session::put('IdKH',null);
        Session::put('TenTaiKhoan',null);
        Session::put('TenHienThi',null);
        Session::put('mgg',null);
        Session::put('giohang',null);
        return Redirect::to('/home');
    }
}
