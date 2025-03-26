<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fecalysis extends Model
{
        use HasFactory;

    protected $fillable = [
        'Pname', 'Page', 'Psex', 'Poc',
        'color', 'consistency', 'occult_blood', 'sudan_stain',
        'bacteria', 'yeast', 'fat_globules', 'others',
        'medtech', 'pathologist', 'wbc', 'rbc'
    ];
}



