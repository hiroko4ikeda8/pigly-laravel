<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員登録画面</title>

    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/register_step1.css') }}">
</head>

<body>
    <div class="container">
        <!-- h1とpタグを中央に配置するためのheaderクラス -->
        <div class="header">
            <img src="/asset/images/Pigly-新規会員登録.svg" alt="新規会員登録">
        </div>


        <!-- フォームタグを追加 -->
        <form action="{{ route('register.step1') }}" method="POST">
            @csrf <!-- CSRFトークンを追加 -->

            <div class="form-group">
                <label for="name">お名前</label>
                <input type="text" id="name" name="name" placeholder="お名前を入力してください" value="{{ old('name') }}">
                <!-- バリデーションエラーメッセージ -->
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

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
                <button type="submit">次に進む</button> <!-- type="submit" に変更 -->
            </div>
        </form>

        <div class="login-link">
            <a href="#">ログインはこちら</a>
        </div>
    </div>
</body>

</html>