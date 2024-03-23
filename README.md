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
### 事前準備
<details>

* Githubのインストール  
   > 参考サイト：https://kinsta.com/jp/knowledgebase/install-git/
* Dockerのインストール  
   > 参考サイト（Mac)：https://matsuand.github.io/docs.docker.jp.onthefly/desktop/mac/install/  
   > 参考サイト（Win)：https://matsuand.github.io/docs.docker.jp.onthefly/desktop/windows/install/
</details>

### 導入手順
<details>

1. リモートリポジトリからローカルリポジトリにクローンする  
   * 自分のローカルリポジトリにクローンする  
   ```shell
   mkdir {任意の名前}
   cd {上記で作ったディレクトリ}
   git clone git@github.com:wa777curry/fleamarket.git
   ```

1. 自分のリモートリポジトリにローカルリポジトリのデータを反映させる  
（開発環境がいらないときはこの工程は不要）
   * 自分のGithubに任意の名前でリモートリポジトリを作成する
   * ローカルリポジトリとリモートリポジトリを紐づける
   ```shell
   cd クローンされたフォルダ
   git remote set-url origin {作成したリポジトリのURL(git@github.com:〜)}
   git remote -v
   ```
   * ローカルで変更したものをコミットする
   ```shell
   git add .
   git commit -m "任意のコミットメッセージ"
   ```
   * リモートに変更を反映させる
   ```shell
   git push
   ```

1. .envファイルの作成と修正  
   * .env.exampleをコピーして、.envファイルを作成します
   ```shell
   cd src
   cp .env.example .env
   ```
   * .envファイルを以下のように修正します
   ```diff shell
   open .env
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

2. Dockerの設定  
   ```shell
   docker-compose up -d --build
   ```
   * Dockerにコンテナが作成されていれば成功です  

3. Laravelのパッケージのインストール  
   * PHPコンテナ内へのログイン
   ```shell
   docker-compose exec php bash
   ```
   * ログインできたらパッケージをインストール
   ```php
   composer install
   ```

4. APP_KEYの作成  
   * PHPコンテナ内で以下のコマンドを実行
   ```php
   php artisan key:generate
   ```

4. データベースのマイグレーション
   * PHPコンテナ内でマイグレーションを実行
    ```php
    php artisan migrate:fresh
    ```

6. シーディングの実行
  * 以下のテストデータが含まれています
     * 管理者ログイン情報
     * ユーザーログイン情報
     * 商品情報
     * 商品のカテゴリー、サブカテゴリー、コンディション情報
     * テストコメント情報（文章はランダムです）
     * お気に入り情報
     * 支払方法情報
     * プロフィール情報
     * 閲覧回数情報
   * PHPコンテナ内でシーディングを実行
   ```php
   php artisan db:seed
   ```

6. アップロードする画像を表示するため、シンボリックリンクを設定
   * PHPコンテナ内で以下のコマンドを実行
   ```php
   php artisan storage:link
   ```
   * PHPコンテナを終了
   ```php
   exit
   ```

7. Mailhogのインストール
   ```shell
   brew install mailhog
   ```

8. トップページを開くには http://localhost へアクセスしてください
</details>