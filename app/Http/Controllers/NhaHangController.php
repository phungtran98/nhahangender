<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class NhaHangController extends Controller
{
    public function index()
    {
        $nhaHang = DB::table('nhahang')->get();
        return view('admin.nhahang.index',compact('nhaHang'));
    }

    public function create()
    {
        return view('admin.nhahang.add');
    }

    public function store(Request $request)
    {
        $tenNhaHang = $request->tenNhaHang;
        $diaChi = $request->diaChi;
        $thanhPho = $request->thanhPho;

        DB::table('nhahang')->insert(
            [
                'TenNhaHang' => $tenNhaHang,
                'DiaChi' => $diaChi,
                'ThanhPho' => $thanhPho
            ]
        );

        return redirect()->route('nha-hang.index');
    }
}
