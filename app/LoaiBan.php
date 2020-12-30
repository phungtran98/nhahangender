<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiBan extends Model
{
    protected $table = "loaiban";
    public $timestamps = false;

    public function ban()
    {
        return $this->hasMany('App\Ban','IdLoaiBan','IdLoaiBan');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }

    public function chitietdatban()
    {
        return $this->hasMany('App\ChiTietDatBan','IdLoaiBan','IdLoaiBan');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }
}
