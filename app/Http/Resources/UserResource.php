<?php

namespace App\Http\Resources;

use App\Models\District;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return [
        //     'id' => $this->id,
        //     'name' => $this->name,
        //     'email' => $this->email,
        //     'phone' => $this->phone,
        //     'userType' => $this->userType,
        //     'specialization' => $this->specialization,
        //     'hospital' => $this->hospital,
        //     'gender' => $this->gender,
        //     'biography' => $this->biography,
        //     'dob' => $this->dob,
        //     'degree' => $this->degree,
        //     'image' => $this->image ? asset($this->image) : null,
        //     'signature' => $this->signature ?  asset( $this->signature) : null,
        //     'role' => $this->role,
        //     'address' => $this->address,
        //     'bmdc_number' => $this->bmdc_number,
        //     'bmdc_type' => $this->bmdc_type,
        //     'nextPatient' => $this->nextPatient,
        //     'organization' => $this->organization,
        //     'occupation' => $this->occupation,
        //                 'notification_play' => $this->notification_play,

        //     'created_at' => $this->created_at,
        //     'updated_at' => $this->updated_at,
        //     'deleted_at' => $this->deleted_at,
        // ];

        $userType = $this->userType;
        
        // 
        $userLocation = $this->address;
        // if(preg_match("/^\d+$/",$userLocation)){
        //     $userLocation = District::find($userLocation)?->name;
        // }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'userType' => $this->userType,
            'image' => $this->image ? asset($this->image) : null,
            'address' => $this->address,
            'dob' => $this->dob,
            'gender' => $this->gender,
'organization' => in_array($userType, ['doctor', 'student']) ? $this->organization : null,

            // Doctor-specific fields
            'specialization' => $userType === 'doctor' ? $this->specialization : null,
            'signature' => $userType === 'doctor' && $this->signature ? asset($this->signature) : null,
            'hospital' => $userType === 'doctor' ? $this->hospital : null,
            'biography' => $userType === 'doctor' ? $this->biography : null,
            'degree' => $userType === 'doctor' ? $this->degree : null,
            'bmdc_number' => $userType === 'doctor' ? $this->bmdc_number : null,
            'bmdc_type' => $userType === 'doctor' ? $this->bmdc_type : null,
            'occupation' => $userType === 'doctor' ? $this->occupation : null,

            // Student-specific fields
            'university' => $userType === 'student' ? $this->university : null,
            'year' => $userType === 'student' ? $this->year : null,
            'specialization_student' => $userType === 'student' ? $this->specialization : null,
            'medical_history' => in_array($userType, ['student', 'patient']) ? $this->medical_history : null,
            'additional_info' => $userType === 'student' ? $this->additional_info : null,
            'bio' => $userType === 'student' ? $this->bio : null,

            // Patient-specific fields
            'medical_history_patient' => $userType === 'patient' ? $this->medical_history : null,


            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
