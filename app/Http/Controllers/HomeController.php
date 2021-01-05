<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();


class HomeController extends Controller
{

    // Hàm kiểm tra có id kh không (đã đăng nhập)
    public function authlogin(){
        $IdKH = Session::get('IdKH');
        if($IdKH){
            return Redirect::to('home');
        }else{
            return Redirect::to('dangnhap')->send();
        }
    }

    public function index(){
        $lietke_monan = DB::table('monan')->orderby('IdMonAn','desc')->get();

        $khachhang = DB::table('khachhang')
        ->where('IdKH', '=', Session::get('IdKH'))
        ->get();
        return view('pages.home',[
            'khachhang' => $khachhang,
        ])->with('lietke_monan',$lietke_monan);
    }

    public function sua_thongtin(){
        $khachhang = DB::table('khachhang')
        ->where('IdKH', '=', Session::get('IdKH'))
        ->get();
        return view('pages.chinhsuathongtin',[
            'khachhang' => $khachhang,
        ]);
    }


    public function datban(){

    }


    public function xulydatban(Request $request)
    {
        $TenTaiKhoan = Session::get('TenTaiKhoan');
        $IdKH = Session::get('IdKH');
        $TenKH = Session::get('TenKH');
        $nhaHang = $request->IdNhaHang;
        // if ($TenTaiKhoan->count() == 0) {
        //     return Redirect::to('dangnhap');
        // }

        DB::table('phieudatban')->insert([
            'ThoiGian' => $request->input('ThoiGian'),
            'SoLuongBan' => $request->input('SoLuongBan'),
            'IdKH' => $IdKH,
            'IdNhaHang' => $nhaHang,
            'TinhTrang' => 0
        ]);
        // dd('done');
        Session::flash('alert-order','Đặt bàn thành công');
        return redirect()->back();
    }

    // Lấy món ăn và số lượng ở home đem qua đặt món
    public function datmon(Request $request){
        $this->authlogin();
        $TongGiaTien=0;
        $SauGiam=0;
        $nhahang= DB::table('nhahang')->get();
        if(session()->exists('giohang')){

            foreach (session()->get('giohang') as $giohang){
                $TongGiaTien += $giohang['DonGia'] * intval($giohang['SoLuongMon']);
            }
        }
        if(session()->exists('mgg')){
            $SauGiam=$TongGiaTien*(100-(session()->get('mgg')[0]['PhanTram']))/100;
        }
        $KH=DB::table('khachhang')->where('IdKH',session()->get('IdKH'))->first();
//
        return view('pages.giohang',compact('TongGiaTien','KH','SauGiam','nhahang'));
    }

    public function xulydatmon(Request $request,$Id){
        $this->authlogin();

        $IdMonAn = DB::table('monan')
                    ->where('IdMonAn', $Id)
                    ->first();
        $data['IdMonAn'] = $IdMonAn->IdMonAn;
        $data['SoLuongMon'] = 1;
        $data['TenMon'] = $IdMonAn->TenMon;
        $data['DonGia'] = $IdMonAn->DonGia;
        $data['options']['HinhAnh'] = $IdMonAn->HinhAnh;

        Session::push('giohang', $data);
        return redirect()->route('datmon');
    }


    // public function showdatmon(Request $request)
    // {
    //     $TongGiaTien=0;
    //     if(session()->exists('giohang')){

    //         foreach (session()->get('giohang') as $giohang){

    //             $TongGiaTien+=$giohang['DonGia'] * intval($giohang['SoLuongMon']);
    //         }
    //         if(session()->exists('giohang')){
    //             $TongGiaTien=$TongGiaTien*(100-(session()->get('mgg')['PhanTram']))/100;
    //         }
    //     }

    //     //$categories = DB::table('categories')->get();
    //     $IdKH = Session::get('IdKH');
    //     $KhachHang = DB::table('khachhang')
    //     ->where('IdKH', '=', $IdKH)
    //     ->get();
    //     return view('pages.giohang',[
    //         'KhachHang'=>$KhachHang,
    //         'TongGiaTien'=>$TongGiaTien,
    //     ]);
    // }


    // Thanh Toán
    public function order(Request $request) {
        // dd($request->idnhahang);
            $TongGiaTien=0;
            $IdKH = Session::get('IdKH');
            DB::table('khachhang')
            ->where('IdKH', '=', $IdKH)
            ->update([
                'SdtKH' => $request->input('SdtKH'),
                'DiaChiKH' => $request->input('DiaChiKH'),
            ]);
        foreach (session()->get('giohang') as $giohang){
            $TongGiaTien += $giohang['DonGia'] * intval($giohang['SoLuongMon']);
        }
        $IdDatMon = DB::table('phieudatmonan')->insertGetId([
            'TongGiaTien'=>$TongGiaTien,
            'PhuongThucThanhToan'=>$request->PhuongThucThanhToan,
            'IdKH' => $IdKH,
            'TrangThai' => 0,
        ]);
        foreach (session()->get('giohang') as $giohang){
            DB::table('chitietdatmon')->insertGetId([
                'IdDatMon' => $IdDatMon,
                'IdMonAn'=>$giohang['IdMonAn'],
                'IdNhaHang'=>$request->idnhahang,
                'SoLuongMon'=>$giohang['SoLuongMon'],
                'DonGiaMon' => $giohang['DonGia'],
            ]);
        }
        session()->pull('giohang', 'default');
        return redirect()->route('datmon')->with('success','Đặt món thành công!');
    }

    // Xoá món ăn trong giỏ
    public function xoa_item($IdMonAn)
    {
        session()->forget('giohang.' . $IdMonAn);
        return redirect()->route('datmon');

    }

    public function soluong(Request $request)
    {
        $temp = session()->pull('giohang');
        $temp[$request->id]['SoLuongMon'] = $request->value;
        session()->put('giohang', $temp);
    }
    public function tonggiatien()
    {
        $TongGiaTien=0;
        if(session()->exists('giohang')){

            foreach (session()->get('giohang') as $giohang){
                $TongGiaTien += $giohang['DonGia'] * intval($giohang['SoLuongMon']);
            }
        }
        if(session()->exists('mgg')){
            $SauGiam=$TongGiaTien*(100-(session()->get('mgg')[0]['PhanTram']))/100;
        }
        return response()->json(['TongGiaTien'=>$TongGiaTien,'SauGiam'=>$SauGiam], 200);
    }


    // Mã giảm giá
    public function mgg(Request $request)
    {
        $ma=DB::table('magiamgia')->where('Ma',$request->MGG)->first();
        // dd($ma);
        // dd($request);
        if($ma||session()->exists('mgg')){
            $data['IdMa'] = $ma->IdMa;
            $data['Ma'] = $ma->Ma;
            $data['PhanTram'] = $ma->PhanTram;
            Session::push('mgg', $data);
            return redirect()->route('datmon')->with('success','Nhập mã thành công!');
        }
        return redirect()->route('datmon')->with('error','Mã giảm giá không đúng!');
    }



}




