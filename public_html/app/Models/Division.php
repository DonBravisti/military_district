<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;

    public function corpus()
    {
        return $this->belongsTo(Corpus::class);
    }

    public function brigades()
    {
        return $this->hasMany(Brigade::class);
    }
}
