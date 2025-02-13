<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubEventResource extends JsonResource
{
    
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'event_id' => $this->event_id,
            'sub_event_name' => $this->sub_event_name,
            'date' => $this->date,
            'start_time' => $this->start_time,
            'finish_time' => $this->finish_time,
            'dress_code' => $this->dress_code,
            'color_theme' => $this->color_theme,
            'location' => $this->location,
            'description' => $this->description,
            'note' => $this->note,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
