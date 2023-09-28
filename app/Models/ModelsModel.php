<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelsModel extends Model
{
    use HasFactory;
    protected $table = "models";
    public $timestamps = true;
}
