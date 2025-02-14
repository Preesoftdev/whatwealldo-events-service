<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = ['pending_ticket_id', 'amount', 'payment_status'];

    public function pendingTicket()
    {
        return $this->belongsTo(PendingTicket::class);
    }
}
