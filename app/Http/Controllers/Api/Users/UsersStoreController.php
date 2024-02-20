<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Users;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Enums\Version;
use App\Http\Requests\Api\v1_0\UserStoreRequest;
use App\Http\Resources\v1_0\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

final class UsersStoreController extends Controller
{
    public function __invoke(UserStoreRequest $request, Version $version, User $user): JsonResource
    {
        $validatedData = $request->validated(); // Validation already defined in the UserStoreRequest

        $user = User::create([
            'username' => $validatedData['username'],
            'password' => Hash::make($validatedData['password']),
            'first_name' =>  ucfirst($validatedData['first_name']),
            'last_name' =>  ucfirst($validatedData['last_name']),
            'role' => $validatedData['role'] ?? 'employee', // Default value if not provided
            'status' => $validatedData['status'] ?? 'active', // Default value if not provided
        ]);
        $token = $user->createToken('auth')->plainTextToken;

        return UserResource::make($user)->additional(['token' => $token]);
    }
}
