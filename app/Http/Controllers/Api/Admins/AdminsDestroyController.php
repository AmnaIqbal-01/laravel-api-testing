<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Admins;

use App\Enums\Version;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\Response;

final class AdminsDestroyController extends Controller
{
    public function __invoke(Request $request, Version $version, Admin $admin): JsonResource
    {
//        abort_unless(
//            $version->greaterThanOrEqualsTo(Version::v1_0),
//            Response::HTTP_NOT_FOUND
//        );

        Admins->delete();

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
