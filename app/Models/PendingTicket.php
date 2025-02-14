<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EventTicket;

class PendingTicket extends Model
{
    use HasFactory;
    protected $fillable = ['event_id', 'ticket_id', 'buyer_email', 'ticket_code', 'status'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function ticket()
    {
        return $this->belongsTo(EventTicket::class);
    }

}
