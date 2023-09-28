<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lops extends Model
{
    use HasFactory;
    protected $table = "lops";
    public $timestamps = true;

    public function khoa()
    {
        return $this->belongsTo(Khoa::class, "MaKhoa_ID", "id");
    }

    public function hedaotao()
    {
        return $this->belongsTo(HeDaoTao::class, "MaHeDT_ID", "id");
    }
    public function thuockhoa()
    {
        return $this->belongsTo(KhoaHoc::class, "MaKhoaHoc_ID", "id");
    }

    public function sinhvien()
    {
        return $this->hasMany(SinhViens::class, "MaLop_ID", "id");
    }
}