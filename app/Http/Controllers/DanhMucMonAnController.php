<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class DanhMucMonAnController extends Controller
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

    public function them_danhmuc(){
        $this->authlogin();
        return view('admin.loaimonan.them_danhmuc');
    }

    public function lietke_danhmuc(){
        $this->authlogin();
        $lietke_danhmuc = DB::table('loaimonan')->get();
        $quanly_danhmuc = view('admin.loaimonan.lietke_danhmuc')->with('lietke_danhmuc',$lietke_danhmuc);
        return view('admin_layout')->with('admin.loaimonan.lietke_danhmuc',$quanly_danhmuc);
    }

    public function luu_danhmuc(Request $request){
        $data = array();
        $data['IdLoai'] = $request->IdLoai;
        $data['TenLoai'] = $request->TenLoai;

        DB::table('loaimonan')->insert($data);
        Session::put('message','Thêm danh mục món ăn thành công');
        return Redirect::to('them-danhmuc');
    }
}
