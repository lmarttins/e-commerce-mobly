<?php

namespace EcommerceMobly\Domains\Products\Models;

use EcommerceMobly\Domains\Products\Models\Traits\ProductRelationship;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * @package EcommerceMobly\Domains\Products\Models
 */
class Product extends Model
{
    use ProductRelationship;

    protected $fillable = [
        'name',
        'description',
        'price',
    ];
}
