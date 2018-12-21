<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class indiscipline extends Model
{
   
    protected $fillable = [
        'admission_number', 'case_status', 'complexity',
        'case_statement', 
    ];

    public function studentReg()
{
    return $this->belongsTo(studentReg::class);
}
}
