<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UnknownMedicineResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // $files = $this->files ? json_decode($this->files, true) : [];


        // $output_file = [];
        // foreach($files as $file){
        //     array_push($output_file, asset($file));
        // }
        $files = json_decode($this->files);

        if(getType($files) == 'string'){
            $files = [];
        }



        $output_file = array_map(function($item){
            return asset($item);
        },  $files);

        return [
            'title' => $this->title,
            'description' => $this->description,
            'files' => $output_file ,
            'user' => new UserResource($this->patient) ?? new UserResource($this->student),
            'report' =>  UnknownMedicineReportResource::collection($this->report)
        ];
    }
}
