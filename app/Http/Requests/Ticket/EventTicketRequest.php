<?php

namespace App\Http\Requests\Ticket;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EventTicketRequest extends FormRequest
{
    
    public function rules(): array
    {
        return [
            'ticket_type' => 'required|string|in:Paid,Free,Donation,Guest Pass',
            'name' => 'required|string|max:255',
            'price' => 'nullable|numeric|min:0',
            'quantity' => 'nullable|integer|min:1',
            'sale_end_date' => 'nullable|date|after:today',
            'sale_status' =>'nullable|string|in:active,ended,cancelled',
            
        ];
    }
}
