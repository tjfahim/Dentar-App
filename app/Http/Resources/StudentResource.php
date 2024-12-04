<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
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
            'email' => $this->email,
            'phone' => $this->phone,
            'image' => $this->image ? asset('storage/' . $this->image) : null,  // Full image URL
            'address' => $this->address,
            'dob' => $this->dob,
            'gender' => $this->gender,
            'university' => $this->university,
            'year' => $this->year,
            'specialization' => $this->specialization,
            'medical_history' => $this->medical_history,
            'additional_info' => $this->additional_info,
            'bio' => $this->bio,
        ];
    }
}
