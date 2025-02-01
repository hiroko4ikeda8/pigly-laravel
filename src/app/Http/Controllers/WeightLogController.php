<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeightLog;
use App\Models\WeightTarget;
use Carbon\Carbon;

class WeightLogController extends Controller
{
    // 目標体重と現在体重を表示するダッシュボードの表示
    public function index()
    {
        $weightTarget = WeightTarget::latest()->first(); // 最新の目標体重を取得
        $weightLogs = WeightLog::orderBy('date', 'desc')->paginate(8); // 最新の体重ログを取得してページネーション

        // 現在の体重を取得
        $currentWeight = WeightLog::latest()->first();

        return view('admin.dashboard', compact('weightTarget', 'weightLogs', 'currentWeight'));
    }

    // 体重ログ登録画面を表示
    public function create()
    {
        return view('admin.create');
    }

    // 体重ログを登録
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'weight' => 'required|numeric|digits_between:1,4|regex:/^\d+(\.\d{1})?$/', // 小数点1桁まで
            'calories' => 'required|numeric',
            'exercise_time' => 'required|regex:/^\d{1,2}(:[0-5][0-9])?$/', // 時間:分の形式
            'exercise_content' => 'nullable|max:120',
        ]);

        // 体重ログの登録
        WeightLog::create([
            'date' => Carbon::parse($request->date)->format('Y-m-d'),
            'weight' => $request->weight,
            'calories' => $request->calories,
            'exercise_time' => $request->exercise_time,
            'exercise_content' => $request->exercise_content,
        ]);

        return redirect()->route('weight-logs.index')->with('success', '体重ログを登録しました');
    }

    // 体重ログを編集
    public function edit($id)
    {
        $weightLog = WeightLog::findOrFail($id);
        return view('admin.edit', compact('weightLog'));
    }

    // 体重ログの更新
    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date',
            'weight' => 'required|numeric|digits_between:1,4|regex:/^\d+(\.\d{1})?$/',
            'calories' => 'required|numeric',
            'exercise_time' => 'required|regex:/^\d{1,2}(:[0-5][0-9])?$/',
            'exercise_content' => 'nullable|max:120',
        ]);

        $weightLog = WeightLog::findOrFail($id);

        $weightLog->update([
            'date' => Carbon::parse($request->date)->format('Y-m-d'),
            'weight' => $request->weight,
            'calories' => $request->calories,
            'exercise_time' => $request->exercise_time,
            'exercise_content' => $request->exercise_content,
        ]);

        return redirect()->route('weight-logs.index')->with('success', '体重ログを更新しました');
    }

    // 体重ログを削除
    public function destroy($id)
    {
        $weightLog = WeightLog::findOrFail($id);
        $weightLog->delete();

        return redirect()->route('weight-logs.index')->with('success', '体重ログを削除しました');
    }

    // 検索機能の実装
    public function search(Request $request)
    {
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');

        $weightLogs = WeightLog::whereBetween('date', [$fromDate, $toDate])
            ->orderBy('date', 'desc')
            ->paginate(8);

        return view('admin.dashboard', compact('weightLogs'));
    }
}
