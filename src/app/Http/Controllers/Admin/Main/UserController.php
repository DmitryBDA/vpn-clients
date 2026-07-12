<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.main.users.index', ['users' => $users]);
    }

    public function create()
    {
        return view('admin.main.users.create');
    }

    public function store(Request $request)
    {

        User::query()->create([
            'name' => $request->name,
            'email' => $request->name . '@gmail.com',
            'settings' => [
                'links' => [
                    $request->settings
                ],
            ],
            'password' => Hash::make(123123123),
        ]);

        return redirect()->route('admin.index.users');
    }
    public function update($id, Request $request)
    {
        $user = User::query()->findOrFail($id);

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

    public function show($name)
    {
        $user = User::query()->where('name', $name)->first();

        return response($user->vless_link);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.main.users.edit', ['user' => $user]);
    }
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('success', 'Пользователь удален');
    }
}
