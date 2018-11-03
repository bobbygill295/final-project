
<?php
/*fullpost.php
Bobby Gill
September 27, 2018
This script outputs the full post, if the post's content is
longer than 200 characters*/
require 'connect.php';

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$query = "SELECT * FROM posts WHERE id = :id";
$statement = $db->prepare($query);
$statement->bindValue(':id', $id, PDO::PARAM_INT);
$statement->execute();
$row = $statement->fetch();
$title = $row['title'];
$content = $row['content'];



?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="master.css" media="screen" title="no title">
  <meta charset="utf-8">
  <title>My Blog - Editing <?=$title?></title>
</head>
<body>
  <article class="">
    <h1>Bob's Blog</h1>
    <div class="post">
      <h3><?=$title?></h3>

      <span><a href="editpost.php?id=<?=$row['id']?>">edit</a></span>
      <?php $date = date_create($row['timestamp']) ?>
      <span class="timeStamp"><?= date_format($date,  "F d, Y, g:i a")?></span>
      <p>
        <?= $content ?>
      </p>
    </div>
  </article>
</body>
</html>
