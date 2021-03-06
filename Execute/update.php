<?php
session_start();
ini_set('display_errors', "On");
require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\PostController;

$postInstance = new PostController();
$db = $postInstance->dbConnect();
//var_dump($_POST);
//var_dump($_FILES);

if (empty($_POST['title'])) {
 echo "<a href='./views/index.php'>一覧フォームへ</a>";
 exit('タイトルが未入力です');
}
//var_dump($new_image);
//exit;

$token = filter_input(INPUT_POST, 'csrf_token');
if (!isset($_SESSION['csrf_token']) || $token !== $_SESSION['csrf_token']) {
 exit('不正なリクエストです');
}

try {
 $db->beginTransaction();
 $postInstance->postUpdate($_POST);
 $db->commit();
 echo '更新に成功しました';
} catch (PDOException $e) {
 $db->rollBack();
 echo $e . '更新できませんでした';
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>更新処理</title>
</head>

<body>
 <a href="../views/index.php">トップページへ</a>
</body>

</html>