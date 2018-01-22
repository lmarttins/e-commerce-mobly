<?php

namespace EcommerceMobly\Domains\Users\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class UserResource extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'         => $this->id,
            'last_name'  => $this->last_name,
            'first_name' => $this->first_name
        ];
    }
}
