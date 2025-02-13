<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'sub_event_name',
        'date',
        'start_time',
        'finish_time',
        'dress_code',
        'color_theme',
        'location',
        'description',
        'note',
    ];

    /**
     * Get the parent event of the sub-event.
     */
    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

}
