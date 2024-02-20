<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Employees;

use App\Enums\Version;
use App\Models\Employee;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\Response;

final class EmployeesUpdateController extends Controller
{
    public function __invoke(EmployeeUpdateRequest $request, Version $version, Employee $employee): JsonResource
    {
//        abort_unless(
//            $version->greaterThanOrEqualsTo(Version::v1_0),
//            Response::HTTP_NOT_FOUND
//        );

        //
    }
}
