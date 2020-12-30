<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiMonAn extends Model
{
    protected $table = "loaimonan";
    public $timestamps = false;

    public function monan()
    {
        return $this->hasMany('App\MonAn','IdLoai','IdLoai');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }
}
