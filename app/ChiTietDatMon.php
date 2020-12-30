<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietDatMon extends Model
{
    protected $table = "chitietdatmon";
    public $timestamps = false;

    public function monan() // phải viêt liền ko được cách ra hoặc _
    {
        return $this->belongsTo('App\MonAn','IdMonAn','IdMonAn');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }

    public function phieudatmonan() // phải viêt liền ko được cách ra hoặc _
    {
        return $this->belongsTo('App\PhieuDatMonAn','IdDatMon','IdDatMon');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }
}
