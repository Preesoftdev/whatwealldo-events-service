<?php

namespace App\Http\Requests\Ticket;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTicketRequest extends FormRequest
{
    
    public function rules(): array
    {
        return [
            'ticket_type' => 'nullable|string|in:Paid,Free,Donation,Guest Pass',
            'name' => 'nullable|string|max:255',
            'price' => 'nullable|numeric|min:0',
            'quantity' => 'nullable|integer|min:1',
            'sale_end_date' => 'nullable|date|after:today',
            'sale_status' =>'nullable|string|in:active,ended,cancelled',
            
        ];
    }
}
