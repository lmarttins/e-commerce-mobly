<?php

namespace EcommerceMobly\Domains\Users\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Address
 * @package EcommerceMobly\Domains\Users\Models
 */
class Address extends Model
{
    protected $fillable = [
        'address',
        'neighborhood',
        'number',
        'complement',
        'city',
        'state'
    ];
}
