<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PrescriptionAssistReplayResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        $files = $this->files_url ? json_decode($this->files_url, true) : [];
        $output_files = array_map(fn($file) => asset($file), $files);

        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'files' => $output_files, 
            'doctor' => new UserResource($this->whenLoaded('doctor')),
            'prescription_assist_id' => $this->prescription_assist_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
