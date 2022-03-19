<?php

namespace App\Http\Resources\Api\V1\Phone;

use App\Services\PhoneNumberParser;
use Illuminate\Http\Resources\Json\JsonResource;

class PhoneResource extends JsonResource
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
            "id" => $this['id'],
            "country" => $this['country'],
            "state" => $this['state'],
            "code" => $this['code'],
            "phone" => $this['phone'],
        ];
    }
}
