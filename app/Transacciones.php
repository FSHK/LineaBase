<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transacciones extends Model
{
    protected $table='transacciones';

    protected $primaryKey= 'id';

    public $timestamps=false;

    protected $fillable=[
    	'estudiante_id',
    	'respuesta_id',
    	'tema_id',
    	'pregunta_id',
    	'valoracion'
    ];
}
