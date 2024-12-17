<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DiognosticResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $files = $this->file ? json_decode($this->file, true) : [];


        $output_file = ['mp_4' => [], 'mp_3' => [], 'image' => [], 'pdf' => []];

        foreach($files as $file){

            $start = null;
            for($i =0; $i<strlen($file); $i++){
                if($file[$i] == '.'){

                    $start = ++$i;
                }
            }

            $ext = substr($file, $start);


            switch($ext){
                case 'mp4':
                    $output_file['mp_4'][] = asset($file);
                    break;
                case 'mp3':
                    $output_file['mp_3'][] = asset($file);
                    break;
                case 'pdf':
                    $output_file['pdf'][] = asset($file);
                    break;
                case 'jpg':
                case 'png':
                case 'jpge':
                    $output_file['image'][] = asset($file);
                    break;
            }

        }


        return [
            'id' => $this->id,
            'name' => $this->name,
            'age' => $this->age,
            'gender' => $this->gender,
            'number' => $this->number,
            'file' => $output_file,
            'problem' => $this->problem,
            'problem_title' => $this->problem_title,
            'doctor' => new UserResource($this->doctor),
            // 'patient' => new UserResource($this->patient) ??  new UserResource($this->student),
            'prescription' =>   PrescriptionResource::collection($this->prescription)
        ];
    }
}
