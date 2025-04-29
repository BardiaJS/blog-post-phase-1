<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'displayName' => $this->display_name,
            'firstName'=> $this->first_name,
            'lastName' => $this->last_name,
            'gamil'=>$this->gmail,
            'phoneNumber'=>$this->phone_number,
            'age' => $this->age,
            'bio' => $this->bio
        ];
    }
}
