<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterStep2Request;
use Illuminate\Http\Request;

class RegisterStep2Controller extends Controller
{
    // ステップ1の画面を表示
    public function showStep2()
    {
        return view('auth.register_step2');
    }

    // ステップ2の登録処理
    public function registerStep2(RegisterStep2Request $request)
    {
        // バリデーションが通過した場合の処理
        // ここでは例として、入力された体重データをデータベースに保存する処理を行う

        // リクエストデータの取得
        $data = $request->validated(); // バリデーションが通過したデータ

        // データをデータベースに保存する例
        // 例えば、ユーザーが登録した体重データをUserモデルに保存する
        auth()->user()->update([
            'current_weight' => $data['current_weight'],
            'target_weight' => $data['target_weight'],
        ]);

        // 次のステップに進むためにリダイレクト
        return redirect()->route('register_step3'); // 次のステップに進むルートへリダイレクト
    }

}
