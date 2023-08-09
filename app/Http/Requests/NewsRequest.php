<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
        if(request()->start_at){
            request()->start_at = \Carbon\Carbon::createFromFormat('Y-m-d\TH:i', request()->start_at)->format('Y-m-d H:i');
        }

        if(request()->end_at){
            request()->end_at = \Carbon\Carbon::createFromFormat('Y-m-d\TH:i', request()->end_at)->format('Y-m-d H:i');
        }

        return [
            'name' => ['required', 'max:255'],
            'start_at' => ['required', 'date', 'after:now', 'date_format:Y-m-d\TH:i'],
            'end_at' => ['nullable', 'date', 'after:start_at', 'date_format:Y-m-d\TH:i'],
            'is_suppension' => ['required', 'in:0,1']
        ];
    }
}
