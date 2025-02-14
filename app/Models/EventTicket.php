<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventTicket extends Model
{
    use HasFactory;
    protected $table = 'event_tickets';

    protected $fillable = [
        'event_id',
        'ticket_type',
        'name',
        'price',
        'quantity',
        'sold',
        'payment_status',
        'payment_reference',
        'sale_end_date',
        'sale_status'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

}
