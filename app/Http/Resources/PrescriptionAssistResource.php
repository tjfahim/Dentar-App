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

        $output_file = [];

        if (!empty($this->image) && is_string($this->image)) {
            $files = json_decode($this->image, true);

            if (is_array($files)) {
                foreach ($files as $file) {
                    array_push($output_file, asset($file));
                }
            }
        }

        if(count($output_file) == 0){
            $output_file = "";
        }



        return [
            'id' => $this->id,
            'title' => $this->title,
            'image' =>  $output_file ?? '',
            'description' => $this->description,
            'is_read' => $this->is_read,
            'user' => new UserResource($this->patient) ?? new UserResource($this->student) ?? new  UserResource($this->doctor),  // Include the associated user data
            'reports' =>  PrescriptionAssistReplayResource::collection( $this->reports ),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
