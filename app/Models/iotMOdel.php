<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class iotMOdel extends Model
{
    use HasFactory;

    protected $table = 'tabel_iot';
    protected $guarded = [];

    public function kandangmodel()
    {
        return $this->hasOne(kandangModel::class, 'mac');
    }
}
