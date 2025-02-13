<?php

namespace App\Http\Requests\SubEvent;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubEventRequest extends FormRequest
{
    
    public function rules(): array
    {
        return [
            'sub_events' => 'required|array',
            'sub_events.*.sub_event_name' => 'required|string|max:255',
            'sub_events.*.date' => 'required|date',
            'sub_events.*.start_time' => 'required|date_format:H:i',
            'sub_events.*.finish_time' => 'required|date_format:H:i|after:sub_events.*.start_time',
            'sub_events.*.dress_code' => 'nullable|string|max:255',
            'sub_events.*.color_theme' => 'nullable|string|max:255',
            'sub_events.*.location' => 'nullable|string|max:255',
            'sub_events.*.description' => 'nullable|string',
            'sub_events.*.note' => 'nullable|string',
        ];
    }
}
