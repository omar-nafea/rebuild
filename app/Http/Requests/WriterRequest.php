<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WriterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // Define validation rules for the writer creation request
        // email is unique in the writers table
        return [
            'name' => 'bail|required|string|min:8|max:255',
            'email' => 'bail|required|email|unique:writers,email',
            'password' => 'bail|required|string|min:8',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'The writer name is required.',
            'name.min' => 'The writer name must be at least 8 characters.',
            'email.required' => 'The email address is required.',
            'email.email' => 'Please provide a valid email address.',
            'email.unique' => 'This email address is already taken.',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
}
