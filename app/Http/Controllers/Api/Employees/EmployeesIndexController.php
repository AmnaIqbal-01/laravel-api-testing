<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Employees;

use App\Enums\Version;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\v1_0\UserResource;

final class EmployeesIndexController extends Controller
{
    public function __invoke(Request $request, Version $version): AnonymousResourceCollection
    {
        // Retrieve all employees
        $employees = Employee::paginate();

        // Return the paginated list of employees as a resource collection
        return UserResource::collection($employees);
    }
}
