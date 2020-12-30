<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    protected $table = "khachhang";
    public $timestamps = false;

    public function phieudatban()
    {
        return $this->hasMany('App\PhieuDatBan','IdKH','IdKH');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }

    public function phieudatmonan()
    {
        return $this->hasMany('App\PhieuDatMonAn','IdKH','IdKH');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }

    public function sothich()
    {
        return $this->hasMany('App\KhachHangSoThich','IdKH','IdKH');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }
}
