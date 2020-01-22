<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubPreguntas extends Model
{
    protected $table='subpreguntas';

    protected $primaryKey= 'id';

    public $timestamps=false;

    protected $fillable=[
    	'Nombre',
    	'Categoria',
    	'pregunta_id'
    ];
}
