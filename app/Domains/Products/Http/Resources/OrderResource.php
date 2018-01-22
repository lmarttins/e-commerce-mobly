<?php

namespace EcommerceMobly\Domains\Products\Http\Resources;

use EcommerceMobly\Domains\Users\Http\Resources\AddressResource;
use EcommerceMobly\Domains\Users\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\Resource;

class OrderResource extends Resource
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
            'id'      => $this->id,
            'total'   => $this->total,
            'user'    => new UserResource($this->user),
            'address' => new AddressResource($this->address)
        ];
    }
}
