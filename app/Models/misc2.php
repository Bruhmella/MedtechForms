<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class misc2 extends Model
{
	protected $table = 'misc2';

    protected $fillable = [
    'Pname', 'Page', 'Psex', 'Poc', 'OR','Reqby','exam','specimen','result', 'medtech','pathologist'
];
}
