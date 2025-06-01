<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
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
        $customerId = $this->customer->id ?? null;
        return [
            'name'  => 'sometimes|required|string|max:100',
            'email' => 'sometimes|required|email|unique:customers,email,' . $customerId,
            'phone' => 'required|string|max:20',
            'birthday' => 'required|date',
            'address' => 'required|string|max:100',
            'complement' => 'nullable|string|max:50',
            'neighborhood' => 'required|string|max:50',
            'zip_code' => 'required|string|max:10',
        ];
    }
}
