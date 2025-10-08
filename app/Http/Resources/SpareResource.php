<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SpareResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
        'ID' => $this->id,
        'Customer_name' => $this->name,
        'Customer_phone' => $this->phone,
        'Customer_address' => $this->address,
        'Device_name' => $this->device,
        'Device_description' => $this->description,
        'Device_image' => $this->image,
        'Device_cost' => $this->cost,
        'Device_paid' => $this->paid,
        ];
    }
}
