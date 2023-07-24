<?php

namespace App\Http\Requests\Customer;

use App\Rules\ValidateTargetValueRule;
use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'name' => ['required', 'max:255', 'min:2', 'alpha_num'],
            'email' => ['required', 'email', 'max:255', 'min:2'],
            'phone' => ['required', 'numeric', 'starts_with:0' ,'digits:10'],
            'address' => ['required', 'min:5', 'alpha_dash'],
            'gender' => ['required'],
            'location' => ['required'],
            'location_value' => ['required', new ValidateTargetValueRule],
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên khách hàng',
            'email' => 'Email khách hàng',
            'phone' => 'Số điện thoại khách hàng',
            'address' => 'Địa chỉ khách hàng',
            'location_value' => 'Giá trị vị trí mặc định'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute bắt buộc phải nhập',
            'email' => ':attribute phải đúng định dạng',
            'max' => ':attribute không được vượt quá 255 ký tự',
            'min' => ':attribute không được nhỏ hơn 2 ký tự',
            'gender.required' => 'Giới tính bắt buộc phải chọn',
            'location.required' => 'Vị trí bắt buộc phải chọn',
            'alpha_num' => ':attribute không được có ký tự đặc biệt',
            'starts_with' => ':attribute bắt đầu phải là số 0',
            'digits' => ':attribute đầy đủ 10 số',
        ];
    }
}
