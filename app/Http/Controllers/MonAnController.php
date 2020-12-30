<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class MonAnController extends Controller
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

    // Thêm món ăn
    public function them_monan(){
        $this->authlogin();
        //Lấy dữ liệu từ bảng loaimonan sắp xếp theo Tên loại
        $loaimonan = DB::table('loaimonan')->orderBy('TenLoai','asc')->get();
        return view('admin.monan.them_monan')->with('loaimonan',$loaimonan);
    }

    // Xem món ăn
    public function lietke_monan(){
        $this->authlogin();
        //Lấy dữ liệu từ bảng loaimonan tham gia vào bảng monan theo IdLoai
        $lietke_monan = DB::table('monan')
        ->join('loaimonan','loaimonan.IdLoai','=','monan.IdLoai')
        ->get();

        $quanly_monan = view('admin.monan.lietke_monan')->with('lietke_monan',$lietke_monan);

        return view('admin_layout')->with('admin.monan.lietke_monan',$quanly_monan);
    }

    // Lưu món ăn
    public function luu_monan(Request $request){
        $data = array();
        $data['IdMonAn'] = $request->IdMonAn;
        $data['IdLoai'] = $request->IdLoai;
        $data['TenMon'] = $request->TenMon;
        $data['DonGia'] = $request->DonGia;
        $data['HinhAnh'] = $request->HinhAnh;
        $get_image = $request->file('HinhAnh');

        if($get_image){
            $get_name_image =$get_image->getClientOriginalName();
            $name_image= current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/monan',$new_image);
            $data ['HinhAnh'] = $new_image;

            DB::table('monan')->insert($data);
            Session::put('message','Thêm món ăn thành công');
            return Redirect::to('them-monan');
        }
        $data ['HinhAnh'] = '';

        DB::table('monan')->insert($data);
        Session::put('message','Thêm món ăn thành công');
        return Redirect::to('them-monan');
    }

    // Sửa món ăn
    public function sua_monan($IdMonAn){
        $this->authlogin();
        //Lấy dữ liệu từ bảng loaimonan sắp xếp theo Tên loại
        $loaimonan = DB::table('loaimonan')->orderBy('TenLoai','asc')->get();

        $sua_monan = DB::table('monan')->where('IdMonAn',$IdMonAn)->get();

        $quanly_monan = view('admin.monan.sua_monan')->with('sua_monan',$sua_monan)->with('loaimonan',$loaimonan);

        return view('admin_layout')->with('admin.monan.sua_monan',$quanly_monan);
    }

    public function capnhat_monan(Request $request, $IdMonAn){
        $data = array();
        $data['IdMonAn'] = $request->IdMonAn;
        $data['IdLoai'] = $request->IdLoai;
        $data['TenMon'] = $request->TenMon;
        $data['DonGia'] = $request->DonGia;
        $data['HinhAnh'] = $request->HinhAnh;
        $get_image = $request->file('HinhAnh');

        if($get_image){
            $get_name_image =$get_image->getClientOriginalName();
            $name_image= current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/monan',$new_image);
            $data ['HinhAnh'] = $new_image;

            DB::table('monan')->where('IdMonAn',$IdMonAn)->update($data);
            Session::put('message','Cập nhật món ăn thành công');
            return Redirect::to('lietke-monan');
        }
        DB::table('monan')->where('IdMonAn',$IdMonAn)->update($data);
        Session::put('message','Cập nhật món ăn thành công');
        return Redirect::to('lietke-monan');
    }


    public function xoa_monan($IdMonAn){
        $this->authlogin();
        DB::table('monan')->where('IdMonAn',$IdMonAn)->delete();
        Session::put('message','Xoá món ăn thành công');
        return Redirect::to('lietke-monan');
    }

}
