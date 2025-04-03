<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chemistry extends Model
{
    protected $fillable = [
    'Pname', 'Page', 'Psex', 'Poc', 'OR','Reqby',
    'glucose', 'urea_nitrogen', 'creatine', 'uric_acid',
    'total_cholesterol', 'triglyceride', 'hdl', 'ldl', 'vldl', 'ratio',
    'ast', 'alt', 'sodium', 'potassium', 'chloride', 'ionized_calcium',
    'protein', 'albumin', 'globulin', 'ag_ratio',
    'alkaline', 'bilirubin', 'b2', 'b1', 'others','remarks', 'medtech','pathologist'
];

}
