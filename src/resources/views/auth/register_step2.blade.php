<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>初期体重登録画面</title>

    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/register_step2.css') }}">
</head>

<body>
    <div class="container">
        <!-- ヘッダーセクション -->
        <section class="header-section">
            <div class="header">
                <img src="{{ asset('images/Pigly-新規会員登録.svg') }}" alt="新規会員登録">
            </div>
            <p>step2 体重データの入力</p>
        </section>

        <!-- フォームセクション -->
        <section class="form-section">
            <form action="{{ route('register.step2') }}" method="POST">
                @csrf <!-- CSRFトークンを追加 -->

                <div class="form-group">
                    <label for="current_weight">現在の体重</label>
                    <div class="weight-container">
                        <input type="number" id="current_weight" name="current_weight" placeholder="現在の体重を入力" value="{{ old('current_weight') }}" step="0.1">
                        <span>kg</span>
                    </div>
                    @error('current_weight')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="target_weight">目標の体重</label>
                    <div class="target_weight-container">
                        <input type="number" id="target_weight" name="target_weight" placeholder="目標の体重を入力" value="{{ old('target_weight') }}" step="0.1">
                        <span>kg</span>
                    </div>
                    @error('target_weight')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="button-section">
                    <button type="submit" class="btn-next">アカウント作成</button>
                </div>
            </form>
        </section>
    </div>
</body>

</html>