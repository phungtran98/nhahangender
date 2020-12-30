<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietDatBan extends Model
{
    protected $table = "chitietdatban";
    public $timestamps = false;

    public function phieudatban() // phải viêt liền ko được cách ra hoặc _
    {
        return $this->belongsTo('App\PhieuDatBan','IdDatBan','IdDatBan');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }

    public function loaiban() // phải viêt liền ko được cách ra hoặc _
    {
        return $this->belongsTo('App\LoaiBan','IdLoaiBan','IdLoaiBan');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }

    public function monan() // phải viêt liền ko được cách ra hoặc _
    {
        return $this->belongsTo('App\MonAn','IdMonAn','IdMonAn');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }
}
