<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'order_name' => ['required', 'min:5'],
            'order_price' => ['required', 'numeric'],
        ];
    }

    public function messages()
    {
        return [
            'order_name.required' => 'Tên sản phẩm là trường bắt buộc.',
            'order_price.required' => 'Đặt sản phẩm là trường bắt buộc.',
            'order_price.numeric' => 'Phải nhập giá bằng số, không được để là ký tự',
        ];
    }
}
