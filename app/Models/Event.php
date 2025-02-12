<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', // Owner ID
        'name',
        'event_type',
        'date',
        'start_time',
        'end_time',
        'location',
        'people_capacity',
        'description',
    ];

    /**
     * The users attending the event (Many-to-Many).
     */
    public function attendees()
    {
        return $this->belongsToMany(User::class, 'event_user')
            ->withPivot('status')
            ->withTimestamps();
    }

    public function pendingAttendees()
    {
        return $this->belongsToMany(User::class, 'event_user')
            ->wherePivot('status', 'pending')
            ->withTimestamps();
    }

    /**
     * The user who created the event (Owner).
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
