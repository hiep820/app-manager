<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phongloai extends Model
{
    use HasFactory;
    protected $table = 'phongloai';
    public $primaryKey = 'id';
    protected $guarded = ['id'];
    public $timestamps = false;
}
