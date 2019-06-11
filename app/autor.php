<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class autor extends Model
{
    use SoftDeletes;

    public function Libros()
    {
        return $this->belongsTo(Libro::class,"libro_de_autor");

    }
    
}
