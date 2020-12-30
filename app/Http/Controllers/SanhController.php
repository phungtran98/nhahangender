<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class SanhController extends Controller
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

    public function them_sanh(){
        $this->authlogin();
        return view('admin.sanh.them_sanh');
    }

    public function lietke_sanh(){
        $this->authlogin();
        $lietke_sanh = DB::table('sanh')->get();
        $quanly_sanh = view('admin.sanh.lietke_sanh')->with('lietke_sanh',$lietke_sanh);

        return view('admin_layout')->with('admin.sanh.lietke_sanh',$quanly_sanh);
    }

    public function luu_sanh(Request $request){
        $data = array();
        $data['Idsanh'] = $request->Idsanh;
        $data['IdLoai'] = $request->IdLoai;
        $data['TenMon'] = $request->TenMon;
        $data['DonGia'] = $request->DonGia;

        DB::table('sanh')->insert($data);
        Session::put('message','Thêm sảnh thành công');
        return Redirect::to('them-sanh');
    }
}
