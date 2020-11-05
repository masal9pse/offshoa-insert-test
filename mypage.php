<?php
//　/user_posts_form.php?id={num} でアクセスしてください
session_start();
include('dbconnect.php');
include('util.php');
auth_check('./auth/login.php');
$db = dbConnect();

//$sql = 'SELECT * from posts 
$sql = 'SELECT posts.* from posts 
inner join users 
on posts.user_id = users.id
where users.id=:user_id';

$stmt = $db->prepare($sql);
$stmt->bindValue(':user_id', $_GET['id'], PDO::PARAM_INT);
$stmt->execute();
$lists = $stmt->fetchAll(PDO::FETCH_ASSOC);
// 基本テキストフォームはないのでXSS対策はやる必要ないかも
$lists = sanitize($lists);
//var_dump($lists);
?>
<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
 <title>マイページ</title>
</head>

<body>
 <?php foreach ($lists as $list) : ?>
  <div>
   <td><?php echo $list['id']; ?></td>
   <td><?php echo $list['title']; ?></td>
   <td><?php echo $list['detail']; ?></td>
   <form action="like.php" method="post" style="display:inline;">
    <?php if (isLike($list['id'], $_SESSION['auth_id'])) : ?>
     <button type="submit" class="btn p-0 border-0">
      <input type="hidden" name="post_id" value="<?php echo $list['id']; ?>">
      <i class="fas fa-heart fa-fw text-danger"></i>
     </button>
   </form>
  <?php else : ?>
   <form action="like.php" method="post" style="display:inline;">
    <button type="submit" class="btn p-0 border-0">
     <input type="hidden" name="post_id" value="<?php echo $list['id']; ?>">
     <i class="fas fa-heart"></i>
    </button>
   <?php endif; ?>
   </form>
   <span>
    <?php echo count(getLike($list['id'])); ?>
   </span>
   <td><button type="button" onclick="location.href='./update_form.php?id=<?php print($list['id']) ?>'">編集</button></td>
  </div>
 <?php endforeach ?>
 <a href="list.php">トップページへ</a>
</body>

</html>