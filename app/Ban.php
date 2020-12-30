<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ban extends Model
{
    protected $table = "ban";
    public $timestamps = false;

    public function sanh() // phải viêt liền ko được cách ra hoặc _
    {
        return $this->belongsTo('App\Sanh','IdSanh','IdSanh');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }

    public function loaiban() // phải viêt liền ko được cách ra hoặc _
    {
        return $this->belongsTo('App\LoaiBan','IdLoaiBan','IdLoaiBan');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }
}
