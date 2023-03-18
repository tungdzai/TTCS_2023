<?php

namespace App\Http\Requests\Reset;

use Illuminate\Foundation\Http\FormRequest;

class ForgotRequest extends FormRequest
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
            'email' => "required|email|exists:users,email"
        ];
    }

    /**Error notification when occurring
     * @return string[]
     */
    public function messages()
    {
        return [
            'email.required' => __('messages.messages.required'),
            'email.exists' => __('messages.messages.exists'),
        ];
    }

    /** Get attributes
     * @return array
     */
    public function attributes(): array
    {
        return [
            'email' => "Email"
        ];

    }
}
