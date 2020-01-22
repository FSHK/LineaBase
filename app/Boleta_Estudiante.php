<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boleta_Estudiante extends Model
{
    protected $table='estudiante_boleta';
    protected $primaryKey= 'id';
    public $timestamps=false;
    protected $fillable=[
    	'estudiante_id',
    	'boleta_id'
    ];
}
