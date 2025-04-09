<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class misc4 extends Model
{
	protected $table = 'misc4';

    protected $fillable = [
    'Pname', 'Page', 'Psex', 'Poc', 'OR','Reqby','exam','specimen','result', 'medtech','pathologist'
];
}
