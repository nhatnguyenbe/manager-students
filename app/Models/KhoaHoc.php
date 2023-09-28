<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhoaHoc extends Model
{
    use HasFactory;
    protected $table ="khoa_hocs";
    public $timestamps = true;

    public function lops()
    {
        return $this->hasMany(Lops::class, "MaKhoaHoc_ID", "id");
    }
}
