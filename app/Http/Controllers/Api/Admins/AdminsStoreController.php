<?php

namespace App\Http\Controllers\Api\Admins;

use App\Enums\Version;
use App\Http\Requests\AdminStoreRequest;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\Response;

final class AdminsStoreController extends Controller
{
    public function __invoke(AdminStoreRequest $request, Version $version): JsonResource
    {
        // Validate the incoming request data
        $validatedData = $request->validated();

        // Perform any necessary operations (e.g., store admin data)

        // Return a JSON resource as the response
        return new JsonResource(['message' => 'Admin data stored successfully']);
    }
}
