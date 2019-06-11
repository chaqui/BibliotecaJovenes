<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Autor extends Model
{
    use SoftDeletes;

    public function Libros()
    {
        return $this->belongsToMany(Libro::class,"libro_de_autor");

    }
}
