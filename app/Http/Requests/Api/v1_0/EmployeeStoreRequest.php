<?php

declare(strict_types=1);

namespace App\Http\Requests\Api\v1_0;

use Illuminate\Foundation\Http\FormRequest;

final class EmployeeStoreRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'admin_id' => 'required|numeric', // Use 'numeric' instead of 'validateNumerical'
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
        ];
    }
}
