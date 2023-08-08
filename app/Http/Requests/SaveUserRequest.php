<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Rules\ValidateFacebook;
use App\Rules\ValidateTwitter;
use App\Rules\ValidateYoutube;

class SaveUserRequest extends FormRequest
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
        $rules = [
            'name' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'email', Rule::unique('users')->ignore($this->user)],
            'phone' => ['required', 'numeric', Rule::unique('users')->ignore($this->user)],
            'address' => ['required', 'max:255'],
            'family_id' => ['required'],
            'facebook_url' => ['required', 'url', new ValidateFacebook],
            'twitter_url' => ['required', 'url', new ValidateTwitter],
            'youtube_url' => ['required', 'url', new ValidateYoutube],
            'zalo_phone' => ['required', 'regex:/^0\d{9,10}$/'],
            'other_info' => ['required', 'url'],
            'gender' => ['required', 'in:1,2'],
            'avatar' => ['nullable', 'mimes:jpg,png,gif,csv,jpeg,xlsx,xls,webp,pdf', 'max:5000']
        ];

        // When create user
        if (empty($this->user)) {
            $rules['password'] = ['required', 'min:6', 'max:20'];
            $rules['password_confirm'] = ['required', 'same:password'];
        }

        // When update user
        if (!empty($this->user)) {
            $rules['password'] = ['nullable', 'min:6', 'max:20'];
            $rules['password_confirm'] = ['nullable', 'same:password'];
        }

        return $rules;
    }
}
