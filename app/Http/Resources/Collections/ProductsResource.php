<?php

namespace App\Http\Resources\Collections;

use App\Http\Resources\SingleProductResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductsResource extends ResourceCollection
{
    public $collects = SingleProductResource::class;

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'status' => 'success',
            'data' => [
                'products' => $this->collection
            ]
        ];
    }
}
