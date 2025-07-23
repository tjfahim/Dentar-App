<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class JobResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'image' => $this->image ? asset('/' . $this->image) : null,
            'company_name' =>  $this->company_name, 
            'job_deadline' => Carbon::parse($this->job_deadline)
                    ->timezone('Asia/Dhaka')
                    ->format('d M Y'),
            'source_url' => $this->source_url,
            'status' => $this->status,
            'created_at' => Carbon::parse($this->created_at)
                    ->timezone('Asia/Dhaka')
                    ->format('d M, Y  h:i A'),
        ];
    }
}

