<?php

namespace App\Http\Requests\Customer;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class LoginCustomerRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'phone' => 'required|regex:/^0[0-9]{9}$/|unique:customers',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'phone.required' => 'Số điện thoại không được để trống !',
            'phone.regex' => 'Số điện thoại chưa đúng định dạng !',
            'password.required' => 'Mật khẩu không được để trống !',
        ];
    }

    /**
     * @throws HttpResponseException
     */
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([$validator->errors()],422));
    }
}
