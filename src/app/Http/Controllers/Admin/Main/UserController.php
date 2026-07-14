<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use App\Services\UserService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function __construct(
        protected UserRepository $userRepository,
        protected UserService $userService,
        protected RoleRepository $roleRepository,
    )
    {
    }

    public function index(): View
    {
        $users = $this->userRepository->getWithRoleUser();

        return view('admin.main.users.index', compact('users'));
    }

    public function create(): View
    {
        return view('admin.main.users.create');
    }

    public function store(UserStoreRequest $request): RedirectResponse
    {
        $userStoreData = $this->userService->createFromRequest($request);
        $user = $this->userRepository->create($userStoreData);

        $userRole = $this->roleRepository->findOrCreateByName('user');
        $this->userService->assignRole($user, $userRole);

        return redirect()->route('admin.index.users');
    }
    public function update($id, UserUpdateRequest $request): RedirectResponse
    {
        $user = $this->userRepository->findOrFail($id);

        $user->update([
            'name' => $request->name,
            'settings' => [
                'links' => [
                    $request->settings
                ],
            ],
        ]);

        return redirect()->route('admin.index.users');
    }

    public function edit($id): View
    {
        $user = $this->userRepository->findOrFail($id);
        return view('admin.main.users.edit', ['user' => $user]);
    }
    public function delete($id): RedirectResponse
    {
        $user = $this->userRepository->findOrFail($id);
        $this->userRepository->delete($user);
        return redirect()->back()->with('success', 'Пользователь удален');
    }
}
