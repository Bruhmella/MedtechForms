<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class thyroid extends Model
{
    protected $table = 'thyroid';

    protected $fillable = [
    'Pname', 'Page', 'Psex', 'Poc', 'OR','Reqby',
    'tsh', 't3', 'psa', 'medtech','pathologist'
];
}
