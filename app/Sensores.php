<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensores extends Model
{
	protected $table = 'sensor';
	protected $fillable = [
	'nome', 'tipo'
	];
}
