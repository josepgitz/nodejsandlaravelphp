<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class classDefinition extends Model
{

    protected $fillable = [
        'Class', 'stream', 'year',
    ];
}
