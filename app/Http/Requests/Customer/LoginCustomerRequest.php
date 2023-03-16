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
            'phone' => 'required|regex:/^0[0-9]{9}$/|exists:customers,phone',
            'password' => 'required'
        ];
    }

    /**Error notification when occurring
     * @return string[]
     */
    public function messages()
    {
        return [
            'phone.required' =>__('messages.messages.required'),
            'phone.regex' => __('messages.messages.regex'),
            'phone.exists' => __('messages.messages.exists'),
            'password.required' =>__('messages.messages.required'),
        ];
    }
    /** Get attributes
     * @return array
     */
    public function attributes(): array
    {
        return __('messages.attributesCustomer');

    }

    /**
     * @throws HttpResponseException
     */
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([$validator->errors()],422));
    }
}
