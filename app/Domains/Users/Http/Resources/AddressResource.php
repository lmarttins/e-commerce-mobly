<?php

namespace EcommerceMobly\Domains\Users\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class AddressResource extends Resource
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
            'id'           => $this->id,
            'address'      => $this->address,
            'neighborhood' => $this->neighborhood,
            'number'       => $this->number,
            'city'         => $this->city,
            'state'        => $this->state
        ];
    }
}
