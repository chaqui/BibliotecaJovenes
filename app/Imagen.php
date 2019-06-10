<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class imagen extends Model
{
    use SoftDeletes;

    public function Libro()
    {
        return $this->belongsTo(Libro::class);
    }
}
