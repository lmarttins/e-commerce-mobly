<?php

namespace EcommerceMobly\Domains\Products\Models\Traits;

use EcommerceMobly\Domains\Users\Models\Address;
use EcommerceMobly\Domains\Products\Models\Product;
use EcommerceMobly\Domains\Users\Models\User;

/**
 * Trait OrderRelationship
 * @package EcommerceMobly\Domains\Products\Models\Traits
 */
trait OrderRelationship
{
    /**
     * Has-Many relations with Product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    /**
     * Belongs to relations with User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Belongs to relations with Address.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}