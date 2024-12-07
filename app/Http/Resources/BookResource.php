<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'image' => $this->image ? asset($this->image) : null, // Convert image path to full URL
            'pdf' => $this->pdf ? asset($this->pdf) : null,       // Convert PDF path to full URL
            'status' => $this->status,
            'book_type' => $this->book_type,
            'created_at' => $this->created_at->toDateTimeString(), // Format creation date
            'updated_at' => $this->updated_at->toDateTimeString(), // Format update date
        ];
    }
}
