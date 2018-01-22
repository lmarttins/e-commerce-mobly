<?php

namespace EcommerceMobly\Domains\Products\Models;

use EcommerceMobly\Domains\Products\Models\Traits\OrderRelationship;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 * @package EcommerceMobly\Domains\Products\Models
 */
class Order extends Model
{
    use OrderRelationship;

    protected $fillable = [
        'user_id',
        'total'
    ];
}
