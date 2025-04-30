<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rbs extends Model
{
     protected $fillable = [
    'Pname', 'Page', 'Psex', 'Poc', 'OR','Reqby','date',
    'result', 'result2', 'medtech','mtlicno','pathologist','ptlicno'
];
}
