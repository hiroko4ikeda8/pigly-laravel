<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員登録画面</title>

    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/register_step1.css') }}">
</head>

<body>
    <div class="container">
        <!-- ヘッダーセクション -->
        <section class="header-section">
            <div class="header">
                <img src="{{ asset('images/Pigly-新規会員登録.svg') }}" alt="新規会員登録">
            </div>
            <p>step1 アカウント情報の登録</p>
        </section>

        <!-- フォームセクション -->
        <section class="form-section">
            <form action="{{ route('register.step1') }}" method="POST">
                @csrf <!-- CSRFトークンを追加 -->

                <!-- お名前フィールド -->
                <div class="form-group">
                    <label for="name">お名前</label>
                    <input type="text" id="name" name="name" placeholder="お名前を入力してください" value="{{ old('name') }}">
                    <!-- バリデーションエラーメッセージ -->
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- メールアドレスフィールド -->
                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input type="email" id="email" name="email" placeholder="メールアドレスを入力してください" value="{{ old('email') }}">
                    <!-- バリデーションエラーメッセージ -->
                    @error('email')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- パスワードフィールド -->
                <div class="form-group">
                    <label for="password">パスワード</label>
                    <input type="password" id="password" name="password" placeholder="パスワードを入力してください">
                    <!-- バリデーションエラーメッセージ -->
                    @error('password')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- ボタンセクション -->
                <div class="button-section">
                    <button type="submit" class="btn-next">次に進む</button>
                </div>
            </form>
        </section>

        <!-- ログインリンクセクション -->
        <section class="login-link-section">
            <div class="login-link">
                <a href="{{ route('login') }}">ログインはこちら</a>
            </div>
        </section>
    </div>
</body>

</html>