<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCharacterRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'name' => 'required|max:200|min:3',
            'description' => 'nullable|max:2000',
            'attack' => 'required|min:1|max:100',
            'defence' => 'required|min:1|max:100',
            'speed' => 'required|min:1|max:100',
            'life' => 'required|min:1|max:999',
            // 'items' => 'exists:items,id',
            'type_id' => 'exists:types,id'
        ];
    }
}
