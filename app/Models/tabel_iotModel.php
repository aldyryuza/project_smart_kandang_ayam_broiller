<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tabel_iotModel extends Model
{
    use HasFactory;
    protected $table = 'tabel_iot';
    protected $guarded = ['id'];
}
