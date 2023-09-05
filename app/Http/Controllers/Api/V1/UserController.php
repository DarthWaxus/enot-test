<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use App\Services\UserService;

class UserController extends Controller
{
    public function update(User $user, UpdateRequest $request, UserService $userService): User
    {
        return $userService->update($user, $request->validated());
    }
}
