<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhieuDatMonAn extends Model
{
    protected $table = "phieudatmonan";
    public $timestamps = false;

    public function chitietdatmon()
    {
        return $this->hasMany('App\ChiTietDatMon','IdDatMon','IdDatMon');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }

    public function khachhang() // phải viêt liền ko được cách ra hoặc _
    {
        return $this->belongsTo('App\KhachHang','IdKH','IdKH');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }
}
