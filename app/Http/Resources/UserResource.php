<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'userType' => $this->userType,
            'specialization' => $this->specialization,
            'hospital' => $this->hospital,
            'gender' => $this->gender,
            'biography' => $this->biography,
            'dob' => $this->dob,
            'degree' => $this->degree,
            'image' => $this->image,
            'signature' => $this->signature,
            'role' => $this->role,
            'address' => $this->address,
            'bmdc_number' => $this->bmdc_number,
            'bmdc_type' => $this->bmdc_type,
            'nextPatient' => $this->nextPatient,
            'organization' => $this->organization,
            'occupation' => $this->occupation,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
