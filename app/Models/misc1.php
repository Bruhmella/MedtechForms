<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class misc1 extends Model
{
	protected $table = 'misc1';

    protected $fillable = [
    'Pname', 'Page', 'Psex', 'Poc', 'OR','Reqby','kit1','kit2','kit3','lotno1','lotno2','lotno3', 'result1', 'result2','result3', 'medtech','pathologist'
];
}
