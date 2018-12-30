<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class studentReg extends Model
{
    use HasApiTokens, Notifiable;
    protected $fillable = [
        'fname', 'sname', 'lname',
        'start_year', 'gender', 'country',
        'county', 'admission_level', 'kcpe_marks',
        'parent_name', 'parent_mobile', 'parent_email',
        'date_of_birth', 'Birth_cert_no', 'disabled',
    ];

    public function indisciplines()
{
    return $this->hasMany(indiscipline::class);
}
}
