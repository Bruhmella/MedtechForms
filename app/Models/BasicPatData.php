<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // ✅ Import SoftDeletes

class BasicPatData extends Model
{
    use HasFactory, SoftDeletes; // ✅ Use SoftDeletes

    protected $table = 'patients'; 
    protected $fillable = ['Pname', 'Page', 'Psex', 'Poc', 'Por'];
    protected $dates = ['deleted_at']; // ✅ Ensure the deleted_at column is recognized
}
