<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sanh extends Model
{
    protected $table = "sanh";
    public $timestamps = false;

    public function ban()
    {
        return $this->hasMany('App\Ban','IdSanh','IdSanh');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }
}
