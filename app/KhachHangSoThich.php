<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhachHangSoThich extends Model
{
    protected $table = "khachhang_sothich";
    public $timestamps = false;

    public function khachhangsothich()
    {
        return $this->hasMany('App\KhachHangSoThich','IdKH','IdKH');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }

    public function sothich()
    {
        return $this->hasMany('App\SoThich','IdSoThich','IdSoThich');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }
}
