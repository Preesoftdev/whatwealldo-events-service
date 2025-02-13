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
        return $this->hasMany(EventUser::class, 'event_id');
    }

    /**
     * Retrieve pending users for the event.
     */
    public function pendingAttendees()
    {
        return $this->hasMany(EventUser::class, 'event_id')->where('status', 'pending');
    }

    /**
     * The user who created the event (Owner).
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function tasks()
    {
        return $this->hasMany(EventTask::class);
    }
    public function subEvents()
    {
        return $this->hasMany(SubEvent::class, 'event_id');
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($event) {
            foreach ($event->tasks as $task) {
                $task->assignedUsers()->delete(); // Delete assigned users first
                $task->delete(); // Then delete the task
            }
        });
    }
}
