<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GlobalC extends Model
{
    protected $table = 'global_data';
    protected $fillable = [
        'name',
        'data'
    ];
    //
}
