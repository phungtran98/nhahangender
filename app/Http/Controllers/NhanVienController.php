<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class NhanVienController extends Controller
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

    // Thêm nhân viên
    public function them_nhanvien(){
        $this->authlogin();
        return view('admin.nhanvien.them_nhanvien');
    }

    // Xem nhân viên
    public function lietke_nhanvien(){
        $this->authlogin();
        //Lấy dữ liệu từ bảng khachhang tham gia vào bảng phieudatban theo IdKH
        $lietke_nhanvien = DB::table('nhanvien')
        ->join('chucvu','chucvu.IdCV','=','nhanvien.IdCV')
        ->get();

        $quanly_nhanvien = view('admin.nhanvien.lietke_nhanvien')->with('lietke_nhanvien',$lietke_nhanvien);

        return view('admin_layout')->with('admin.nhanvien.lietke_nhanvien',$quanly_nhanvien);
    }

    // Lưu nhân viên
    public function luu_nhanvien(Request $request){
        $data = array();
        $data['IdNV'] = $request->IdNV;
        $data['IdCV'] = $request->IdCV;
        $data['TenNV'] = $request->TenNV;
        $data['GioiTinhNV'] = $request->GioiTinhNV;
        $data['SdtNV'] = $request->SdtNV;
        $data['DiaChiNV'] = $request->DiaChiNV;

        DB::table('nhanvien')->insert($data);
        Session::put('message','Thêm nhân viên thành công');
        return Redirect::to('them-nhanvien');
    }

    // Sửa nhân viên
    public function sua_nhanvien($IdNV){
        $this->authlogin();
        $sua_nhanvien = DB::table('nhanvien')->where('IdNV',$IdNV)->get();
        $quanly_nhanvien = view('admin.nhanvien.sua_nhanvien')->with('sua_nhanvien',$sua_nhanvien);

        return view('admin_layout')->with('admin.nhanvien.sua_nhanvien',$quanly_nhanvien);
    }

    public function capnhat_nhanvien(Request $request, $IdNV){
        $data = array();
        $data['IdNV'] = $request->IdNV;
        $data['IdCV'] = $request->IdCV;
        $data['TenNV'] = $request->TenNV;
        $data['GioiTinhNV'] = $request->GioiTinhNV;
        $data['SdtNV'] = $request->SdtNV;
        $data['DiaChiNV'] = $request->DiaChiNV;
        DB::table('nhanvien')->where('IdNV',$IdNV)->update($data);
        Session::put('message','Cập nhật nhân viên thành công');
        return Redirect::to('lietke-nhanvien');
    }


    public function xoa_nhanvien($IdNV){
        $this->authlogin();
        DB::table('nhanvien')->where('IdNV',$IdNV)->delete();
        Session::put('message','Xoá nhân viên thành công');
        return Redirect::to('lietke-nhanvien');
    }
}
