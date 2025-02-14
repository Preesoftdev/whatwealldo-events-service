<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ticket\EventTicketRequest;
use App\Http\Requests\Ticket\UpdateTicketRequest;
use App\Http\Resources\EventTicketResource;
use App\Models\EventTicket;
use App\Traits\ResponseMethodTrait;
use App\Models\Event;
use Illuminate\Http\Request;

class EventTicketController extends Controller
{
    use ResponseMethodTrait;
    public function index($eventId)
    {
   
        $event = Event::with('tickets')->findOrFail($eventId);

        if ($event->tickets->isEmpty()) {
            return $this->sendResponse([], 'No tickets Found for This Event.');
        }

        return $this->sendResponse(EventTicketResource::collection($event->tickets), 'Event Tickets Retrieved Successfully');
    }

    public function store(EventTicketRequest $request,Event $event)
    {
        $ticket = EventTicket::create([
            'event_id' => $event->id,
            'ticket_type' => $request->ticket_type,
            'name' => $request->name,
            'price' => $request->price ?? null,
            'quantity' => $request->quantity ?? null,
            'sale_end_date' => $request->sale_end_date ?? null,
            'sale_status' => $request->sale_status ?? 'active',
        ]);

        return $this->sendResponse(new EventTicketResource($ticket), 'Ticket Created Successfully');
    }
    public function update(UpdateTicketRequest $request,Event $event ,EventTicket $ticket)
    {
        
        $ticket->update([
            'event_id' => $event->id,
            'ticket_type' => $request->ticket_type,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'sale_end_date' => $request->sale_end_date,
            'sale_status' => $request->sale_status,
            'sale_end_date' => $request->sale_end_date ?? null,
            'sale_status' => $request->sale_status ?? 'active',
        ]);
        
        return $this->sendResponse(new EventTicketResource($ticket), 'Event Ticket Updated Successfully');
    }

    /**
     * Delete a ticket.
     */
    public function destroy(Event $event, EventTicket $ticket)
    { 
        $ticket->delete();
        return response()->json(['message' => 'Ticket Deleted Successfully'], 200);       
    }
}
