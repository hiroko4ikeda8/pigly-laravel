
## Fortifyのmigrateと非推奨警告の解決方法

Fortifyのマイグレーションを実行した際に、PHPの非推奨の警告が表示される場合があります。この警告を解決するために、ローカルおよびコンテナ内の`php.ini`を編集し、変更後に再度migrateを実行する必要があります。

以下は非推奨の警告を解消するための手順です。

---

## 手順

### 1. ローカルの`php.ini`を編集

1. **php.iniファイルを編集する**  
   開発環境で使用しているPHPの`php.ini`を手動で編集します。CLI環境の場合、以下のパスにあります。

   ※php.iniファイルはPHPのインストールディレクトリやDockerfile設定を確認する

   ```
   /etc/php/PHPのバージョン（例:7.X）/cli/php.ini
   ```

2. **非推奨警告の修正**  
   以下の内容を修正します。

   ```ini
   ; タイムゾーンの設定
   date.timezone = "Asia/Tokyo"

   ; mbstring設定の修正
   [mbstring]
   ; 非推奨設定
   ; mbstring.internal_encoding = "UTF-8"
   ; 推奨設定
   default_charset = "UTF-8"
   mbstring.language = "Japanese"
   ```

3. **変更を反映**  
   修正後、ファイルを保存します。

---

### 2. コンテナ内の`php.ini`を編集

1. **Docker Desktopの再起動**  
   Docker DesktopのUIからコンテナを再起動して設定を反映します。

   ※wslを利用している方は、コンテナを止めてからDocker Desktopを落とし、PCを再起動させて、
   Docker Desktopを起動させてみてください

2. **必要に応じて`php.ini`を修正**  
   コンテナ内の`php.ini`ファイルを手動で編集する場合は、以下の手順を実行します。

   ```bash
   docker compose exec php bash
   nano /usr/local/etc/php/php.ini
   ```

   修正内容はローカルと同様です。

　　※nanoが無い場合にはインストールしてください
---

### 3. 設定反映の確認

PHPの設定が正しく反映されているか確認するために、以下のコマンドを実行してください。

```bash
php -i | grep "mbstring"
```

または、

```bash
php -i | grep "date.timezone"
```

---

### 4. マイグレーションの再実行

非推奨警告を解消した後、マイグレーションを再度実行します。

```bash
php artisan migrate:fresh
```

これにより、修正した`php.ini`の設定が反映された状態でデータベースのマイグレーションが行われます。

---

これで非推奨警告の解消とFortifyのmigrateが完了です！
```

---
