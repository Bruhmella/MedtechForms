<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class hav extends Model
{
	protected $table = 'hav';

    protected $fillable = [
    'Pname', 'Page', 'Psex', 'Poc', 'OR','Reqby','kit1','lotno1', 'result1', 'medtech','mtlicno','pathologist','ptlicno'
];
}
