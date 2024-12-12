<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AntibioticResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->discription,
            'file' => $this->file ? asset($this->file) : ''
        ];

    }
}
