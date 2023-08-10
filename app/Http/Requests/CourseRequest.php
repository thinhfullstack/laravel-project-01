<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CourseRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:255'],
            'slug' => ['required', 'max:255', Rule::unique('courses')->ignore($this->course)],
            'link' => ['required', 'max:255', 'url'],
            'price' => ['required', 'numeric'],
            'old_price' => ['required', 'different:price', 'numeric'],
            'created_by' => ['nullable'],
            'category_id' => ['required'],
            'lessons' => ['required'],
            'view_count' => ['required', 'numeric'],
            'benefits' => ['required', 'json'],
            'fqa' => ['required', 'json'],
            'is_feature' => ['required', 'numeric'],
            'is_online' => ['required', 'numeric'],
            'description' => ['required'],
            'content' => ['required'],
            'meta_title' => ['required'],
            'meta_desc' => ['required'],
            'meta_keyword' => ['required'],
        ];
    }
}
