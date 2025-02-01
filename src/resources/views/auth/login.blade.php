<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン画面</title>

    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <!-- コンテナ全体をラップするセクション -->
    <section class="container">
        <!-- ヘッダー部分 -->
        <header class="header">
            <div class="header">
                <img src="{{ asset('images/pigly-ログイン.svg') }}" alt="ログイン">
            </div>
        </header>

        <!-- ログインフォーム部分 -->
        <section class="login-form">
            <form action="{{ route('login') }}" method="POST">
                @csrf <!-- CSRFトークンを追加 -->

                <!-- メールアドレス入力フィールド -->
                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input type="email" id="email" name="email" placeholder="メールアドレスを入力してください" value="{{ old('email') }}">
                    <!-- バリデーションエラーメッセージ -->
                    @error('email')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- パスワード入力フィールド -->
                <div class="form-group">
                    <label for="password">パスワード</label>
                    <input type="password" id="password" name="password" placeholder="パスワードを入力してください">
                    <!-- バリデーションエラーメッセージ -->
                    @error('password')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- ログインボタン -->
                <div class="button-section">
                    <button type="submit" class="btn-next">ログイン</button> <!-- type="submit" に変更 -->
                </div>
            </form>
        </section>

        <!-- アカウント作成リンク -->
        <section class="login-link">
            <a href="{{ route('register.step1') }}">アカウント作成はこちら</a>
        </section>

    </section>
</body>

</html>