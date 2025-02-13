<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventUser extends Model
{
    use HasFactory;
    
    protected $table = 'event_user';

    protected $fillable = [
        'event_id',
        'user_id',
        'status', // Invitation status (accepted, pending, rejected)
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
