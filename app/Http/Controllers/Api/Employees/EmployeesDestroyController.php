<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Employees;

use App\Enums\Version;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log; // Import the Log facade
use Symfony\Component\HttpFoundation\Response;

final class EmployeesDestroyController extends Controller
{
    public function __invoke(Request $request, Version $version, $employeeId): JsonResponse
    {
        try {
            // Find the employee by id
            $employee = Employee::findOrFail($employeeId);
            
            // Log the employee ID before deletion
            Log::info('Deleting employee', ['employee_id' => $employee->id]);

            // Delete the employee
            $employee->delete();

            // Log a success message after deletion
            Log::info('Employee deleted successfully', ['employee_id' => $employee->id]);

            // Return an empty JSON response with HTTP status code 204 (No Content)
            return response()->json([], Response::HTTP_NO_CONTENT);
        } catch (\Exception $e) {
            // Log any exceptions that occur during deletion
            Log::error('Failed to delete employee', ['employee_id' => $employeeId, 'exception' => $e->getMessage()]);

            // Return a JSON response with an error message and HTTP status code 500 (Internal Server Error)
            return response()->json(['message' => 'Failed to delete employee'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
