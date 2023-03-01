<?php

namespace App\Http\Requests\admin;

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
            'user.required'=>__('messages.messages.required'),


        ];
    }
    public function attributes()
    {
        return [
            'user'=>'User',
            'email'=>"Email",
            'first_name'=>"First Name",
            'last_name'=>"Last Name",
            'birthday'=>"Birthday"
        ];

    }
}
