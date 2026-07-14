<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepository
{
    public function __construct(
        protected User $model
    )
    {
    }

    public function getWithRoleUser(): Collection
    {
        return $this->model::with('roles')
            ->whereHas('roles', fn ($query) => $query->where('name', 'user'))
            ->orderBy('id', 'asc')
            ->get();
    }

    public function create(array $userStoreData): User
    {
        return $this->model::query()->create($userStoreData);
    }

    public function findOrFail($id): User
    {
        return $this->model::query()->findOrFail($id);
    }

    public function delete(User $user): void
    {
        $user->delete();
    }
}
