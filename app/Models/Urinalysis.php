<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class urinalysis extends Model
{
	protected $table = 'urinalysis';

    protected $fillable = [
    'Pname', 'Page', 'Psex', 'Poc', 'date', 'OR','Reqby','color','transparency','ph','gravity','protein','glucose','ketones','bilirubin','pregnancy','others','rbc','wbc','sec','mucus','bacteria','au','ap','ua','co','tp', 'hyaline','granular','wbc2','rbc2', 'medtech','mtlicno','pathologist','ptlicno'
];
}
