<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CaseResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'age' => $this->age,
            'number' => $this->number,
            'gender' => $this->gender,
            'image_url' => $this->image ? asset('patient_images/' . $this->image) : null, // Full URL for the image
            'problem' => $this->problem,
            'created_at' => $this->created_at->toDateTimeString(), // Format timestamp
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
