<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Spatie\Permission\Models\Role;

class RoleRepository
{
    public function __construct(
        protected Role $model
    )
    {
    }

    public function findOrCreateByName(string $name): ?Role
    {
        return $this->model->findOrCreate($name);
    }
}
