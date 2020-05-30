<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    protected $table= 'contacto';

    public $timestamps = false;


    protected $fillable = [
        'id_contacto', 'nombre', 'apellido', 'apodo', 'url', 'cumpleaños', 'direccion', 'telefono', 'foto', 'id_user'
    ];

    protected $primaryKey = 'id_contacto';
}
