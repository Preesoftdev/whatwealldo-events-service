<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PendingTicketResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'event' => [
                'id' => $this->event->id,
                'title' => $this->event->name,
                'date' => $this->event->date,
                'venue' => $this->event->location,
            ],
            'ticket' => [
                'id' => $this->ticket->id,
                'type' => $this->ticket->ticket_type,
                'price' => $this->ticket->price,
                'quantity' => $this->ticket->quantity,
            ],
            'buyer_email' => $this->buyer_email,
            'ticket_code' => $this->ticket_code,
            'status' => $this->status,
            'purchase_link' => url("/ticket-purchase/{$this->ticket_code}"),
        ];
    }
}

