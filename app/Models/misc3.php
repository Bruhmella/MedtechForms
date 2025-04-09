<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Misc3 extends Model
{
    use HasFactory;

    // Define the table associated with the model (optional if following Laravel conventions)
    protected $table = 'misc3';

    // Define the fillable fields
    protected $fillable = [
        'OR',
        'Pname',
        'Page',
        'Psex',
        'Poc',
        'Reqby',
        'timec',
        'timer',
        'color',
        'viscocity',
        'volume',
        'motile',
        'nonmotile',
        'motilegrade',
        'normal',
        'abnormal',
        'Thead',
        'Ghead',
        'Phead',
        'Ctail',
        'Chead',
        'medtech',
        'pathologist'
    ];

    // Optionally, if you want to specify date formats (e.g., for `timec` and `timer`), you can do this:
    protected $dates = ['timec', 'timer'];

    // Optionally, if you want to add any accessors or mutators, define them here
}
