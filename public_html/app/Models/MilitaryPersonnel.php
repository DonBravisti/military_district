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

    function getFioAttribute() {
        return "{$this->surname} {$this->name} {$this->patronimyc}";
    }

    function rank() {
        return $this->belongsTo(Rank::class);
    }

    function speciality() {
        return $this->belongsTo(Speciality::class);
    }
}
