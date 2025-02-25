<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'name' => $this->name,
            'event_type' => $this->event_type,
            'date' => $this->date,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'location' => $this->location,
            'people_capacity' => $this->people_capacity,
            'description' => $this->description,
            'publish' =>(bool) $this->publish,
            'link' => url('/events/' . $this->link), // Full event link
            'attendees' => $this->whenLoaded('attendees', function () {
                return $this->attendees->pluck('id'); // Returns an array of user IDs attending the event
            }),
            'images' => MediaResource::collection($this->getMedia('event_attachments')),
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
