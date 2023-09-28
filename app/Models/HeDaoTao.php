<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeDaoTao extends Model
{
    use HasFactory;
    protected $table = "he_dao_taos";
    public $timestamps = true;
    
    public function lops()
    {
        return $this->hasMany(Lops::class, "MaHeDT_ID", "id");
    }
}
