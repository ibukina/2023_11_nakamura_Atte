# 2023_11_nakamura_Atte<br>

#### 会員登録ページ

![localhost_register](https://github.com/ibukina/2023_11_nakamura_Atte/assets/142294463/2b487326-867e-4176-9b5d-c435ce7c2613)

#### ログインページ

![localhost_login](https://github.com/ibukina/2023_11_nakamura_Atte/assets/142294463/7a788813-0685-4d33-84b2-60f976f9247b)

#### タイムカードページ

![localhost_](https://github.com/ibukina/2023_11_nakamura_Atte/assets/142294463/c77f1a51-2e04-492a-9121-5bbf268b8a1c)


#### 日付別勤怠情報ページ

![localhost_date-back__token=5YIcG3uKPhYwwJZBiIgmyyoH6TQ7fDQ4CWt7Efbn date=2024-01-05](https://github.com/ibukina/2023_11_nakamura_Atte/assets/142294463/bd27160b-337b-4a0a-bd6d-ababc8304fd1)



企業の勤怠管理システムです。<br>
日付別勤怠情報ページでは、タイムカードのページで入力された勤務情報をもとに表示しています。

> [!IMPORTANT]
>このアプリは docker , VSCode の使用を前提としています。
>また開発環境は Windows ですので、MacOS 等他機種では動作が異なる可能性があります。ご了承ください。

## 作成した目的

企業の人事評価のために作成しました。

## アプリケーション URL

- ユーザー登録ページは
http://localhost/register  
- ログインページは
http://localhost/login  
- タイムカードのページは
http://localhost  
- 勤務情報のページは
http://localhost/attendance  
となっております。

>[!IMPORTANT]
>タイムカード及び勤務情報のページは、ログインしているユーザーのみ閲覧可能となっております。

## 機能一覧

- 会員登録
- ログイン
- ログアウト<br>
  会員登録、ログイン、ログアウトには Laravel の認証機能を利用しています。
- 勤務開始
- 勤務終了<br>
  勤務時間は日を跨いだ時点で翌日の出勤動作に切り替えられます。
- 休憩開始
- 休憩終了<br>
  休憩は一日に何度も取得可能です。
- 日付別勤怠情報取得
- ページネーション<br>
  勤怠情報は 5 件ずつ取得されます。

## 使用技術(実行環境)

> laravel Framework 8.83.27<br>
> php 7.4.9<br>
> mysql 8.0.26<br>
> nginx 1.21.1<br>
> JavaScript v12.22.9<br>
> jquery ^3.7.1<br>

## テーブル設計

- UsersTable
  ![localhost_8080_index php_route=_table_structure db=laravel_db table=users](https://github.com/ibukina/2023_11_nakamura_Atte/assets/142294463/4c8486e0-951c-4350-9762-427c4b965734)

- WorksTable
  ![localhost_8080_index php_route=_table_structure db=laravel_db table=users (1)](https://github.com/ibukina/2023_11_nakamura_Atte/assets/142294463/58b35313-fefd-4b1f-98a2-8f4ab28a2984)

- RestsTable
  ![localhost_8080_index php_route=_table_structure db=laravel_db table=users (2)](https://github.com/ibukina/2023_11_nakamura_Atte/assets/142294463/fc4fbfa4-da10-460b-9fb8-eb0c8b32ff96)

## ER 図

![atte drawio](https://github.com/ibukina/2023_11_nakamura_Atte/assets/142294463/e91c977d-a67b-49d1-8054-dec4389688d0)

## 環境構築

>[!IMPORTANT]
>これは Windows での構築方法です。
>他 OS の場合は異なる場合がございます。<br>

- プロジェクトのクローン<br>
  まず、コマンドライン上でアプリケーションを導入したいディレクトリまで移動してください。
  移動出来たら、

```コマンドライン
git clone <リポジトリのurl>
```

を実行してください。<br>
これでプロジェクトのクローンが出来ました。<br>

- docker の作成と起動<br>
  次に、クローンしたプロジェクトのあるディレクトリで、

```コマンドライン
docker-compose up -d --build
```

を実行してください。<br>
これで、docker コンテナの作成と起動が完了しました。<br>  
docker が起動しているか目に見える形で確認したい方は、docker desktop を導入して確認してみてください。<br>

- laravel の導入<br>
  プロジェクトのディレクトリで、

```コマンドライン
docker-compose exec php bash
```

を実行して、php コンテナにログインしてください。<br>
ログインが出来たら

```phpコンテナ
composer install
```

を実行してください。<br>
これで laravel はインストール出来ました。<br>

- .env ファイルと APP_KEY の作成<br>
  laravel の導入時のように、php コンテナにログインしてください。<br>
  php コンテナ内で

```phpコンテナ
cp .env.example .env
```

を実行して、.env ファイルを作成してください。<br>
作成出来たら、

```phpコンテナ
exit
```

で php コンテナからログアウトした後、

```コマンドライン
code .
```

を実行して、VSCode でプロジェクトを開きます。<br>
src 以下に.env ファイルがあるので、そちらの 11 から 16 行目を

```.env:.envファイル
DB_CONNECTION=mysql
- DB_HOST=127.0.0.1
+ DB_HOST=mysql
DB_PORT=3306
- DB_DATABASE=laravel
- DB_USERNAME=root
- DB_PASSWORD=
+ DB_DATABASE=laravel_db
+ DB_USERNAME=laravel_user
+ DB_PASSWORD=laravel_pass
```

のように変更し、保存してください。  <br>
php コンテナにログインして、

```phpコンテナ
php artisan key:generate
```

を実行して、APP_KEY を作成してください。<br>
データベースが存在するか確認したい場合は、
http://localhost:8080/
にアクセスしてください。<br>

- JavaScriptコードのコンパイル<br>
  プロジェクトディレクトリで

```コマンドプロンプト
npm install
```
を実行後、
```コマンドプロンプト
npm run dev
```
をしてください。<br>
これでjavasciptのコードが動くようになります。<br>

- データベースとテーブルの作成<br>
  プロジェクトディレクトリで

```コマンドライン
docker-compose exec mysql bash
```

を実行して、mysql コンテナに入ってください。<br>
コンテナに入れたら

```mysqlコンテナ
mysql -u laravel_user -p
```

で、コンテナにログインしてください。<br>
この時、パスワードを求められるので、.env ファイルで変更した DB_PASSWORD の`laravel_pass`を入力してください。<br>
ログイン出来たら

```mysqlコンテナ
USE laravel_db;
```

を実行して、laravel_db を使用するようにしてください。<br>
確認のため

```mysqlコンテナ
SELECT DATABASE();
```

を実行して、laravel_db が選択されていることを確認してください。<br>
確認出来たら、

```
exit
```

で mysql コンテナからログアウトして、プロジェクトディレクトリに戻ってください。<br>
最後に、laravel の導入時のように php コンテナにログインして

```phpコンテナ
php artisan migrate
```

を実行して、マイグレーションテーブルを作成してください。<br>
php コンテナからのログアウトには`exit`を実行してください。<br>
これで環境構築は終了です。お疲れ様でした。

## テストユーザー

動作確認用のユーザー情報です。<br>
環境構築後、laravel を導入した php コンテナにて

```phpコンテナ
php artisan db:seed
```

を行って頂くと、下記のユーザーが作成されます。

> username:山田 太郎  
> email:test@example.com  
> password:2DDywxxwE3VM@B2  

`php artisan db:seed`で作成した情報は、`php artisan migrate:fresh`で一括削除できます。
