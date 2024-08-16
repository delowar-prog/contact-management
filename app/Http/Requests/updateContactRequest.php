<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateContactRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules($id=null): array
    {
        $contactId = $this->route('contact')->id;
        return [
            'name' => 'required|max:50|min:3',
            'email' => 'required|unique:contacts,email,' . $contactId,
            'phone' => 'nullable|max:11',
            'address' => 'nullable',
        ];
    }
}
