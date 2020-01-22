<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competencias extends Model
{
    protected $table='competencias';

    protected $primaryKey= 'id';

    public $timestamps=false;

    protected $fillable=[
    	'Nombre',
    	'Descripcion',
    	'linea_id'
    ];
}
