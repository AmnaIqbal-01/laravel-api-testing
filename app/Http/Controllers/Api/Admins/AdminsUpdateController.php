<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Admins;

use App\Enums\Version;
use App\Models\Admin;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\Response;

final class AdminsUpdateController extends Controller
{
    public function __invoke(AdminUpdateRequest $request, Version $version, Admin $admin): JsonResource
    {
//        abort_unless(
//            $version->greaterThanOrEqualsTo(Version::v1_0),
//            Response::HTTP_NOT_FOUND
//        );

        //
    }
}
