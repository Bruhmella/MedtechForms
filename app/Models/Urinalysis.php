<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Urinalysis extends Model
{
    use HasFactory;

    protected $fillable = [
        'ReqBy', 'Date', 'OR', 'color', 'transparency', 'ph', 'gravity', 
        'rbc', 'wbc', 'SEC', 'Thread', 'bacteria', 'protein', 'glucose', 
        'ketones', 'pregnancy_test', 'au', 'ap', 'ua', 'co', 'tp', 
        'hyaline', 'granular', 'wbc2', 'rbc2', 'Medtech', 'Pathologist'
    ];

    protected $casts = [
        'ReqBy' => 'string',
        'Date' => 'date',
        'OR' => 'string',
        'color' => 'string',
        'transparency' => 'string',
        'ph' => 'string',
        'gravity' => 'string',
        'rbc' => 'string',
        'wbc' => 'string',
        'SEC' => 'string',
        'Thread' => 'string',
        'bacteria' => 'string',
        'protein' => 'string',
        'glucose' => 'string',
        'ketones' => 'string',
        'pregnancy_test' => 'string',
        'au' => 'string',
        'ap' => 'string',
        'ua' => 'string',
        'co' => 'string',
        'tp' => 'string',
        'hyaline' => 'string',
        'granular' => 'string',
        'wbc2' => 'string',
        'rbc2' => 'string',
        'Medtech' => 'string',
        'Pathologist' => 'string',
    ];
}
