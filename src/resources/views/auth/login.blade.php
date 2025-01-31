<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン画面</title>

    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <div class="container">
        <!-- h1タグを中央に配置するためのheaderクラス -->
        <div class="header">
            <h1>ログイン</h1>
        </div>

        <!-- フォームタグを追加 -->
        <form action="{{ route('login') }}" method="POST">
            @csrf <!-- CSRFトークンを追加 -->

            <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="email" id="email" name="email" placeholder="メールアドレスを入力してください" value="{{ old('email') }}">
                <!-- バリデーションエラーメッセージ -->
                @error('email')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">パスワード</label>
                <input type="password" id="password" name="password" placeholder="パスワードを入力してください">
                <!-- バリデーションエラーメッセージ -->
                @error('password')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <button type="submit">ログイン</button> <!-- type="submit" に変更 -->
            </div>
        </form>

        <div class="login-link">
            <a href="{{ route('register_step1' }})">アカウント作成はこちら</a>
        </div>
    </div>
</body>

</html>