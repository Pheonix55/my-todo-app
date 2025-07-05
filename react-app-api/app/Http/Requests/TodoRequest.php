<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class TodoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
        // return auth()->check();
    }

    public function rules(): array
    {

        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'is_done' => 'required|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'The title is required.',
            'description.required' => 'The description is required.',
            'is_done.required' => 'The is_done field is required.',
            'is_done.boolean' => 'The is_done field must be true or false.',
        ];
    }
}
