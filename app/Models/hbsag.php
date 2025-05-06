<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class hbsag extends Model
{
	protected $table = 'hbsag';

    protected $fillable = [
    'Pname', 'Page', 'Psex', 'Poc','date', 'OR','Reqby',
    'exam','kit', 'lotno', 'result', 'medtech','mtlicno','pathologist','ptlicno'
];
}
