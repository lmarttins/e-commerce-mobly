<?php

namespace EcommerceMobly\Domains\Products\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ProductResource extends Resource
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
            'id'          => $this->id,
            'name'        => $this->name,
            'description' => $this->description,
            'price'       => $this->price,
            'image'       => env('APP_URL') . '/images/' . $this->image,
            'amount'      => 0,
            'stock'       => 30,
            'total'       => 0
        ];
    }
}
