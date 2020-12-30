<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LichTruc extends Model
{
    protected $table = "lichtruc";
    public $timestamps = false;

    public function nhanvien()
    {
        return $this->belongsTo('App\NhanVien','IdNV','IdNV');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }

    public function catruc()
    {
        return $this->belongsTo('App\CaTruc','IdCaTruc','IdCaTruc');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }

    public function ngaytruc()
    {
        return $this->belongsTo('App\NgayTruc','IdNgay','IdNgay');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }
}
