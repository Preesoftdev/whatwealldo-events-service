<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventTaskResource extends JsonResource
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
            'event_id' => $this->event_id,
            'task_name' => $this->task_name,
            'sequence' => $this->sequence,
            'start_time' => $this->start_time,
            'finish_time' => $this->finish_time,
            'responsible' => $this->responsible,
            'priority' => $this->priority,
            'resources' => $this->resources,
            'upload' => $this->upload,
            'note' => $this->note,
            'status_update' => $this->status_update,
            'assigned_users' => $this->whenLoaded('assignedUsers', function () {
                return $this->assignedUsers->pluck('id'); // Return user IDs assigned to the task
            }),
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    
    }
}
