<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Admins; 

use App\Enums\Version;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\v1_0\UserResource;


final class AdminsIndexController extends Controller
{
    public function __invoke(Request $request, Version $version): AnonymousResourceCollection
    {
        $admins = Admin::query()->paginate();
        return UserResource::collection($admins);
    }
    
}
