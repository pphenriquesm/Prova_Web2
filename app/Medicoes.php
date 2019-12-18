<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicoes extends Model
{
    protected $fillable = [
		'valor', 'data_horario'
    ];
}
