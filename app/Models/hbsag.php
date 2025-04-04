<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class hbsag extends Model
{
	protected $table = 'hbsag';

    protected $fillable = [
    'Pname', 'Page', 'Psex', 'Poc', 'OR','Reqby',
    'exam','kit', 'lotno', 'result', 'medtech','pathologist'
];
}
