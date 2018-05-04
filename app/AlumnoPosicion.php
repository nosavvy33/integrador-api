<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlumnoPosicion extends Model
{
    protected $table = 'alumno_posicion';
    protected $primaryKey = 'idalumno_posicion';
    public $timestamps = false; 
}
