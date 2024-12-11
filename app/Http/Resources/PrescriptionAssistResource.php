<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PrescriptionAssistResource extends JsonResource
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
            'title' => $this->title,
            'image' => $this->image,
            'description' => $this->description,
            'is_read' => $this->is_read,
            'user' => new UserResource($this->patient) ?? new UserResource($this->student) ?? new  UserResource($this->doctor),  // Include the associated user data
            'userType' => $this->userType,
            'replay_user' => $this->replayDoctor  ?? null, // Include replay user data if available
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
