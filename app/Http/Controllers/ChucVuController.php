<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class ChucVuController extends Controller
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

    public function them_chucvu(){
        $this->authlogin();
        $heSoLuong = DB::table('luong')->get();
        return view('admin.chucvu.them_chucvu', compact('heSoLuong'));
    }

    public function lietke_chucvu(){
        $this->authlogin();
        //Lấy dữ liệu từ bảng khachhang tham gia vào bảng phieudatban theo IdKH
        $lietke_chucvu = DB::table('chucvu')
        ->join('luong','luong.IdLuong','=','chucvu.IdLuong')
        ->get();

        $quanly_chucvu = view('admin.chucvu.lietke_chucvu')->with('lietke_chucvu',$lietke_chucvu);
        return view('admin_layout')->with('admin.chucvu.lietke_chucvu',$quanly_chucvu);
    }

    public function luu_chucvu(Request $request){
        $data = array();
        // $data['IdCV'] = $request->IdCV;
        $data['IdLuong'] = $request->IdLuong;
        $data['TenCV'] = $request->TenCV;

        DB::table('chucvu')->insert($data);
        Session::put('message','Thêm chức vụ thành công');
        return Redirect::to('them-chucvu');
    }
}
