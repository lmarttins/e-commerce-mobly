<?php

namespace EcommerceMobly\Domains\Products\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];
}
