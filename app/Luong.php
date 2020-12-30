<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Luong extends Model
{
    protected $table = "luong";
    public $timestamps = false;

    public function chucvu()
    {
        return $this->hasOne('App\ChucVu','IdLuong','IdLuong');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }
}
