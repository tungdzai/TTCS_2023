<?php

namespace App\Http\Requests\User\Category;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => 'required|max:225',
            'parent_id' => 'nullable|exists:categories,id'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'=>__('messages.messages.required'),
            'name.max'=>__('messages.messages.max'),
        ];
    }
    public function attributes()
    {
        return [
            'name'
        ];
    }
}
