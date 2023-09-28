<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Diems extends Model
{
    use HasFactory;
    protected $table = "diems";
    public $timestamps = true;

    public function sinhvien()
    {
        return $this->belongsTo(SinhViens::class, "MaSV", "id");
    }
    public function monhoc()
    {
        return $this->belongsTo(MonHoc::class, "MaMH", "id");
    }
}
