<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        $userId = $this->user->id ?? null;
        return [
            'name' => 'sometimes|string|max:100',
            'email' => 'sometimes|string|email|max:100|unique:users,email,' . $userId,
            'password' => 'sometimes|string|min:8',
        ];
    }
}
