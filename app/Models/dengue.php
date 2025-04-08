<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class dengue extends Model
{
	protected $table = 'dengue';

    protected $fillable = [
    'Pname', 'Page', 'Psex', 'Poc', 'OR','Reqby','kit1','kit2','lotno1','lotno2', 'result1', 'result2','result3', 'medtech','pathologist'
];
}
