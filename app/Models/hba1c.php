<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class hba1c extends Model
{
	protected $table = 'hba1c';

   protected $fillable = [
    'Pname', 'Page', 'Psex', 'Poc', 'OR', 'Reqby','date',
    'test', 'result', 'unit','medtech','mtlicno',
     'pathologist','ptlicno',
];
}
