<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonHoc extends Model
{
    use HasFactory;
    protected $table = "mon_hocs";
    public $timestamps = true;

    public function khoa()
    {
        return $this->belongsTo(Khoa::class, "MaKhoa_ID", "id");
    }

    public function diem()
    {
        return $this->hasMany(Diems::class, "MaMH", "id");
    }

    public function diemdanhs()
    {
        return $this->hasMany(DiemDanh::class, "MaMH", "id");
    }
}