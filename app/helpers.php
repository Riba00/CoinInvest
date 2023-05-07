<?php

namespace App\Helpers;

use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Hash;




if (!function_exists('add_personal_team')) {
    function add_personal_team($user): void
    {
        try {
            $team = Team::forceCreate([
                'name' => $user->name . "'s Team",
                'user_id' => $user->id,
                'personal_team' => true
            ]);
        } catch (\Exception $exception) {
            dd($exception->getMessage());
        }
    }
}

if (!function_exists('create_user')) {
    function create_user(): void
    {
        $user = User::create([
            'name' => 'test',
            'email' => 'test@test.com',
            'password' => Hash::make('12341234'),
        ]);

        add_personal_team($user);
    }
}
