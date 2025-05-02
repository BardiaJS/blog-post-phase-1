<?php

namespace App\Http\Resources\Follow;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FollowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'user_id' => $this->user_id,
            'user_followed_id' => $this->user_followed_id
        ];
    }
}
