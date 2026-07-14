<?php

namespace App\Services;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserService
{

    public function createFromRequest(UserStoreRequest $request): array
    {
        return [
            'name' => $request->name,
            'email' => $request->name . '@gmail.com',
            'settings' => [
                'links' => [$request->settings],
            ],
            'password' => Hash::make('123123123'),
        ];
    }

    public function assignRole(User $user, Role $userRole): void
    {
        $user->assignRole($userRole);
    }
}
