<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChucVu extends Model
{
    protected $table = "chucvu";
    public $timestamps = false;

    public function luong()
    {
        return $this->belongsTo('App\Luong','IdLuong','IdLuong');
        // từ sản phẩm con ra cha xài belongsTo
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }

    public function nhanvien()
    {
        return $this->hasMany('App\NhanVien','IdCV','IdCV');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }
}
