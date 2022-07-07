<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class panenModel extends Model
{
    use HasFactory;
    protected $table = 'panen';
    protected $guarded = ['id'];

    
}
