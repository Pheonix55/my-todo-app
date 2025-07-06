<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
        // return auth()->check();
    }

    public function rules(): array
    {

        return [
            'email' => 'required|email',
            'password' => 'required|string|min:6', // password_confirmation field required
        ];
    }

    // public function validated($key = null, $default = null)
    // {
    //     $data = parent::validated($key, $default);

    //     foreach ($data as $field => $value) {
    //         if (is_string($value)) {
    //             $data[$field] = trim($value);
    //         }
    //     }

    //     return $data;
    // }


}
