<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MilitaryBase extends Model
{
    use HasFactory;

    function location() {
        return $this->belongsTo(Location::class);
    }
}
