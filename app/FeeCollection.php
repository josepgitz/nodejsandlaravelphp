<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeeCollection extends Model
{
   
    protected $fillable = [
        'Admission_number', 'Amount', 'year',
        'term', 'class', 
    ];
}
