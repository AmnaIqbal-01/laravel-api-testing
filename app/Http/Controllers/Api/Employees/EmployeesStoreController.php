<?php

namespace App\Http\Controllers\Api\Employees;

use App\Enums\Version;
use App\Models\Employee;
use App\Http\Requests\Api\v1_0\EmployeeStoreRequest;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log; 
use App\Http\Resources\v1_0\EmployeeResource;
use Symfony\Component\HttpFoundation\Response;

final class EmployeesStoreController extends Controller
{
    public function __invoke(EmployeeStoreRequest $request, Version $version): EmployeeResource
    {
        // Log the incoming request data for debugging
        Log::debug('Request data:', $request->all());

        // Validate the incoming request data
        $validatedData = $request->validated();

        // Log the validated data for debugging
        Log::debug('Validated data:', $validatedData);

        // Check if the 'admin_id' key is present in the validated data
        if (!isset($validatedData['admin_id'])) {
            // Log an error if the 'admin_id' key is missing
            Log::error('admin_id is missing in the validated data');
            // Return an error response
            return new EmployeeResource(null); // Assuming EmployeeResource has a constructor that handles this case
        }

        // Create the employee with the provided data
        $employee = Employee::create([
            'admin_id' => $validatedData['admin_id'],
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'email' => $validatedData['email'],
        ]);

        // Check if the employee was successfully created
        if ($employee) {
            // Return a JSON resource with the created employee data
            return new EmployeeResource($employee);
        } else {
            // Log an error if employee creation fails
            Log::error('Failed to store employee data');
            // Return an error response
            return new EmployeeResource(null); // Assuming EmployeeResource has a constructor that handles this case
        }
    }
}
