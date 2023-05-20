<?php

namespace App\Http\Requests\Customer;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

class RegisterCustomerRequest extends FormRequest
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
            'email' => 'required|email|unique:customers',
            'phone' => 'required|regex:/^0[0-9]{9}$/|unique:customers,phone',
            'birthday' => 'required|date',
            'full_name' => 'required',
            'password' => [
                'required',
                'confirmed',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]+$/',
            ],
        ];
    }

    /**Error notification when occurring
     * @return string[]
     */
    public function messages()
    {
        return [

            'email.required' => __('messages.messages.required'),
            'email.email' => __('messages.messages.email'),
            'email.unique' => __('messages.messages.unique'),

            'phone.required' => __('messages.messages.required'),
            'phone.regex' => __('messages.messages.regex'),
            'phone.unique' => __('messages.messages.unique'),

            'birthday.required' => __('messages.messages.required'),
            'birthday.date' => __('messages.messages.date'),

            'full_name.required' => __('messages.messages.required'),


            'password.required' => __('messages.messages.required'),
            'password.min' => __('messages.messages.regex_password'),
            'password.regex' => __('messages.messages.regex_password'),
            'password.confirmed' => __('messages.messages.confirmed'),

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
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
