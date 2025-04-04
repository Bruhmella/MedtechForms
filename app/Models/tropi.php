<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tropi extends Model
{
	protected $table = 'tropi';

    protected $fillable = [
    'Pname', 'Page', 'Psex', 'Poc', 'OR','Reqby',
    'exam','kit', 'result', 'medtech','pathologist'
];
}
