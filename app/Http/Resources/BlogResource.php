<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
{
    // Safely decode the file JSON if it's a valid JSON string
    $files = $this->file ? json_decode($this->file, true) : [];


    $output_file = [];
    foreach($files as $file){
        array_push($output_file, asset($file));
    }


    return [
        'id' => $this->id,
        'title' => $this->title,
        'content' => $this->content,
        'user_type' => $this->user_type,
        'files' => $output_file, // Return the processed file data
        'created_at' => $this->created_at,
        'updated_at' => $this->updated_at,
        'user' => new UserResource($this->doctor_user)  ?? new UserResource($this->student_user)
    ];
}

}
