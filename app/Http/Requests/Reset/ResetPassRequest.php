<?php

namespace App\Http\Requests\Reset;

use Illuminate\Foundation\Http\FormRequest;

class ResetPassRequest extends FormRequest
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
            'token' => 'required',
            'password' => 'required|confirmed|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
        ];
    }

    /**Error notification when occurring
     * @return string[]
     */
    public function messages()
    {
        return [
            'token.required' => __('messages.messages.required'),
            'password.required' => __('messages.messages.required'),
            'password.regex' => __('messages.messages.regex'),
            'password.confirmed' => __('messages.messages.confirmed'),
        ];
    }

    /** Get attributes
     * @return array
     */
    public function attributes(): array
    {
        return [
            'password' => "Mật khẩu"
        ];

    }
}
