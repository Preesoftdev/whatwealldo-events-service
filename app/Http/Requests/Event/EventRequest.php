<?php

namespace App\Http\Requests\Event;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
   
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'event_type' => 'required|string|max:255',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'location' => 'required|string|max:255',
            'people_capacity' => 'nullable|integer|min:1',
            'description' => 'nullable|string',
        ];
    }
}
