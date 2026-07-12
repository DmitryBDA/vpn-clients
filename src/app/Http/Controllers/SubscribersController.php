<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class SubscribersController extends Controller
{
    public function show($name)
    {
        $user = User::query()->where('name', $name)->first();

        return response(
            implode("\n", $user->settings['links'] ?? []),
            200,
            ['Content-Type' => 'text/plain; charset=UTF-8']
        );
    }
}
