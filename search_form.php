<!-- カテゴリーをselectboxにしたい -->
<?php
require('dbconnect.php');

$sql = 'SELECT * from categories';
$stmt = $db->query($sql);
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
//var_dump($categories);
?>

<!DOCTYPE html>
<html>

<head>
  <metacharset="utf-8">
    <title>検索機能</title>
</head>

<body>
  <h1>検索フォーム</h1>
  <a href="./list.php">全件表示リンク</a>
  <a href="./insert_form.html">投稿リンク</a>
  <!--<form action="search.php" method="get">-->
  <form action="search2.php" method="get">
    <select name="category">
      <?php foreach ($categories as $category) : ?>
        <option value="<?php echo $category['category']; ?>"><?php echo $category['category']; ?></option>
      <?php endforeach; ?>
      <option value="">未選択</option>
    </select>
    <!--<input type="text" name="title" placeholder="検索したい値">-->
    <input type="text" name="search" placeholder="検索したい値">
    <input type="submit" value="送信" />
  </form>
</body>

</html>