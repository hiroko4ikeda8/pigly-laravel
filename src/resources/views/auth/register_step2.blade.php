<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>初期体重登録画面</title>

    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/register_step2.css') }}">
</head>

<body>
    <div class="container">
        <!-- h1とpタグを中央に配置するためのheaderクラス -->
        <div class="header">
            <h1>新規会員登録</h1>
            <p>step2 体重データの入力</p>
        </div>

        <!-- フォームタグを追加 -->
        <form action="{{ route('register.step2') }}" method="POST">
            @csrf <!-- CSRFトークンを追加 -->

            <div class="form-group">
                <label for="current_weight">現在の体重</label>
                <input type="text" id="current_weight" name="current_weight" placeholder="現在の体重を入力" value="{{ old('current_weight') }}">
                <!-- バリデーションエラーメッセージ -->
                @error('current_weight')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="target_weight">目標の体重</label>
                <input type="text" id="target_weight" name="target_weight" placeholder="目標の体重を入力" value="{{ old('target_weight') }}">
                <!-- バリデーションエラーメッセージ -->
                @error('target_weight')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <button type="submit">アカウント作成</button>
            </div>
        </form>
    </div>
</body>

</html>