<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $table = 'accounts';

    protected $fillable = ['fname', 'lname', 'Pos', 'LicNo', 'email', 'pword']; // ✅ Include "Pos"
}

