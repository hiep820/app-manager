<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dich_vu extends Model
{
    use HasFactory;
    protected $table = 'dich_vu';
    public $timestamps = false;
    public $primaryKey = 'id_dv';
}
