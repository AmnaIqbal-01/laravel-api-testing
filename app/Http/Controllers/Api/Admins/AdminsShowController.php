<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Admins;

use App\Enums\Version;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\Response;

final class AdminsShowController extends Controller
{
    public function __invoke(Request $request, Version $version, Admin $admin): JsonResource
    {
        if (!$admin) {
            return response()->json([
                'success' => false,
                'message' => 'User not found'
            ], 404);
        }
        return new JsonResource ($admin);
    }    
}
