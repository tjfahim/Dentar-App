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
            'id' => $this->id,
            'name' => $this->name,
            'age' => $this->age,
            'gender' => $this->gender,
            'number' => $this->number,
            'image' => $this->image ? asset($this->image) : '',
            'problem' => $this->problem,
            'problem_title' => $this->problem_title,
            'doctor' => new UserResource($this->doctor),
            // 'patient' => new UserResource($this->patient) ??  new UserResource($this->student),
            'prescription' =>   PrescriptionResource::collection($this->prescription)
        ];
    }
}
