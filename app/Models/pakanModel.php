<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pakanModel extends Model
{
    use HasFactory;
    protected $table = 'master_pakan';
    protected $guarded = ['id'];

    public function pakan()
    {
        return $this->hasMany(pakanModel::class, 'id_pakan');
    }
}
