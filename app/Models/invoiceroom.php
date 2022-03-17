<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoiceroom extends Model
{
    use HasFactory;
    protected $table = 'hoa_don_dv';
    public $timestamps = false;
    public $primaryKey = 'id_hddv';
}
