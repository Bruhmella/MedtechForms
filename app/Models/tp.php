<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tp extends Model
{
	protected $table = 'tp';

    protected $fillable = [
    'Pname', 'Page', 'Psex', 'Poc', 'OR','Reqby','kit1','lotno1', 'result1', 'medtech','pathologist'
];
}
