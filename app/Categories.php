<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = [
        'catname', 'catcode', 'catdescription','catstatus'
    ];
}