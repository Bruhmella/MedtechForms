<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fecalysis extends Model
{
        use HasFactory;

protected $table = 'fecalyses';

    protected $fillable = [
        'Pname', 'Page', 'Psex', 'Poc', 'OR','date',
        'color', 'consistency', 'occult_blood', 'sudan_stain',
        'bacteria', 'yeast', 'fat_globules', 'others',
        'medtech','mtlicno', 'pathologist','ptlicno', 'wbc', 'rbc'
    ];
}



