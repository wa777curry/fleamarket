# coachtechフリマ　- 独自のフリマアプリ

![top画像](https://github.com/wa777curry/fleamarket/assets/136479019/312e087d-f7b8-45e3-a2a6-6ad93422e7d8)

## 作成した目的
機能や画面遷移のわかりやすいフリマアプリサービスの提供

## ユーザーテストURL：http://localhost/
<details>

* 購入者テストアカウント：user@testmail
* 購入者テストパスワード：password

* 出品者テストアカウント：seller@testmail
* 出品者テストパスワード：password
</details>

## 管理者テストURL：http://localhost/admin/login/
<details>

* 管理者テストアカウント：admin@testmail
* 管理者テストパスワード：password
</details>

## 機能一覧
* 会員登録
* 商品検索
* 商品の購入、出品、コメント機能、お気に入り登録機能

## 使用技術
* HTML, CSS, JavaScript
* PHP 8.2.8, Laravel 8.83.27
* MySQL 15.1
* Docker, Docker Compose

## テーブル設計
<details>
	
| adminsテーブル          |                 |             |            |          |                 |
| :-------------------- | :-------------- | :---------- | :--------- | :------- | :-------------- |
| カラム名              | 型              | PRIMARY KEY | UNIQUE KEY | NOT NULL | FOREIGN KEY     |
| id                    | unsigned bigint | ⚪︎        |            | ⚪︎     |                 |
| email                 | varchar(255)    |             | ⚪︎       | ⚪︎     |                 |
| password              | varchar(255)    |             |            | ⚪︎     |                 |
| created_at            | timestamp       |             |            |          |                 |
| updated_at            | timestamp       |             |            |          |                 |

| usersテーブル         |                 |             |            |          |                 |
| :-------------------- | :-------------- | :---------- | :--------- | :------- | :-------------- |
| カラム名              | 型              | PRIMARY KEY | UNIQUE KEY | NOT NULL | FOREIGN KEY     |
| id                    | unsigned bigint | ⚪︎        |            | ⚪︎     |                 |
| admin_id              | bigint          |             |            | ⚪︎     | admin(id)       |
| email                 | varchar(255)    |             | ⚪︎       | ⚪︎     |                 |
| password              | varchar(255)    |             |            | ⚪︎     |                 |
| created_at            | timestamp       |             |            |          |                 |
| updated_at            | timestamp       |             |            |          |                 |

| paymentsテーブル      |                 |             |            |          |                 |
| :-------------------- | :-------------- | :---------- | :--------- | :------- | :-------------- |
| カラム名              | 型              | PRIMARY KEY | UNIQUE KEY | NOT NULL | FOREIGN KEY     |
| id                    | unsigned bigint | ⚪︎        |            | ⚪︎     |                 |
| payment               | varchar(255)    |             | ⚪︎       | ⚪︎     |                 |
| created_at            | timestamp       |             |            |          |                 |
| updated_at            | timestamp       |             |            |          |                 |

| profilesテーブル      |                 |             |            |          |                 |
| :-------------------- | :-------------- | :---------- | :--------- | :------- | :-------------- |
| カラム名              | 型              | PRIMARY KEY | UNIQUE KEY | NOT NULL | FOREIGN KEY     |
| id                    | unsigned bigint | ⚪︎        |            | ⚪︎     |                 |
| user_id               | bigint          |             |            | ⚪︎     | user(id)        |
| username              | varchar(255)    |             |            | ⚪︎     |                 |
| postcode             | varchar(255)    |             |            | ⚪︎     |                 |
| address               | varchar(255)    |             |            | ⚪︎     |                 |
| building              | varchar(255)    |             |            |          |                 |
| icon_url              | varchar(255)    |             |            |          |                 |
| created_at            | timestamp       |             |            |          |                 |
| updated_at            | timestamp       |             |            |          |                 |

| categoriesテーブル    |                 |             |            |          |                 |
| :-------------------- | :-------------- | :---------- | :--------- | :------- | :-------------- |
| カラム名              | 型              | PRIMARY KEY | UNIQUE KEY | NOT NULL | FOREIGN KEY     |
| id                    | unsigned bigint | ⚪︎        |            | ⚪︎     |                 |
| category              | varchar(255)    |             | ⚪︎       | ⚪︎     |                 |
| created_at            | timestamp       |             |            |          |                 |
| updated_at            | timestamp       |             |            |          |                 |

| subcategoriesテーブル |                 |             |            |          |                 |
| :-------------------- | :-------------- | :---------- | :--------- | :------- | :-------------- |
| カラム名              | 型              | PRIMARY KEY | UNIQUE KEY | NOT NULL | FOREIGN KEY     |
| id                    | unsigned bigint | ⚪︎        |            | ⚪︎     |                 |
| subcategory           | varchar(255)    |             | ⚪︎       | ⚪︎     |                 |
| created_at            | timestamp       |             |            |          |                 |
| updated_at            | timestamp       |             |            |          |                 |

| conditionsテーブル    |                 |             |            |          |                 |
| :-------------------- | :-------------- | :---------- | :--------- | :------- | :-------------- |
| カラム名              | 型              | PRIMARY KEY | UNIQUE KEY | NOT NULL | FOREIGN KEY     |
| id                    | unsigned bigint | ⚪︎        |            | ⚪︎     |                 |
| condition             | varchar(255)    |             | ⚪︎       | ⚪︎     |                 |
| created_at            | timestamp       |             |            |          |                 |
| updated_at            | timestamp       |             |            |          |                 |

| itemsテーブル         |                 |             |            |          |                 |
| :-------------------- | :-------------- | :---------- | :--------- | :------- | :-------------- |
| カラム名              | 型              | PRIMARY KEY | UNIQUE KEY | NOT NULL | FOREIGN KEY     |
| id                    | unsigned bigint | ⚪︎        |            | ⚪︎     |                 |
| seller_id             | bigint          |             |            | ⚪︎     |                 |
| category_id           | bigint          |             |            | ⚪︎     | category(id)    |
| subcategory_id        | bigint          |             |            | ⚪︎     | subcayrgory(id) |
| condition_id          | bigint          |             |            | ⚪︎     | condition(id)   |
| itemname              | varchar(255)    |             |            | ⚪︎     |                 |
| description           | text            |             |            | ⚪︎     |                 |
| price                 | decimal(10,2)   |             |            | ⚪︎     |                 |
| item_url              | varchar(255)    |             |            | ⚪︎     |                 |
| created_at            | timestamp       |             |            |          |                 |
| updated_at            | timestamp       |             |            |          |                 |

| commentsテーブル      |                 |             |            |          |                 |
| :-------------------- | :-------------- | :---------- | :--------- | :------- | :-------------- |
| カラム名              | 型              | PRIMARY KEY | UNIQUE KEY | NOT NULL | FOREIGN KEY     |
| id                    | unsigned bigint | ⚪︎        |            | ⚪︎     |                 |
| user_id               | bigint          |             |            | ⚪︎     | user(id)        |
| item_id               | bigint          |             |            | ⚪︎     | item(id)        |
| comment               | varchar(255)    |             |            | ⚪︎     |                 |
| created_at            | timestamp       |             |            |          |                 |
| updated_at            | timestamp       |             |            |          |                 |

| deliveriesテーブル    |                 |             |            |          |                 |
| :-------------------- | :-------------- | :---------- | :--------- | :------- | :-------------- |
| カラム名              | 型              | PRIMARY KEY | UNIQUE KEY | NOT NULL | FOREIGN KEY     |
| id                    | unsigned bigint | ⚪︎        |            | ⚪︎     |                 |
| user_id               | bigint          |             |            | ⚪︎     | user(id)        |
| postcode             | varchar(255)    |             |            | ⚪︎     |                 |
| address               | varchar(255)    |             |            | ⚪︎     |                 |
| building              | varchar(255)    |             |            |          |                 |
| created_at            | timestamp       |             |            |          |                 |
| updated_at            | timestamp       |             |            |          |                 |

| likesテーブル         |                 |             |            |          |                 |
| :-------------------- | :-------------- | :---------- | :--------- | :------- | :-------------- |
| カラム名              | 型              | PRIMARY KEY | UNIQUE KEY | NOT NULL | FOREIGN KEY     |
| id                    | unsigned bigint | ⚪︎        |            | ⚪︎     |                 |
| user_id               | bigint          |             |            | ⚪︎     | user(id)        |
| item_id               | bigint          |             |            | ⚪︎     | item(id)        |
| created_at            | timestamp       |             |            |          |                 |
| updated_at            | timestamp       |             |            |          |                 |

| viewsテーブル         |                 |             |            |          |                 |
| :-------------------- | :-------------- | :---------- | :--------- | :------- | :-------------- |
| カラム名              | 型              | PRIMARY KEY | UNIQUE KEY | NOT NULL | FOREIGN KEY     |
| id                    | unsigned bigint | ⚪︎        |            | ⚪︎     |                 |
| user_id               | bigint          |             |            | ⚪︎     | user(id)        |
| item_id               | bigint          |             |            | ⚪︎     | item(id)        |
| view_count            | int             |             |            | ⚪︎     |                 |
| last_viewed_at        | timestamp       |             |            |          |                 |
| created_at            | timestamp       |             |            |          |                 |
| updated_at            | timestamp       |             |            |          |                 |

| purchasesテーブル     |                 |             |            |          |                 |
| :-------------------- | :-------------- | :---------- | :--------- | :------- | :-------------- |
| カラム名              | 型              | PRIMARY KEY | UNIQUE KEY | NOT NULL | FOREIGN KEY     |
| id                    | unsigned bigint | ⚪︎        |            | ⚪︎     |                 |
| user_id               | bigint          |             |            | ⚪︎     | user(id)        |
| item_id               | bigint          |             |            | ⚪︎     | item(id)        |
| delivery_id           | bigint          |             |            | ⚪︎     | delivery(id)    |
| payment_id            | bigint          |             |            | ⚪︎     | payment(id)     |
| created_at            | timestamp       |             |            |          |                 |
| updated_at            | timestamp       |             |            |          |                 |
</details>

## ER図
<details>
	
![er drawio](https://github.com/wa777curry/fleamarket/assets/136479019/7eaefb03-03fe-48d8-bb83-52125c84a6cf)
</details>

## 環境構築
### Macの場合
1. Homebrewをインストールしてください  
   * 公式サイト：https://brew.sh/ja/  
1. Githubをインストールしてください  
   * ターミナルで `brew install git` を実行  
   * インストール後 `git --version` でバージョンが表示されていれば大丈夫です
1. Dockerをインストールしてください  
   * 公式サイト：https://docs.docker.com/desktop/install/mac-install/?_fsi=Kk00kOxB  
   * 参考サイト：https://matsuand.github.io/docs.docker.jp.onthefly/desktop/mac/install/
1. githubからプロジェクトをクローンしてください  
   * リポジトリURL：https://github.com/wa777curry/fleamarket.git
   * 参考サイト：https://docs.github.com/ja/repositories/creating-and-managing-repositories/cloning-a-repository?platform=mac#cloning-an-empty-repository  
1. Docker Composeコマンドでビルドしてください  
   * ターミナルで `docker-compose up -d --build` を実行  
   * Dockerにコンテナが作成されていれば成功です
1. Dockerコンテナを起動してください

1. Laravelのパッケージをインストールしてください  
   * ターミナルで `docker-compose exec php bash` を実行    
   * ターミナルで `composer create-project "laravel/laravel=8.*" . --prefer-dist` を実行  

1. .envファイルの作成と修正が必要です  
   * 演習0−2  
1. データベースのマイグレーションが必要です
    
1. （必要であれば）シーダーファイルでダミーデータを呼び出せます
1. ブラウザで http://localhostにアクセスしてください
