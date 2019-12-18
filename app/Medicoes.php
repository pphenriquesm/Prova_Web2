<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicoes extends Model
{
	protected $table = 'medicao';
	
    protected $fillable = [
		'sensor_id','valor', 'data_horario'
    ];
}
