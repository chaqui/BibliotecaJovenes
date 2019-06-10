<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class editorial extends Model
{
    use SoftDeletes;

    public function libros()
    {
        return $this->hasMany(Libro::class);
    }
}
