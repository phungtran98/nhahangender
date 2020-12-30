<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class LuongController extends Controller
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

    public function them_luong(){
        $this->authlogin();
        return view('admin.luong.them_luong');
    }

    public function lietke_luong(){
        $this->authlogin();
        $lietke_luong = DB::table('luong')->get();
        $quanly_luong = view('admin.luong.lietke_luong')->with('lietke_luong',$lietke_luong);
        return view('admin_layout')->with('admin.luong.lietke_luong',$quanly_luong);
    }

    public function luu_luong(Request $request){
        $data = array();
        $data['IdLuong'] = $request->IdLuong;
        $data['HeSoLuong'] = $request->HeSoLuong;

        DB::table('luong')->insert($data);
        Session::put('message','Thêm lương thành công');
        return Redirect::to('them-luong');
    }
}
