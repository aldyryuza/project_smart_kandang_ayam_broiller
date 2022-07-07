<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kandangModel extends Model
{
    use HasFactory;
    protected $table = 'master_kandang';
    protected $guarded = ['id'];

    public function iotModel()
    {
        return $this->belongsTo(iotMOdel::class, 'mac');
    }

    public function rekapHarianModel()
    {
        return $this->hasMany(rekapHarianModel::class, 'id_kandang');
    }
}
