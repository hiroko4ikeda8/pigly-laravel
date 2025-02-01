<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * ログイン処理を行う
     *
     * @param LoginRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(LoginRequest $request)
    {
        // バリデーション通過後の処理
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->intended('weight-logs');  // ログイン成功後に体重管理画面に遷移
        }

        // ログイン失敗時の処理
        return back()->withErrors([
            'email' => 'メールアドレスまたはパスワードが間違っています',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

}
