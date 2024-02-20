<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Users;

use Illuminate\Routing\Controller;
use App\Enums\Version;
use App\Http\Requests\Api\v1_0\UserLoginRequest;
use App\Http\Resources\v1_0\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Middleware\CheckUserStatus; // Add this line


final class UserLoginController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(CheckUserStatus::class); // Apply middleware to the entire controller
    // }
    public function __invoke(UserLoginRequest $request, Version $version, User $user): JsonResource
    {
       
        $data = $request->validated();

        /** @var User $user */
        $user = User::where('username', $data['username'])->first();

        if (! Hash::check($data['password'], $user->password)) {
            throw ValidationException::withMessages([
                'username' => [(string) trans('validation.credentials')],
            ]);
        }

        $token = $user->createToken('auth')->plainTextToken;

        return UserResource::make($user)->additional(['token' => $token]);
    }
}
