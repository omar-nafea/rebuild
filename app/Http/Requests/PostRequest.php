<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
        return [
            'title' => 'bail|required|string|max:255|unique:posts,title',
            'content' => 'bail|required|string',
            'writer_id' => 'bail|required|exists:writers,id',
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
            'title.required' => 'The post title is required.',
            'title.unique' => 'The post title must be unique.',
            'writer_id.required' => 'The writer is required.',
            'writer_id.exists' => 'The selected writer does not exist.',
            'content.required' => 'The post body is required.',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
}
