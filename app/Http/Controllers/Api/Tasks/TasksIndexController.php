<?php

namespace App\Http\Controllers\Api\Tasks;

use App\Enums\Version;
use App\Models\Task;
use App\Http\Resources\v1_0\TaskResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Routing\Controller;

final class TasksIndexController extends Controller
{
    public function __invoke(Request $request, Version $version): AnonymousResourceCollection
    {
        // Retrieve paginated tasks
        $tasks = Task::paginate();

        // Return the tasks as a collection of TaskResource
        return TaskResource::collection($tasks);
    }
}
