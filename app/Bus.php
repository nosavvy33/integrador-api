<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    protected $table = 'bus' ;
    public $primaryKey = 'idbus';
    public $timestamps = false;
}
