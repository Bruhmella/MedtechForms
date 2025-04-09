<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class misc5 extends Model
{
	protected $table = 'misc5';

    protected $fillable = [
    'Pname', 'Page', 'Psex', 'Poc', 'OR','Reqby','exam','kit','lotno','result', 'medtech','pathologist'
];
}
