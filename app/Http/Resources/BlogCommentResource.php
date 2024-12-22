<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogCommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'comment' => $this->comment,
            'user' => new BlogUserResource($this->patient) ?? new BlogUserResource($this->doctor) ?? new BlogUserResource($this->student),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'replay' => count($this->replay) ? BlogCommentResource::collection($this->replay) : ''
        ];
    }
}
