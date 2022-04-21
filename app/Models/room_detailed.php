<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class room_detailed extends Model
{
    use HasFactory;
    protected $table = 'room_detailed';
    public $timestamps = false;
    public $primaryKey = 'id_room_detailed';
    protected $guarded = ['id_room_detailed'];
}
