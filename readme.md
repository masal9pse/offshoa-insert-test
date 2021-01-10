# 環境

```
purePHP
Postgres
Apache
```

# 機能一覧

- CUR 機能 + 投稿の際にタグを紐付け
- 投稿したユーザーしか更新、アーカイブできないようにしています。
- ユーザー認証
- マイページ機能
- アーカイブ機能 => アーカイブした記事はマイページから復元できます。
- XSS,CSRF(まだいいね機能とサインアップのみ),SQL インジェクション対策
- オブジェクト指向の導入(抽象クラスとインターフェース、static キーワード、トレイト、名前空間は勉強用にとりあえず導入してみました)
- タグ検索＋カテゴリー検索＋テキストフォームでの絞り込み検索
- フォロー機能
- いいね機能(トップページは PHP のみで実装、マイページにあるいいねは jQueryとajax を導入して非同期処理で実装しています)
- 管理ログイン＋管理画面からユーザーがいいねした記事を取得できる
- EC2にデプロイ。その際にインフラをterraformでコード化しました。
- 開発環境をDocker化

# ディレクトリ構成

- Api
  - 非同期処理の利用した機能のバックエンド(まだいいね機能のみ)
- app
  - クラス一覧、実際の処理はほぼ Controllers 内に書いています。
- auth
  - 認証系に関しては画面ファイルも実行処理もここに入っている
- public
  - CSS,JSFile
- Execute
  - 主に Models で実装した処理を実際に実行しているファイル
- db
  - データベース、テーブル、テストデータがまとまっている
- images
  - 画像ファイル
- views
  - 主に画面を表示している

# production のログイン情報

## 一般ユーザーログイン

- 名前: root パスワード: password
- 名前: masato パスワード: password

## 管理ログイン

- 名前: admin パスワード: password

## 今後余裕があれば実装したい機能
- Ajaxを用いた削除機能
