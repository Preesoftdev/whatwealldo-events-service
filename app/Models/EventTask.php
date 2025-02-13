<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventTask extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'task_name',
        'sequence',
        'start_time',
        'finish_time',
        'responsible',
        'priority',
        'resources',
        'upload',
        'note',
        'status_update',
    ];

    /**
     * The event that this task belongs to.
     */
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    /**
     * The users assigned to this task.
     */
    public function assignedUsers()
    {
        return $this->hasMany(EventTaskUser::class, 'event_task_id');
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($task) {
            $task->assignedUsers()->delete(); // Ensure related records are deleted
        });
    }
}
