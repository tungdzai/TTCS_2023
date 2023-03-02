<?php

namespace App\Http\Requests\home;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'user' => 'required|min:6|unique:users,user_name',
            'email' => 'required|email|unique:users',
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'birthday' => 'required|date|before:-18 years',
        ];
    }

    /** Error notification when occurring
     * @return array
     */
    public function messages(): array
    {
        return [
            'user.required' => __('messages.messages.required'),
            'user.min' => __('messages.messages.min'),
            'user.unique' => __('messages.messages.unique'),

            "email.required" =>__('messages.messages.required'),
            'email.email' =>__('messages.messages.format'),
            'email.unique' =>  __('messages.messages.unique'),

            'first_name.required' =>  __('messages.messages.required'),
            'first_name.max' =>  __('messages.messages.max'),

            'last_name.required' =>__('messages.messages.required'),
            'last_name.max' =>  __('messages.messages.max'),

            'birthday.required' => __('messages.messages.required'),
            'birthday.before' => ":attribute phải lớn hơn 18 ! ",
        ];
    }

    /** Get attributes
     * @return array
     */
    public function attributes(): array
    {
        return __('messages.attributes');

    }
}
