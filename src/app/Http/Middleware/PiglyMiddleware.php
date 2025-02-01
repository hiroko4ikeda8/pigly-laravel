<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PiglyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // ここでリクエストの処理を追加
        $input = "Piglyミドルウェアでフォームデータを修正しました。";
        $request->merge(['content' => $input]);

        return $next($request);
    }
}
