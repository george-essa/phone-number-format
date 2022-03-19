<?php

namespace App\Http\Resources\Api\V1\Phone;

use App\Http\Resources\Api\V1\Generic\PaginationResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PhoneCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "data" => PhoneResource::collection($this->collection),
            "paginate" => new PaginationResource($this)
        ];
    }
}
