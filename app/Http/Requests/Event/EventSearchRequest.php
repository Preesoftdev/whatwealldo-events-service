<?php

namespace App\Http\Requests\Event;

use Illuminate\Foundation\Http\FormRequest;

class EventSearchRequest extends FormRequest
{
    
    public function rules(): array
    {
        return [
            'name' => 'nullable|string|min:1'
        ];
    }
}
