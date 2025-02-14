<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ticket\BulkTicketRequest;
use App\Http\Resources\PendingTicketResource;
use App\Models\Event;
use App\Models\EventTicket;
use App\Models\PendingTicket;
use App\Traits\ResponseMethodTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PendingTicketController extends Controller
{
    use ResponseMethodTrait;
    public function index()
    {
        $response = PendingTicketResource::collection(PendingTicket::with('event', 'ticket')->get());
        return $this->sendResponse($response, 'Pending Ticket Retrieved Successfully'); 
    }
    public function generateBulkTickets(BulkTicketRequest $request, Event $event)
    {
       
        $ticket = EventTicket::findOrFail($request->ticket_id);
      
        $ticketCount = count($request->emails);

        if ($ticket->quantity < $ticketCount) {
            return response()->json(['error' => 'Not enough tickets available'], 400);
        }

      
        $pendingTickets = [];

        foreach ($request->emails as $email) {
            $ticketCode = Str::uuid(); // Generate unique ticket code

            $pendingTicket = PendingTicket::create([
                'event_id' => $event->id,
                'ticket_id' => $request->ticket_id,
                'buyer_email' => $email,
                'ticket_code' => $ticketCode,
                'status' => 'pending'
            ]);

            // Generate Ticket Purchase Link
            $ticketLink = url("/ticket-purchase/{$ticketCode}");

            // Send email
       //     Mail::to($email)->send(new TicketGenerated($event, $pendingTicket, $ticketLink));

            $pendingTickets[] = new PendingTicketResource($pendingTicket);
        }

        // Reduce available ticket quantity
        $ticket->decrement('quantity', $ticketCount);

        return $this->sendResponse($pendingTickets, 'Bulk tickets generated and sent successfully!');
    }

    public function show(Event $event,$ticketCode)
    {
        
        $pendingTicket = PendingTicket::where('ticket_code', $ticketCode)->where('event_id',$event->id)
            ->with('event', 'ticket')
            ->firstOrFail();

       
        return $this->sendResponse(new PendingTicketResource($pendingTicket), 'Bulk tickets generated and sent successfully!');
    }

   
}
