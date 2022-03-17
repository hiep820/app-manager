<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    use HasFactory;
    protected $table = 'user';
    public $timestamps = false;
    public $primaryKey= 'id';
    protected $guarded = ['id'];


    public function getQuyenNameAttribute()
    {
        if ($this->quyen == 1) {
            return "quản lý";
        } else {
            return "nhân viên";
        }
    }
}
