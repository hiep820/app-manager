<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hoa_don extends Model
{
    use HasFactory;
    protected $table = 'hoa_don';
    public $timestamps = false;
    public $primaryKey= 'id_hd';

    public function getThanhToanNameAttribute()
    {
        if ($this->thanh_toan == 1) {
            return "Đã thanh Toán";
        } else {
            return "Chưa thanh toán";
        }
    }
}
