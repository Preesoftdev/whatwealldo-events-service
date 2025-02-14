<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PeopleGroupResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'group_owner' => $this->user_id,
            'name' => $this->name,
            'privacy' => $this->privacy,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'members' => $this->members->map(function ($user) {
                return [
                    'id' => $user->user_id,
                ];
            }),
        ];
    }
}
