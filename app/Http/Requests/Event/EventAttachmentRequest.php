<?php

namespace App\Http\Requests\Event;

use Illuminate\Foundation\Http\FormRequest;

class EventAttachmentRequest extends FormRequest
{
    
    public function rules(): array
    {
        return [
            'files' => 'required|array',
            'files.*' => 'file|mimes:jpg,jpeg,png,pdf,doc,docx|max:5120' // Max 20MB per file
        ];
    }
}
