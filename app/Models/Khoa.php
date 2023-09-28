<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Khoa extends Model
{
    use HasFactory;

    protected $table = "khoas";
    public $timestamps = true;

    public function sinhvien()
    {
        return $this->hasMany(SinhViens::class, "MaKhoa_ID", "id");
    }

    public function lops()
    {
        return $this->hasMany(Lops::class, "MaKhoa_ID", "id");
    }

    public function mon_hoc()
    {
        return $this->hasMany(MonHoc::class, "MaKhoa_ID", "id");
    }
}
