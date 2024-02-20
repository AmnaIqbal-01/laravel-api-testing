<?php

declare(strict_types=1);

namespace App\Http\Requests\Api\v1_0;

use Illuminate\Foundation\Http\FormRequest;

final class TaskStoreRequest extends FormRequest
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
            'customer_id' => 'required|exists:customers,customer_id',
            'employee_id' => 'required|exists:employees,employee_id',
            'task_description' => 'required|string|max:255',
            'status' => 'required|string|in:Pending,In Progress,Completed',
            // Add any other validation rules as needed
        ];
    }
}
