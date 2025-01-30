<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員登録画面</title>

</head>

<body>
    <div class="container">
        <!-- h1とpタグを中央に配置するためのheaderクラス -->
        <div class="header">
            <h1>新規会員登録</h1>
            <p>step1 アカウント情報の登録</p>
        </div>
        <div class="form-group">
            <label for="name">お名前</label>
            <input type="text" id="name" placeholder="お名前を入力してください">
        </div>
        <div class="form-group">
            <label for="email">メールアドレス</label>
            <input type="email" id="email" placeholder="メールアドレスを入力してください">
        </div>
        <div class="form-group">
            <label for="password">パスワード</label>
            <input type="password" id="password" placeholder="パスワードを入力してください">
        </div>
        <div class="form-group">
            <button type="button">次に進む</button>
        </div>
        <div class="login-link">
            <a href="#">ログインはこちら</a>
        </div>
    </div>
</body>

</html>