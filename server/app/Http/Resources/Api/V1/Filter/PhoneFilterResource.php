<?php

namespace App\Http\Resources\Api\V1\Filter;

use App\Enum\CountriesEnum;
use App\Enum\StateEnum;
use Illuminate\Http\Resources\Json\JsonResource;

class PhoneFilterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "data" => [
                "state" => StateEnum::getConstatnts(),
                "countries" => CountriesEnum::getConstatnts()
            ]
        ];
    }
}
