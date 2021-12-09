<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Climate extends JsonResource
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
            'city_name'     => $this->city_name,
            'state_code'    => $this->state_code,
            'country_code'  => $this->country_code,
            'temp'          => $this->temp,
            'temp_min'      => $this->temp_min,
            'temp_max'      => $this->temp_max,
            "cod"           => 200
        ];
    }
}
