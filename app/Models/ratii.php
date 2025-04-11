<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ratii extends Model
{
	protected $table = 'ratii';

    protected $fillable = [
    'Pname', 'Page', 'Psex', 'Poc', 'OR','Reqby','specimen','result','result2','method', 'medtech','pathologist'
];
}
