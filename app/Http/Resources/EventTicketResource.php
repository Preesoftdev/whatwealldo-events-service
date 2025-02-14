<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventTicketResource extends JsonResource
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
            'ticket_type' => $this->ticket_type,
            'name' => $this->name,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'sold' => $this->sold,
            'payment_status' => $this->payment_status,
            'sale_end_date' => $this->sale_end_date,
            'sale_status' => $this->sale_status,
            'available' => $this->quantity - $this->sold, // Available tickets
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
