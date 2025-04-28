<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hematology extends Model
{
    use HasFactory;

    protected $fillable = [
        'Pname', 'Page', 'Psex', 'Poc', 'OR', 'date','Reqby','hemogoblin', 'hematocrit', 'rbc', 'wbc',
        'segmenters', 'band', 'lymphocyte', 'Monocyte', 'Eosinophil', 'Basophil', 
        'Metamyelocyte', 'Myelocyte', 'Blast_Cell', 'platelet', 'Reticulocyte', 
        'BLOOD_TYPING', 'rh_factor', 'esr', 'clotting_time', 'bleeding_time', 
        'medtech', 'mtlicno', 'pathologist','ptlicno'
    ];
}
