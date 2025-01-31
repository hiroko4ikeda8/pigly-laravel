<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterStep2Controller extends Controller
{
    // ステップ1の画面を表示
    public function showStep2()
    {
        return view('auth.register_step2');
    }
}
