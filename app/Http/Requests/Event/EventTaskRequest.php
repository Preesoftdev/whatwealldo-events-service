<?php

namespace App\Http\Requests\Event;

use Illuminate\Foundation\Http\FormRequest;

class EventTaskRequest extends FormRequest
{
    
    public function rules(): array
    {
        return [
        'tasks' => 'sometimes|array',
        'tasks.*.task_name' => 'required|string|max:255',
        'tasks.*.sequence' => 'nullable|integer|min:1',
        'tasks.*.start_time' => 'required|date_format:H:i',
        'tasks.*.finish_time' => 'required|date_format:H:i|after:tasks.*.start_time',
        'tasks.*.responsible' => 'nullable|string|max:255',
        'tasks.*.priority' => 'nullable|string|max:255',
        'tasks.*.resources' => 'nullable|string',
        'tasks.*.upload' => 'nullable|string',
        'tasks.*.note' => 'nullable|string',
        'tasks.*.status_update' => 'nullable|string',
        'tasks.*.assigned_users' => 'nullable|array',
        ];
    }
}
