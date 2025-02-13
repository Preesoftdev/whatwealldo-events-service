<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventTaskUser extends Model
{
    use HasFactory;

    protected $table = 'event_task_user';

    protected $fillable = [
        'event_task_id',
        'user_id',
    ];

    public function task()
    {
        return $this->belongsTo(EventTask::class, 'event_task_id');
    }
}
