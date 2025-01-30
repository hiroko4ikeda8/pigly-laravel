<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>初期体重登録画面</title>

</head>

<body>
    <div class="container">
        <!-- h1とpタグを中央に配置するためのheaderクラス -->
        <div class="header">
            <h1>新規会員登録</h1>
            <p>step2 体重データの入力</p>
        </div>
        <div class="form-group">
            <label for="current_weight">現在の体重</label>
            <input type="text" id="current_weight" name="current_weight" placeholder="現在の体重を入力">
        </div>
        <div class="form-group">
            <label for="target_weight">目標の体重</label>
            <input type="text" id="target_weight" name="target_weight" placeholder="目標の体重を入力">
        </div>
        <div class="form-group">
            <button type="button">アカウント作成</button>
        </div>
    </div>
</body>

</html>