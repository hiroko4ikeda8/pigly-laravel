<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterStep1Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class RegisterStep1Controller extends Controller
{
    // ステップ1の画面を表示
    public function showStep1()
    {
        return view('auth.register_step1');
    }

    // ステップ1のデータを処理
    public function handleStep1(RegisterStep1Request $request)
    {
        // バリデーション通過後、データをデータベースに登録
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),  // パスワードをハッシュ化
        ]);

        // 登録後、ステップ2に遷移
        return redirect()->route('auth.register_step2');
    }
}
