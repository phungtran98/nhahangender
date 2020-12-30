<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class LoaiBanController extends Controller
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

    public function them_loaiban(){
        $this->authlogin();
        return view('admin.loaiban.them_loaiban');
    }

    public function lietke_loaiban(){
        $this->authlogin();
        $lietke_loaiban = DB::table('loaiban')->get();
        $quanly_loaiban = view('admin.loaiban.lietke_loaiban')->with('lietke_loaiban',$lietke_loaiban);
        return view('admin_layout')->with('admin.loaiban.lietke_loaiban',$quanly_loaiban);
    }

    public function luu_loaiban(Request $request){
        $data = array();
        $data['IdLoaiBan'] = $request->IdLoaiBan;
        $data['TenLoaiBan'] = $request->TenLoaiBan;

        DB::table('loaiban')->insert($data);
        Session::put('message','Thêm loại bàn thành công');
        return Redirect::to('them-loaiban');
    }
}
