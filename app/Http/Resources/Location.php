<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Location extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'type' => $this->type,
            'barangay_number' => $this->barangay_number,
            'district_number' => $this->district_number,
            'district_name' => $this->district_name,
            'zip_code' => $this->zip_code,
        ];
    }
}
