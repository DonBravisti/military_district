<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    use HasFactory;

    function militaryPersonnel()
    {
        return $this->hasMany(MilitaryPersonnel::class);
    }

    public function rankType()
    {
        return $this->belongsTo(RankType::class);
    }
}
