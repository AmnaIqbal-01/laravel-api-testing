<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Users;

use Illuminate\Http\{JsonResponse, Request};
use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Enums\Version;
use App\Models\User;

final class UsersDestroyController extends Controller
{
    public function __invoke(Request $request, Version $version, User $user): JsonResponse
    {
        $user->delete();

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
