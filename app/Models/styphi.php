<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class styphi extends Model
{
	protected $table = 'styphi';

    protected $fillable = [
    'Pname', 'Page', 'Psex', 'Poc', 'OR','Reqby','kit','lotno', 'result1', 'result2', 'medtech','pathologist'
];
}
