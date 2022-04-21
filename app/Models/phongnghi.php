<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phongnghi extends Model
{
    use HasFactory;
    protected $table = 'phong_nghi';
    public $timestamps = false;
    public $primaryKey = 'id_room';
    protected $guarded = ['id_room'];

    public function loaiphong(){
        return $this->belongsTo('App\Models\phongloai','id','id');
    }

    public function  getStatusNameAttribute()
    {
        if ($this->tinh_trang== 1) {
            return "đang dùng";
        } else if ($this->tinh_trang== 0){
            return "còn trống";
        }else if ($this->tinh_trang== 2){
            return "cần dọn dẹp ";
        }

    }
}
