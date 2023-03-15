<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'user' => 'required|min:6',
            'email' => 'required|email',
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'birthday' => 'required|date|before:-18 years',
            'avatar' => 'file|mimes:jpeg,png|max:3072',
            'province' => 'required',
            'district' => 'required',
            'commune' => 'required',
            'address' => 'required',
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

            "email.required" => __('messages.messages.required'),
            'email.email' => __('messages.messages.format'),

            'first_name.required' => __('messages.messages.required'),
            'first_name.max' => __('messages.messages.max'),

            'last_name.required' => __('messages.messages.required'),
            'last_name.max' => __('messages.messages.max'),

            'birthday.required' => __('messages.messages.required'),
            'birthday.before' => __('messages.messages.before'),

            'avatar.image' => __('messages.messages.format'),
            'avatar.mimes' => __('messages.messages.image'),
            'avatar.max' => __('messages.messages.avatarMax'),

            'province.required' => __('messages.messages.required'),
            'district.required' => __('messages.messages.required'),
            'commune.required' => __('messages.messages.required'),
            'address.required' => __('messages.messages.required'),
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
