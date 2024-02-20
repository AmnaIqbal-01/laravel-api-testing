<?php

declare(strict_types=1);
namespace App\Http\Controllers\Api\Tasks;

use App\Http\Requests\Api\v1_0\TaskUpdateRequest;
use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class TasksUpdateController extends Controller
{
   
    public function __invoke(TaskUpdateRequest $request, Task $task): JsonResponse
{
    // Retrieve the authenticated employee ID from the request
    $employeeId = $request->employee_id;

    // Check if the authenticated employee is authorized to update the task
    if ($task->employee_id !== $employeeId) {
        return response()->json(['message' => 'Unauthorized'], 403);
    }

    // Update the status of the task
    $task->update(['status' => $request->status]);

    // Return a JSON response indicating success
    return response()->json(['message' => 'Task status updated successfully']);
}

}

