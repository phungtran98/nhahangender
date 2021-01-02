<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\KhachHang;
use App\PhieuDatBan;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class PhieuDatBanController extends Controller
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

    // Thêm phiếu đặt bàn
    public function them_phieudatban(){
        $this->authlogin();
        return view('admin.phieudatban.them_phieudatban');
    }

    // Xem phiếu đặt bàn
    public function lietke_phieudatban(){
        $this->authlogin();
        //Lấy dữ liệu từ bảng khachhang tham gia vào bảng phieudatban theo IdKH
        $lietke_phieudatban = DB::table('phieudatban')
        ->join('khachhang','khachhang.IdKH','=','phieudatban.IdKH')
        ->orderBy('TinhTrang','asc')
        ->paginate(5);

        $quanly_phieudatban = view('admin.phieudatban.lietke_phieudatban')->with('lietke_phieudatban',$lietke_phieudatban);

        return view('admin_layout')->with('admin.phieudatban.lietke_phieudatban',$quanly_phieudatban);
    }

    public function duyetBan($idPhieu)
    {
        DB::table('phieudatban')->where('IdDatBan',$idPhieu)->update(
            [
                'TinhTrang' => 1
            ]
        );
        return redirect()->back();
    }

    // Lưu phiếu đặt bàn
    public function luu_phieudatban(Request $request){
        $data = array();
        $data['IdDatBan'] = $request->IdDatBan;
        $data['IdKH'] = $request->IdKH;
        $data['ThoiGian'] = $request->ThoiGian;
        $data['SoLuongBan'] = $request->SoLuongBan;
        $data['IdNhaHang'] = $request->IdNhaHang;

        DB::table('phieudatban')->insert($data);
        Session::put('message','Thêm phiếu đặt bàn thành công');
        return Redirect::to('them-phieudatban');
    }

    // Sửa phiếu đặt bàn
    public function sua_phieudatban($IdDatBan){
        $this->authlogin();
        $sua_phieudatban = DB::table('phieudatban')->where('IdDatBan',$IdDatBan)->get();
        $quanly_phieudatban = view('admin.phieudatban.sua_phieudatban')->with('sua_phieudatban',$sua_phieudatban);

        return view('admin_layout')->with('admin.phieudatban.sua_phieudatban',$quanly_phieudatban);
    }

    public function capnhat_phieudatban(Request $request, $IdDatBan){
        $data = array();
        $data['IdDatBan'] = $request->IdDatBan;
        $data['IdKH'] = $request->IdKH;
        $data['ThoiGian'] = $request->ThoiGian;
        $data['SoLuongBan'] = $request->SoLuongBan;

        DB::table('phieudatban')->where('IdDatBan',$IdDatBan)->update($data);
        Session::put('message','Cập nhật phiếu đặt bàn thành công');
        return Redirect::to('lietke-phieudatban');
    }


    public function xoa_phieudatban($IdDatBan){
        $this->authlogin();
        DB::table('phieudatban')->where('IdDatBan',$IdDatBan)->delete();
        Session::put('message','Xoá phiếu đặt bàn thành công');
        return Redirect::to('lietke-phieudatban');
    }


    public function huyDon($idDon)
    {
        DB::table('phieudatban')->where('IdDatBan',$idDon)->update(['TinhTrang' => 2]);
        Session::flash('message-del','Hủy đặt bàn thành công');
        return redirect()->back();
    }
}
