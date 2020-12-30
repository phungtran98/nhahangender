<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonAn extends Model
{
    protected $table = "monan";
    public $timestamps = false;

    public function chitietdatban()
    {
        return $this->hasMany('App\ChiTietDatBan','IdMonAn','IdMonAn');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }

    public function chitietdatmon()
    {
        return $this->hasMany('App\ChiTietDatMon','IdMonAn','IdMonAn');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }

    public function monansothich()
    {
        return $this->hasMany('App\MonAnSoThich','IdMonAn','IdMonAn');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }

    public function loaimonan() // phải viêt liền ko được cách ra hoặc _
    {
        return $this->belongsTo('App\LoaiMonAn','IdLoai','IdLoai');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }
}
