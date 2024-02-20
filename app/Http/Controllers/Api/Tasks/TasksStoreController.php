<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Tasks;

use App\Enums\Version;
use App\Http\Requests\Api\v1_0\TaskStoreRequest;
use App\Models\Task;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\Response;

final class TasksStoreController extends Controller
{
    public function __invoke(TaskStoreRequest $request, Version $version): JsonResource
    {
        // Validate the incoming request data
        $validatedData = $request->validated();
       

        // Create the task with the provided data
        $task = Task::create([
            'customer_id' => $validatedData['customer_id'],
            'employee_id' =>  $validatedData['employee_id'],
            'task_description' => $validatedData['task_description'],
            'status' => 'Pending', // Default status
            // Add other task attributes here
        ]);

        // Return a JSON resource with the created task data
        return new JsonResource($task);
    }
}
