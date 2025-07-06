<?php

namespace App\Services;

use App\Models\User;
use Auth;
use Hash;

class UserService
{
    public function getAllUsers()
    {
        return User::all();
    }

    public function createUser(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        return User::create($data);
    }
    public function attemptToLogin($data): ?User
    {
        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            return Auth::user();
        }

        return null;
    }


    public function getUserById($id)
    {
        return User::findOrFail($id);
    }

    public function getUserByEmail($email)
    {
        return User::where('email', $email)->first();
    }
}
