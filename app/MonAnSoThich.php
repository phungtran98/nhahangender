<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonAnSoThich extends Model
{
    protected $table = "monan_sothich";
    public $timestamps = false;

    public function monansothich()
    {
        return $this->hasMany('App\MonAnSoThich','IdMonAn','IdMonAn');
    }

    public function sothich()
    {
        return $this->hasMany('App\SoThich','IdSoThich','IdSoThich');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }
}
