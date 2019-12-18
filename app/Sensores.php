<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensores extends Model
{
	protected $fillable = [
	'nome', 'tipo'
	];
}
