<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    protected $table = "nhanvien";

    public function lichtruc()
    {
        return $this->hasMany('App\LichTruc','IdNV','IdNV');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }

    public function chucvu() // phải viêt liền ko được cách ra hoặc _
    {
        return $this->belongsTo('App\ChucVu','IdCV','IdCV');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }
}
