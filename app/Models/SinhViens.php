<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SinhViens extends Model
{
    use HasFactory;
    protected $table = "sinh_viens";
    public $timestamps = true;

    public function lop()
    {
        return $this->belongsTo(Lops::class, "MaLop_ID", "id");
    }

    public function diems()
    {
        return $this->hasMany(Diems::class, "MaSV", "id");
    }

    public function diemdanhs()
    {
        return $this->hasMany(DiemDanh::class, "MaSV", "id");
    }
}