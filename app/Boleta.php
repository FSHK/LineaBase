<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boleta extends Model
{
    protected $table='boletas';

    protected $primaryKey= 'id';

    public $timestamps=false;

    protected $fillable=[
    	'Nombre',
    	'Encuesta_Id'
    ];
}
