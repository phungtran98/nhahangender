<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhieuDatBan extends Model
{
    protected $table = "phieudatban";
    public $timestamps = false;

    public function khachhang() // phải viêt liền ko được cách ra hoặc _
    {
        return $this->belongsTo('App\KhachHang','IdKH','IdKH');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }

    public function chitietdatban()
    {
        return $this->hasMany('App\ChiTietDatBan','IdDatBan','IdDatBan');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }
}
