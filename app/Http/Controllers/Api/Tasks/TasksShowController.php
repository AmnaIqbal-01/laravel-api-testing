<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Tasks;

use App\Enums\Version;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\Response;

final class TasksShowController extends Controller
{
    public function __invoke(Request $request, Version $version, Task $task): JsonResource
    {
//        abort_unless(
//            $version->greaterThanOrEqualsTo(Version::v1_0),
//            Response::HTTP_NOT_FOUND
//        );

        //
    }
}
