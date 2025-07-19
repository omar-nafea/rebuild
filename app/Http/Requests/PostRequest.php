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
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'writer_id' => 'required|integer|exists:writers,id',
            'isPublished' => 'required|boolean',
            'num_comments' => 'required|integer|min:0',
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
            'title.max' => 'The post title cannot exceed 255 characters.',
            'body.required' => 'The post body is required.',
            'writer_id.required' => 'A writer must be selected.',
            'writer_id.exists' => 'The selected writer does not exist.',
            'isPublished.required' => 'The published status is required.',
            'isPublished.boolean' => 'The published status must be true or false.',
            'num_comments.required' => 'The number of comments is required.',
            'num_comments.integer' => 'The number of comments must be an integer.',
            'num_comments.min' => 'The number of comments cannot be negative.',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            'title' => 'post title',
            'body' => 'post body',
            'writer_id' => 'writer',
            'isPublished' => 'is published',
            'num_comments' => 'number of comments',
        ];
    }
} 