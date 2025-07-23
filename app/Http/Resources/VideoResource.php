<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VideoResource extends JsonResource
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
            'description' => $this->description,
            'image_poster' => asset( 'storage/'. $this->image_poster),
            'url' => $this->url,
            'status' => $this->status ? 'active' : 'inactive', // Convert boolean status to readable string
            'created_at' => $this->created_at->toDateTimeString(), // Optional: Format created_at
            'updated_at' => $this->updated_at->toDateTimeString(), // Optional: Format updated_at
        ];
    }
}
