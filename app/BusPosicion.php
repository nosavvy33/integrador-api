<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusPosicion extends Model
{
    protected $table = 'bus_posicion' ;
    public $primaryKey = 'idbus_posicion';
    public $timestamps = false;
}
