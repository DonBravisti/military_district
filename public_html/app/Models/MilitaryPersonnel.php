<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MilitaryPersonnel extends Model
{
    use HasFactory;

    protected $table = 'military_personnel';

    protected $fillable = [
        'surname',
        'name',
        'patronimyc',
        'rank_id',
        'speciality_id'
    ];
}
