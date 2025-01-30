<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CustomCreateNewUser implements CreatesNewUsers
{
    /**
     * Create a new user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        // register_step1から送信された情報をsessionから取得
        $name = session('name');
        $email = session('email');
        $password = session('password');
        $current_weight = $input['current_weight'];
        $target_weight = $input['target_weight'];

        // 新規ユーザーを作成
        return User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'current_weight' => $current_weight,
            'target_weight' => $target_weight,
        ]);
    }
}
