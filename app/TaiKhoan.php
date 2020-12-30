<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaiKhoan extends Model
{
    protected $table = "taikhoan";
    public $timestamps = false;

    public function khachhang() // phải viêt liền ko được cách ra hoặc _
    {
        return $this->belongsTo('App\KhachHang','IdKH','IdKH');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }

    public function nhanvien() // phải viêt liền ko được cách ra hoặc _
    {
        return $this->belongsTo('App\NhanVien','IdNV','IdNV');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }
}
