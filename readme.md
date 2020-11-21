# 機能一覧

- CUR 機能 + 投稿の際にタグを紐付け
- 認証
- マイページ機能
- アーカイブ機能 => アーカイブした記事はマイページから復元できます。
- XSS,CSRF(まだいいね機能とサインアップのみ),SQL インジェクション対策
- オブジェクト指向の導入(抽象クラスとインターフェース、トレイトは無理矢理ですが勉強用に導入してみました)
- タグ検索＋カテゴリー検索＋テキストフォームでの絞り込み検索
- フォロー機能(記事に対して)
- いいね機能(トップページは PHP のみ、マイページは ajax を導入して非同期処理)
- 管理ログイン＋管理画面からユーザーがいいねした記事を取得できる

# ディレクトリ構成

- Api
  - 非同期処理の利用した機能のバックエンド
- auth
  - 認証系に関しては画面ファイルも実行処理もここに入っている
- Models
  - クラス一覧
- public
  - CSS,JSFile
- Cntroller
  - 主に実装した処理を実行しているファイル
- db
  - データベース、テーブル、テストデータ
- images
  - 画像ファイル
- views
  - 主に画面を表示している

# 目標

- リレーション、関数、オブジェクト指向に慣れる

# DB,テーブルのセットアップ

1. DB は任意の DB を作成してください
2. Models/UtilClass.php の dbConnect メソッドを作成した DB の情報に書き換えてください
3. 次に db/create_table.sql 内の SQL 文をコピーアンドペーストして実行してください。
   postico の場合は、option+command+enter キーを入力しないと全ての query を実行することができないので注意が必要です。

# テストデータのセットアップ

1. db/seed 内の csv を使用してください。password がハッシュ化されていますが、値は"password"です。
2. users テーブルは新規登録があるのでアプリケーション内で作成できますが、admins テーブルには新規登録がないので db/seed/users.csv を併用してください

# 学んだこと

初めのディレクトリや DB の設計が後の生産性にかなら大きく関与してくること
