<?php

namespace App\Http\Requests\User\UserLogin;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email' => 'required|exists:users,email',
            'password' => 'required'
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
            'password.required' => __('messages.messages.required'),
        ];
    }

    /** Get attributes
     * @return array
     */
    public function attributes(): array
    {
        return __('messages.attributesUserLogin');
    }
}
