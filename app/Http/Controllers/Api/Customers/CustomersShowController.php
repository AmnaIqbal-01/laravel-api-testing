<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Customers;

use App\Enums\Version;
use {{ namespacedModel }};
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\Response;

final class CustomersShowController extends Controller
{
    public function __invoke(Request $request, Version $version, {{ model }} ${{ modelVariable }}): JsonResource
    {
//        abort_unless(
//            $version->greaterThanOrEqualsTo(Version::v1_0),
//            Response::HTTP_NOT_FOUND
//        );

        //
    }
}
