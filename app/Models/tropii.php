<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tropii extends Model
{
	protected $table = 'tropii';

    protected $fillable = [
    'Pname', 'Page', 'Psex', 'Poc', 'OR','Reqby',
    'exam','kit','lotno', 'result', 'medtech','pathologist'
];
}
