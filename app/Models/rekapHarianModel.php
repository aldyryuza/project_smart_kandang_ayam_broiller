<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class rekapHarianModel extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'rekap_harian';
    protected $guarded = ['id'];

    public function kandang()
    {
        return $this->belongsTo(kandangModel::class, 'id_kandang');
    }
}
