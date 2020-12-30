<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CaTruc extends Model
{
    protected $table = "catruc";
    public $timestamps = false;

    public function lichtruc()
    {
        return $this->hasMany('App\LichTruc','IdCaTruc','IdCaTruc');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }
}
