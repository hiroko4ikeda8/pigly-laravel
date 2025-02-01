<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeightLog extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'date', 'weight', 'calories', 'exercise_time', 'exercise_content'];

    // ユーザーとのリレーション
    public function user()
    {
        $weightLog = WeightLog::where('user_id', auth()->id())->latest()->first();
        $weightLog->update([
            'weight' => $data['current_weight'],
            'target_weight' => $data['target_weight'],
        ]);

        return $this->belongsTo(User::class);
    }
}
