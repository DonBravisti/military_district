<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Corpus extends Model
{
    use HasFactory;

    public function army()
    {
        return $this->belongsTo(Army::class);
    }

    public function divisions()
    {
        return $this->hasMany(Division::class);
    }
}
