<?php

namespace App\Http\Requests\Ticket;

use Illuminate\Foundation\Http\FormRequest;

class BulkTicketRequest extends FormRequest
{
    
    public function rules(): array
    {
        return [
            'emails' => 'required|array|min:1',  // Must be an array of emails
            'emails.*' => 'email',  // Each email must be valid
            'ticket_id' => 'required|exists:event_tickets,id'
        ];
    }
}
