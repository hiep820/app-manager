<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hoa_don_ct extends Model
{
    use HasFactory;
    protected $table = 'hoa_don_ct';
    public $timestamps = false;
    public $primaryKey = 'id_hdct';
}
