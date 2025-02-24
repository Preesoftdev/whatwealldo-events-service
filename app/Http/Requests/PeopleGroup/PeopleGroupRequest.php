<?php

namespace App\Http\Requests\PeopleGroup;

use Illuminate\Foundation\Http\FormRequest;

class PeopleGroupRequest extends FormRequest
{
   
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:people_groups,name',
            'privacy' => 'required|in:public,private',
            'user_ids' => 'nullable|array',
            'user_ids.*' => 'integer', // Ensure each value in the array is a valid integer
        ];
    }
}
