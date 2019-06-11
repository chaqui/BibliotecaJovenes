<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Libro extends Model
{
    use SoftDeletes;

    public function solicitudes()
    {
        return $this->belongsToMany(User::class, 'solicitud');
    }
    public function imagenes()
    {
        return $this->hasMany(Imagen::class);
    }

    public function resenias()
    {
        return $this->hasMany(Resenia::class);
    }

    public function editorial()
    {
        return $this->belongsTo(Editorial::class);
    }

    public function autores()
    {
        return $this->belongsToMany(Autor::class,"libro_de_autor");
    }
}
