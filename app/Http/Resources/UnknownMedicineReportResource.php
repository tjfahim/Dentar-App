<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UnknownMedicineReportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        $files = collect(json_decode($this->files))->map(function($item){
            return asset($item);
        });


        return [
            'title' => $this->title,
            'description' => $this->description,
            'files' => $files,
            'doctor' => new UserResource($this->doctor) ?? '',
        ];
    }
}
