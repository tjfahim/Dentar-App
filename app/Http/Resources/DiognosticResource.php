<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DiognosticResource extends JsonResource
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
            'name' => $this->name,
            'age' => $this->age,
            'gender' => $this->gender,
            'number' => $this->number,
            'image' => $this->image,
            'problem' => $this->problem,
            'patient' => $this->patient_id,
            'doctor_id' => $this->doctor_id,
        ];
    }
}
