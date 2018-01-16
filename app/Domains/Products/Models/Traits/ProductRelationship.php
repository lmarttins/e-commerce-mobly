<?php

namespace EcommerceMobly\Domains\Products\Models\Traits;

use EcommerceMobly\Domains\Files\Models\File;
use EcommerceMobly\Domains\Products\Models\Category;
use EcommerceMobly\Domains\Products\Models\Characteristic;

/**
 * Trait ProductRelationship
 * @package EcommerceMobly\Domains\Products\Models\Traits
 */
trait ProductRelationship
{
    /**
     * Many-to-Many relations with File.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function image()
    {
        return $this->hasOne(File::class);
    }

    /**
     * Many-to-Many relations with Category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * Many-to-Many relations with Characteristic.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function characteristics()
    {
        return $this->belongsToMany(Characteristic::class);
    }
}