<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return UserResource::collection(User::all());
    }

    public function licenses(User $user)
    {
        return \App\Http\Resources\LicenseResource::collection($user->licenses);
    }
}