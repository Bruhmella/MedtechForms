<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rat extends Model
{
	protected $table = 'rat';

    protected $fillable = [
    'Pname', 'Page', 'Psex', 'Poc', 'OR','Reqby','specimen','result','result2', 'medtech','pathologist'
];
}
