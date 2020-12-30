<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NgayTruc extends Model
{
    protected $table = "ngaytruc";
    public $timestamps = false;

    public function lichtruc()
    {
        return $this->hasMany('App\LichTruc','IdNgay','IdNgay');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }
}
