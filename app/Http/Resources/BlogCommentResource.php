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
        $user = null;
         switch($this->user_type){
            case 'patient':
                $user = $this->patient;
            case 'student':
                 $user = $this->student;
            case 'doctor' :
                 $user = $this->doctor;
        }
        // $user = $this->patient ?: ($this->doctor ?: ($this->student ?: null));
        return [
            'id' => $this->id,
            'comment' => $this->comment,
            'user' => $user ? new BlogUserResource($user) : null,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'replay' => count($this->replay) ? BlogCommentResource::collection($this->replay) : ''
        ];
    }
}
